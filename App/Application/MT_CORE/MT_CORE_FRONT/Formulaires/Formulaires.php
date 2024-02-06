<?php
Class Formulaires {       
      Public $_crud_provider;
      Public $_titre_du_formulaire;
      Public $_informations_sur_les_champs;   
      Public $_noms_des_buttons;
      Public $_action;
      Public $_tag;
      Public $_id;
      /**
       * __construct__
       *
       * @param  mixed $crud_provider_var
       * @return void
       */
      Public function __construct($crud_provider_var){
        $this->_crud_provider=$crud_provider_var;    
      }      
      /**
       * MT_StandardTableV1
       *
       * @param  mixed $taged_table
       * @param  mixed $config
       * @param  mixed $taged_labels
       * @param  mixed $taged_actions
       * @return void
       */
    Public function MT_StandardFormsV1(string $action,string $titre_du_formulaire,array $informations_sur_les_champs,array $noms_des_buttons,$tag=null){
    $this->_titre_du_formulaire=$titre_du_formulaire;
    $this->_informations_sur_les_champs=$informations_sur_les_champs;   
    $this->_noms_des_buttons=$noms_des_buttons;
    $this->_action=$action;
    $this->_tag=$tag;
echo "<div class='card'>                                                   
       <div class='card-header'>
        <h5>".$this->_titre_du_formulaire."</h5>
       </div>
       <div class='card-block'>
        <form class='form-material' action=".$this->_action." method='POST' enctype='multipart/form-data' id=".$this->_action.">";
                     
        $unik_key_witinitialesh_project_code="aid_";
        $this->_crud_provider->limit_Get("aidprofen_rapports_activites_all",array("Code_activite"=>2000));
        $all_activites = $this->_crud_provider->fetched_datas;
        $number_n=count($all_activites);
        $number_n++;
        $uniqueNumber = substr(uniqid(), 0, 10);
        $uniqueNumber.=$number_n;
        $unik_key_witinitialesh_project_code.= $uniqueNumber;
        echo"<input type='text' name='code_unik_activ' value=".$unik_key_witinitialesh_project_code." class='form-control d-none' id='projet' />";
        foreach($this->_informations_sur_les_champs as $informations):
            if($informations[0]=="text" || $informations[0]=="date" || $informations[0]=="number" || $informations[0]=="password" ){
                echo "<div class='form-group form-default '>";
                        if($informations[3]=="debut_activite"){
                           echo "<label style='font-size:9px;'>Debut de l'activité</label>";
                        }
                        elseif($informations[3]=="fin_activite"){
                           echo "<label style='font-size:9px;'>Fin de l'activité</label>";
                        } 
                echo "  <input type=".$informations[0]." id=".$informations[1]." name=".$informations[1]." class='form-control' > </input>
                        <span class='form-bar'></span>
                        <label class='float-label'>".$informations[2]."</label>
                        <div id=".$informations[4]." class='col-form-label' style='font-size:9px; color:#FC7777;'>evitez les erreur à tout prix</div>
                      </div>";
                        if($informations[1]=="pass2"){
                         echo"<div id='passwd' class='col-form-label' style='font-size:12px; color:#FC7777; margin-top:-20px !important;'>les deux mots de pass ne correspondent pas</div>";
                        }
             } 
             elseif($informations[0]=="select"){
                echo "
                <div class='form-grouprow mb-4' style='border-bottom:0.5px solid #E6E6E6;'>
                <label style='font-size:11px;'>".$informations[2]."</label>
                        <select id=".$informations[1]." name=".$informations[1]." class='form-control' ".$informations[5].">
                                  "; 
                                   
                                  if($informations[5]== 0){
                                    echo "<option selected value='RAS'>un autre choix</option>"; 
                                  }
                                  else{
                                     echo"<option value=''>Choisir ---</option>";  
                                  }
                                   
                                   foreach ($informations[3] as $key => $value) {
                                    echo "<option value=".$key.">".$value."</option>";
                                   }
                echo " </select>                                
                </div>";
              if($informations[4] != "d-none") {
                echo"
                <div id=".$informations[4]." class='col-form-label' style='font-size:9px;color:#FC7777;'>evitez les erreur à tout prix</div>
                "; 
              } 
                         
                
             }     
            ?>                
             <?php                                                             
         endforeach;             
        echo"<div class='row form-group container mt-3'>
         <div class='mr-3'>
            <span id='progress'  class='btn' style='border-radius:3px;background:#F7F7F7;text-transform:lowercase; border:1px dashed #3498DB; color:#1B1B1B; display:none;'> <img src='Views/applets/assets/images/gifs/gif2.gif'style='border-radius:50%;' width='25px'> traitement en cours...</span>
            <button type='submit' id=".$this->_noms_des_buttons[0]." class='btn' style='border-radius:5px;'>".$this->_noms_des_buttons[1]."</button>  
         </div>   
         <div class=''>                                       
            <a href=".$this->_noms_des_buttons[3]." id=".$this->_noms_des_buttons[2]."  class='btn' style='border-radius:5px;background:#05CFB3;color:#F7F7F7;display:none;'>".$this->_noms_des_buttons[4]."</a>                         
         </div> 
         </div> 
        </form>
    </div>
  </div>";       
      
}   
       /**
        * MT_StandardFormsV2 le formulaire est plus dynamique et precis que la version precedande
        *
        * @param  mixed $action
        * @param  mixed $titre_du_formulaire
        * @param  mixed $informations_sur_les_champs
        * @param  mixed $noms_des_buttons
        * @param  mixed $tag
        * @return void
        */
       Public function MT_StandardFormsV2(string $action,string $titre_du_formulaire,array $informations_sur_les_champs,array $noms_des_buttons,$tag=null){
         $this->_titre_du_formulaire=$titre_du_formulaire;
         $this->_informations_sur_les_champs=$informations_sur_les_champs;   
         $this->_noms_des_buttons=$noms_des_buttons;
         $this->_action=$action;
         $this->_tag=$tag;
   echo "<div class='card'>                                                   
            <div class='card-header'>
             <h5>".$this->_titre_du_formulaire."</h5>
            </div>
            <div class='card-block'>
             <form class='form-material' action=".$this->_action." method='POST' enctype='multipart/form-data' id=".$this->_action.">";
                          
             $unik_key_witinitialesh_project_code="aid_";
             $this->_crud_provider->limit_Get("aidprofen_rapports_activites_all",array("Code_activite"=>2000));
             $all_activites = $this->_crud_provider->fetched_datas;
             $number_n=count($all_activites);
             $number_n++;
             $uniqueNumber = substr(uniqid(), 0, 10);
             $uniqueNumber.=$number_n;
             $unik_key_witinitialesh_project_code.= $uniqueNumber;
             echo"<input type='text' name='code_unik_activ' value=".$unik_key_witinitialesh_project_code." class='form-control d-none' id='projet' />";
             foreach($this->_informations_sur_les_champs as $informations):
                 if($informations['type']=="text" || $informations['type']=="date" || $informations['type']=="number" || $informations['type']=="password" ){
                     echo "<div class='form-group form-default '>";
                             if($informations['tag']=="debut_activite"){
                                echo "<label style='font-size:9px;'>Debut de l'activité</label>";
                             }
                             elseif($informations['tag']=="fin_activite"){
                                echo "<label style='font-size:9px;'>Fin de l'activité</label>";
                             } 
                     echo "  <input type=".$informations['type']." id=".$informations["id"]." name=".$informations["id"]." class='form-control' > </input>
                             <span class='form-bar'></span>
                             <label class='float-label'>".$informations["titre"]."</label>
                             <div id='".$informations['id_feedback']."' class='col-form-label' style='font-size:9px; color:#FC7777;'>evitez les erreur à tout prix</div>
                           </div>";
                             if($informations["id"]=="pass2"){
                              echo"<div id='passwd' class='col-form-label' style='font-size:12px; color:#FC7777; margin-top:-20px !important;'>les deux mots de pass ne correspondent pas</div>";
                             }
                  } 
                  elseif($informations['type']=="select"){
                     echo "
                     <div class='form-grouprow mb-4' style='border-bottom:0.5px solid #E6E6E6;'>
                     <label style='font-size:11px;'>".$informations["titre"]."</label>
                             <select id=".$informations["id"]." name=".$informations["id"]." class='form-control' ".$informations['tag'].">
                                       "; 
                                        
                                       if($informations['data']== 0){
                                         echo "<option selected value='RAS'>un autre choix</option>"; 
                                       }
                                       else{
                                          echo"<option value=''>Choisir ---</option>";  
                                       }
                                        
                                        foreach ($informations['data'] as $key => $value) {
                                         echo "<option value=".$key.">".$value."</option>";
                                        }
                     echo " </select>                                
                     </div>";
                   
                     echo"
                     <div id=".$informations['id_feedback']." class='col-form-label' style='font-size:9px;color:#FC7777;'>evitez les erreur à tout prix</div>
                     "; 
                  
                              
                     
                  }     
                  ?>                
                 <?php                                                             
              endforeach; 
            $href_container = $this->_noms_des_buttons["href"];
             echo"<div class='row form-group container mt-3'>
              <div class='mr-3'>
                 <span id='progress'  class='btn' style='border-radius:3px;background:#F7F7F7;text-transform:lowercase; border:1px dashed #3498DB; color:#1B1B1B; display:none;'> <img src='Views/applets/assets/images/gifs/gif2.gif'style='border-radius:50%;' width='25px'> traitement en cours...</span>
                 <button type='submit' id=".$this->_noms_des_buttons[0]." class='btn' style='border-radius:5px;'>".$this->_noms_des_buttons[1]."</button>  
              </div>   
              <div class=''>"; 

               ?>

               <a class='dropdown-item'
               href='<?php echo $href_container["taged_page"]?>?<?php
                 foreach ($href_container[0] as $key =>$value):
                    echo $key;
                    echo "=";                    
                    echo $value;
                    echo "&'";
                 endforeach;            
               echo " id=".$this->_noms_des_buttons['id_actionadditionnelle']."
               class='btn btn-danger' style='border-radius:5px;background:#05CFB3;color:#F7F7F7;display:none;'
               >";
               echo $this->_noms_des_buttons["nom_etape_suivante"]; 
               ?>
               </a>
               


              <?php
              echo" 
              </div> 
              </div> 
             </form>
         </div>
       </div>";       
           
    }  
    
}