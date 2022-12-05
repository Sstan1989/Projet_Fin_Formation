<?php

namespace Controllers;

class BiensController
{

    public function seeBien($id)
    {
        //SESSION 
        $verif = new \Models\Session();
        $verif->verifSession();

        $model = new \Models\Biens();
        $bien = $model->see($id);

        $template = "seeOneBien.phtml";
        include_once 'views/layout.phtml';
    }

    public function updateBiens($id)
    {
        $verif = new \Models\Session();
        $verif->verifSession();
        
        $model = new \Models\Categories();
        $categories = $model->getAllCategories();

        $model = new \Models\Biens();
        $bien = $model->see($id);

        $addNewBien = [
            'addName'          => $bien['name'],
            'addDescription'   => $bien['description'],
            'addPrice'         => $bien['price'],
            'addImage'         => $bien['image'],
            'addCategory'      => $bien['category']
        ];

        $template = "addFormBien.phtml";
        include_once 'views/layout.phtml';
    }

    public function deleteBiens($id)
    {
        $verif = new \Models\Session();
        $verif->verifSession();
        
        $model = new \Models\Biens();
        $model->delete($id);

        header('Location: index.php?route=accueil');
        exit();
    }

    public function displayForm()
    {
        $model = new \Models\Categories();
        $categories = $model->getAllCategories();

        $addNewBien = [
            'addName'   => "",
            'addDescription'  => "",
            'addPrice'  => "",
            'addImage'  => "",
            'addCategory'  => "",
        ];

        $template = "addFormBien.phtml";
        include_once 'views/layout.phtml';
    }

    public function insertBien()
    {
        //Récupération du POST
        $errors = [];
        $valids = [];

        $addNewBien = [
            'addName'   => "",
            'addDescription'  => "",
            'addPrice'  => "",
            'addImage'  => "",
            'addCategory'  => "",
        ];

        //Vérification remplissage formulaire 

        if (array_key_exists('name', $_POST) && array_key_exists('description', $_POST) && array_key_exists('price', $_POST) && array_key_exists('category', $_POST)) {

            $addNewBien = [
                'addName'   => trim($_POST['name']),
                'addDescription'  => trim($_POST['description']),
                'addPrice'  => trim($_POST['price']),
                'addImage'  => "comingSoon.jpg",
                'addCategory'  => trim($_POST['category']),
            ];

            //Si erreur, afficher les erreurs via le tableau

            if (strlen($addNewBien['addName']) < 4)
                $errors[] = "Veuillez renseigner le champ 'Name' !";

            if (strlen($addNewBien['addDescription']) < 20)
                $errors[] = "Veuillez renseigner le champ 'Description' !";

            if (!is_numeric($addNewBien['addPrice']) || $addNewBien['addPrice'] == 0)
                $errors[] = "Veuillez renseigner le champ 'Prix' !";

            if ($addNewBien['addCategory'] == "error")
                $errors[] = "Veuillez renseigner le champ 'Catégorie' !";

            if (count($errors) == 0) {

                if (array_key_exists('id', $_GET)) {

                    $model = new \Models\Biens();
                    $bien = $model->see($_GET['id']);
                    $addNewBien['addImage'] = $bien['image'];

                    if (isset($_FILES['image']) && $_FILES['image']['name'] !== '') {
                        // STEF
                        if ($bien['image'] != 'comingSoon.jpg') {
                            unlink('../public/imagesBDD/' . $bien['image']);
                        }
                        $model = new \Models\Uploads();
                        $addNewBien['addImage'] = $model->uploadFile($_FILES['image'], $errors);
                        //STEF
                    }
                } else {
                    if (isset($_FILES['image']) && $_FILES['image']['name'] !== '') {
                        $model = new \Models\Uploads();
                        $addNewBien['addImage'] = $model->uploadFile($_FILES['image'], $errors);
                    }
                }

                // Ajout à la BDD

                if (array_key_exists('id', $_GET)) {
                    $data = [
                        'name' => $addNewBien['addName'],
                        'description' => $addNewBien['addDescription'],
                        'price' => $addNewBien['addPrice'],
                        'image' => $addNewBien['addImage'],
                        'category' => $addNewBien['addCategory']
                    ];

                    $model = new \Models\Biens();
                    $model->updateBien($data, $_GET['id']);
                    $valids[] = "Votre ajout a bien été modifié.";
                } else {
                    $data = [
                        $addNewBien['addName'],
                        $addNewBien['addDescription'],
                        $addNewBien['addPrice'],
                        $addNewBien['addImage'],
                        $addNewBien['addCategory']
                    ];

                    $model = new \Models\Biens();
                    $model->addNewBien($data);
                    $valids[] = "Votre ajout a bien été effectué.";
                }

                $addNewBien = [
                    'addName'   => "",
                    'addDescription'  => "",
                    'addPrice'  => "",
                    'addImage'  => "",
                    'addCategory'  => "",
                ];
                $model = new \Models\Categories();
                $categories = $model->getAllCategories();

                $template = "addFormBien.phtml";
                include_once 'views/layout.phtml';
            } else {
                $model = new \Models\Categories();
                $categories = $model->getAllCategories();

                $template = "addFormBien.phtml";
                include_once 'views/layout.phtml';
            }
        }
        //Etapes:
        //Vérification remplissage formulaire 
        //Si erreur, afficher les erreurs via le tableau
        //Si pas d'erreur, UPLOAD IMAGE & INSERT IN TO dans la BDD, puis soit affichage du tableau valids soit redirection ... 
    }
}
