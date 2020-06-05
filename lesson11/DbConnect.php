<?php


namespace lesson11;


class DbConnect
{
    public static function getPdo(): \PDO
    {
        $dsn = 'mysql:host=db;port=3306;dbname=hillel';

        $pdo = new \PDO($dsn, 'root', 'root');
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}