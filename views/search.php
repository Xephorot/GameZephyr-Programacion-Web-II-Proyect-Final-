<?php
require_once 'libs/juegos.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Crear una instancia de la clase JuegosLib
    $juegosLib = new JuegosLib();

    // Realizar la búsqueda en la base de datos
    $resultados = $juegosLib->buscarJuegosPorNombre($query);
} else {
    // Si no se proporcionó ningún término de búsqueda, redireccionar al índice principal
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de búsqueda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="models/styles/item.css">
</head>
<body>
    <style>
        .item{
            /* From https://css.glass */
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
        }
    </style>
    <div class="container">
        <h1 class="text-purple" >Resultados de búsqueda</h1>
        <?php if (count($resultados) > 0): ?>
            <?php foreach ($resultados as $juego): ?>
                <div class="item item-css">
                    <div class="info">
                        <h3><?php echo $juego['NombreJuego']; ?></h3>
                        <img src="<?php echo $juego['ImagenURL']; ?>" alt="Imagen del juego">
                        <p>Fecha de lanzamiento: <?php echo $juego['FechaLanzamiento']; ?></p>
                        <p>Precio: <?php echo $juego['Precio']; ?></p>
                        <p>Categorías: 
                            <?php
                            $categorias = $juegosLib->getJuegoCategorias($juego['ID_Juego']);
                            foreach ($categorias as $categoria) {
                                echo $categoria['NombreCategoria'] . ', ';
                            }
                            ?>
                        </p>
                    </div>
                    <div class="description">
                        <p><?php echo $juego['Descripcion']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <style>
        <?php include 'models/styles/item.css'; ?>
    </style>
</body>
</html>
