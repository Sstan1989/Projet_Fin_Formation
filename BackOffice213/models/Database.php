<?php

namespace Models;

class Database
{
    // CONNECTION A LA BDD

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

    // AUTRES METHODES

    protected function getOne($table, $column, $value)
    {
        $query = $this->bdd->prepare("SELECT * FROM " . $table . " WHERE " . $column . " = ?");
        $query->execute([$value]);
        $data = $query->fetch();
        $query->closeCursor(); // On indique au serveur que notre requete est terminée
        return $data;
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

    protected function seeOne($id)
    {
        $query = $this->bdd->prepare("SELECT biens.id, biens.name, biens.description, biens.price, biens.image, categories.name AS category 
                                    FROM biens LEFT JOIN categories ON biens.category = categories.id WHERE biens.id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

    protected function updateOne($table, $newData, $condition, $val)
    {
        // On initialise les sets comme étant une chaine de caractères vide
        $sets = '';
        // On boucle sur les data à mettre à jour pour préparer le data binding
        foreach ($newData as $key => $value) {
            // On concatène le nom des colonnes et le paramètre du data binding:  clé = :clé,
            $sets .= $key . ' = :' . $key . ',';
        }
        // On supprime le dernier caractère, donc la derniere virgule
        $sets = substr($sets, 0, -1);
        // On indique la requete SQL
        $sql = "UPDATE " . $table . " SET " . $sets . " WHERE " . $condition . " = :" . $condition;
        // On prépare la requete SQL
        $query = $this->bdd->prepare($sql);
        // Pour chaque valeur de la recette, on lie la valeur de la clé à chaque :clé
        foreach ($newData as $key => $value) {
            $query->bindValue(':' . $key, $value);
        }
        // On lie la valeur (par ex, l'id) de la condition à  :condition
        $query->bindValue(':' . $condition, $val);
        // On execute la requete
        $query->execute();
        // On indique au serveur que notre requete est terminée
        $query->closeCursor();
    }

    protected function deleteOne(string $table, string $column, $id)
    {
        $query = $this->bdd->prepare("DELETE FROM " . $table . " WHERE " . $column . " = ?");
        $query->execute([$id]);
    }

    // Articles 

    protected function seeOneArt($id)
    {
        $query = $this->bdd->prepare("SELECT id, titre, contenu FROM articles WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

    // User

    protected function seeOneUser($id)
    {
        $query = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }
}
