<?php

session_start();

spl_autoload_register(function ($class) { // $class = Controllers/HomeController
    require_once lcfirst(str_replace('\\', '/', $class)) . '.php'; // require_once controllers/HomeController.php
});

if (array_key_exists('route', $_GET)) :

    switch ($_GET['route']) {

            // AFFICHAGE DE LA PAGE D'ACCUEIL

        case 'home':
            $controller = new Controllers\HomeController();
            $controller->display();
            break;

            // AFFICHAGE DES PAGES VISIBLES PAR LES UTILISATEURS

        case 'biens':
            $controller = new Controllers\HomeController();
            $controller->biens();
            break;

        case 'team':
            $controller = new Controllers\HomeController();
            $controller->team();
            break;

        case 'articles':
            $controller = new Controllers\HomeController();
            $controller->articlesStef();

        case 'about':
            $controller = new Controllers\HomeController();
            $controller->about();
            break;

            //REQUETE AJAX

        case 'ajax';
            $controller = new Controllers\AjaxController();
            $controller->searchBiensForInput();
            break;

        default:
            header('location: index.php?route=home');
            exit;
    }
else :
    header('Location: index.php?route=home');
    exit;
endif;
