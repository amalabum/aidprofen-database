<?php

// Vérifie si des données ont été reçues via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les données du corps de la requête POST (au format JSON)
    $json_data = file_get_contents('php://input');
    
    // Vérifie si les données JSON ont été correctement récupérées
    if ($json_data === false) {
        http_response_code(400); // Bad Request
        exit('Erreur lors de la récupération des données JSON.');
    }

    // Décode les données JSON en un tableau associatif
    $data = json_decode($json_data, true);

    // Vérifie si le décodage JSON a réussi
    if ($data === null) {
        http_response_code(400); // Bad Request
        exit('Erreur lors du décodage des données JSON.');
    }

    // Faites quelque chose avec les données (par exemple, les stocker en base de données)
    if (!empty($data)) {
        // Exemple : affiche les données
        echo "Données reçues avec succès:\n";
        print_r($data);
    } else {
        // Les données sont vides
        echo "Aucune donnée reçue.";
    }
} else {
    // La requête n'est pas une requête POST
    http_response_code(405); // Method Not Allowed
    exit('Cette page ne répond qu\'aux requêtes POST.');
}
?>
