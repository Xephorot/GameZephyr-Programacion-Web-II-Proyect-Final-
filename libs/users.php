<?php
require_once 'libs/model.php';

class UsersLib extends Model {
    function __construct() {
        parent::__construct();
    }

    function getUsers() {
        $query = "SELECT * FROM Usuarios";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getUserById($id) {
        $query = "SELECT * FROM Usuarios WHERE ID_Usuario = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function createUser($email, $password) {
        // Verificar si el correo electrónico ya está registrado
        $query = "SELECT * FROM Usuarios WHERE CorreoElectronico = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // El correo electrónico ya está registrado
            return false;
        } else {
            // Crear la cuenta
            $query = "INSERT INTO Usuarios (CorreoElectronico, Contrasena) VALUES (?, ?)";
            $stmt = $this->db->connect()->prepare($query);
            $stmt->execute([$email, $password]);

            return true;
        }
    }
    
    function updateUser($id, $email, $password) {
        $query = "UPDATE Usuarios SET CorreoElectronico = ?, Contrasena = ? WHERE ID_Usuario = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$email, $password, $id]);
    }
    
    function deleteUser($id) {
        $query = "DELETE FROM Usuarios WHERE ID_Usuario = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$id]);
    }
    function loginUser($email, $password) {
        $query = "SELECT * FROM Usuarios WHERE CorreoElectronico = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $user['Contrasena'] === $password) {
            // Las credenciales son correctas
            return true;
        } else {
            // Las credenciales son incorrectas
            return false;
        }
    }

}
?>
