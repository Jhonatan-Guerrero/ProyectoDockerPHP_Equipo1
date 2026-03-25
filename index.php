<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>

    <style>
        body{
            font-family: Arial;
            text-align: center;
            background-color: #f4f4f4;
        }

        .container{
            width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
        }

        input, button{
            padding: 8px;
            margin: 5px;
            width: 90%;
        }

        .btn{
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn:hover{
            background-color: #0056b3;
        }

        .menu{
            margin-top: 20px;
        }

        .menu a{
            display: block;
            text-decoration: none;
            margin: 5px;
        }

        .menu button{
            width: 100%;
            background-color: #28a745;
        }

        .menu button:hover{
            background-color: #1e7e34;
        }

    </style>
</head>

<body>

<div class="container">

    <h2>Registro de Usuarios</h2>

    <!-- FORMULARIO -->
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="correo" placeholder="Correo" required>
        <button type="submit" name="guardar" class="btn">Guardar</button>
    </form>

    <?php
    if (isset($_POST['guardar'])) {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];

        $sql = "INSERT INTO usuarios (nombre, correo) VALUES ('$nombre', '$correo')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Registro guardado</p>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>

    <h3>Usuarios registrados:</h3>

    <?php
    $result = $conn->query("SELECT * FROM usuarios");

    while ($row = $result->fetch_assoc()) {
        echo $row['nombre'] . " - " . $row['correo'] . "<br>";
    }
    ?>

    <!-- BOTONES DE FUNCIONALIDADES -->
    <div class="menu">
        <h3>Funcionalidades del equipo</h3>

        <a href="funcionalidad1.php">
            <button>Funcionalidad 1 (Integrante 1)</button>
        </a>

        <a href="funcionalidad2.php">
            <button>Funcionalidad 2 (Integrante 2)</button>
        </a>

        <a href="funcionalidad3.php">
            <button>Funcionalidad 3 (Integrante 3)</button>
        </a>
    </div>

</div>

</body>
</html>