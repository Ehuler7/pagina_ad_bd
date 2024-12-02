<?php
// Configuración de la base de datos
$host = 'fdb1028.awardspace.net';  // Este es el host que debes verificar con tu proveedor de hosting
$usuario = '4557202_camilo';       // El nombre de usuario de la base de datos
$contraseña = 'zombiesen4';        // La contraseña de la base de datos
$nombreBD = '4557202_camilo';      // El nombre de la base de datos

// Crear conexión
$conn = new mysqli($host, $usuario, $contraseña, $nombreBD);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.";
}
?>
