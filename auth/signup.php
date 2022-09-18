<?php
include "../connect.php";

$username = filterRquest("username");
$email = filterRquest("email");
$password = filterRquest("password");



$stmt = $con->prepare(
    "INSERT INTO
     `users`(`user_name`, `user_email`, `user_password`)
      VALUES(?,?,?)"
);

$stmt->execute(array($username,$email,$password));
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status"=>"success",));
} else {
    echo json_encode(array("status"=>"error"));
}
