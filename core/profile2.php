<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once 'vendor/connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CPacifico&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo "<link rel='stylesheet' href='/core/css/main.css'>"; ?>
    <?php echo "<link rel='stylesheet' href='/core/css/serv.css'>"; ?>
</head>
<body>
<div class="wrapper">
<header class="header"><!---Шапка сайта-->
      <div class="container">
        <div class="header-body">
          <a href="#" class="header-logo">
            <img src="/core/images/logo.jpg" alt="">
          </a>
          <div class="header-burger">
            <span></span>
          </div>
          <nav class="header-menu">
            <ul class="header-list">
              <li>
                <a href="/core/index2.php" class="header-link">Главная</a>
              </li>
              <li>
                <a href="/core/uslugi2.php" class="header-link">Услуги</a>
              </li>
              <li>
              <a href="#" class="vhod-btn">
                           <?php
                              $id= $_SESSION['user']['id'];
                              $full_name = mysqli_query($connect, "SELECT `login` FROM `users` WHERE `users`.`id` = '$id'");
                              $full_name = mysqli_fetch_array($full_name);
                           ?>
                           <?= $full_name[0]?>
                        </a>
              </li>
            </ul>
            <a class="zakaz-btn" href="/core/zayavka.php">
                    <img src="/core/images/btn1.png" alt="">
            </a>
          </nav>
        </div>
      </div>
    </header>

    <!-- Профиль -->
<div class="container">
  <!---Форма профиля-->
    <form class="profile">
        <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
        <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
        <a href="#"><?= $_SESSION['user']['email'] ?></a>
        <a href="/core/vendor/logout.php" class="logout">Выход</a>
    </form>
    <div class="tab">
    <a href="profile.php" class="tab1">Активные заявки</a>
    <a href="#" class="tab1 active">Завершенные заявки</a>
    </div>
    <table ><!---Таблица завершенных заявок-->
<tr>
<th>Номер заявки</th>
<th>Услуга</th>
<th>Дата</th>
<th>Стоимоcть</th>
<th>Статус</th>
</tr>

<?php
$status = "Завершенная";
$id_user = $_SESSION['user']['id'];
$zayavki = mysqli_query($connect, "SELECT `zayavki`.`id_zayavki`, `uslugi`.`name`, `zayavki`.`date` ,`uslugi`.`price` , `zayavki`.`status` FROM `zayavki` INNER JOIN `uslugi` ON `zayavki`.`id_uslugi` = `uslugi`.`id_uslugi` WHERE `zayavki`.`id_user` = '$id_user' AND `zayavki`.`status` = '$status'");
$zayavki = mysqli_fetch_all($zayavki);
foreach($zayavki as $zayavki){
  $date = date('d.m.Y', strtotime($zayavki[2]));
?>
<tr>
<td><?= $zayavki[0] ?></td>
<td><?= $zayavki[1] ?></td>
<td><?= $date ?></td>
<td><?= $zayavki[3] ?></td>
<td><?= $zayavki[4] ?></td>
<td><a href="vendor/xls.php?id=<?= $zayavki[0] ?>&date=<?= $date ?>&name=<?= $zayavki[1] ?>&cost=<?= $zayavki[3] ?>" >Сохранить квитанцию</a></td>

</tr>
<?php
}
?>


</table>





</div>

<!--Подвал сайта-->

<footer class="footer">
       <div class="container">
          <div class="footer-inner">
            <div class="footer-block">
              <h2 class="footer-title">Локация</h2>
              <p>Степана Злобина 34/1</p>
            </div>
              <div class="footer-block">
                <div class="social-logo">
                  <a class="cont-item" href="#">
                    <img src="/core/images/vk-social-logotype.png" alt="">
                  </a>
                  <a class="cont-item" href="#">
                    <img src="/core/images/whatsapp.png" alt="">
                  </a>
                </div>
              </div>
            <div class="footer-block">
              <h2 class="footer-title">Ремонт <br> бытовой техники</h2>
              <p >
                              + 7(987)-444-44-44
                              <br>
                              remont@mail.ru
               </p>
            </div>
          </div>
       </div>
       <div class="copyright">
          <div class="container">
              <div class="copy-text">
                <p>Copyright © 2021 Все права защищены | Информация на сайте не является публичной офертой. 
                </p>
                <a href="admin.php?id=<?= $_SESSION['user']['id'] ?>">ADMIN</a>
              </div>
          </div>
       </div>
     </footer>

</div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  </script>
  <script src="/core/js/slider.js"></script>   
  <script src="/core/js/burger.js"></script> 

</body>
</html>