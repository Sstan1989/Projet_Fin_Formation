<?php

namespace Models;

class Articles extends Database
{

    public function getAllArticles()
    {
        return $this->findAll("SELECT * FROM articles");
    }

    public function getDetailsOfArticle($id)
    {
        return $this->getOneById('articles', 'id', $id);
    }
}
