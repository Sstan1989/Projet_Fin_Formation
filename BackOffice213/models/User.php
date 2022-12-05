<?php

namespace Models;

class User extends Database
{

    public function getUserByEmail($value)
    {
        return $this->getOne('utilisateurs', 'email', $value);
    }


    public function seeUser($id)
    {
        return $this->seeOneUser($id);
    }

    public function getAllUsers()
    {
        return $this->findAll("SELECT id, nom, prenom, login, email
                               FROM utilisateurs 
                               ORDER BY id DESC ");
    }

    public function deleteUser($id)
    {
        return $this->deleteOne('utilisateurs', 'id', $id);
    }

    public function updateUser($data, $id)
    {
        $this->updateOne('utilisateurs', $data, 'id', $id);
    }

    public function addNewUser($data)
    {

        $this->addOne(
            'utilisateurs',
            'date,nom,prenom,login,pass,email',
            '?,?,?,?,?,?',
            $data
        );
    }
}
