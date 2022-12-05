<?php

namespace Controllers;

class ArticlesController
{
    public function seeArticle($id)
    {
        //SESSION 
        $verif = new \Models\Session();
        $verif->verifSession();

        $model = new \Models\Articles();
        $article = $model->seeArt($id);

        $template = "seeOneArticle.phtml";
        include_once 'views/layout.phtml';
    }

    public function deleteArticle($id)
    {
        $verif = new \Models\Session();
        $verif->verifSession();
        
        $model = new \Models\Articles();
        $model->deleteArt($id);

        header('Location: index.php?route=accueilArticles');
        exit();
    }

    public function displayArticles()
    {
        $model = new \Models\Articles();
        $articles = $model->getAllArticles();

        $template = "articles.phtml";
        include_once 'views/layout.phtml';
    }

    public function displayFormArticle()
    {
        $addNewArticle = [
            'addTitre'    => "",
            'addContenu'  => ""
        ];

        $template = "addFormArticle.phtml";
        include_once 'views/layout.phtml';
    }

    public function insertArticle()
    {
        //Récupération du POST
        $errors = [];
        $valids = [];

        $addNewArticle = [
            'addTitre'   => "",
            'addContenu'  => ""
        ];

        //Vérification remplissage formulaire 

        if (array_key_exists('titre', $_POST) && array_key_exists('contenu', $_POST)) {

            $addNewArticle = [
                'addTitre'   => trim($_POST['titre']),
                'addContenu'  => trim($_POST['contenu'])
            ];

            //Si erreur, afficher les erreurs via le tableau

            if (strlen($addNewArticle['addTitre']) < 4)
                $errors[] = "Veuillez renseigner le champ 'Titre' !";

            if (strlen($addNewArticle['addContenu']) < 10)
                $errors[] = "Veuillez renseigner le champ 'Contenu' !";

            if (count($errors) == 0) {

                if (array_key_exists('id', $_GET)) {

                    $model = new \Models\Articles();
                    $bien = $model->seeArt($_GET['id']);
                }

                // Ajout à la BDD

                if (array_key_exists('id', $_GET)) {
                    $data = [
                        'titre' => $addNewArticle['addTitre'],
                        'contenu' => $addNewArticle['addContenu'],
                    ];

                    $model = new \Models\Articles();
                    $model->updateArticle($data, $_GET['id']);
                    $valids[] = "Votre ajout d'article a bien été modifié.";
                } else {
                    $data = [
                        $addNewArticle['addTitre'],
                        $addNewArticle['addContenu'],
                    ];

                    $model = new \Models\Articles();
                    $model->addNewArticle($data);
                    $valids[] = "Votre ajout d'article a bien été effectué.";
                }

                $addNewArticle = [
                    'addTitre'   => "",
                    'addContenu'  => ""
                ];
                $model = new \Models\Categories();
                $categories = $model->getAllCategories();

                $template = "addFormArticle.phtml";
                include_once 'views/layout.phtml';
            } else {
                $model = new \Models\Categories();
                $categories = $model->getAllCategories();

                $template = "addFormArticle.phtml";
                include_once 'views/layout.phtml';
            }
        }
    }

    public function updateArticle($id)
    {
        $verif = new \Models\Session();
        $verif->verifSession();
        
        $model = new \Models\Articles();
        $article = $model->seeArt($id);

        $addNewArticle = [
            'addTitre'   => $article['titre'],
            'addContenu'  => $article['contenu'],
        ];

        $template = "addFormArticle.phtml";
        include_once 'views/layout.phtml';
    }
}
