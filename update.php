<?php 

use App\Classes\User;

require_once 'vendor/autoload.php';


$user = User::find($_POST['id']);

$user->name = $_POST['name'];
$user->email = $_POST['email'];

$user->save();

header('location: index.php');