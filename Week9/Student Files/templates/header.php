<!doctype html>
<!-- we will close the html element in our footer template -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- create a dynamic title -->
    <title><?php // add lesson code here ?></title>
    <!-- create a dynamic description -->
    <meta name="description" content="<?php // add lesson code here ?>"
    <meta name="robots" content="noindex, nofollow">
    <!-- add our custom fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,600;1,400&family=Montserrat+Alternates:wght@400;500&display=swap" rel="stylesheet">
    <!-- add bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <!-- add our CSS -->
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <!-- the body element will be closed in our footer template -->
  <body>
  <header>
    <nav class="navbar navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./img/php-logo.png" alt="header logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="about.php">About Example</a></li>
            <li class="nav-item"><a class="nav-link" href="missing.php">Missing Page</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
