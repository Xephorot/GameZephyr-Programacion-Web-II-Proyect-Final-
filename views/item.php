<?php
require_once 'libs/juegos.php';

// Crear una instancia de la clase JuegosLib
$juegosLib = new JuegosLib();

// Obtener los juegos de la base de datos
$juegos = $juegosLib->getJuegos();
?>

<!DOCTYPE html>
<html>
<head>
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
    <?php foreach ($juegos as $juego): ?>
        <div class="item">
            <div class="info">
                <h3 class="text-center"><?php echo $juego['NombreJuego']; ?></h3>
                <img class="rounded" src="<?php echo $juego['ImagenURL']; ?>" alt="Imagen del juego">
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
</body>
</html>
