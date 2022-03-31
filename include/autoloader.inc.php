<?php

  function autoloader($className)
  {

    $classNameParts = explode("_",$className);

    $folder = "";
    $classExtention = ".class.php";

  // echo $className." ".end($classNameParts)."<br>";
  
    if(strcmp(end($classNameParts),"Model")==0){
      $folder = "/model";
    }else if(strcmp(end($classNameParts),"View")==0){
      $folder = "/view";
    }else if(strcmp(end($classNameParts),"Controller")==0){
      $folder = "/controller";
    }else if(strcmp($className,"Dbh")==0){
      $folder="/model";
      $classExtention=".class.php";
    }
    
    else{
      $folder="";
    }

    $path=$_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/class{$folder}";
    
    $fullPath = $path."/".strtolower($className).$classExtention;

    if (file_exists($fullPath)) {
      require_once($fullPath);
    }
    else{
      die($fullPath." is not found!!!");
    }
  }
  spl_autoload_register('autoloader');



?>
