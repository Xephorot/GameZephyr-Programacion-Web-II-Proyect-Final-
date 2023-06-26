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
    <title class = "text-white">Dashboard de Categorías</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
       body {
        background-color: #000;
        }

        h1 {
        text-align: center;
        margin-bottom: 20px;
        }

        .categories {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        }

        .category-item {
        background-color: #fff;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .category-item h3 {
        font-size: 18px;
        margin: 0;
        }

        .chart-container {
        width: 200px;
        height: 200px;
        margin: 20px auto;
        position: relative;
        }

        .pie-chart-label {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 14px;
        text-align: center;
        color: #666;
        }

        .pie-chart-label .percentage {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        }
    </style>
</head>
<body>
    <h1 class = "text-white">Dashboard de Categorías</h1>
    <div class="categories text-white bg-dark">
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
                            labels: ['<?php echo $categoria['NombreCategoria']; ?>'],
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
