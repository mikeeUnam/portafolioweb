<?php
include("connection.php");
$con = connection();

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Usuario CRUD</title>
    <style>
        body {
            background-image: url(fondedu.jpg);
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            padding: 50px 0;
        }

        h1 {
            color: black;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); 
            font-size: 36px; 
        }

        img {
            max-width: 45%; 
            height: auto;
            border-radius: 10px; 
            margin: 10px; 
        }

        section {
            margin: 50px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p, a {
            text-align: left;
            color: #555;
            font-size: 18px;
            line-height: 1.6;
        }

        a {
            color: #007BFF;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #0056b3;
        }

        .fade-in {
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .slide-in {
            animation: slideIn 1.5s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1 class="fade-in">Mi Portafolio Web</h1>
        <img src="12.png" alt="Imagen de Michael" style="max-width: 20%;">
    </header>

    <center>
        <section class="slide-in">
            <h2>Presentación</h2>
            <p>¡Hola! Soy Michael, un estudiante apasionado con la creación de interfaz, desarrollo de sistemas y análisis, actualmente cursando el quinto ciclo de Ingeniería de Sistemas en la Universidad Nacional de Moquegua. Me encantan los retos, explorar nuevas tecnologías y encontrar soluciones creativas a los desafíos.</p>
        </section>

        <section class="slide-in">
            <h2>Proyecto: Algoritmo de la Ruta más Corta - Dijkstra</h2>
            <p>El algoritmo de Dijkstra es un método para encontrar el camino más corto en un grafo dirigido, con pesos no negativos en las aristas. Es muy utilizado en diversas áreas, como la optimización de rutas de transporte, redes de computadoras y sistemas de información geográfica.</p>
            <p>Este trabajo fue mi proyecto final en el cuarto ciclo y me gustó demasiado. Aprendí bastantes cosas y fue un reto total, ya que nunca había utilizado ese lenguaje y aplicar este método de la ruta más corta en las calles de mi localidad fue un gran desafío.</p>
            <p>¡Aquí está el enlace a mi proyecto en GitHub!</p>
            <a href="https://github.com/mikeeUnam/ruta-mas-corta">Proyecto en GitHub</a>
        </section>
        
        <section class="slide-in">
            <h2>Interfaz de mi proyecto</h2>
            <img src="primera.png" alt="Imagen 1">
            <img src="segunda.png" alt="Imagen 2">
        </section>
    </center>   
</body>

</html>

</body>
<body>
    <div class="users-form">
    
        <h1>Crear usuario</h1>
        <form action="insert-user.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="apellido" placeholder="Apellidos">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="consulta" placeholder="Consulta">
            <input type="submit" value="Agregar">
        </form>
    </div>

    <div class="users-table">
        <h2>Usuarios registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Consulta</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['ID'] ?></th>
                        <th><?= $row['nombre'] ?></th>
                        <th><?= $row['apellido'] ?></th>
                        <th><?= $row['username'] ?></th>
                        <th><?= $row['password'] ?></th>
                        <th><?= $row['email'] ?></th>
                        <th><?= $row['consulta'] ?></th>

                        <th><a href="update.php?ID=<?= $row['ID'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="delete_user.php?ID=<?= $row['ID'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>