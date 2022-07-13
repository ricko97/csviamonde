<!DOCTYPE html>
<?php 
   if(!isset($_SESSION['user'])){
      header("Location: /");
      exit;
   }
        
?>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="<?= site_url('assets/img/favicon.ico') ?>" type="image/x-icon">
        <link rel="stylesheet" href="<?= site_url('assets/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= site_url('assets/css/main.css') ?>">
        <title>Mon Blogue | <?= $this->renderSection('title') ?></title>
    </head>
    <body>
        <script src="<?= site_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
        <script src="<?= site_url('assets/js/bootstrap.min.js') ?>"></script>
        
        <header>
            <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
              <a class="navbar-brand" href="/">Test De Programmeur</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="/">Blogue <span class="sr-only">(current)</span></a>
                  </li>
                </ul>
              </div>
              <span class="navbar-text">
                  Bienvenue <b><?=ucfirst($_SESSION['user']['username'])?></b> | <a href="/logout">Logout</a>
                </span>
            </nav>
        </header>
        <div class="container-fluid">
            <?= $this->renderSection('content') ?>
            <footer>
                <hr>
                &copy; 2022 - TestDeProg
            </footer>
        </div>
    </body>
</html>