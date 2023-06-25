<?php
require_once 'libs/model.php';

class CategoriasLib extends Model {
    function __construct() {
        parent::__construct();
    }

    function getCategorias() {
        $query = "SELECT * FROM Categorias";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getCategoriaById($id) {
        $query = "SELECT * FROM Categorias WHERE ID_Categoria = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function createCategoria($nombre) {
        // Verificar si la categoría ya existe
        $query = "SELECT * FROM Categorias WHERE NombreCategoria = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$nombre]);
        $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($categoria) {
            // La categoría ya existe
            return false;
        } else {
            // Crear la categoría
            $query = "INSERT INTO Categorias (NombreCategoria) VALUES (?)";
            $stmt = $this->db->connect()->prepare($query);
            $stmt->execute([$nombre]);

            return true;
        }
    }

    function updateCategoria($id, $nombre) {
        $query = "UPDATE Categorias SET NombreCategoria = ? WHERE ID_Categoria = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$nombre, $id]);
    }

    function deleteCategoria($id) {
        $query = "DELETE FROM Categorias WHERE ID_Categoria = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$id]);
    }
}
?>
