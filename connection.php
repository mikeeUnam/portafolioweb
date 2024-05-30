<?php

function connection(){
    $host = "localhost";
    $user = "id22242789_mike";
    $pass = "Mono123#";

    $bd = "id22242789_portafolioweb";

    $connect=mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);

    return $connect;

}


?>