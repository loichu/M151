<?php
$base_url = Config::$site_url;
$bootstrapCss = $base_url . "public/inc/bootstrap.css";
$bootstrapJs = $base_url . "public/inc/bootstrap.js";
$jquery = $base_url . "public/inc/jquery-3.1.1.js";
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title><?php echo $data->title ?></title>
        <link rel="stylesheet" type="text/css" href="<?= $bootstrapCss ?>" />
        <script
            src="<?= $jquery ?>">
        </script>
        <script
            src="<?= $bootstrapJs ?>">
        </script>
    </head>
    <body>