<!DOCTYPE html> 
<html>
<head>
  <title>GameZephyr</title>
    <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="models/styles/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php require "views/videobackground.php"?>
</head>
<body>
  <div class="container">
    
    <?php require "views/title.php"?>
    
    <form class="text-white" action="" method="POST">
      <div class="form-container">
        <label class="label text-white" for="email">Correo:</label>
        <input class="form-control bg-transparent" type="email" id="email" name="email" placeholder="Ingresa tu correo">
      </div>
      <div class="form-container">
        <label class="label text-white" for="password">Contraseña:</label>
        <input class="form-control bg-transparent" type="password" id="password" name="password" placeholder="Ingresa tu contraseña">
      </div>
      <div class="button-container">
        <button type="submit" class="button btn btn-primary btn-lg">Login</button>
        <a href="SignIn" class="button btn btn-primary btn-lg">Sign up</a>
        <a href="#" class="button btn btn-primary btn-lg">Login With Google</a>
      </div>
    </form>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
require_once 'libs/login.php';  
?>
