<?php

namespace Models;

const UPLOADS_DIR = '../public/imagesBDD/';                            // UPLOADS_DIR Répertoire ou seront uploadés les fichiers
const FILE_EXT_IMG = ['jpg', 'jpeg', 'gif', 'png', 'JPG'];            // FILE_EXT_IMG  extensions acceptées pour les images
const MIME_TYPES = array(
    // images
    'png' => 'image/png',
    'jpeg' => 'image/jpeg',
    'jpg' => 'image/jpeg',
    'svg' => 'image/svg+xml',
);


class Uploads
{
    public function uploadFile(array $file, array &$errors, string $folder = UPLOADS_DIR, array $fileExtensions = FILE_EXT_IMG)
    {
        $filename = '';
        // On récupère l'extension du fichier pour vérifier si elle est dans  $fileExtensions
        $tmpNameArray = explode(".", $file["name"]);
        $tmpExt = end($tmpNameArray);

        if ($file["error"] === UPLOAD_ERR_OK) {
            $tmpName = $file["tmp_name"];

            if (in_array($tmpExt, $fileExtensions)) {
                $filename = uniqid() . '-' . basename($file["name"]);
                if (!move_uploaded_file($tmpName, $folder . $filename)) {
                    $errors[] = 'Le fichier n\'a pas été enregistré correctement';
                }
                // mime_content_type 
                // Détecte le type de contenu d'un fichier. 
                // On vérifie le contenue de fichier, pour voir s'il appartient aux MIMES autorises.
                if (!in_array(mime_content_type($folder . $filename), MIME_TYPES, true)) {
                    // var_dump(mime_content_type($folder.$filename));
                    $errors[] = 'Le fichier n\'a pas été enregistré correctement car il ne correspond pas au MIME indiqué';
                }
            } else {
                $errors[] = 'Ce type de fichier n\'est pas autorisé !';
            }
        } else if ($file["error"] == UPLOAD_ERR_INI_SIZE || $file["error"] == UPLOAD_ERR_FORM_SIZE) {
            //fichier trop volumineux
            $errors[] = 'Le fichier est trop volumineux';
        } else {
            $errors[] = 'Une erreur a eu lieu au moment de l\'upload';
        }
        return $filename;
    }

    public function updateFile()
    {
    }
}
