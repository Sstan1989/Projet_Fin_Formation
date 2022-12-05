<?php

namespace Controllers;

class AjaxController
{

    public function searchBiensForInput()
    {

        $content = file_get_contents("php://input");
        $data = json_decode($content, true);

        $search = "%" . $data['textToFind'] . "%";

        $model = new \Models\Results();
        $biensLabels = $model->searchBiens('name', $search);
        $numberOfBiens = count($biensLabels);

        include 'views/searchBiens.phtml';
    }
}
