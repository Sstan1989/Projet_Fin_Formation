<?php

namespace Models;

class Biens extends Database
{

    public function getAllBiens()
    {
        return $this->findAll("SELECT * FROM biens");
    }
}
