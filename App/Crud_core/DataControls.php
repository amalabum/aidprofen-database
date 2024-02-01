<?php 
class DataControls extends Querys {
    
    public $curent_table;
    public $db_conneted;
    Public $response;
    Public $message;

    Public $tables_exist = array();
    Public $colums_indicated;
    Public $colum_s_indicated=array();
    Public $validated_columns=array();

    Public $mycolums;
    Public $issets_s_indicated=array();
    Public $validated_issets=array();

    Public $validated_clmns;
    Public $indicated_clmns;

    Public $validated_ist;
    Public $indicated_ist;

    Public function Control_table(string $table){
      
        $this->db_conneted =  $this->db_con();
        $this->Query(1);   
        $tables=array($this->DB_result);
        foreach ($tables as $tab) {
            foreach ($tab as $data) {          
               $toutes_les_tables[]=$data['table_name'];             
            }
        }  
        if (in_array($this->curent_table=$table,$toutes_les_tables)) {
            // etape 2 validée
            return $this->response=true;      
        }
        elseif(!in_array($this->curent_table=$table,$toutes_les_tables)){
           // etape 2 non validée   
             return $this->response=false;     
        }       
    }
    Public function Control_column(array $colones, string $table_indicated){ 

      $this->db_conneted =  $this->db_con();
        $this->colum_s_indicated=$colones;
        $this->curent_table=$table_indicated;      
        $this->Query(2);
        // recuperation de toutes les colones         
        $colums=array($this->DB_result);
        foreach ($colums as $tab) {
            foreach ($tab as $data) {          
               $toutes_les_colones[]=$data['column_name'];            
            }
        }
       foreach ($this->colum_s_indicated as $colone_indiqued =>$isset_indiqued):     
         if (in_array($colone_indiqued,$toutes_les_colones)) {
            $this->validated_columns[]=$colone_indiqued; 
         }
         elseif(!in_array($colone_indiqued,$toutes_les_colones)) {
           /// echo  "la colone $colone_indiqued n'existe pas ";
            return $this->response=false;               
         }
       endforeach;
        
        $this->validated_clmns=count($this->validated_columns);
        $this->indicated_clmns=count($this->colum_s_indicated);
        
        if($this->validated_clmns == $this->indicated_clmns){     
          return $this->response=true;
        }
        elseif($this->validated_clmns != $this->indicated_clmns){     
          return $this->response=false;
        }
    }  
    Public function Control_issets( array $index_s){  
        $this->db_conneted = $this->db_con();
        $this->issets_s_indicated=$index_s;     
       foreach ($this->issets_s_indicated as $colone_indiqued =>$isset_indiqued):  

         if(isset($_POST[$isset_indiqued])){

            $myisset=$_POST[$isset_indiqued];
             if(empty($myisset)){
                 return $this->response= false;
             }
            
            $this->validated_issets[]=$myisset;

         }
         elseif(isset($_FILES[$isset_indiqued])){

            $myisset=$_FILES[$isset_indiqued];
             if(empty($myisset)){
                 return $this->response= false;
             }
            $this->validated_issets[]=$myisset;           
            
         }
         elseif(!isset($_POST[$isset_indiqued]) || !isset($_FILES[$isset_indiqued])){
            return $this->response=false;               
         }

       endforeach;     

       $this->validated_ist = count($this->validated_issets);
       $this->indicated_ist  = count($this->issets_s_indicated);
       if($this->validated_ist == $this->indicated_ist){
          return $this->response=true;
       }
       elseif($this->validated_ist != $this->indicated_ist){
          return $this->response=false;
       }

    }  
   public function validation_actn($_instruct,string $_id =null){

      if($_instruct == "insert" ){

         if(!empty($this->curent_table) && $this->validated_clmns == $this->validated_ist){
           $this->Query(3,$_instruct); 
           $this->Query_result ;
         }
      }
      elseif($_instruct != "insert"){

         if(!empty($this->curent_table)){
           $this->Query(3,$_instruct,$_id); 
           $this->Query_result ;
         }
      }     
   }
   Public function calling_datas($instruction, string $_id=null,array $conditions=null){
      if($instruction=="get" && !empty($this->curent_table) && $_id ==null ){
          $this->Select($this->curent_table);        
      }
      elseif($instruction=="get" && !empty($this->curent_table) && $_id !=null ){
          $this->Select($this->curent_table,$_id);
      }
      else{
         return $this->response=false;
      }
      
   }
   // recuperation des données avec possibilité d'avoir plusieurs conditions
   Public function customised_fetch($instruction,array $conditions=null){
      if($instruction =="custom_get" && !empty($this->curent_table)){
          $this->Select_2($this->curent_table,$conditions);         
      }   
      else{         
      }   
   }
      Public function limited_fetch($instruction,array $limit_and_ref=null){
      if($instruction =="limit_get" && !empty($this->curent_table)){
         $this->Select_with_limit($this->curent_table,$limit_and_ref);        
      }   
      else{         
      }   
   }
}
?>