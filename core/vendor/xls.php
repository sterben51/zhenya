<?php 
header('Content-Type: application/vnd.ms-excel; charset=utf-8;'); 

header('Content-disposition: attachment; filename='.Квитанция.'_'.date("d-m-Y").'.xls'); 

header("Content-Transfer-Encoding: binary ");

echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="author" content="zabey" />
		<title>Demo</title>
</head>
<body>

';

echo '<table border="1" cellpadding="15">
      <thead>
      <tr>
      <th>
      Квинатция № ';
echo $_GET['id'];
echo ' Дата: ';
echo $_GET['date'];
echo '  </th>
		</tr>
		</thead>
		<tbody>
		<tr>
		<td>';
echo 'Услуга - ';
echo $_GET['name'];
echo '  </td>
		</tr>
		<tr>
		<td>';
echo 'Цена - ';
echo $_GET['cost'];
echo '  </td>
		</tr>
		<tr>
		<td>
		----------------------------------------------
		</td>
		</tr>
		<tr>
		<td>';
echo 'Итого - ';
echo $_GET['cost'];
echo '  </td>
		</tr>
		</tbody>
		</table>
		</body></html>';
?>