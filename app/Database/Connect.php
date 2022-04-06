<?php 

namespace App\Database;

use PDO;
use PDOException;

class Connect{


    private static $pdo;


    public static function getInstance(){
        try {

            if(! self::$pdo){

                self::$pdo = new PDO('mysql:host=127.0.0.1;dbname=aula_pdo', 'root', '');
            }

            return self::$pdo;
        } catch (PDOException $th) {
        
            print_r($th->getMessage());
        }
        
    }

}