<?php
$servername = "localhost";
$username = "root"; // Por defecto en XAMPP
$password = ""; // Contraseña por defecto en XAMPP
$dbname = "tienda_ropa";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
