<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <?php require "views/videobackground.php"?>
</head>
<body>
    <?php require "views/header.php"?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 bg-light d-flex flex-column justify-content-betwee    n" style="min-height: 100vh;">
                <?php require "views/menu.php"?>
                <div class="mt-auto">
                </div>
            </div>
            <div class="col-10">
                <!-- <h1 class="text-center mt-5">Estás en la Vista Main</h1> -->
                <?php
                    if (isset($_GET['query'])) {
                        require "views/search.php";
                    } else {
                        require "views/item.php";
                    }
                ?>
                <?php require "views/dashboard.php"?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
