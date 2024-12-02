<?php
// Iniciar sesión
session_start();

// Incluir la conexión a la base de datos
include('conexion.php');

// Comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Comprobar si el correo ya está registrado
    $consulta = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conn, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        echo "El correo electrónico ya está registrado.";
    } else {
        // Insertar los datos en la base de datos
        $insertar = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
        
        if (mysqli_query($conn, $insertar)) {
            // Si el registro es exitoso, iniciar sesión automáticamente
            $_SESSION['usuario'] = $nombre;
            $_SESSION['email'] = $email;

            // Redirigir al inicio de la página
            header("Location: index.html");
            exit();
        } else {
            echo "Error al registrar los datos: " . mysqli_error($conn);
        }
    }
}

?>
