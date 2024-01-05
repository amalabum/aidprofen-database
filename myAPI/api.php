<?php
header('Content-Type: application/json');
header('Accept: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT');
header('Access-Control-Allow-Headers: Origin, Authorization, Content-Type, Accept');

if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
    $dataFromKobo = json_decode(file_get_contents('php://input'), true);

    if ($dataFromKobo != null) {
        if (json_last_error() == JSON_ERROR_NONE) {
            echo json_encode(array('message' => 'Données reçues avec succès'));
            http_response_code(200);

            $logFilePath = '/myAPI/datas.log';
            file_put_contents($logFilePath, "Données reçues : " . print_r($dataFromKobo, true) . PHP_EOL, FILE_APPEND);
        } else {
            http_response_code(400); 
            echo json_encode(array('error' => 'Erreur lors du décodage JSON.'));
            exit;
        }
    } else {
        echo json_encode(array('message' => 'En attente des données...'));
    }
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    header('Allow: POST');
    echo json_encode(array('error' => 'Méthode non autorisée'));
}
?>
