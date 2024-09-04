<?php
include 'config.php';

// Verificar si se recibieron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto_id = $_POST['producto_id'];
    $nombre_producto = $_POST['nombre_producto'];
    $precio = $_POST['precio'];
    $cantidad = 1;  // Puedes cambiar esto para permitir cantidades dinámicas

    // Consulta SQL para insertar el producto en el carrito
    $sql = "INSERT INTO carrito (producto_id, nombre_producto, precio, cantidad) VALUES (?, ?, ?, ?)";

    // Preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("isdi", $producto_id, $nombre_producto, $precio, $cantidad);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Producto agregado al carrito exitosamente.";
        } else {
            echo "Error al agregar el producto al carrito: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
