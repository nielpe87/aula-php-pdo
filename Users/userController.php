<?php 


use App\Classes\User;


require_once "../vendor/autoload.php";

echo "<pre>";
print_r($_SERVER);exit;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $action = $_POST['action'] ?? null;
}else{
    $action = $_GET['action'] ?? null;
}


switch ($action) {
    case 'insert':

        $user = new User;

        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        User::create($user);

        header('location: index.php');

        break;

    case 'update':

        $user = User::find($_POST['id']);

        $user->name = $_POST['name'];
        $user->email = $_POST['email'];

        $user->save();

        header('location: index.php');

        break;
    
    case 'delete':

        $id = $_GET['id'] ?? null;

        if($id){
            $user = User::find($id);

            $user->delete();
            
            header('location: index.php');
        }else{
            echo "parametro não encontrado";exit;
        }

        break;
    default:
        echo "Médoto não encontrado";
    break;
}