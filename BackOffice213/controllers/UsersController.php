<?php

namespace Controllers;

class UsersController
{
    public function seeUser($id)
    {
        //SESSION 
        $verif = new \Models\Session();
        $verif->verifSession();

        $model = new \Models\User();
        $user = $model->seeUser($id);

        $template = "seeOneUser.phtml";
        include_once 'views/layout.phtml';
    }

    public function deleteUser($id)
    {
        $verif = new \Models\Session();
        $verif->verifSession();
        
        $model = new \Models\User();
        $model->deleteUser($id);

        header('Location: index.php?route=user');
        exit();
    }

    public function displayUsers()
    {
        $model = new \Models\User();
        $users = $model->getAllUsers();

        $template = "users.phtml";
        include_once 'views/layout.phtml';
    }

    public function displayFormUser()
    {
        $addNewUser = [
            'addName'    => "",
            'addFirstName'    => "",
            'addLogin'    => "",
            'addPass'    => "",
            'addEmail'  => ""
        ];

        $template = "addFormUser.phtml";
        include_once 'views/layout.phtml';
    }

    public function insertUser()
    {
        //Récupération du POST
        $errors = [];
        $valids = [];

        $addNewUser = [
            'addDate' => "",
            'addName'    => "",
            'addFirstName'    => "",
            'addLogin'    => "",
            'addPass'    => "",
            'addEmail'  => ""
        ];


        //Vérification remplissage formulaire 

        if (
            array_key_exists('nom', $_POST) && array_key_exists('prenom', $_POST) && array_key_exists('login', $_POST)
            && array_key_exists('pass', $_POST) && array_key_exists('email', $_POST)
        ) {

            $addNewUser = [
                'addDate' => date("Y-m-d H:i:s"),
                'addName'   => trim($_POST['nom']),
                'addFirstName'  => trim($_POST['prenom']),
                'addLogin'   => trim($_POST['login']),
                'addPass'  => password_hash(trim($_POST['pass']), PASSWORD_DEFAULT),
                'addEmail'   => trim($_POST['email'])
            ];

            //Si erreur, afficher les erreurs via le tableau

            if (strlen($addNewUser['addName']) < 4)
                $errors[] = "Veuillez renseigner le champ 'Nom' !";

            if (strlen($addNewUser['addFirstName']) < 3)
                $errors[] = "Veuillez renseigner le champ 'prenom' !";

            if (strlen($addNewUser['addLogin']) < 3)
                $errors[] = "Veuillez renseigner le champ 'login' !";

            if (strlen($addNewUser['addPass']) < 5)
                $errors[] = "Veuillez renseigner le champ 'pass' !";

            if (strlen($addNewUser['addEmail']) < 5)
                $errors[] = "Veuillez renseigner le champ 'email' !";

            if (count($errors) == 0) {

                // Ajout à la BDD

                if (array_key_exists('id', $_GET)) {
                    $data = [
                        'date' => date("Y-m-d H:i:s"),
                        'nom' => $addNewUser['addName'],
                        'prenom' => $addNewUser['addFirstName'],
                        'login' => $addNewUser['addLogin'],
                        'pass' => $addNewUser['addPass'],
                        'email' => $addNewUser['addEmail']
                    ];

                    $model = new \Models\User();
                    $model->updateUser($data, $_GET['id']);
                    $valids[] = "Votre ajout d'utilisateur a bien été modifié.";
                } else {

                    $model = new \Models\User();
                    $userFind = $model->getUserByEmail($addNewUser['addEmail']);

                    if (!empty($userFind))
                        $errors[] = "Cette adresse email existe déjà";

                    if (count($errors) == 0) {

                        $data = [
                            $addNewUser['addDate'],
                            $addNewUser['addName'],
                            $addNewUser['addFirstName'],
                            $addNewUser['addLogin'],
                            $addNewUser['addPass'],
                            $addNewUser['addEmail']
                        ];

                        $model = new \Models\User();
                        $model->addNewUser($data);
                        $valids[] = "Votre ajout d'utilisateur a bien été effectué.";
                    }
                }

                $addNewUser = [
                    'addDate' => "",
                    'addName'   => "",
                    'addFirstName'  => "",
                    'addLogin'   => "",
                    'addPass'  => "",
                    'addEmail'   => ""
                ];

                $template = "addFormUser.phtml";
                include_once 'views/layout.phtml';
            } else {

                $template = "addFormUser.phtml";
                include_once 'views/layout.phtml';
            }
        }
    }

    public function updateUser($id)
    {
        $model = new \Models\User();
        $user = $model->seeUser($id);

        $addNewUser = [
            'addName' => $user['nom'],
            'addFirstName' => $user['prenom'],
            'addLogin' => $user['login'],
            'addPass' => $user['pass'],
            'addEmail' => $user['email']
        ];

        $template = "addFormUser.phtml";
        include_once 'views/layout.phtml';
    }
}
