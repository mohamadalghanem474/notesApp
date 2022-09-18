<?php


function filterRquest($RequsetName){

 return htmlspecialchars(strip_tags($_POST[$RequsetName]));

 }





