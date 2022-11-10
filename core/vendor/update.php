<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /core/admin.php?id=16');
}

require_once 'connect.php';

$id_uslugi = $_GET['id'];
$name = $_POST['name'];
$time = $_POST['time'];
$garanty = $_POST['garanty'];
$cost = $_POST['cost'];


mysqli_query($connect, "UPDATE `uslugi` SET `name`='$name',`worktime`='$time',`garanty`='$garanty',`price`='$cost' WHERE `id_uslugi`='$id_uslugi'");
?>