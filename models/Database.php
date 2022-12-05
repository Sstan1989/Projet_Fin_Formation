<?php

namespace Models;

class Database
{
    protected $bdd;

    //elle se connecte à la bdd
    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=db.3wa.io;dbname=stefanstan_agence;charset=utf8', 'stefanstan', '948e24b6baa7e293be07f9f927dc1b8c');
    }

    protected function findAll($req, $params = [])
    {
        $query = $this->bdd->prepare($req);
        $query->execute($params);
        return $query->fetchAll(); // Récupérer les enregistrements
    }


    protected function getOneById($table, $column, $id)
    {
        $query = $this->bdd->prepare("SELECT * FROM " . $table . " WHERE " . $column . " = ?");
        $query->execute([$id]);
        $data = $query->fetch();
        $query->closeCursor(); // On indique au serveur que notre requete est terminée
        return $data;
    }

    protected function addOne(string $table, string $columns, string $values, $data)
    {
        $query = $this->bdd->prepare('INSERT INTO ' . $table . '(' . $columns . ') values (' . $values . ')');
        $query->execute($data);
        $query->closeCursor();
    }

    protected function search($table, $champ, $chaine)
    {
        $query = $this->bdd->prepare("SELECT * FROM $table WHERE $champ LIKE ?");
        $query->execute(["%$chaine%"]);
        $result = $query->fetchAll();
        $query->closeCursor(); // On indique au serveur que notre requete est terminée
        return $result;
    }
}
