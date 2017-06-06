<?php
/**
 * @link https://github.com/linpax/microphp-framework
 * @copyright Copyright &copy; 2017 Oleg Lunegov
 * @license https://github.com/linpax/microphp-framework/blob/master/LICENSE
 */

namespace Micro\Cache;

use Psr\SimpleCache\CacheInterface;


/**
 * Class Cache (PSR-16)
 * @package Micro\Cache
 */
class Cache implements CacheInterface
{
    /** @var AdapterInterface $adapter */
    private $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
    public function pool($prefix)
    {
        return new PoolCache($prefix, $this->adapter); // todo: hard link
    }


    public function get($key, $default = null)
    {
        return $this->adapter->get($key) ?: $default;
    }

    public function set($key, $value, $ttl = null)
    {
        $this->adapter->set($key, $value, $ttl);
    }

    public function delete($key)
    {
        $this->adapter->delete($key);
    }

    public function clear()
    {
        $this->adapter->clear();
    }

    public function getMultiple($keys, $default = null)
    {
        $result = [];

        foreach ($keys as $key) {
            $result[$key] = $this->get($key, $default);
        }

        return $result;
    }

    public function setMultiple($values, $ttl = null)
    {
        foreach ($values as $key => $value) {
            $this->set($key, $value, $ttl);
        }
    }

    public function deleteMultiple($keys)
    {
        foreach ($keys as $key) {
            $this->delete($key);
        }
    }

    public function has($key)
    {
        return $this->adapter->has($key);
    }
}