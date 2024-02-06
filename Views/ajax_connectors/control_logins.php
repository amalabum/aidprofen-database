<?php
session_start();
header("Acces-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
header("Acces-Control-Allow-Methods:POST");
header("Acces-Control-max-Age:3600");
header("Acces-Control-Allow-Header:Content-Type,Acces-Control-Allow-Header,Autorization,X-Requested-with");

if($_SERVER['REQUEST_METHOD']=='POST') {
    $MT_QueryInterface = new Crud();
    if(isset(($_POST['mail'])) && isset($_POST['password'])){
        if(!empty($_POST['mail']) 
        && !empty($_POST['password']) 
     ){        
        $DataBased = new DataBase();
// $db = $DataBased->db_con();
// var_dump($db);
$mail =$_POST['mail']; 
$password =$_POST['password'];
$sql = "SELECT * FROM staff WHERE passwords = :pass and email = :mail ";
$stmt = $DataBased->db_con()->prepare($sql);
$stmt->execute(array(':pass' => $password,':mail' => $mail));

$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);


            if( $datas != null){  
                $agent=$datas[0];
                $_SESSION['loggedin'] = true;
                $_SESSION["identifent_ag"] =  $agent["id_agent"];
                $_SESSION["projet"] =  $agent["projet"];
                $_SESSION["nom"] =  $agent["nom"];
                $_SESSION["postnom"] =  $agent["post_nom"];
                $_SESSION["fonction"] =  $agent["fonction"];
                $_SESSION["email"] =  $agent["email"];      
                http_response_code(201);
                echo json_encode([
                 "status"=>201,
                 "message"=>"connected"                    
                ]);
            }        
            else{
                http_response_code(202);
                echo json_encode([
                 "status"=>202,
                 "message"=>"erreur lors de la connection"                   
                ]);
            }    
        }  
        else{
            
                http_response_code(1000);
                echo json_encode([
                 "status"=>10000,
                 "message"=>"erreur"                    
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