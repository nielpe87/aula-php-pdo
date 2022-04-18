<?php 
require_once "../vendor/autoload.php";
use App\Classes\User;

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
    <a href="create.php">Novo</a>
    <table>
        <thead>

            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (User::all() as $user): ?>

                <tr>
                    <td><?php echo $user->id ?></td>
                    <td><?php echo $user->name ?></td>
                    <td><?php echo $user->email ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $user->id ?>">Editar</a>
                        <a href="usercontroller.php?id=<?php echo $user->id ?>&action=delete">Remover</a>
                    </td>
                    
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>


