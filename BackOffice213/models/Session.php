<?php

namespace Models;

class Session
{
    public function verifSession()
    {
        if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
            header('location: index.php?route=home');
            exit();
        }
    }
}

