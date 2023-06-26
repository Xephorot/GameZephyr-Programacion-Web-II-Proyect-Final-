<!DOCTYPE html>
<html>
<head>
  <title>GameZephyr</title>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <?php require "views/videobackground.php"?>
  <!-- <link rel="stylesheet" type="text/css" href="models/styles/styles.css"> -->
</head>
<body>
  <style>
    .title{
      display: flex;
      flex-direction: column;
      justify-items: center;
      text-align: center;
      font-size: 34px;
      font-weight: 600;
      margin-inline: 20rem;
      margin-top: 20rem;
      margin-bottom:20rem;
    }

    @keyframes shine {
      0% {
        text-shadow: none;
        color: gray;
      }
      50% {
        text-shadow: 0 0 10px white;
        color: white;
      }
      100% {
        text-shadow: none;
        color: white;
      }
    }

    .grayscale-animation {
      animation: shine 5s infinite;
    }

    body {
      background-color: #000;
      color: #fff;
      padding-bottom: 50rem;
    }
    
    .button-container {
      margin-top: 10rem;
    }
  </style>


  <div class="title grayscale-animation">
    <?php require "views/title.php"?>
  </div>

  <div class="container">
    <div class="row"> 
      <!-- <?php require "views/startImages.php"?> -->
      <div class="col text-center align-self-center">
        <div class="row-center gx-5">
        <img src="public/images/guy1.jpg" alt="Image" width="320px" class=" smaller-image p-2 rounded">

        <img src="public/images/guy1.jpg" alt="Image" width="320px" class=" smaller-image p-2 rounded">

        <img src="public/images/guy1.jpg" alt="Image" width="320px" class=" smaller-image p-2 rounded">
        </div>
        <div class="buttons">
          <div class="text-container">
            <p class="text px-5 py-5">GameZephyr es una página web de videojuegos que permite explorar, buscar y seleccionar juegos. <br>
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

        <div class="p-5">
          <a href="aboutus" class="redirection">More about us</a>
      </div>

      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
