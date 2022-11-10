<?php
require_once 'core/vendor/connect.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    
    <title>RBT</title>
    <link rel='stylesheet' href='core/css/main.css'>
    <link rel='stylesheet' href='core/css/stule.css'>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CPacifico&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="wrapper">
    <!---Шапка сайта-->
    <header class="header">
      <div class="container">
        <div class="header-body">
          <a href="#" class="header-logo">
            <img src="core/images/logo.jpg" alt="">
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
                <a href="#" class="header-link">Услуги</a>
              </li>
             
              <li>
                <a href="/core/index.php" class="header-link">Вход</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <!---Таблица услуг-->
    <div class="main">
        <div class="container">
            <div class="table-uslugi">
                <h1>Услуги</h1>
                    <table>
                      <tr>
                        <th>Услуга</th>
                        <th>Время работы</th>
                        <th>Гарантия</th>
                        <th>Стоимость</th>
                      </tr>

                    <?php
                      
                      $uslugi = mysqli_query($connect, "SELECT * FROM `uslugi`");
                      $uslugi = mysqli_fetch_all($uslugi);
                      foreach($uslugi as $uslugi){
                    ?>
                      <tr>
                      <td><?= $uslugi[1] ?></td>
                      <td><?= $uslugi[2] ?></td>
                      <td><?= $uslugi[3] ?></td>
                      <td><?= $uslugi[4] ?></td>
                      </tr>
                    <?php
                    }
                    ?>


                    </table>
            </div>
        </div>
    </div>
    <!---Подвал саята-->
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
                    <img src="core/images/vk-social-logotype.png" alt="">
                  </a>
                  <a class="cont-item" href="#">
                    <img src="core/images/whatsapp.png" alt="">
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
  <script src="core/js/slider.js"></script>   
  <script src="core/js/burger.js"></script> 
</body>
</html>
