<?php


// Récupération des données POST
$dataFromKobo = json_decode(file_get_contents('php://input'), true);

// Traitement des données ici (par exemple, stockage en base de données)

// Réponse à Kobo Collect
http_response_code(200);
echo json_encode(array('message' => 'Données reçues avec succès'));

<?php

// Récupération des données POST
$dataFromKobo = json_decode(file_get_contents('php://input'), true);

// Traitement des données ici (par exemple, stockage en base de données)

// Réponse à Kobo Collect
http_response_code(200);
echo json_encode(array('message' => 'Données reçues avec succès'));

// Enregistrez les données dans un fichier de journal
$logFilePath = '/myAPI';

// Créer le fichier s'il n'existe pas
if (!file_exists($logFilePath)) {
    fopen($logFilePath, 'w');
}

// Écrire les données dans le fichier
file_put_contents($logFilePath, "Données reçues : " . json_encode($dataFromKobo) . PHP_EOL, FILE_APPEND);

?>


?>

