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
			<select onchange = "changeOption()" name = "clients" id = "clients">
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
        <script>
            function changeOption(){
                var select = document.getElementById('clients');
                alert(select.value);
                localStorage.setItem('test_key','test_value');
            }
        </script>

    </body>
</html>