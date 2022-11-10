<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /core/admin.php');
}
require_once 'connect.php';

$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `uslugi` WHERE `id_uslugi` = '$id'")
?>