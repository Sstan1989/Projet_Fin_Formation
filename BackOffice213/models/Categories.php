<?php

namespace Models;

class categories extends Database
{

    public function getAllCategories()
    {
        $req = "SELECT * FROM categories ORDER BY id ASC";
        return $this->findAll($req);
    }
}
