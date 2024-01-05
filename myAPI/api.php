<?php
header('Content-Type: application/json');
// En-têtes d'Acceptation
header('Accept: application/json');
header('Access-Control-Allow-Origin: *');
header('Authorization: 3a0fe7888ff523a586069cb777793642db8551f9 ');
header('Access-Control-Allow-Methods: GET, POST, PUT');
header('Access-Control-Allow-Headers: Origin, Authorization, Content-Type, Accept');


if ($_SERVER['REQUEST_METHOD'] =='POST' || $_SERVER['REQUEST_METHOD'] =='GET') {
   
    $dataFromKobo = json_decode(file_get_contents('php://input'), true);

    if($dataFromKobo != null){
        if(json_last_error() == JSON_ERROR_NONE){
            echo json_encode(array('message' => 'Données reçues avec succès'));
            http_response_code(200);
    
            $logFilePath = '/myAPI/fichier.log';
            // Écrire les données dans le fichier journal
            file_put_contents($logFilePath, "Données reçues : " . print_r($dataFromKobo, true) . PHP_EOL, FILE_APPEND);
    
        }
        elseif(json_last_error() !== JSON_ERROR_NONE){
            http_response_code(400); // Bad Request
            echo json_encode(array('error' => 'Erreur lors du décodage JSON.'));
            exit;
        }   
    }
    else{
        echo json_encode(array('message' => 'en attente des données...'));
    
    }

} else {
    // Si la méthode n'est pas POST, renvoyez une erreur
    header('HTTP/1.1 405 Method Not Allowed');
    header('Allow: POST');
    echo json_encode(array('error' => 'Méthode non autorisée'));
}

?>










?>

