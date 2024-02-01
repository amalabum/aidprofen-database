<?php 
class Querys  extends DataBase{
    Public $DB_result;
    Public $Query_result;
    public $Query_label;
    Public $Query_flag;
    public $id; 

    Public function Query( int $flag,$instruction=null,$id=null){

        $this->db_conneted =  $this->db_con();
        if($flag==1){
            $query = " SELECT table_name FROM information_schema.tables WHERE table_schema = '".$this->dbname."'";
            $recup_ds= $this->db_conneted ->prepare($query);
            $recup_ds->execute();
            $this->DB_result = $recup_ds->fetchAll();
        }
        elseif($flag==2){
            $query = " SELECT column_name FROM information_schema.columns WHERE table_schema = '".$this->dbname."' and table_name = '".$this->curent_table."'";
            $recup_ds= $this->db_conneted ->prepare($query);
            $recup_ds->execute();
            $this->DB_result = $recup_ds->fetchAll();
        }
        elseif ($flag == 3 && $instruction == "insert") {
            $counted= count($this->validated_columns);
            $countedn= count($this->validated_columns);
            $i=0; $z=0; $n=0;
            $query = ("INSERT into ".$this->curent_table." (");

             foreach ($this->validated_columns as $colone) {
                $i++;
                ($counted != $i) ? $query .= "$colone, " : $query .= "$colone";                
             }
             $query .= ") values (";

             foreach ($this->indexs as $key => $data):
                $n++;
                
                 if(isset($_POST[$data])){  
                    
                  if ($key == "password"){
                        $d_data=sha1($_POST[$data]);
                  }
                  else{
                    $d_data=$_POST[$data];
                  }
                               
                
                    if($countedn != $n){
                           $query .= "'".addcslashes($d_data,'\'')."'," ;
                    }
                     else{
                           $query .= "'".addcslashes($d_data,'\'')."'" ;
                     }                 
                
                 } 
                 elseif(isset($_FILES[$data])) {
                     $d_data=$_FILES[$data]; 
                     $fichier=$_FILES[$data]["name"];
                     $extenssion=pathinfo($fichier,PATHINFO_EXTENSION);
                     $accepted_extenssions= array ('mp3','MP3','mp4','MP4','jpeg','jpg','JPEG','jpg','PNG','png','GIF','gif');
                     if(in_array($extenssion,$accepted_extenssions)) {

                        if($extenssion=='mp3' || $extenssion=='MP3' || $extenssion=='MP4' || $extenssion=='mp4'){                          
                               
                             $img_control= $_FILES[$data];  

                              $podcast = new move_podcast();
                              move_podcast::upload($img_control);
                              $uplaod_status=move_podcast::$upload_cod;                           

                               if($uplaod_status==1) {
                                    $file_to_upload = move_podcast::$name_to_up;
                               }
                               else{
                                $this->Query_result =false;
                               }
                        }
                       else{
                       $imagecompress_insert= new Upload($d_data,'Views/API/Uploads/');  
                       $file_to_upload= $imagecompress_insert->Compreser_mono(600);   
                       }

                       if($countedn != $n){
                           $query .= "'".addcslashes($file_to_upload,'\'')."'," ;
                        }
                        else{
                           $query .= "'".addcslashes($file_to_upload,'\'')."'" ;
                        }    
                    } 
                    else{
                      return $this->Query_result=false;  
                    }
                     
                            
                 }   

             endforeach;

             $query .= ")"; 

             $recup_ds= $this->db_conneted ->prepare($query);
             $exec = $recup_ds->execute();  
             if ($exec) {
               return $this->Query_result=true;
             }
             else {
               $this->Query_result =false;
             }
        }

        elseif($flag == 3 && $instruction == "update" && !empty($id)){
            $flag_column=$this->my_flug; 
            $qry_up = "SELECT * from " .$this->curent_table. " where $flag_column = '$id' "; 
            $stmt=$this->db_conneted ->prepare($qry_up);
            $stmt->execute(); 
            $items = $stmt->fetchAll(); 
            
            

        
         if ($items != null) {
              $counted_c= count($this->indexs);
              $x=0;           
              $query_update = ("UPDATE " .$this->curent_table. " set ");  

            foreach ($this->indexs as $key => $value):

                $x++;
                if(isset($_POST[$value])){                     
                    
                    $qry_n = "SELECT * from " .$this->curent_table. " where $flag_column = '$id' "; 
                    $stmnt=$this->db_conneted ->prepare($qry_n);
                    $stmnt->execute(); 
                    $default = $stmnt->fetchAll(); 
                    $array = $default[0];
                    $default_value= $array[$key];      
                    echo "<br>";                    
                    if($array == null){
                      $string = "$key = '". addcslashes($default_value,'\'')."'";
                    }
                    elseif($array != null){
                       if ($key == "password"){
                            $k_value = sha1($_POST[$value]);
                        }
                        else{
                            $k_value = $_POST[$value]; 
                        }
                        $string = "$key = '". addcslashes($k_value,'\'')."'";
                    }                                
                
                } 
                elseif(isset($_FILES[$value])) {

                     //determination de l'etat du fichier, c'est un audio ou une image
                     $d_data=$_FILES[$value]; 
                     $fichier=$_FILES[$value]["name"];
                     $extenssion=pathinfo($fichier,PATHINFO_EXTENSION);
                     $accepted_extenssions= array ('mp3','MP3','mp4','MP4','jpeg','jpg','JPEG','jpg','PNG','png','GIF','gif');
                    $qry_n = "SELECT * from " .$this->curent_table. " $flag_column = '$id' "; 
                    $stmnt=$this->db_conneted ->prepare($qry_n);
                    $stmnt->execute(); 
                    $default = $stmnt->fetchAll(); 
                    $array=$default[0];
                    $default_value= $array[$key];
                    if(in_array($extenssion,$accepted_extenssions)) {
                        
                        if($extenssion=='mp3' || $extenssion=='MP3' || $extenssion=='MP4' || $extenssion=='mp4'){ 
                              $img_control= $_FILES[$value];                               
                              $podcast = new move_podcast();
                              move_podcast::upload($img_control);
                              $uplaod_status=move_podcast::$upload_cod;                           

                               if($uplaod_status==1) {
                                    $file_to_upload = move_podcast::$name_to_up;                                       
                               }
                               else{
                                $this->Query_result =false;
                               }
                        } 
                        elseif($extenssion=='jpg' || $extenssion=='JPG' || $extenssion=='png' || $extenssion=='PNG' || $extenssion=='gif' || $extenssion=='GIF'){
                        $imagecompress_insert= new Upload($d_data,'Views/API/Uploads/');  
                        $file_to_upload = $imagecompress_insert->Compreser_mono(600);  
                                           
                        }                         
                        else{
                             return $this->Query_result = false;
                        } 
                        // conclusion de l'insertion
                          if($array == null){
                             $string = "$key = '". addcslashes($default_value,'\'')."'";
                          }
                          elseif($array != null){
                            $k_value=$_FILES[$value];                     
                            $string = "$key = '". addcslashes($file_to_upload,'\'')."'";
                          }            
                    }  

                                    
                    }   
                  
             if($counted_c != $x){
                            $query_update .= "".$string. ", ";
                    }
                    else{
                            $query_update .=  "".$string."";
                    }
            endforeach;     
            $flag_column=$this->my_flug;     
            $query_update .= " where $flag_column = '$id' ";     

            $update= $this->db_conneted ->prepare($query_update);
            $update_rekst= $update->execute();  


              if($update_rekst){
                
                 return $this->Query_result = true;
              }   
              else{
                return $this->Query_result = false;
              }          
          }

        }    
        elseif($flag == 3 && $instruction == "delete" && !empty($id)){
           
            $qry2 = "SELECT * from " .$this->curent_table. " where id= $id "; 
            $stmt=$this->db_conneted ->prepare($qry2);
            $stmt->execute(); 
            $items = $stmt->fetchAll(); 
        
            if ($items != null) {
              $qry3 = "DELETE from ".$this->curent_table." where id= $id "; 
              $stmt = $this->db_conneted ->prepare($qry3);
              $request = $stmt->execute();
              if($request){
                 return $this->Query_result = true;
              }   
              else{
                return $this->Query_result = false; 
              }          
            }
          
        }
    
        return $this->Query_result ;

    }
    // Public function Select(string $table_name, int $key=null){
        
    //     if($key==null){
    //         $query = "SELECT * from ".$this->table_name." ORDER BY Id_activite DESC ";
    //         $stmt=$this->db_conneted->prepare($query);
    //         $stmt->execute(); 
    //         $returns= $stmt->fetchAll(); 
    //         $this->response = $returns;
    
    //     }
    //     elseif($key!=null){
          
    //         $query = "SELECT * from ".$this->table_name. " where id=$key ORDER BY id DESC";
    //         $stmt=$this->db_conneted->prepare($query);
    //         $stmt->execute(); 
    //         $return= $stmt->fetchAll(); 
    //         $this->response = $return; 
    //     }       
    // }
    Public function Select_2(string $table_name, array $conditions){  
         // récuperation des cles et de valeurs 
          foreach ($conditions as $key => $value):
            
            $query = "SELECT * from ".$this->table_name." where  $key  = '$value' ";
             $stmt=$this->db_conneted->prepare($query);
            $stmt->execute(); 
            $return= $stmt->fetchAll(); 
            $this->fetched_datas = $return;
            
          endforeach;
          
     
    }
      Public function Select_with_limit(string $table_name, array $ref_limite){  
       
          foreach ($ref_limite as $order_by_column => $limit_index):
            
            $query = "SELECT * from ".$this->table_name." ORDER BY $order_by_column DESC limit $limit_index ";
            $stmt=$this->db_conneted->prepare($query);
            $stmt->execute(); 
            $return= $stmt->fetchAll(); 
            $this->fetched_datas = $return;

            
          endforeach;
          
     
    }
}
?>