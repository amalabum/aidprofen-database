<?php
Class StandardTable {
      Public $_crud_provider;      
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
      Public function MT_StandardTableV1(string $taged_table,array $config,array $taged_labels,array $taged_actions){
        ?> 
                  <div class="card col-12">
                   <div class="card-body">
                     <h4 class="card-title"><?php echo $config[2]; ?></h4>
                     <p class="card-description">
                     <?php echo $config[2]; ?> <code><?php echo $config[3]; ?></code>
                     </p>
                     <div class="table-responsive">
                       <table class="table table-striped">
                         <thead>
                           <tr>
                             <?php 
                               foreach ($taged_labels as $labels):
                             ?>
                             <th><?php echo $labels ?></th>
                             <?php     
                              endforeach;
                             ?> 
                           </tr>
                         </thead>
                         <tbody>
                           <?php 
                               $value=$config[1];
                               $tag1=$config[0];
                               $this->_crud_provider->limit_Get($taged_table, array($tag1=>$value));
                               $results = $this->_crud_provider->fetched_datas; 
                               if($results==null){
                                 echo "aucune donnée disponible";
                               }
                               else{
                          foreach ($results as $data):   
                           ?>
                           <tr>
                             <td class="py-1">
                              
                               <img src="Views/images/faces/face1.jpg" alt="image">
                             </td>
                             <td>
                             <?php
                               $column1=$taged_labels[1];
                               echo $data[$column1];
                             ?>
                             </td>
                             <td>                       
                             <?php
                               $column2=$taged_labels[2];
                               echo $data[$column2];
                             ?>
                             </td>
                             <td>                            
                            
                             </td>
                             <td>
                              <!-- <div class="dropdown">
                               <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                               </button>
                               <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" style="">  </div>
                              </div> -->
                                 <?php 
                                  foreach ($taged_actions as $labels):
                                 ?>
                                 <a class="dropdown-item" href="#"><?php echo $labels ?></a>
                                 <?php     
                                  endforeach;
                                 ?> 
                                 
                             </td>
                           </tr>
                           <?php     
                              endforeach;
                             }
                             ?>
                         </tbody>
                       </table>
                     </div>
                   </div>
                 </div>
           <?php      
       }
       Public function MT_StandardTableV2(string $taged_table,array $config,array $taged_colones,array $taged_labels,array $taged_actions){
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5; // Nombre d'éléments à charger par page
        $start = ($page - 1) * $limit;
        ?> 
          <div class="card table-card">
       <div class="card-header">
           <h5><?php echo $config[2]; ?></h5>
           <div class="card-header-right">
               <ul class="list-unstyled card-option">
                   <li><i class="fa fa fa-wrench open-card-option"></i></li>
                   <li><i class="fa fa-window-maximize full-card"></i></li>
                   <li><i class="fa fa-minus minimize-card"></i></li>
                   <li><i class="fa fa-refresh reload-card"></i></li>
                   <li><i class="fa fa-trash close-card"></i></li>
               </ul>
           </div>
       </div>
       <div class="card-block">
           <div class="table-responsive">
               <table class="table table-hover">
                   <thead>
                   <tr>
                       <!-- <th>
                           <div class="chk-option">
                               <div class="checkbox-fade fade-in-primary">
                                   <label class="check-task">
                                       <input type="checkbox" value="">
                                       <span class="cr">
                                               <i class="cr-icon fa fa-check txt-default"></i>
                                           </span>
                                   </label>
                               </div>
                           </div>
                           ...</th> -->
                           <?php 
                               foreach ($taged_labels as $labels):
                             ?>
                             <th><?php echo $labels ?></th>
                             <?php     
                              endforeach;
                             ?>
                       <!-- <th class="text-right">Priority</th> -->
                   </tr>
                   </thead>
                   <tbody>

                   <?php 
                               $value=$config[1];
                               $tag1=$config[0];
                               $this->_crud_provider->limit_Get($taged_table, array($tag1=>$value));
                               $results = $this->_crud_provider->fetched_datas; 

                                   // Définir les données à paginer
                              //  $data = ['Item 1', 'Item 2', 'Item 3', 'Item 4', 'Item 5', 'Item 6', 'Item 7', 'Item 8', 'Item 9', 'Item 10'];

                              //  // Récupérer le numéro de page à partir de l'URL (par défaut, 1)
                               $page_name=$config[5];
                               $page = isset($_GET["page"]) ? $_GET["page"] : 1;
                               // Nombre d'éléments à afficher par page
                               $limit = $config[4];
                               // Calculer l'index de départ
                               $start = ($page - 1) * $limit;

                               $paginatedData = array_slice($results, $start, $limit);
                                // foreach ($paginatedData as $item) {
                                // echo '<p>' . $item . '</p>';
                                // }


                               if($results==null){
                                 echo "aucune donnée disponible";
                               }
                               else{
                          foreach ($paginatedData as $data):   
                           ?>
                            <tr>
                       <td>
                           <div class="chk-option">
                               <div class="checkbox-fade fade-in-primary">
                                   <label class="check-task">
                                       <input type="checkbox" value="">
                                       <span class="cr">
                                                   <i class="cr-icon fa fa-check txt-default"></i>
                                               </span>
                                   </label>
                               </div>
                           </div>
                           <div class="d-inline-block align-middle">
                               <?php
                               if($config[3]=="user"){
                                echo "<img src='Views/applets/assets/images/avatar-4rr.jpg' class='img-radius img-40 align-top m-r-15'>";
                              }
                             ?>
                               <div class="d-inline-block">
                                   <h6><?php
                               $column0=$taged_colones[0];
                               echo $data[$column0];
                             ?></h6>
                                   <p class="text-muted m-b-0"><?php
                               $column1=$taged_colones[1];
                               
                               substr_customised($data[$column1],30);
                             ?></p>
                               </div>
                           </div>
                       </td>
                       <td><?php
                              $column2=$taged_colones[2];
                              if($column2="-"){
                               echo "__";
                              }
                              else{
                                echo $data[$column2];
                              }
                               
                             ?>
                        </td>                       
                       <td>
                <div class="dropdown-danger dropdown open">
                    <button class="btn btn-danger dropdown-toggle waves-effect waves-light" style="border-radius:10px;" type="button" id="dropdown-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ti-settings"></i></button>
                    <div class="dropdown-menu" aria-labelledby="dropdown-6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                    <?php 
                                foreach ($taged_actions as $params_configs):
                                     
                                 ?>
                                 <a class="dropdown-item" 
                                 href="<?php echo $params_configs[1]?>?<?php
                                   foreach ($params_configs[2] as $keys => $values):
                                      echo $keys;
                                      echo "=";
                                      echo $data[$values];
                                      echo "&";
                                   endforeach;
                                 ?>
                                 "><?php echo $params_configs[0]?></a>
                                 <?php    
                                    
                                  endforeach;
                                 ?> 

</div>
                </div>
                
        

                       </td>
                   </tr>
                   <?php     
                              endforeach;
                             }
                             ?>


                 
                   
                   </tbody>
               </table>
                
           </div>
           <!-- <div id="content"> -->
    <?php //include('fetch_data.php'); ?>
    <!-- </div> -->
    <div class="row container-fluid ml-2">
      
    <?php 
       
          if ($page > 1){ ?>
    <a  class="btn waves-effect waves-light btn-grd-success" style="border-radius:8px;" href="<?php echo $page_name;?>?page=<?php echo $page - 1; ?>">Précedant</a>
    <?php }
    // Afficher les valeurs pour débogage
    
    if (($start + $limit) < count($results)) {?>
      <a class="btn waves-effect waves-light btn-grd-inverse ml-2" style="border-radius:8px;" href="<?php echo $page_name;?>?page=<?php echo $page + 1; ?>">Suivant</a>
      <?php   }     
    ?>
    <!--  -->
    </div>
       </div>
   </div>
           <?php      
       }
       
}