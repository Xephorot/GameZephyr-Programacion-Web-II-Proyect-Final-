<!DOCTYPE html>
<html>
<head>
  <title>GameZephyr</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="models/styles/styles.css">
  <?php require "views/videobackground.php"?>
</head>
<body>
  <div class="container">

    <?php require "views/title.php"?>

    <div class="row"> 
      <?php require "views/startImages.php"?>
      <div class="col text-center align-self-center">
        <div class="buttons">
          <div class="text-container">
            <p class="text">GameZephyr es una página web de videojuegos que permite explorar, buscar y seleccionar juegos. <br>
              Ofrece una amplia colección de juegos de diferentes géneros y plataformas. Puedes buscar juegos por nombre, género, plataforma y otros filtros. Obtendrás información detallada de cada juego, incluyendo descripciones, capturas de pantalla y tráilers. <br>
              Puedes crear listas personalizadas de juegos que te interesan. También puedes calificar y escribir reseñas sobre los juegos. <br>
              Mantente actualizado con las últimas noticias y lanzamientos de videojuegos.  <br>
              Disfruta de una interfaz intuitiva y atractiva. Encuentra recomendaciones basadas en tus preferencias de juego. Descarga o compra los juegos directamente desde la plataforma.</p>
          </div>
          <div class="button-container">
            <a href="login" class="button btn btn-primary btn-lg">Login</a>
            <a href="SignIn" class="button btn btn-primary btn-lg">Sign up</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
