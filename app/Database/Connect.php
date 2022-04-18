<?php 

namespace App\Database;

use PDO;
use PDOException;

class Connect{


    private static $pdo;


    public static function getInstance(){
        try {

            if(! self::$pdo){

                $dotenv = \Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
                $dotenv->safeLoad();
 
                self::$pdo = new PDO('mysql:host='. $_ENV['DB_HOST'] . ';dbname='. $_ENV['DB_NAME'], $_ENV['DB_USER'],  $_ENV['DB_PASSWORD']);
            }

            return self::$pdo;
        } catch (PDOException $th) {
        
            print_r($th->getMessage());
        }
        
    }

}