<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}

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
              <a href="/core/profile.php" class="vhod-btn">
                           <?php
                              $id= $_SESSION['user']['id'];
                              $full_name = mysqli_query($connect, "SELECT `login` FROM `users` WHERE `users`.`id` = '$id'");
                              $full_name = mysqli_fetch_array($full_name);
                           ?>
                           <?= $full_name[0]?>
                        </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

<!-- Форма заявки -->
<div class="container">
    <form class="zayavka" action="vendor/zayavka.php" method = "post"  onSubmit="alert( 'Ваша заявка принята!' );">
        <label>Номер телефона</label>
        <input type="phone" name="phone" placeholder="Введите номер телефона: 78889995555" autofocus required>
        <label>Заявка</label>
        <select name="usluga" >
               <option value="0">Выберите услугу</option>
              <?php
              $uslugi = mysqli_query($connect, "SELECT `id_uslugi` , `name` FROM `uslugi`");
              while($row = mysqli_fetch_assoc($uslugi)){
                  ?>
                  <option value="<?=$row['id_uslugi']?>"><?=$row['name']?></option>
                  <?php
              }
              ?>
        </select>
        <button type="submit" name="submit" >Отправить заявку</button>
        <p class="msg none">Lorem ipsum dolor sit amet.</p>
        
		
    </form>
    </div>  
    
<!---Подвал сайта сайта-->
    
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
              </div>
          </div>
       </div>
     </footer>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  </script>
  <script src="/core/js/slider.js"></script>   
  <script src="/core/js/burger.js"></script> 
  <script src="/core/js/authreg.js"></script>

</body>
</html>