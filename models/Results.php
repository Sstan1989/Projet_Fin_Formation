<?php

namespace Models;

class Results extends Database
{
    public function searchBiens($champ, $chaine)
    {
        return $this->search('biens', $champ, $chaine);
    }
}
