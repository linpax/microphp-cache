<?php
/**
 * @link https://github.com/linpax/microphp-framework
 * @copyright Copyright &copy; 2013 Oleg Lunegov
 * @license https://github.com/linpax/microphp-framework/blob/master/LICENSE
 */


include __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/src/AdapterInterface.php';
include __DIR__ . '/src/adapter/DummyCacheAdapter.php';
include __DIR__ . '/src/adapter/ArrayCacheAdapter.php';
include __DIR__ . '/src/Cache.php';
include __DIR__ . '/src/PoolCache.php';
include __DIR__ . '/src/PoolCacheItem.php';

$dummy = new \Micro\Cache\Adapter\DummyCacheAdapter();
$cacheDummy = new \Micro\Cache\Cache($dummy);


echo 'Dummy test:' . PHP_EOL;
echo 'get: ' . $cacheDummy->get('partial', 123) . PHP_EOL;
echo 'has: ' . print_r($cacheDummy->has('partial'), true) . PHP_EOL;
echo PHP_EOL;

$arr = new \Micro\Cache\Adapter\ArrayCacheAdapter();
$cacheArr = new \Micro\Cache\Cache($arr);

echo 'Array test' . PHP_EOL;
echo 'get: ' . $cacheArr->get('partial', 123) . PHP_EOL;
echo 'has: ' . print_r($cacheArr->has('partial'), true) . PHP_EOL;
$cacheArr->set('partial', 'hello, world!');
echo 'has: ' . print_r($cacheArr->has('partial'), true) . PHP_EOL;
echo 'get: ' . $cacheArr->get('partial', 123) . PHP_EOL;
echo PHP_EOL;

var_dump($cacheArr->pool('trololo'));