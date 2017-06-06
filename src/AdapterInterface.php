<?php
/**
 * @link https://github.com/linpax/microphp-framework
 * @copyright Copyright &copy; 2013 Oleg Lunegov
 * @license https://github.com/linpax/microphp-framework/blob/master/LICENSE
 */

namespace Micro\Cache;


interface AdapterInterface
{
    public function has($key);
    public function get($key);
    public function set($key, $value, $ttl);
    public function delete($key);
    public function clear();
}