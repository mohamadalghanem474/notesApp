<?php
include "../connect.php";

$noteuser = filterRquest("noteuser");



$stmt = $con->prepare(
    "SELECT *
     FROM `notes`
      WHERE note_user_id=?"
);

$stmt->execute(array($noteuser));

$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status"=>"success","data"=>$data));
} else {
    echo json_encode(array("status"=>"error"));
}