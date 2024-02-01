<?php
class Headers{
    public $_title;
    public $_subtitle;
    public $_link;

    Public function ContextualHeader($MT_title,$MT_subtitle,$MT_link=null){
       $this->_title=$MT_title;
       $this->_subtitle=$MT_subtitle;
       $this->_link=$MT_link;

       echo"     <div class='page-header'>
                          <div class='page-block' style='background-image:url('Views/applets/assets/images/pdis.webp');
                          background-repeat:no-repeat; background-size:container;'>
                              <div class='row align-items-center'>
                                  <div class='col-md-8'>
                                      <div class='page-header-title'>
                                          <h5 class='m-b-10'>".$this->_title."</h5>
                                          <p class='m-b-0'>".$this->_subtitle."</p>
                                      </div>
                                  </div>
                                  <div class='col-md-4'>
                                      <ul class='breadcrumb-title'>
                                          <li class='breadcrumb-item'>
                                              <a href='index.html'> <i class='fa fa-home'></i> </a>
                                          </li>
                                          <li class='breadcrumb-item'><a href='".$this->_link."'>Dashboard</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                        </div>";


    }
}