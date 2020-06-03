<?php


namespace lesson8;


use Psr\Cache\CacheItemInterface;

class CacheItem implements CacheItemInterface
{

    private $key;
    private $value;
    private $diffTime;
    private $hit = false;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function getKey(): string
    {
        // TODO: Implement getKey() method.
        return $this->key;
    }

    public function get()
    {
        // TODO: Implement get() method.
        if ($this->isHit()) {
            return $this->value;
        }
        return null;
    }

    public function isHit(): bool
    {
        // TODO: Implement isHit() method.
        if (!$this->hit) {
            return false;
        }
        if ($this->diffTime === null) {
            return true;
        }

        $now = new \DateTime();

        return $now < $this->diffTime;

    }

    public function set($value)
    {
        // TODO: Implement set() method.
        $this->value = $value;
        $this->hit = true;
        //$this->data = [$this->key => $value];

    }

    public function expiresAt($expiration)
    {
        // TODO: Implement expiresAt() method.
        $this->diffTime = $expiration;

    }

    public function expiresAfter($time)
    {
        // TODO: Implement expiresAfter() method.
        $this->diffTime = (new \DateTime())->add(new \DateInterval('PT' . $time . 'M'));
    }
}
