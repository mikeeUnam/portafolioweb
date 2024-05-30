<?php

include("connection.php");
$con = connection();

$ID=$_POST["ID"];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$username = $_POST['username'];
$password = $_POST['password'];

$email = $_POST['email'];
$consulta= $_POST['consulta'];
$sql="UPDATE users SET nombre='$nombre', apellido='$apellido', username='$username', password='$password', email='$email',consulta='$consulta' WHERE ID='$ID'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>