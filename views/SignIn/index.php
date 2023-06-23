<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sign In - GameZephyr</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="models/styles/styles.css">
</head>
<body>
  <div class="container">
    
    <?php require "views/title.php"?>
    <?php require "views/startImages.php"?>
    
    <div class="form-container">
      <label class="label" for="email">Email:</label>
      <input class="form-control" type="email" id="email" placeholder="Enter your email">
    </div>
  
    <div class="form-container">
      <label class="label" for="password">Password:</label>
      <input class="form-control" type="password" id="password" placeholder="Enter your password">
    </div>
  
    <div class="form-container">
      <label class="label" for="repeat-password">Repeat Password:</label>
      <input class="form-control" type="password" id="repeat-password" placeholder="Repeat your password">
    </div>
  
    <div class="button-container">
        <a href="login      " class="button btn btn-primary btn-lg">Login</a>
        <a href="#" class="button btn btn-primary btn-lg">Sign up</a>
        <a href="#" class="button btn btn-primary btn-lg">LoginWithGoogle</a>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
