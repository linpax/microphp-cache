<?php
/**
 * @link https://github.com/linpax/microphp-cache
 * @copyright Copyright &copy; 2013 Oleg Lunegov
 * @license https://github.com/linpax/microphp-cache/blob/master/LICENSE
 */

namespace Micro\Cache;

use Psr\Cache\CacheItemInterface;


class PoolCacheItem implements CacheItemInterface
{
    public function __construct($prefix, $name, AdapterInterface $adapter)
    {
        //
    }


    public function getKey()
    {
        // TODO: Implement getKey() method.
    }

    public function get()
    {
        // TODO: Implement get() method.
    }

    public function isHit()
    {
        // TODO: Implement isHit() method.
    }

    public function set($value)
    {
        // TODO: Implement set() method.
    }

    public function expiresAt($expiration)
    {
        // TODO: Implement expiresAt() method.
    }

    public function expiresAfter($time)
    {
        // TODO: Implement expiresAfter() method.
    }
}