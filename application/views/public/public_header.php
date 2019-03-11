<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Articles List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <?= link_tag("assets/css/bootstrap.min.css") ?>
    <!-- <script src="main.js"></script> -->
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <?= anchor('User/', 'Articles', ['class'=>'navbar-brand','btn']) ?>
  <!-- <a class="navbar-brand" href="#">Articles</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <?= anchor('Admin/', 'Login', ['class'=>'nav-link','btn']) ?>
      </li>
      <li>
      <?= anchor('Admin/create_account/', 'SignUp', ['class'=>'nav-link','btn']) ?>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
