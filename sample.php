<?php
/**
 * @link https://github.com/linpax/microphp-framework
 * @copyright Copyright &copy; 2013 Oleg Lunegov
 * @license https://github.com/linpax/microphp-framework/blob/master/LICENSE
 */


include __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/src/AdapterInterface.php';
include __DIR__ . '/src/adapter/DummyCacheAdapter.php';
include __DIR__ . '/src/Cache.php';
include __DIR__ . '/src/PoolCache.php';
include __DIR__ . '/src/PoolCacheItem.php';

$dummy = new \Micro\Cache\Adapter\DummyCacheAdapter();
$cache = new \Micro\Cache\Cache($dummy);

echo 'get: ' . $cache->get('partial', 123) . PHP_EOL;
echo 'has: ' . print_r($cache->has('partial'), true) . PHP_EOL;