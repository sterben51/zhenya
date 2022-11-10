<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /core/admin.php?id=16');
}

require_once 'connect.php';

$name = $_POST['name'];
$time = $_POST['time'];
$garanty = $_POST['garanty'];
$cost = $_POST['cost'];


mysqli_query($connect, "INSERT INTO `uslugi` (`id_uslugi`, `name`, `worktime`, `garanty`, `price`) VALUES (NULL, '$name','$time' ,'$garanty' , '$cost')");
?>