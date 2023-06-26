<?php
require_once 'libs/model.php';

class JuegosLib extends Model {
    function __construct() {
        parent::__construct();
    }

    function getJuegos() {
        $query = "SELECT * FROM Juegos";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getJuegoById($id) {
        $query = "SELECT * FROM Juegos WHERE ID_Juego = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function createJuego($nombre, $descripcion, $fechaLanzamiento, $precio, $categorias, $imagenURL) {
        $connection = $this->db->connect();
        $connection->beginTransaction();
    
        try {
            // Insertar el juego en la tabla Juegos
            $query = "INSERT INTO Juegos (NombreJuego, Descripcion, FechaLanzamiento, Precio, ImagenURL) VALUES (?, ?, ?, ?, ?)";
            $stmt = $connection->prepare($query);
            $stmt->execute([$nombre, $descripcion, $fechaLanzamiento, $precio, $imagenURL]);
            $idJuego = $connection->lastInsertId();
    
            // Insertar las relaciones entre el juego y las categorías existentes en la tabla JuegosCategorias
            foreach ($categorias as $idCategoria) {
                $query = "INSERT INTO JuegosCategorias (ID_Juego, ID_Categoria) VALUES (?, ?)";
                $stmt = $connection->prepare($query);
                $stmt->execute([$idJuego, $idCategoria]);
            }
    
            $connection->commit();
    
            return [
                'ID_Juego' => $idJuego  
            ];
        } catch (PDOException $e) {
            $connection->rollBack();
            return false;
        }
    }   


    function updateJuego($id, $nombre, $descripcion, $fechaLanzamiento, $precio, $categorias, $imagenURL) {
        // Actualizar el juego en la tabla Juegos
        $query = "UPDATE Juegos SET NombreJuego = ?, Descripcion = ?, FechaLanzamiento = ?, Precio = ?, ImagenURL = ? WHERE ID_Juego = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$nombre, $descripcion, $fechaLanzamiento, $precio, $imagenURL, $id]);
    
        // Eliminar las relaciones del juego con las categorías existentes en la tabla JuegosCategorias
        $query = "DELETE FROM JuegosCategorias WHERE ID_Juego = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$id]);
    
        // Insertar las nuevas relaciones entre el juego y las categorías en la tabla JuegosCategorias
        foreach ($categorias as $idCategoria) {
            $query = "INSERT INTO JuegosCategorias (ID_Juego, ID_Categoria) VALUES (?, ?)";
            $stmt = $this->db->connect()->prepare($query);
            $stmt->execute([$id, $idCategoria]);
        }
    
        return true;
    }
    

    function deleteJuego($id) {
        // Eliminar las relaciones del juego con las categorías en la tabla JuegosCategorias
        $query = "DELETE FROM JuegosCategorias WHERE ID_Juego = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$id]);

        // Eliminar el juego de la tabla Juegos
        $query = "DELETE FROM Juegos WHERE ID_Juego = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$id]);
    }

    function getJuegoCategorias($idJuego) {
        $query = "SELECT C.ID_Categoria, C.NombreCategoria FROM JuegosCategorias AS JC
                  INNER JOIN Categorias AS C ON JC.ID_Categoria = C.ID_Categoria
                  WHERE JC.ID_Juego = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$idJuego]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function buscarJuegosPorNombre($nombreJuego) {
        $query = "SELECT * FROM Juegos WHERE NombreJuego LIKE ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute(['%' . $nombreJuego . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function buscarJuegosPorCategoria($idCategoria) {
        $query = "SELECT J.* FROM Juegos AS J
                  INNER JOIN JuegosCategorias AS JC ON J.ID_Juego = JC.ID_Juego
                  WHERE JC.ID_Categoria = ?";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute([$idCategoria]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
