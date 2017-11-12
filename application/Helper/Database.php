<?php

namespace Helper;

use \PDO;

class Database
{
    private $connection;
    
    public function __construct()
    {
        try 
        {
            $dns = DB_TYPE . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';char-set='. DB_CHAR_SET; 
            $this->connection = new PDO($dns, DB_USER, DB_PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            $e->getMessage();
        }
    }
    
    public function connect()
    {
        return $this->connection;
    }
}