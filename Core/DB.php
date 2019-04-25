<?php

declare(strict_types = 1);

namespace Core;

use \PDO;
use App\Config;

/**
 * DB class
 *
 * PHP version 7.0
 */
class DB {

    private $pdo;

    function __construct($host, $username, $password, $dbname){
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // create pdo object...
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set some flags
    }

	function getDB() {
        return $this->pdo;
	}

    function query($query, $params = array()){
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        if(explode(' ', $query)[0] == 'SELECT'){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

}
