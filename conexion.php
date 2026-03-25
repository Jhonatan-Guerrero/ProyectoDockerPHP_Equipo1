<?php
$host = "mysql"; // nombre del servicio en docker
$user = "root";
$password = "root";
$db = "prueba";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>