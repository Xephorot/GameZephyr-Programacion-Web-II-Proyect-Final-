<?php
require_once 'libs/categorias.php';
require_once 'libs/juegos.php';

$categorias = new CategoriasLib();
$juegos = new JuegosLib();

$categoriasList = $categorias->getCategorias();
$juegosList = $juegos->getJuegos();

// Manejar la acción de edición de categoría
if (isset($_POST['editCategoria'])) {
    $categoriaId = $_POST['categoriaId'];
    $categoria = $categorias->getCategoriaById($categoriaId);
}

// Manejar la acción de crear o actualizar categoría
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreCategoria = isset($_POST['nombreCategoria']) ? $_POST['nombreCategoria'] : '';

    if (isset($_POST['createCategoria'])) {
        $categorias->createCategoria($nombreCategoria);
    } elseif (isset($_POST['updateCategoria'])) {
        $categoriaId = $_POST['categoriaId'];
        $categorias->updateCategoria($categoriaId, $nombreCategoria);
    } elseif (isset($_POST['deleteCategoria'])) {
        $categoriaId = $_POST['categoriaId'];
        $categorias->deleteCategoria($categoriaId);
    }

    // Recargar la lista de categorías después de la acción
    $categoriasList = $categorias->getCategorias();
}

// Manejar la acción de edición de juego
if (isset($_POST['editJuego'])) {
    $juegoId = $_POST['juegoId'];
    $juego = $juegos->getJuegoById($juegoId);
    $juegoCategorias = $juegos->getJuegoCategorias($juegoId);
}

// Manejar la acción de crear o actualizar juego
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreJuego = isset($_POST['nombreJuego']) ? $_POST['nombreJuego'] : '';
    $descripcionJuego = isset($_POST['descripcionJuego']) ? $_POST['descripcionJuego'] : '';
    $fechaLanzamientoJuego = isset($_POST['fechaLanzamientoJuego']) ? $_POST['fechaLanzamientoJuego'] : '';
    $precioJuego = isset($_POST['precioJuego']) ? $_POST['precioJuego'] : '';
    $categoriasJuego = isset($_POST['categoriasJuego']) ? $_POST['categoriasJuego'] : [];
    $imagenURL = isset($_POST['imagenURL']) ? $_POST['imagenURL'] : [];

    if (isset($_POST['createJuego'])) {
        $juegos->createJuego($nombreJuego, $descripcionJuego, $fechaLanzamientoJuego, $precioJuego, $categoriasJuego, $imagenURL);
    } elseif (isset($_POST['updateJuego'])) {
        $juegoId = $_POST['juegoId'];
        $juegos->updateJuego($juegoId, $nombreJuego, $descripcionJuego, $fechaLanzamientoJuego, $precioJuego, $categoriasJuego, $imagenURL,);
    } elseif (isset($_POST['deleteJuego'])) {
        $juegoId = $_POST['juegoId'];
        $juegos->deleteJuego($juegoId);
    }

    // Recargar la lista de juegos después de la acción
    $juegosList = $juegos->getJuegos();
}
?>