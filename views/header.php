<?php require "views/search.php"?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container d-flex justify-content-center">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="main">Main Menu</a>
      </li>
      <li class="nav-item">
        <form class="form-inline" action="" method="GET">
          <div class="input-group">
            <input class="form-control mr-sm-2" type="text" name="searchQuery" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </div>
          </div>
        </form>
      </li>
    </ul>
  </div>
</nav>
