<?php
require_once 'libs/users.php';

$users = new UsersLib();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($users->loginUser($email, $password)) {
        // Inicio de sesión exitoso, redirigir a la página deseada
        header("Location: main");
    } else {
        // Credenciales incorrectas, mostrar una notificación de error
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Correo o contraseña incorrectos',
            });
        </script>";
    }
}
?>
