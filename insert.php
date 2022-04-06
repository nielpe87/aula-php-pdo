<?php 

use App\Classes\User;

require_once 'vendor/autoload.php';


$user = new User;

$user->name = $_POST['name'];
$user->email = $_POST['email'];
$user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);

User::create($user);

header('location: index.php');