MicroPHP Cache
=========

PSR-6 and PSR-16 included

// PSR-16  
$value = $cache->get('key');

// PSR-6  
$pool = $cache->pool('prefix');  
$items = $pool->getItems();  
$value = $pool->get('key');

// PSR-6v2  
$value = $cache->pool('key')->get();
