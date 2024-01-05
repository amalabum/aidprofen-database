<?php

// Récupération des données POST
$inputData = file_get_contents('php://input');
$dataFromKobo = json_decode($inputData, true);

// Vérifier si la requête a échoué
if ($dataFromKobo === null && json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400); // Bad Request
    echo json_encode(array('error' => 'Erreur lors du décodage JSON.'));
    exit;
}
elseif($dataFromKobo != null){
    echo json_encode(array('message' => 'Données reçues avec succès'));
}
else{
    echo json_encode(array('message' => 'Données reçues en attente'));

}

// Traitement des données ici (par exemple, stockage en base de données)

// // Réponse à Kobo Collect
// http_response_code(200);
// echo json_encode(array('message' => 'Données reçues avec succès'));

// // Enregistrez les données dans un fichier de journal
// $logFilePath = '/myAPI/fichier.log';

// // Écrire les données dans le fichier journal
// file_put_contents($logFilePath, "Données reçues : " . print_r($dataFromKobo, true) . PHP_EOL, FILE_APPEND);

?>



