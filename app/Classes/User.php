<?php 

namespace App\Classes;

use App\Database\Connect;
use PDO;
class User{


    public $id;
    public $name;
    public $email;
    public $password;

    public static function all(){

        $pdo = Connect::getInstance();

        $stmt = $pdo->prepare("select * from users");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function find($id){

        $pdo = Connect::getInstance();

        $stmt = $pdo->prepare("select * from users where id=:id");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Classes\User');
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }


    public function save(){
    
        try {
            //code...
            $pdo = Connect::getInstance();
    
            $stmt = $pdo->prepare("update users set name=:name, email=:email, password=:password where id=:id");
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Classes\User');
            $stmt->bindValue(':id', $this->id);
            $stmt->bindValue(':name', $this->name);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':password', $this->password);
            $stmt->execute();
    
    
            return $this;

        } catch (\PDOException $e) {
           print_r($e->getMessage());exit;
        }


    }

    public static function create(User $user){

        try {
            //code...
            $pdo = Connect::getInstance();
    
            $stmt = $pdo->prepare("insert into users (name,email,password) values (:name, :email, :password)");
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Classes\User');
            
            $stmt->bindValue(':name', $user->name);
            $stmt->bindValue(':email', $user->email);
            $stmt->bindValue(':password', $user->password);
            $stmt->execute();
    
            $user->id = $pdo->lastInsertId();
            
            return $user;
        } catch (\PDOException $e) {
           print_r($e->getMessage());exit;
        }

    }

    public function delete(){
        try {
            //code...
            $pdo = Connect::getInstance();
    
            $stmt = $pdo->prepare("delete from users where id=:id");
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Classes\User');
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();
    
    
            return true;

        } catch (\PDOException $e) {
           print_r($e->getMessage());exit;
        }

    }


}