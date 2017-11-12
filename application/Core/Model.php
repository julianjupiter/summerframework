<?php

namespace Core;

use Helper\Database;

class Model
{
    protected $db;
    
    public function __construct()
    {
        $connection = new Database();
        $this->db = $connection->connect();   
    }
    
}