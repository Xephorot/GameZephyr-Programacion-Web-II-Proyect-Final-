<?php
require_once 'libs/categorias.php';
require_once 'libs/juegos.php';

$categorias = new CategoriasLib();
$juegos = new JuegosLib();

$categoriasList = $categorias->getCategorias();
$juegosList = $juegos->getJuegos();

// Obtener la cantidad total de juegos
$totalJuegos = count($juegosList);

// Calcular el porcentaje de juegos por categoría
$categoriasPorcentaje = array();
foreach ($categoriasList as $categoria) {
    $categoriaId = $categoria['ID_Categoria'];
    $juegosCategoria = $juegos->buscarJuegosPorCategoria($categoriaId);
    $cantidadJuegosCategoria = count($juegosCategoria);
    $porcentaje = ($cantidadJuegosCategoria / $totalJuegos) * 100;
    $categoriasPorcentaje[$categoriaId] = $porcentaje;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Categorías</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .category-item {
            margin-bottom: 10px;
        }
        .chart-container {
            position: relative;
            width: 200px;
            height: 200px;
        }
    </style>
</head>
<body>
    <h1>Dashboard de Categorías</h1>
    <div class="categories">
        <?php foreach ($categoriasList as $categoria): ?>
            <div class="category-item">
                <h3><?php echo $categoria['NombreCategoria']; ?></h3>
                <?php
                $categoriaId = $categoria['ID_Categoria'];
                $porcentaje = isset($categoriasPorcentaje[$categoriaId]) ? $categoriasPorcentaje[$categoriaId] : 0;
                ?>
                <div class="chart-container">
                    <canvas id="chart-<?php echo $categoriaId; ?>"></canvas>
                </div>
                <p>Porcentaje de Juegos: <?php echo $porcentaje; ?>%</p>
                <script>
                    var ctx<?php echo $categoriaId; ?> = document.getElementById('chart-<?php echo $categoriaId; ?>').getContext('2d');
                    var chart<?php echo $categoriaId; ?> = new Chart(ctx<?php echo $categoriaId; ?>, {
                        type: 'pie',
                        data: {
                            labels: ['Juegos', 'Otros'],
                            datasets: [{
                                data: [<?php echo $porcentaje; ?>, <?php echo 100 - $porcentaje; ?>],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.6)',
                                    'rgba(54, 162, 235, 0.6)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false
                        }
                    });
                </script>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
