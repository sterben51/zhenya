<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: /core/profile.php');
    }
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
                <a href="/index.html" class="header-link">Главная</a>
              </li>
              <li>
                <a href="/uslugi.php" class="header-link">Услуги</a>
              </li>
         
            </ul>
          </nav>
        </div>
      </div>
    </header>

    <!-- Форма регистрации -->
<div class="container">
    <form class="reg" >
        <label>ФИО</label>
        <input type="text" name="full_name" placeholder="Введите свое полное имя">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Почта</label>
        <input type="email" name="email" id="email" placeholder="Введите адрес своей почты" autofocus required>
        <label>Изображение профиля</label>
        <input type="file" name="avatar">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit" class="register-btn" id='validate'>Зарегистрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="/core/index.php">авторизируйтесь</a>!
        </p>
        <p class="msg none">Lorem ipsum.</p>
        
    </form>
</div>
    <!--Плюсы сайта-->
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
  <script src="/core/js/valid.js"></script>  
  <script src="/core/js/burger.js"></script> 
  <script src="/core/js/authreg.js"></script>

</body>
</html>