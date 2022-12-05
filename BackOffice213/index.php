<?php

session_start();

spl_autoload_register(function ($class) { // $class = Controllers/HomeController
    require_once lcfirst(str_replace('\\', '/', $class)) . '.php'; // require_once controllers/HomeController.php
});

if (array_key_exists('route', $_GET)) :

    switch ($_GET['route']) {

            // AFFICHAGE DE LA PAGE D'ACCUEIL - CONNEXION

        case 'home':
            $controller = new Controllers\HomeController();
            $controller->display();
            break;

        case 'submitConnect':
            $controller = new Controllers\HomeController();
            $controller->submitForm();
            break;

        case 'accueil':
            $controller = new Controllers\HomeController();
            $controller->displayBiens();
            break;

        case 'disconnect':
            $controller = new Controllers\HomeController();
            $controller->disconnected();
            break;

            // BIENS

        case 'displayFormBien':
            $controller = new Controllers\BiensController();
            $controller->displayForm();
            break;

        case 'submitFormBien':
            $controller = new Controllers\BiensController();
            $controller->insertBien();
            break;

        case 'see':
            $controller = new Controllers\BiensController();
            $controller->seeBien($_GET['id']);
            break;

        case 'update':
            $controller = new Controllers\BiensController();
            $controller->updateBiens($_GET['id']);
            break;

        case 'delete':
            $controller = new Controllers\BiensController();
            $controller->deleteBiens($_GET['id']);
            break;

            // ARTICLES

        case 'accueilArticles':
            $controller = new Controllers\ArticlesController();
            $controller->displayArticles();
            break;

        case 'seeArticle':
            $controller = new Controllers\ArticlesController();
            $controller->seeArticle($_GET['id']);
            break;

        case 'displayFormArticle':
            $controller = new Controllers\ArticlesController();
            $controller->displayFormArticle();
            break;

        case 'submitFormArticle':
            $controller = new Controllers\ArticlesController();
            $controller->insertArticle();
            break;

        case 'updateArticle':
            $controller = new Controllers\ArticlesController();
            $controller->updateArticle($_GET['id']);
            break;

        case 'deleteArticle':
            $controller = new Controllers\ArticlesController();
            $controller->deleteArticle($_GET['id']);
            break;

            // USER

        case 'user':
            $controller = new Controllers\UsersController();
            $controller->displayUsers();
            break;

        case 'seeUser':
            $controller = new Controllers\UsersController();
            $controller->seeUser($_GET['id']);
            break;

        case 'displayFormUser':
            $controller = new Controllers\UsersController();
            $controller->displayFormUser();
            break;

        case 'submitFormUser':
            $controller = new Controllers\UsersController();
            $controller->insertUser();
            break;

        case 'updateUser':
            $controller = new Controllers\UsersController();
            $controller->updateUser($_GET['id']);
            break;

        case 'deleteUser':
            $controller = new Controllers\UsersController();
            $controller->deleteUser($_GET['id']);
            break;


        default:
            header('location: index.php?route=home');
            exit;
    }
else :
    header('Location: index.php?route=home');
    exit;
endif;
