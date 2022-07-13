<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?= site_url('assets/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= site_url('assets/css/main.css') ?>">
        <title>Mon Blogue | Login</title>
    </head>
    <body>
        <script src="<?= site_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
        <script src="<?= site_url('assets/js/bootstrap.min.js') ?>"></script>
        
        <div class="container">
            <div class="d-flex justify-content-center login-panel">
               <form method="POST" action="<?= site_url('connexion') ?>">
                   <h3>Login</h3>
                   <hr>
                   <?= isset($_SESSION['error_login'])? $_SESSION['error_login']:'' ?>
                   <?= csrf_field() ?>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control"  name="username" id="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control"  name="password" id="password" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary">Connexion</button>
                </form>
            </div>
        </div>
    </body>
</html>