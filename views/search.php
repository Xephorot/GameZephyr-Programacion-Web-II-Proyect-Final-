<?php
require_once 'libs/juegos.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['searchQuery'])) {
    $searchQuery = $_GET['searchQuery'];
    // Crear una instancia de la clase JuegosLib
    $juegosLib = new JuegosLib();
    // Realizar la búsqueda de juegos por nombre
    $juegos = $juegosLib->buscarJuegosPorNombre($searchQuery);
} else {
    // No se ha enviado ninguna consulta de búsqueda, mostrar todos los juegos
    // Crear una instancia de la clase JuegosLib
    $juegosLib = new JuegosLib();
    // Obtener todos los juegos de la base de datos
    $juegos = $juegosLib->getJuegos();
}
?>
