<?php

namespace App\Core;
use App\Core\Config\Config;
use PDO;
use PDOException;

class Model {
    /**
     * @var PDO
     */
    protected $dbh;

    public function __construct()
    {
        try {
            $this->dbh = new PDO( "mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME, Config::DB_USER, Config::DB_PASS );
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
