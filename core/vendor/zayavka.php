<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /core/profile.php?alert=1');
}
require_once 'connect.php';

$id_user = $_SESSION['user']['id'];
$id_uslugi = $_POST['usluga'];
$phone = $_POST['phone'];
$status = "Активная";
$date = date("y.m.d");

$error_fields = [];


if ($phone === '') {
    $error_fields[] = 'phone';
}





if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}

if(empty($error_fields)){

    mysqli_query($connect, "INSERT INTO `zayavki`(`id_zayavki`, `id_user`, `id_uslugi`, `phone`, `date`, `status`) VALUES (NULL,'$id_user','$id_uslugi','$phone','$date','$status')");

    $response = [
        "status" => true,
        "message" => "Ваша заявка отправлена",
    ];
    echo json_encode($response);
}else{

    $response = [
        "status" => false,
        "message" => "Введите номер телефона без пробелов",
    ];
    echo json_encode($response);

}

?>
