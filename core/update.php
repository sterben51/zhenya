<?php
session_start();

require_once 'vendor/connect.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo "<link rel='stylesheet' href='/core/css/admin.css'>"; ?>
    <?php echo "<link rel='stylesheet' href='/core/css/main.css'>"; ?>
</head>
<body>
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
                            <form action="admin.php" >
                                
                                <button class="header-link">Назад</button>

                            </form>
                        </li>
                        </ul>
                    </nav>
                    </div>
                </div>
            </header>
            <!---Форма изменения услуг-->
    <form action="vendor/update.php?id=<?= $_GET['id'] ?>" method="post" class="adminn upda">
        <p>Название</p>
        <input type="text" name="name" value="<?= $_GET['name'] ?>">
        <p>Время работы</p>
        <input type="text" name="time" value="<?= $_GET['time'] ?>">
        <p>Гарантия</p>
        <input type="text" name="garanty" value="<?= $_GET['garanty'] ?>">
        <p>Стоимость</p>
        <input type="text" name="cost" value="<?= $_GET['cost'] ?>">
        <button>Изменить</button>
    </form>
   
</body>
</html>