<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Proveedores</title>

    <style>
        body {
            font-family: Arial;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 60px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            width: 95%;
            padding: 10px;
            margin-top: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background-color: #1e7e34;
        }

        .success {
            color: green;
            margin-top: 10px;
        }

        .lista {
            margin-top: 20px;
            text-align: left;
        }

        .item {
            background: #f1f1f1;
            padding: 8px;
            border-radius: 6px;
            margin: 5px 0;
        }

        a {
            text-decoration: none;
        }

        .back {
            margin-top: 15px;
            display: inline-block;
            color: #333;
        }
    </style>
</head>

<body>

<div class="container">

    <h2> Registro de Proveedores</h2>

    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre del proveedor" required>
        <input type="text" name="telefono" placeholder="Teléfono" required>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <button type="submit" name="guardar">Guardar Proveedor</button>
    </form>

    <?php
    if (isset($_POST['guardar'])) {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        $sql = "INSERT INTO proveedores (nombre, telefono, email)
                VALUES ('$nombre', '$telefono', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>✅ Proveedor guardado correctamente</p>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>

    <div class="lista">
        <h3>Proveedores registrados:</h3>

        <?php
        $result = $conn->query("SELECT * FROM proveedores");

        while ($row = $result->fetch_assoc()) {
            echo "<div class='item'>";
            echo "<strong>" . $row['nombre'] . "</strong><br>";
            echo " Teléfono: " . $row['telefono'] . "<br>";
            echo " Email: " . $row['email'];
            echo "</div>";
        }
        ?>
    </div>

    <a href="index.php" class="back">⬅ Volver</a>

</div>

</body>
</html>