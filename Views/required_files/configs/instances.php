<?php
session_start();
$MT_QueryInterface = new Crud();
$MT_FORMULAIRES = new Formulaires($MT_QueryInterface);
$MT_Tables = new StandardTable($MT_QueryInterface);
$MT_Headers = new Headers();

function substr_customised($str,int $int){
    $len=strlen($str);
    if($len >= $int){
      echo substr($str,0,$int); 
          echo "...";
    }
    else
      echo substr($str,0,$int);       
  }