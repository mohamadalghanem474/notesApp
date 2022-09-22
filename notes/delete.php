<?php
include "../connect.php";

$noteid = filterRquest("noteid");
$imageName = filterRquest("imagename");




$stmt = $con->prepare(
    "DELETE
     FROM `notes`
      WHERE `note_id`=?"
);

$stmt->execute(array($noteid));
$count = $stmt->rowCount();

if ($count>0) {
    deleteFile("../upload",$imageName);
    echo json_encode(array("status"=>"success",));
} else {
    echo json_encode(array("status"=>"error"));
}
