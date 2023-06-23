<!DOCTYPE html>
<html>
<head>
  <title>GameZephyr</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="models/styles/styles.css">
</head>
<body>
  <div class="container">
    
    <?php require "views/title.php"?>
    <?php require "views/startImages.php"?>
    
    <div class="form-container">
      <label class="label" for="email">Correo:</label>
      <input class="form-control" type="email" id="email" placeholder="Ingresa tu correo">
    </div>
    <div class="form-container">
      <label class="label" for="password">Contraseña:</label>
      <input class="form-control" type="password" id="password" placeholder="Ingresa tu contraseña">
    </div>
    <div class="button-container">
      <a href="#" class="button btn btn-primary btn-lg">Login</a>
      <a href="SignIn" class="button btn btn-primary btn-lg">Sign up</a>
      <a href="#" class="button btn btn-primary btn-lg">LoginWithGoogle</a>
    </div>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
