<?php
/**
 * @link https://github.com/linpax/microphp-cache
 * @copyright Copyright &copy; 2013 Oleg Lunegov
 * @license https://github.com/linpax/microphp-cache/blob/master/LICENSE
 */

namespace Micro\Cache\Adapter;

use Micro\Cache\AdapterInterface;


class Runtime implements AdapterInterface
{
    private $arr = [];

    public function has($key)
    {
        return array_key_exists($key, $this->arr);
    }

    public function get($key, $default = null)
    {
        return $this->has($key) ? $this->arr[$key] : $default;
    }

    public function set($key, $value, $ttl = null)
    {
        $arr = $this->arr;
        $arr[$key] = $value;

        $this->arr = $arr;
    }

    public function delete($key)
    {
        if (array_key_exists($key, $this->arr)) {
            unset($this->arr[$key]);
        }
    }

    public function clear()
    {
        $this->arr = [];
    }
}