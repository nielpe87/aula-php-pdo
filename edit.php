<?php

use App\Classes\User;

require_once "vendor/autoload.php";


$id = $_GET['id'] ?? null;


if($id){
    $user = User::find($id);
}else{
    echo "parametro não encontrado";exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $user->id?>">
        <label for="">Nome</label><br>
        <input type="text" name="name" value="<?php echo $user->name ?>"><br>
        <br>
        <label for="">Email</label><br>
        <input type="email" name="email" value="<?php echo $user->email ?>"><br>
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>