<?php

namespace Models;

class Articles extends Database
{

    public function getAllArticles()
    {
        return $this->findAll("SELECT id, titre, contenu
                               FROM articles 
                               ORDER BY id DESC ");
    }

    public function seeArt($id)
    {
        return $this->seeOneArt($id);
    }

    public function deleteArt($id)
    {
        return $this->deleteOne('articles', 'id', $id);
    }

    public function updateArticle($data, $id)
    {
        $this->updateOne('articles', $data, 'id', $id);
    }

    public function addNewArticle($data)
    {

        $this->addOne(
            'articles',
            'titre,contenu',
            '?,?',
            $data
        );
    }
}
