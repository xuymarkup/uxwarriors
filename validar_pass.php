<?php
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

if ($password === $confirm_password) {
    $response = array("valido" => true);
} else {
    $response = array("valido" => false);
}

echo json_encode($response);
?>
