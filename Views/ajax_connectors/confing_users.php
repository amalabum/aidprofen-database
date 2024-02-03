<?php
header("Acces-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
header("Acces-Control-Allow-Methods:POST");
header("Acces-Control-max-Age:3600");
header("Acces-Control-Allow-Header:Content-Type,Acces-Control-Allow-Header,Autorization,X-Requested-with");

if($_SERVER['REQUEST_METHOD']=='POST') {
    $MT_QueryInterface = new Crud();
    if(isset($_POST['designation']) && isset($_POST['description']) && isset($_POST['choix_1']) && isset($_POST['choix_2']) && isset($_POST['choix_3']) && isset($_POST['choix_4'])){
        if(!empty($_POST['designation']) 
        && !empty($_POST['description']) 
        && !empty($_POST['choix_1'])
        
     ){

    
            $MT_QueryInterface->Data_design('insert','activites',
                    array(
                    'designation'=>'designation',
                    'description'=>'description',
                    'volet1'=>'choix_1', 
                    'volet2'=>'choix_2', 
                    'volet3'=>'choix_3', 
                    'volet4'=>'choix_4'                  
            ));                   
            $resp=$MT_QueryInterface->response;            
            if($resp==1){
                http_response_code(201);
                echo json_encode([
                 "status"=>201,
                 "message"=>"activité ajoutée avec succès !"                    
                ]);
            } 
            else{
                http_response_code(401);
                echo json_encode([
                 "status"=>401,
                 "message"=>"$resp"                    
                ]);
            }    
        }  
        else{
            
                http_response_code(402);
                echo json_encode([
                 "status"=>402,
                 "message"=>"données en manque"                    
                ]);
            
        }    
    }    
}
else {
    http_response_code(405);
    echo json_encode([
        "status"=>405,
        "message"=>"mathod non autorisée"
    ]);
}

?>