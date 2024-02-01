<?php 
class Crud extends DataControls{
    
    Public $instruct;
    Public $table_name;
    Public $indexs;
    Public $id;
    Public $response;
    public $fetched_datas;
    public $my_flug;
   
    Public function Data_design(string $instruction,string $table_name,
                                 array $values, string $id=null,string $flug=null){
    
 
        $this->instruct=$instruction;
        $this->table_name=$table_name;
        $this->indexs=$values;
        $this->my_flug=$flug;        
        $this->id=$id;
        // 1° tout part de l'action à execter insrtion, supression ou modification
        if($this->instruct == "insert" || $this->instruct == "update" || $this->instruct == "delete"){
            // 2° verifier que la table existe dans la database     
            $this->Control_table($this->table_name);
            if($this->response == true){
                // 3° verifier les colones fournie existent dans la 
                $this->Control_column($this->indexs,$this->table_name); 
                if($this->response == true){
                   //4° verification des issets et 5° Verifions que tous les champs correspondent aux issets
                    if($this->Control_issets($this->indexs) == true && $this->validated_ist == $this->validated_clmns){
                     // echo "datas ares ready for action mentioned";                                           
                        
                        if ($this->instruct == "insert"){
                            $this->validation_actn($this->instruct);
                            if($this->Query_result == true){
                               $this->response= 1;
                                unset($_POST);
                            }
                            else{
                                $this->response= "failed insert"; 
                            }                           
                        }
                        elseif($this->instruct == "update") {
                            $this->validation_actn($this->instruct,$this->id);
                            if($this->Query_result == true ){
                                $this->response = 2 ; 
                               unset($_POST);                              
                            }
                            else{
                                $this->response= "update failed" ;  
                            }                     
                        }  
                        elseif($this->instruct == "delete") {
                            $this->validation_actn($this->instruct,$this->id);
                            if( $this->Query_result == true ){
                                $this->response= "delete success" ;                             
                            }
                            else{
                                $this->response= "delete failed" ;  
                            }   

                        }                   
                    }
                    else{                  
                         $this->response= " Veuillez completer les données à envoyer ";
                    }                  
                }
                elseif ($this->response == false) {
                   $this->response= "Rassurez-vous que toutes les colones renseignées corespondent à la table : $table_name"; 
                }
            }
            elseif($this->response == false){
                $this->response= "Rassurez-vous que la table mentionée appartient à la base des données choisie";
            } 
        }  
        else{
             $this->response= "Requète embigue";
        }
    }

    Public function  Get(string $table_name,int $id=null, array $all_conditions=null){
    

        $this->instruct="get";
        $this->table_name=$table_name;
        $this->conditions=$all_conditions;
        
        $this->id=$id;

        if($this->instruct == "get" ){
            // 2° verifier que la table existe dans la database     
                $this->Control_table($this->table_name);
                if($this->response == true){  
                    if($this->instruct == "get") {

                        $this->calling_datas($this->instruct,$this->id);
                        if( $this->Query_result == true ){
                          // $this->response= "merde" ;                             
                        }
                        // else{
                        //     $this->response= "Impossible de charger les données" ;  
                        // }
                    }                                                 
                }             
                elseif($this->response == false){
                    $this->response= "Rassurez-vous que la table mentionée appartient à la base des données choisie";
                }    
        }      
        else{
          $this->response= "Requète embigue";
        }
        
    }
    Public function  Conditional_Get(string $table_name, array $all_conditions){
    

        $this->instruct="custom_get";
        $this->table_name=$table_name;
        $this->toutes_conditions=$all_conditions;
        
        if($this->instruct == "custom_get" ){
            // 2° verifier que la table existe dans la database     
                $this->Control_table($this->table_name);
                if($this->response == true){  
                    if($this->instruct == "custom_get") {

                        $this->customised_fetch($this->instruct,$this->toutes_conditions);
                        if( $this->Query_result == true ){
                            return $this->fetched_datas;                          
                        }
                        else{
                            $this->response = "Impossible de charger les données" ;  
                        }
                    }                                                 
                }             
                elseif($this->response == false){
                    $this->response= "Rassurez-vous que la table mentionée appartient à la base des données choisie";
                }    
        }      
        else{
          $this->response= "Requète embigue";
        }
        
    }
    Public function  limit_Get(string $table_name, array $limit=null){
    

        $this->instruct="limit_get";
        $this->table_name=$table_name;
        $this->limit_of_fetch=$limit;
        
        if($this->instruct == "limit_get" ){
            // 2° verifier que la table existe dans la database     
                $this->Control_table($this->table_name);
                if($this->response == true){  
                    if($this->instruct == "limit_get") {
                        $this->limited_fetch($this->instruct,$this->limit_of_fetch);
                        if( $this->Query_result == true ){
                            return $this->fetched_datas;                          
                        }
                        else{
                            $this->response = "Impossible de charger les données" ;  
                        }
                    }                                                 
                }             
                elseif($this->response == false){
                    $this->response= "Rassurez-vous que la table mentionée appartient à la base des données choisie";
                }    
        }      
        else{
          $this->response= "Requète embigue";
        }
        
    }
}

?>