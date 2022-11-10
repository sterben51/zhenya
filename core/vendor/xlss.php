<?php 
header('Content-Type: application/vnd.ms-excel; charset=utf-8;'); 

header('Content-disposition: attachment; filename='.$_POST["report_name"].'_'.date("d-m-Y").'.xls'); 

header("Content-Transfer-Encoding: binary ");

echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="author" content="zabey">
		<title>Demo</title>
</head>
<body>

';

echo '<h3>Отчет по заявкам</h3>';

echo '<br>';

echo '<table border="1" cellpadding="15">';

echo $_POST['data'];

echo '</table>
	  </body>
      </html>';
?>

