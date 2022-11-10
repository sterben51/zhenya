<?php
session_start();
require_once 'vendor/connect.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    
    <title>RBT</title>
    <link rel='stylesheet' href='/core/css/main.css'>
    <link rel='stylesheet' href='/core/css/stule.css'>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CPacifico&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="wrapper">
    <header class="header"> <!---Шапка сайта-->
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
                <a href="#" class="header-link">Главная</a>
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
            <a class="zakaz-btn " href="/core/zayavka.php">
              <img src="/core/images/btn1.png" alt="">
            </a>
          </nav>
        </div>
      </div>
    </header>
    <div class="intro"><!--Общая информация о компании-->
      <div class="container">
          <div class="intro-inner">
              <h1 class="par" >
                  ремонт бытовой техники
              </h1>
              <h1 class="par2">
                Мы выполняем ремонт любой сложности по всему городу
              </h1>
              <h1 class="par2">
                Работаем с 1997 года 
            </h1>
            
          </div>
      </div>
  </div>
  <div class="main"><!--Плюсы сайта-->
      <div class="container">
       <h1 class="plus-title">Почему выбирают нас?</h1>
       <div class="plus">
        <div class="plus-block">
          <div class="plus-img">
            <img src="/core/images/plus1.png" alt="">
           </div>
           <div class="plus-text">
             <h3>Ремонт любой сложности</h3>
             <p>Выполняем работы любой сложности за честную цену</p>
           </div>
        </div>
        <div class="plus-block">
          <div class="plus-img">
            <img src="/core/images/plus2.png" alt="">
           </div>
           <div class="plus-text">
             <h3>Честная цена</h3>
             <p>Скажем реальную цену ремонта до его начала</p>
           </div>
        </div>
       </div>
       <div class="plus">
        <div class="plus-block">
          <div class="plus-img">
            <img src="/core/images/plus3.png" alt="">
           </div>
           <div class="plus-text">
             <h3>Гарантия до 12 месяцев</h3>
             <p>Гарантия на все виды работ</p>
           </div>
        </div>
        <div class="plus-block">
          <div class="plus-img">
            <img src="/core/images/plus4.png" alt="">
           </div>
           <div class="plus-text">
             <h3>Приедем в любой район города</h3>
             <p>Неважно где вы живете вы всегда можете на нас рассчитывать</p>
           </div>
        </div>
       </div>
       
      </div>
  </div>

      <!--Контактная информация-->
  <h1>Контактная информация</h1>
  <div class="container">
            
    <div class="contacts">
      <div class="contacts-inner">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2303.928011447391!2d55.968075216377486!3d54.72848107798662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43d93a47f806e4b3%3A0xaa1815f8ccae9d43!2z0YPQuy4g0JrQuNGA0L7QstCwLCA2NS8yLCDQo9GE0LAsINCg0LXRgdC_LiDQkdCw0YjQutC-0YDRgtC-0YHRgtCw0L0sIDQ1MDAwNQ!5e0!3m2!1sru!2sru!4v1622557313521!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
      <div class="contacts-inner">
        <p>Респ. Башкортостан, г.Уфа, ул. Степана Злобина 34/1</p>
        <p>+ 7(987)-444-44-44</p>
        <p>remont@mail.ru</p>
        <p>Пн - Пт <br> <br> 9:00 - 18:00</p>
      </div>
    </div>
</div>
      <!--Подвал сайта-->
      
    </div>
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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  </script>
  <script src="/core/js/slider.js"></script>   
  <script src="/core/js/burger.js"></script> 
</body>
</html>