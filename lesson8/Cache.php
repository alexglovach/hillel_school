<?php


namespace lesson8;


use Psr\Cache\CacheItemInterface;

class Cache
{

    public static $arr;

    public function __construct()
    {
        if (isset($_SESSION['data'])) {
            self::$arr = unserialize($_SESSION['data']);
        }
    }

    public function setItem(CacheItemInterface $cache)
    {
        self::$arr[$cache->getKey()] = $cache;
    }

    public function getItemByKey(string $key)
    {
        return self::$arr ? self::$arr[$key]->get() : null;
    }

    public function __destruct()
    {
        $_SESSION['data'] = serialize(self::$arr);
    }


}