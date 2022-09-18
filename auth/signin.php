<?php
include "../connect.php";

$email = filterRquest("email");
$password = filterRquest("password");



$stmt = $con->prepare(
    "SELECT * 
    FROM `users`
    WHERE `user_email`=? AND `user_password`=?"
);

$stmt->execute(array($email,$password));
$data=$stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status"=>"success","data"=>$data));
} else {
    echo json_encode(array("status"=>"error"));
}
