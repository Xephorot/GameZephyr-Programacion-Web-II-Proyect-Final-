<?php
require_once 'libs/users.php';

$users = new UsersLib();
$usersList = $users->getUsers();

// Manejar la acción de edición
if (isset($_POST['edit'])) {
    $userId = $_POST['userId'];
    $user = $users->getUserById($userId);
}

// Manejar la acción de crear o actualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

    if (isset($_POST['create'])) {
        $users->createUser($email, $password);
    } elseif (isset($_POST['update'])) {
        $userId = $_POST['userId'];
        $users->updateUser($userId, $email, $password);
    } elseif (isset($_POST['delete'])) {
        $userId = $_POST['userId'];
        $users->deleteUser($userId);
    }

    // Recargar la lista de usuarios después de la acción
    $usersList = $users->getUsers();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php if (isset($user)) { echo $user['CorreoElectronico']; } ?>" required>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="text" class="form-control" id="contrasena" name="contrasena" value="<?php if (isset($user)) { echo $user['Contrasena']; } ?>" required>
            </div>
            <?php if (isset($user)) : ?>
                <input type="hidden" name="userId" value="<?php echo $user['ID_Usuario']; ?>">
                <button type="submit" class="btn btn-primary" name="update">Actualizar</button>
            <?php else : ?>
                <button type="submit" class="btn btn-primary" name="create">Crear</button>
            <?php endif; ?>
        </form>

        <h2>Usuarios registrados</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usersList as $user): ?>
                    <tr>
                        <td><?php echo $user['CorreoElectronico']; ?></td>
                        <td><?php echo $user['Contrasena']; ?></td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="userId" value="<?php echo $user['ID_Usuario']; ?>">
                                <button type="submit" class="btn btn-primary" name="edit">Editar</button>
                                <button type="submit" class="btn btn-danger" name="delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
