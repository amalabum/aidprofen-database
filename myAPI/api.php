<?php

// Récupération des données POST
$dataFromKobo = json_decode(file_get_contents('php://input'), true);

// Traitement des données ici (par exemple, stockage en base de données)

// Définition des en-têtes de la réponse
header('Content-Type: application/json');
// Ajoutez d'autres en-têtes selon les besoins de Kobo Collect

// Réponse à Kobo Collect
http_response_code(200);
echo json_encode(array('message' => 'Données reçues avec succès'));

// Afficher les données sur l'écran
echo "datas :";
echo "</br>"; 
echo '<h2>Données reçues :</h2>';
echo '<pre>';
print_r($dataFromKobo);
echo '</pre>';

?>

