<?php

use lesson8\Cache;
use lesson8\CacheItem;

session_start();

require_once '../vendor/autoload.php';


if (isset($_GET)) {

    echo '$_GET params detected<br>';

    if (isset($_GET['data'])) {

        $cache = new Cache();
        foreach ($_GET['data'] as $key) {
            echo $key . " - ";
            echo ($cache->getItemByKey($key) ?? "Delete by Timeout") . PHP_EOL;
        }

    } else {

        $cache = new Cache();
        foreach ($_GET as $key => $value) {

            $newCacheItem = new CacheItem($key);
            $newCacheItem->set($value);
            $newCacheItem->expiresAfter(1);
            $cache->setItem($newCacheItem);

        }
        echo "Data has been saved";
    }

} else {
    echo "Please, enter correct GET parameters";
}