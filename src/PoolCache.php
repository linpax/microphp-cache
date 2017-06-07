<?php
/**
 * @link https://github.com/linpax/microphp-cache
 * @copyright Copyright &copy; 2013 Oleg Lunegov
 * @license https://github.com/linpax/microphp-cache/blob/master/LICENSE
 */

namespace Micro\Cache;

use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Cache\InvalidArgumentException;


/**
 * Class PoolCache (PSR-6)
 * @package Micro\Cache
 */
class PoolCache implements CacheItemPoolInterface
{
    /** @var AdapterInterface $adapter */
    private $adapter;
    /** @var string $prefix */
    private $prefix;

    public function __construct($prefix, AdapterInterface $adapter)
    {
        $this->prefix = $prefix;
        $this->adapter = $adapter;
    }



    public function getItem($key)
    {
        // TODO: Implement getItem() method.
    }

    public function getItems(array $keys = array())
    {
        // TODO: Implement getItems() method.
    }

    public function hasItem($key)
    {
        // TODO: Implement hasItem() method.
    }

    public function clear()
    {
        // TODO: Implement clear() method.
    }

    public function deleteItem($key)
    {
        // TODO: Implement deleteItem() method.
    }

    public function deleteItems(array $keys)
    {
        // TODO: Implement deleteItems() method.
    }

    public function save(CacheItemInterface $item)
    {
        // TODO: Implement save() method.
    }

    public function saveDeferred(CacheItemInterface $item)
    {
        // TODO: Implement saveDeferred() method.
    }

    public function commit()
    {
        // TODO: Implement commit() method.
    }
}