<?php

namespace Controllers;

class HomeController
{

    public function display()
    {
        $model = new \Models\Articles();
        $articles = $model->getAllArticles();

        $template = "home.phtml";
        include_once 'views/layout.phtml';
    }

    public function biens()
    {
        $model = new \Models\Biens();
        $biens = $model->getAllBiens();

        $template = "biens.phtml";
        include_once 'views/layout.phtml';
    }

    public function team()
    {
        $template = "team.phtml";
        include_once 'views/layout.phtml';
    }

    public function articlesStef()
    {
        $model = new \Models\Articles();
        $articles = $model->getAllArticles();

        $template = "articles.phtml";
        include_once 'views/layout.phtml';
    }

    public function about()
    {
        $template = "about.phtml";
        include_once 'views/layout.phtml';
    }
}
