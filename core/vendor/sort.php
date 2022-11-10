<?php
session_start();
require_once 'connect.php';

$start = $_POST['start'];
$end = $_POST['end'];
$status = $_POST['status'];
if($status = $_POST['status'] and $end = $_POST['end'] and $status = $_POST['status']){
    header("Location: ../adminzay.php?query=SELECT `zayavki`.`id_zayavki`,`users`.`full_name`,`zayavki`.`phone`,`users`.`email`, `uslugi`.`name`, `zayavki`.`date` ,`uslugi`.`price` , `zayavki`.`status` FROM `zayavki` INNER JOIN `uslugi` INNER JOIN `users` ON `zayavki`.`id_uslugi` = `uslugi`.`id_uslugi` AND `users`.`id` = `zayavki`.`id_user` WHERE (`zayavki`.`date` BETWEEN '$start' AND '$end') AND `zayavki`.`status` = '$status'"); 
}else{
    header("Location: ../adminzay.php?query=SELECT `zayavki`.`id_zayavki`,`users`.`full_name`,`zayavki`.`phone`,`users`.`email`, `uslugi`.`name`, `zayavki`.`date` ,`uslugi`.`price` , `zayavki`.`status` FROM `zayavki` INNER JOIN `uslugi` INNER JOIN `users` ON `zayavki`.`id_uslugi` = `uslugi`.`id_uslugi` AND `users`.`id` = `zayavki`.`id_user`");
}
?>