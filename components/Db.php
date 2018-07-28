<?php
require_once ROOT . '/config/dbconfig.php';
class Db
{
    public static function getConnection()
    {
        $db = new PDO(DB_DBMS . ':host=' . DB_HOST . ';dbname=' . DB_DBNAME,
            DB_USER, DB_PASSWORD);
        return $db;
    }
}