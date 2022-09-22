<?php
include "../connect.php";

$title = filterRquest("title");
$content = filterRquest("content");
$userid = filterRquest("userid");
$imageName = uploadImage("file");

if ($imageName!=="error") {
    $stmt = $con->prepare(
    "INSERT
     INTO `notes`(`note_title`, `note_content`, `note_user_id`,`note_image`)
     VALUES (?,?,?,?)"
);

$stmt->execute(array($title,$content,$userid,$imageName));
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status"=>"success",));
} else {
    echo json_encode(array("status"=>"error"));
}
}else{
    echo json_encode(array("status"=>"error image"));
}




