<?php


// Récupération des données POST
$dataFromKobo = json_decode(file_get_contents('php://input'), true);

// Traitement des données ici (par exemple, stockage en base de données)

// Réponse à Kobo Collect
http_response_code(200);
echo json_encode(array('message' => 'Données reçues avec succès'));

// Enregistrez les données dans un fichier de journal (ou un autre mécanisme)
error_log("Données reçues : " . json_encode($dataFromKobo), 3, "myApi/fichier.log");


?>

