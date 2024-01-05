<?php
// // Définition des en-têtes de la réponse
// header('Content-Type: application/json');
// Récupération des données POST
$inputData = file_get_contents('php://input');
$dataFromKobo = json_decode($inputData, true);

// Vérifier si la requête a échoué
if ($dataFromKobo === null && json_last_error() !== JSON_ERROR_NONE) {
    // Erreur lors du décodage JSON
    http_response_code(400); // Bad Request
    echo json_encode(array('error' => 'Erreur lors du décodage JSON.'));
    exit;
}

// Traitement des données ici (par exemple, stockage en base de données)

// Réponse à Kobo Collect
http_response_code(200);
echo json_encode(array('message' => 'Données reçues avec succès'));

// Enregistrez les données dans un fichier de journal
$logFilePath = '/myAPI/fichier.log';

// Vérifier si le fichier journal peut être écrit
if (!is_writable($logFilePath)) {
    error_log("Impossible d'écrire dans le fichier journal.", 0);
} else {
    // Écrire les données dans le fichier
    file_put_contents($logFilePath, "Données reçues : " . $inputData . PHP_EOL, FILE_APPEND);
}

?>


?>


