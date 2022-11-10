<?php
session_start();
if ($_SESSION['user']) {
    header("Location: /core/adminzay.php?query=SELECT `zayavki`.`id_zayavki`,`users`.`full_name`,`zayavki`.`phone`,`users`.`email`, `uslugi`.`name`, `zayavki`.`date` ,`uslugi`.`price` , `zayavki`.`status` FROM `zayavki` INNER JOIN `uslugi` INNER JOIN `users` ON `zayavki`.`id_uslugi` = `uslugi`.`id_uslugi` AND `users`.`id` = `zayavki`.`id_user`");
}

require_once 'connect.php';

$id_zayavki = $_GET['id'];
$status = "Завершенная";

mysqli_query($connect, "UPDATE `zayavki` SET `status` = '$status' WHERE `id_zayavki`='$id_zayavki'");
?>