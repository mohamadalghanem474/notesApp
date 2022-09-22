<?php

define("MB",1048576);

function filterRquest($RequsetName){

 return htmlspecialchars(strip_tags($_POST[$RequsetName]));

 }

 function uploadImage($imageRequest){
     global $msgError;
    $imageName     = rand(1,99999).$_FILES[$imageRequest]["name"];
    $imageTmpName  = $_FILES[$imageRequest]["tmp_name"];
    $imageSize     = $_FILES[$imageRequest]["size"];
    $alloweExt     = array("jpg","jpge","png","mp3","pdf","txt");
    $stringToArray = explode(".",$imageName);
    $Ext = end($stringToArray);
    $Ext = strtolower($Ext);

    if (!empty($imageName&&!in_array($Ext,$alloweExt))) {
        $msgError[] ="Ext";
    }
    if ($imageSize > 2*MB) {
        $msgError[] ="Size";
    }
    if (empty($msgError)) {
      move_uploaded_file($imageTmpName,"../upload/".$imageName);
      return $imageName;
    }
    else{
        return "error";
    }
 }


 function deleteFile($dir,$imageName){
    if (file_exists($dir."/".$imageName)) {
        unlink($dir."/".$imageName);
    }
 }