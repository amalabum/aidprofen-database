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
                              <div class="dropdown">
                               <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                               </button>
                               <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" style="">
                                 <?php 
                                  foreach ($taged_actions as $labels):
                                 ?>
                                 <a class="dropdown-item" href="#"><?php echo $labels ?></a>
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
                   </div>
                 </div>
           <?php      
       }
   
}