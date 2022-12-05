<?php

namespace Controllers;

class HomeController
{

    public function display()
    {
        $template = "connectForm.phtml";
        include_once 'views/layout.phtml';
    }

    public function submitForm()
    {

        $errors = [];
        $valids = [];

        $user = [
            'email'  => "",
            'password'  => "",
        ];

        if (array_key_exists('email', $_POST) && array_key_exists('password', $_POST)) {

            $user = [
                'email'  => htmlspecialchars(trim(stripslashes($_POST['email']))),
                'password'  => htmlspecialchars(trim(stripslashes($_POST['password']))),
            ];

            if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL))
                $errors[] =  'Veuillez renseigner un email valide SVP !';

            if (strlen($user['password']) < 3)
                $errors[] = "Veuillez renseigner le champ 'Mot de passe' !";

            if (count($errors) == 0) {

                // Connexion 

                $model = new \Models\User();
                $findUser = $model->getUserByEmail($user['email']);


                if ($findUser == false) {
                    $errors[] = "Aucun utilisateur trouvé pour cette adresse mail !";
                } else if (!password_verify($user['password'], $findUser['pass'])) {
                    $errors[] = "Erreur d'authentification !";
                }
                else{
                   
                }

                if (count($errors) == 0) {
                    $_SESSION['connected'] = true;
                    $_SESSION['user'] = [
                        'id'        => $findUser['id'],
                        'nom'       => $findUser['nom'],
                        'prenom'    => $findUser['prenom'],
                        'login'     => $findUser['login'],
                        'email'     => $findUser['email'],
                    ];

                    header('Location: index.php?route=accueil');
                    exit();
                }
            }
        }
        $template = "connectForm.phtml";
        include_once 'views/layout.phtml';
    }

    public function disconnected()
    {
        $_SESSION['connected'] = false;
        $_SESSION['user'] = [];
        session_destroy();

        header('Location: index.php?route=home');
        exit();
    }

    public function displayBiens()
    {
        $model = new \Models\Biens();
        $biens = $model->getAllBiens();

        $template = "biens.phtml";
        include_once 'views/layout.phtml';
    }
}
