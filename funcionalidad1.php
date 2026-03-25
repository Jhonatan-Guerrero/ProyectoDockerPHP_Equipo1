<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>

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
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background-color: #0056b3;
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

    <h2> Registro de Productos</h2>

    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre del producto" required>
        <input type="number" step="0.01" name="precio" placeholder="Precio" required>
        <input type="number" name="stock" placeholder="Stock" required>
        <button type="submit" name="guardar">Guardar Producto</button>
    </form>

    <?php
    if (isset($_POST['guardar'])) {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];

        $sql = "INSERT INTO productos (nombre, precio, stock) 
                VALUES ('$nombre', '$precio', '$stock')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>✅ Producto guardado correctamente</p>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>

    <div class="lista">
        <h3>Productos registrados:</h3>

        <?php
        $result = $conn->query("SELECT * FROM productos");

        while ($row = $result->fetch_assoc()) {
            echo "<div class='item'>";
            echo " <strong>" . $row['nombre'] . "</strong><br>";
            echo " Precio: $" . $row['precio'] . "<br>";
            echo " Stock: " . $row['stock'];
            echo "</div>";
        }
        ?>
    </div>

    <a href="index.php" class="back">⬅ Volver</a>

</div>

</body>
</html>