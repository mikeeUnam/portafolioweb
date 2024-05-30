<?php 
    include("connection.php");
    $con=connection();

    $ID=$_GET['ID'];

    $sql="SELECT * FROM users WHERE ID='$ID'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Editar usuarios</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="edit_user.php" method="POST">
                <input type="hidden" name="ID" value="<?= $row['ID']?>">
                <input type="text" name="nombre" placeholder="Nombre" value="<?= $row['nombre']?>">
                <input type="text" name="apellido" placeholder="Apellidos" value="<?= $row['apellido']?>">
                <input type="text" name="username" placeholder="Username" value="<?= $row['username']?>">
                <input type="text" name="password" placeholder="Password" value="<?= $row['password']?>">
                <input type="text" name="email" placeholder="Email" value="<?= $row['email']?>">
                <input type="text" name="consulta" placeholder="Consulta" value="<?= $row['consulta']?>">
                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>