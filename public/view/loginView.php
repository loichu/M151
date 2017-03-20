<?php
$base_url = Config::$site_url;
$loginCss = $base_url . "public/style/login.css";
//$bootstrapCss = $base_url . "public/inc/bootstrap.css";
$bootstrapJs = $base_url . "public/inc/bootstrap.js";
$jquery = $base_url . "public/inc/jquery-3.1.1.js";
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>login</title>
        <link rel="stylesheet" type="text/css" href="<?= $loginCss ?>" />
        <link rel="stylesheet" type="text/css" href="<?= $bootstrapCss ?>" />
    
        <script
            src="<?= $jquery ?>">
        </script>
        <script
            src="<?= $bootstrapJs ?>">
        </script>
    </head>
    <body>
        <div class="login">
            <div class="login-triangle"></div>

            <h2 class="login-header">Log in</h2>

            <form class="login-container">
              <p><input type="username" placeholder="Nom d'utilisateur"></p>
              <p><input type="password" placeholder="Mot de passe"></p>
              <p><input type="submit" value="Log in"></p>
            </form>
        </div>
    </body>
</html>