<?php
require_once 'libs/users.php';

$users = new UsersLib();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeat-password'];

    if ($password !== $repeatPassword) {
        // Las contraseñas no coinciden, mostrar una notificación de error
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Las contraseñas no coinciden',
            });
        </script>";
    } else {
        // Crear la cuenta
        if ($users->createUser($email, $password)) {
            // Cuenta creada exitosamente, redirigir a la página de inicio de sesión
            header("Location: login");
        } else {
            // Error al crear la cuenta, mostrar una notificación de error
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al crear la cuenta',
                });
            </script>";
        }
    }
}
?>
