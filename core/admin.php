<?php
session_start();
$id_user = $_SESSION['user']['id'];
$check_user = 1;

if ($id_user == 16) {
    $check_user = 0;
}else{
    header('Location: profile.php');
}
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
    <!---Скрипт сортировки таблицы-->
<script>
        document.addEventListener('DOMContentLoaded', () => {

    const getSort = ({ target }) => {
        const order = (target.dataset.order = -(target.dataset.order || -1));
        const index = [...target.parentNode.cells].indexOf(target);
        const collator = new Intl.Collator(['en', 'ru'], { numeric: true });
        const comparator = (index, order) => (a, b) => order * collator.compare(
            a.children[index].innerHTML,
            b.children[index].innerHTML
        );

        for(const tBody of target.closest('table').tBodies)
            tBody.append(...[...tBody.rows].sort(comparator(index, order)));

        for(const cell of target.parentNode.cells)
            cell.classList.toggle('sorted', cell === target);
    };

    document.querySelectorAll('.table_sort .head').forEach(tableTH => tableTH.addEventListener('click', () => getSort(event)));

});
</script>
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
                    <button href="#" class="header-link">Услуги</button>
                </li>
                <li>
               
                    <form action="adminzay.php" method="get">
                        <input type="hidden" name="query" value="SELECT `zayavki`.`id_zayavki`,`users`.`full_name`,`zayavki`.`phone`,`users`.`email`, `uslugi`.`name`, `zayavki`.`date` ,`uslugi`.`price` , `zayavki`.`status` FROM `zayavki` INNER JOIN `uslugi` INNER JOIN `users` ON `zayavki`.`id_uslugi` = `uslugi`.`id_uslugi` AND `users`.`id` = `zayavki`.`id_user`">
                        <button class="header-link">Заявки</button>
                    </form>


                    
                </li>
                
                </ul>
            </nav>
            </div>
        </div>
    </header>
      <div class ="container">        
            <div class="adminn">
                <h1>Услуги</h1>
                <table class="table_sort"><!---Таблица услуг-->
                      <tr>
                        <th class="head">Услуга</th>
                        <th class="head">Время работы</th>
                        <th class="head">Гарантия</th>
                        <th class="head">Стоимость</th>
                      </tr>
                    <tbody>
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
                      <td><a href="vendor/delete2.php?id=<?= $uslugi[0] ?>">Удалить</a></td>
                      <td><a href="update.php?id=<?= $uslugi[0]?>&name=<?= $uslugi[1]?>&time=<?= $uslugi[2]?>&garanty=<?= $uslugi[3]?>&cost=<?= $uslugi[4]?>">Изменить</a></td>
                      </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
                <!---Форма добавления услуг-->
    <form action="vendor/addusl.php?id=16" method="post" class="upda">
        <p>Название</p>
        <input type="text" name="name" autofocus required>
        <p>Время работы</p>
        <input type="text" name="time" autofocus required>
        <p>Гарантия</p>
        <input type="text" name="garanty" autofocus required>
        <p>Стоимость</p>
        <input type="text" name="cost" autofocus required>
        <button>Добавить</button>
    </form>
    </div>
    </div> 
    
    
    
</div>     
  
</body>
</html>