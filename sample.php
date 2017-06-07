<?php
/**
 * @link https://github.com/linpax/microphp-cache
 * @copyright Copyright &copy; 2013 Oleg Lunegov
 * @license https://github.com/linpax/microphp-cache/blob/master/LICENSE
 */


include __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/src/Exception.php';
include __DIR__ . '/src/AdapterException.php';
include __DIR__ . '/src/AdapterInterface.php';
include __DIR__ . '/src/adapter/Dummy.php';
include __DIR__ . '/src/adapter/Runtime.php';
include __DIR__ . '/src/adapter/Memcached.php';
include __DIR__ . '/src/Cache.php';

$dummy = new \Micro\Cache\Adapter\Dummy();
$cacheDummy = new \Micro\Cache\Cache($dummy);


echo 'Dummy test:' . PHP_EOL;
echo 'get: ' . $cacheDummy->get('partial', 123) . PHP_EOL;
echo 'has: ' . print_r($cacheDummy->has('partial'), true) . PHP_EOL;
echo PHP_EOL;

$arr = new \Micro\Cache\Adapter\Runtime();
$cacheArr = new \Micro\Cache\Cache($arr);

echo 'Runtime test' . PHP_EOL;
echo 'get: ' . $cacheArr->get('partial', 123) . PHP_EOL;
echo 'has: ' . print_r($cacheArr->has('partial'), true) . PHP_EOL;
$cacheArr->set('partial', 'hello, world!');
echo 'has: ' . print_r($cacheArr->has('partial'), true) . PHP_EOL;
echo 'get: ' . $cacheArr->get('partial', 123) . PHP_EOL;
echo PHP_EOL;

$mem = new \Micro\Cache\Adapter\Memcached();
$cacheMem = new \Micro\Cache\Cache($mem);

echo 'Memcache test' . PHP_EOL;
echo 'get: ' . $cacheMem->get('partial', 123) . PHP_EOL;
echo 'has: ' . print_r($cacheMem->has('partial'), true) . PHP_EOL;
$cacheMem->set('partial', 'hello, world!');
echo 'has: ' . print_r($cacheMem->has('partial'), true) . PHP_EOL;
echo 'get: ' . $cacheMem->get('partial', 123) . PHP_EOL;
echo PHP_EOL;
