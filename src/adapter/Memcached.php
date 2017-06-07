<?php namespace Micro\Cache\Adapter;

/**
 * @link https://github.com/linpax/microphp-cache
 * @copyright Copyright &copy; 2013 Oleg Lunegov
 * @license https://github.com/linpax/microphp-cache/blob/master/LICENSE
 */

use Micro\Cache\AdapterException;
use Micro\Cache\AdapterInterface;

class Memcached implements AdapterInterface
{
    const DRIVER_MEMCACHE = 'Memcache';
    const DRIVER_MEMCACHED = 'Memcached';

    protected $availableTypes = [self::DRIVER_MEMCACHE, self::DRIVER_MEMCACHED];

    /** @var \Memcache|\Memcached $driver driver memcache(d) */
    protected $driver;

    protected $configDefault = [
        'type' => self::DRIVER_MEMCACHED,
        'servers' => [[
            'hostname' => '127.0.0.1',
            'port' => 11211,
            'weight' => 1
        ]]

    ];

    /**
     * @var array
     */
    protected $config = [];

    /**
     * Memcached constructor.
     * @param array $config Array of params for memcache(d) connection.
     *                          type - Memcached::DRIVER_MEMCACHE or Memcached::DRIVER_MEMCACHED
     *                          servers - array of connections [hostname,port,weight]
     *                      Notice that in case of using memcache only the first element of list will be used
     * @throws AdapterException
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge($this->configDefault, $config);

        if (!$this->check($this->config['type'])) {
            throw new AdapterException($this->config['type'] . ' extension is not installed');
        }

        if (!in_array($this->config['type'], $this->availableTypes)) {
            throw new AdapterException('Extension type is not defined in config');
        }

        switch ($this->config['type']) {
            case self::DRIVER_MEMCACHE:
                $this->driver = new \Memcache;
                $server = $this->config['servers'][0];
                $this->driver->addServer($server['hostname'], $server['port'], $server['weight']);
                break;
            case self::DRIVER_MEMCACHED:
                $this->driver = new \Memcached;
                $this->driver->addServers($this->config['servers']);
                break;
        }

    }

    /**
     * Checks installed extensions
     * @return bool
     */
    public function check($driver)
    {
        switch ($driver) {
            case self::DRIVER_MEMCACHE:
                return extension_loaded('memcache');
            case self::DRIVER_MEMCACHED:
                return extension_loaded('memcached');
        }
        return false;
    }

    //region Micro\Cache\AdapterInterface implementation

    /**
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        switch ($this->config['type']) {
            case self::DRIVER_MEMCACHE:
                return $this->driver->get($key) !== false;
                break;
            case self::DRIVER_MEMCACHED:
                $this->driver->get($key);
                return $this->driver->getResultCode() == \Memcached::RES_SUCCESS;
                break;
        }

    }

    public function get($key, $default = null)
    {
        if (!$this->has($key)) {
            return $default;
        }
        return $this->driver->get($key);
    }

    public function set($key, $value, $ttl = null)
    {
        switch ($this->config['type']) {
            case self::DRIVER_MEMCACHE:
                return $this->driver->set($key, $value, 0, $ttl);
            case self::DRIVER_MEMCACHED:
                return $this->driver->set($key, $value, $ttl);
        }
    }

    public function delete($key)
    {
        return $this->driver->delete($key);
    }

    public function clear()
    {
        return $this->driver->flush();
    }

    //endregion

}