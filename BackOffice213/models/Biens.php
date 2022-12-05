<?php

namespace Models;

class Biens extends Database
{

    public function getAllBiens()
    {
        return $this->findAll("SELECT biens.id, biens.name, biens.description, biens.price, categories.name AS category
                               FROM biens 
                               LEFT JOIN categories ON biens.category = categories.id
                               ORDER BY biens.id DESC ");
    }

    public function see($id)
    {
        return $this->seeOne($id);
    }

    public function addNewBien($data)
    {

        $this->addOne(
            'biens',
            'name, description,price,image,category',
            '?,?,?,?,?',
            $data
        );
    }


    public function updateBien($data, $id)
    {
        $this->updateOne('biens', $data, 'id', $id);
    }


    public function delete($id)
    {
        return $this->deleteOne('biens', 'id', $id);
    }
}
