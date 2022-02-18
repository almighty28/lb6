<?php
require_once __DIR__ . '/vendor/autoload.php';
include_once 'importDB.php';
?>

<!DOCTYPE html>
<html lang = "ru">
	<head>
		<title>LR6</title>
		<meta charset = "utf-8">
	</head>
	<body>
		<form method = 'post'>	
			<select name = "clients" id = "clients" onchange='var button = document.getElementById("bt");if(localStorage.getItem("messages")!=null){button.setAttribute("value","Показать предыдущий запрос");button.removeAttribute("disabled");}else{document.getElementById("dv").innerHTML = null;button.setAttribute("value","Предыдущий запрос отсутствует");button.setAttribute("disabled","disabled");}'>
				<option value = ''>Выберите клиента</option>
					<?php 
						$cursor=$collection_client->find();
						foreach ($cursor as $document)
						{
							echo "<option value = '$document[login]'> $document[login] </option>";
						}
					?>
			</select>
			<input type = 'submit' name = 'check_messages' id = 'check_messages' value = 'Вывести сообщения' >
		</form>

		<input type='button' id='bt' value='                                                 ' disabled onclick='var data = localStorage.getItem("messages");document.getElementById("dv").innerHTML = data;'>
		<div id='dv'></div>				

        <form method = 'post'>	
			<input type = 'submit' name = 'trafic' id = 'trafic' value = 'Вывести общий трафик'>
		</form>
		
        <form method = 'post'>	
			<input type = 'submit' name = 'list_of_client' id = 'list_of_client' value = 'Вывести клиетнов с отрицательным балансом'>
		</form>
		<?php
			if(isset($_POST['check_messages']))
			{
				if(!empty($_POST['clients']))
				{
					$selected = $_POST['clients'];
					include 'Check_messages.php';
					echo "<script type='text/javascript'> var data = '$message_string'; localStorage.setItem('messages',data); var button = document.getElementById('bt'); button.removeAttribute('disabled'); button.setAttribute('value','Показать предыдущий запрос');</script>";
                }
				else
				{
					echo "Выберите клиента";
				}
			}
		?>


		<?php
			if(isset($_POST['trafic']))
			{
				include 'trafic.php';
			}
		?>	
		<?php
				if(isset($_POST['list_of_client']))
				{
					include 'List_of_client.php';
				}
				
		?>
    </body>
</html>