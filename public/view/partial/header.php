<?php
$base_url = Config::$site_url;

$bootstrapCss = $base_url . "public/inc/bootstrap.css";
$bootstrapJs = $base_url . "public/inc/bootstrap.js";
$jquery = $base_url . "public/inc/jquery-3.1.1.js";
$sidebarMenuJs = $base_url . "public/scripts/sidebarMenu.js";
$sidebarMenuCss = $base_url . "public/style/sidebarMenu.css";
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title><?php echo $data->title ?></title>
        <link rel="stylesheet" type="text/css" href="<?= $bootstrapCss ?>" />
        <link rel="stylesheet" type="text/css" href="<?= $sidebarMenuCss ?>" />
        <script
            src="<?= $jquery ?>">
        </script>
        <script
            src="<?= $bootstrapJs ?>">
        </script>
    </head>
    <body>
        <nav class="navbar navbar-inverse sidebar" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Journée Sportive</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                        <li ><a href="/inscription">Inscription<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
                            <ul class="dropdown-menu forAnimate" role="menu">
                                <li><a href="/administration/classe">Classes</a></li>
                                <li><a href="/administration/activite">Activités</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Administrateurs</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <script
            src="<?= $sidebarMenuJs ?>">
        </script>
        <div class="main">