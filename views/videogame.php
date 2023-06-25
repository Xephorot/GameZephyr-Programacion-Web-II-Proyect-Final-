<?php require "libs/juegoscategorias.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Categorías y Juegos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <?php require "views/videobackground.php"?>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Formulario de Categorías</h2>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nombreCategoria" class="form-label">Nombre de la Categoría</label>
                        <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria" value="<?php if (isset($categoria)) { echo $categoria['NombreCategoria']; } ?>" required>
                    </div>
                    <?php if (isset($categoria)) : ?>
                        <input type="hidden" name="categoriaId" value="<?php echo $categoria['ID_Categoria']; ?>">
                        <button type="submit" class="btn btn-primary" name="updateCategoria">Actualizar</button>
                    <?php else : ?>
                        <button type="submit" class="btn btn-primary" name="createCategoria">Crear</button>
                    <?php endif; ?>
                </form>

                <h2>Categorías registradas</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categoriasList as $categoria): ?>
                            <tr>
                                <td><?php echo $categoria['ID_Categoria']; ?></td>
                                <td><?php echo $categoria['NombreCategoria']; ?></td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="categoriaId" value="<?php echo $categoria['ID_Categoria']; ?>">
                                        <button type="submit" class="btn btn-primary" name="editCategoria">Editar</button>
                                        <button type="submit" class="btn btn-danger" name="deleteCategoria">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h2>Formulario de Juegos</h2>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nombreJuego" class="form-label">Nombre del Juego</label>
                        <input type="text" class="form-control" id="nombreJuego" name="nombreJuego" value="<?php if (isset($juego)) { echo $juego['NombreJuego']; } ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcionJuego" class="form-label">Descripción del Juego</label>
                        <textarea class="form-control" id="descripcionJuego" name="descripcionJuego" rows="3" required><?php if (isset($juego)) { echo $juego['Descripcion']; } ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fechaLanzamientoJuego" class="form-label">Lanzamiento</label>
                        <input type="date" class="form-control" id="fechaLanzamientoJuego" name="fechaLanzamientoJuego" value="<?php if (isset($juego)) { echo $juego['FechaLanzamiento']; } ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="precioJuego" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precioJuego" name="precioJuego" value="<?php if (isset($juego)) { echo $juego['Precio']; } ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoriasJuego" class="form-label">Categorías</label>
                        <select multiple class="form-control" id="categoriasJuego" name="categoriasJuego[]" required>
                            <?php foreach ($categoriasList as $categoria): ?>
                                <option value="<?php echo $categoria['ID_Categoria']; ?>" <?php if (isset($juegoCategorias) && in_array($categoria['ID_Categoria'], $juegoCategorias)) { echo 'selected'; } ?>><?php echo $categoria['NombreCategoria']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php if (isset($juego)) : ?>
                        <input type="hidden" name="juegoId" value="<?php echo $juego['ID_Juego']; ?>">
                        <button type="submit" class="btn btn-primary" name="updateJuego">Actualizar</button>
                    <?php else : ?>
                        <button type="submit" class="btn btn-primary" name="createJuego">Crear</button>
                    <?php endif; ?>
                </form>

                <h2>Juegos registrados</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Lanzamiento</th>
                            <th>Precio</th>
                            <th>Categorías</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($juegosList as $juego): ?>
                            <tr>
                                <td><?php echo $juego['ID_Juego']; ?></td>
                                <td><?php echo $juego['NombreJuego']; ?></td>
                                <td><?php echo $juego['Descripcion']; ?></td>
                                <td><?php echo $juego['FechaLanzamiento']; ?></td>
                                <td><?php echo $juego['Precio']; ?></td>
                                <td>
                                    <?php
                                    $juegoCategorias = $juegos->getJuegoCategorias($juego['ID_Juego']);
                                    foreach ($juegoCategorias as $categoria) {
                                        echo $categoria['NombreCategoria'] . ', ';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="juegoId" value="<?php echo $juego['ID_Juego']; ?>">
                                        <button type="submit" class="btn btn-primary" name="editJuego">Editar</button>
                                        <button type="submit" class="btn btn-danger" name="deleteJuego">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>