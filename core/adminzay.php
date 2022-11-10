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

<div class="wrapper">
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
                                
                                <button class="header-link">Услуги</button>

                            </form>
                        </li>
                        <li>
                            <button href="#" class="header-link">Заявки</button>
                        </li>
                        
                        </ul>
                    </nav>
                    </div>
                </div>
            </header>

     
    
    <div class="cont">        
        <div class="admin">
                    <h1>Активные заявки</h1>
                <table class="table_sort"><!---Таблица активных заявок-->
            <tr>
            <th class="head">Номер заявки</th>
            <th class="head">ФИО</th>
            <th class="head">Телефон</th>
            <th class="head">Почта</th>
            <th class="head">Услуга</th>
            <th class="head">Дата</th>
            <th class="head">Стоимость</th>
            <th class="head">Статус</th>
            </tr>
            <tbody>
            <?php
            $status = "Активная";
            $query = "SELECT `zayavki`.`id_zayavki`,`users`.`full_name`,`zayavki`.`phone`,`users`.`email`, `uslugi`.`name`, `zayavki`.`date` ,`uslugi`.`price` , `zayavki`.`status` FROM `zayavki` INNER JOIN `uslugi` INNER JOIN `users` ON `zayavki`.`id_uslugi` = `uslugi`.`id_uslugi` AND `users`.`id` = `zayavki`.`id_user` WHERE `zayavki`.`status` = '$status'";
            $zayavki = mysqli_query($connect, $query);
            $zayavki = mysqli_fetch_all($zayavki);
            foreach($zayavki as $zayavki){
                $date = date('d.m.Y', strtotime($zayavki[5]));
            ?>
            <tr>
            <td><?= $zayavki[0] ?></td>
            <td><?= $zayavki[1] ?></td>
            <td><?= $zayavki[2] ?></td>
            <td><?= $zayavki[3] ?></td>
            <td><?= $zayavki[4] ?></td>
            <td><?= $date ?></td>
            <td><?= $zayavki[6] ?></td>
            <td><?= $zayavki[7] ?></td>
            <td><a href="vendor/end.php?id=<?= $zayavki[0] ?>">Завершить заявку</a></td>
            </tr>
            <?php
            }
            ?>
            </tbody>

            </table >
            <h1>Заявки</h1>
        <div class="export">
            <!---Форма сортировки таблицы всех заявок-->
                <div class="forms">
                    
                    <form action="vendor/sort.php" method="post" class="sort">
                    <div class="formlabel">
                    <label>Начало : </label>
                    <input type="date" name="start">
                    
                    <label>Конец : </label>
                    <input type="date" name="end">
                    
                    <select name="status">
                        <option value="0">Статус</option>
                        
                            <option value="Активная">Активная</option>
                            <option value="Завершенная">Завершенная</option>
                            
                        
                    </select>
                    
                    
                    <button type="submit"  >Сортировать</button>
                    </div>
                    </form>
                    <!---Форма экспорта сортируемой таблицы в excell-->
                    <form action="vendor/xlss.php" method="post" class="sort">

                        <input type="hidden" name="data" id="xls_data" value="">

                        <input type="hidden" name="report_name" value="weryhsrtyrtdu">

                        <input type="submit" value="Выгрузить в Excel" class="button--excel" >

                    </form>
                </div>

            <table id="report_table" class="table_sort"><!---Таблица всех заявок-->
            <tr>
            <th class="head">Номер заявки</th>
            <th class="head">ФИО</th>
            <th class="head">Телефон</th>
            <th class="head">Почта</th>
            <th class="head">Услуга</th>
            <th class="head">Дата</th>
            <th class="head">Стоимость</th>
            <th class="head">Статус</th>
            </tr>
            <tbody>
            <?php
            
            $query = $_GET['query'];
            $zayavki = mysqli_query($connect, $query);
            $zayavki = mysqli_fetch_all($zayavki);
            foreach($zayavki as $zayavki){
                $date = date('d.m.Y', strtotime($zayavki[5]));
            ?>
            <tr>
            <td><?= $zayavki[0] ?></td>
            <td><?= $zayavki[1] ?></td>
            <td><?= $zayavki[2] ?></td>
            <td><?= $zayavki[3] ?></td>
            <td><?= $zayavki[4] ?></td>
            <td><?= $date ?></td>
            <td><?= $zayavki[6] ?></td>
            <td><?= $zayavki[7] ?></td>
            </tr>
            <?php
            }
            ?>
            </tbody>

            </table>
        </div>
        </div>
            


    </div> 

    
</div>    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  </script> 
<script src="/core/js/xls.js"></script> 
</body>
</html>