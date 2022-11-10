<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /core/profile.php');
}
require_once 'connect.php';

$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `zayavki` WHERE `zayavki`.`id_zayavki` = '$id'")
?>