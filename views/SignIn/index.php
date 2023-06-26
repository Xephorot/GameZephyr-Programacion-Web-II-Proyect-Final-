<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sign In - GameZephyr</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="models/styles/styles.css">
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <?php require "views/videobackground.php"?>
</head>
<body>
  <div class="container">
    
    <?php require "views/title.php"?>

    <form action="" method="POST">
      <div class="form-container">
        <label class="label" for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email">
      </div>
  
      <div class="form-container">
        <label class="label" for="password">Password:</label>
        <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password">
      </div>
  
      <div class="form-container">
        <label class="label" for="repeat-password">Repeat Password:</label>
        <input class="form-control" type="password" id="repeat-password" name="repeat-password" placeholder="Repeat your password">
      </div>
  
      <div class="button-container">
        <button type="submit" class="button btn btn-primary btn-lg">Sign up</button>
        <a href="login" class="button btn btn-primary btn-lg">Login</a>
        <a href="#" class="button btn btn-primary btn-lg">LoginWithGoogle</a>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php require "libs/singup.php"?>
