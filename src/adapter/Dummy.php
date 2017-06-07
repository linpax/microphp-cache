<?php
/**
 * @link https://github.com/linpax/microphp-cache
 * @copyright Copyright &copy; 2013 Oleg Lunegov
 * @license https://github.com/linpax/microphp-cache/blob/master/LICENSE
 */

namespace Micro\Cache\Adapter;

use Micro\Cache\AdapterInterface;


class Dummy implements AdapterInterface
{
    public function has($key)
    {
        return true;
    }

    public function get($key, $default = null)
    {
        return $default;
    }

    public function set($key, $value, $ttl = null)
    {
        //return true;
    }

    public function delete($key)
    {
        //return true;
    }

    public function clear()
    {
        return;
    }
}