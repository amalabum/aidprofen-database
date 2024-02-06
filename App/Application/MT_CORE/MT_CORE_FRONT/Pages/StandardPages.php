<?php
Class StandardPages {
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

    public function  Model_pagesv1($relais_Headers,$function_formulaire,$form_manager,$form_completion,$ajax_manager){
        e_('<!DOCTYPE html>
        <html lang="en">'); 
        require "Views/required_files/includes/head.php";       
        e_('<body>');
        //require  "Views/required_files/includes/Custom_includes/Preloads.php";
             
        e_('<div id="pcoded" class="pcoded">
             <div class="pcoded-overlay-box"></div>
               <div class="pcoded-container navbar-wrapper">');
             require "Views/required_files/includes/header.php";           
              e_('<div class="pcoded-main-container">
                    <div class="pcoded-wrapper">');             
                        require "Views/required_files/includes/sidebar.php"; 
                    e_('<div class="pcoded-content">');
                         $title="structures"; //t1 param1
                         $subtitle="BWEREMANA"; // t1 param 2 
                         $autre_infos="MASCULINITE POSITIVE"; //t1 param 3
                         $relais_Headers->ContextualHeader($title,"$subtitle/$autre_infos");
                         e_('   <!-- Page-header end -->
                          <div class="pcoded-inner-content">
                             <!-- Main-body start -->
                             <div class="main-body">
                                 <div class="page-wrapper">
                                     <!-- Page-body start -->
                                         <div class="page-body">');
                                         echo $function_formulaire($form_manager,$form_completion);
                                     e_('</div>
                                  </div>
                               </div>
                          </div>
                       </div>
                    </div>
               </div>
              </div>');
              require "Views/required_files/includes/Custom_includes/javascriptIncusions.php";  
              echo $ajax_manager($form_completion);                
        e_('</body>
        </html>');
    }
}