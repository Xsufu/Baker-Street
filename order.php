<?php
	$host = 'localhost';  // Хост, у нас все локально
    $user = 'root';    // Имя созданного вами пользователя
    $pass = ''; // Установленный вами пароль пользователю
    $db_name = 'baker';   // Имя базы данных
    $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

    // Ругаемся, если соединение установить не удалось
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }

    if (!empty($_POST["name"]) && !empty($_POST["e-mail"]) && !empty($_POST["phone"]) && !empty($_POST["adress"]) && !empty($_POST["order"])) {
        $sql = mysqli_query($link, "INSERT INTO `clients` (`name`, `email`, `phone`, `adress`) VALUES ('{$_POST['name']}','{$_POST['e-mail']}','{$_POST['phone']}','{$_POST['adress']}')");

        $sqlorder = ysqli_query($link, "INSERT INTO `orders` (`oreder`) VALUES ('{$_POST['order']}')");
        
        if ($sql && $sqlorder) {
            echo ('success');
        } else echo ('err_input');
    }

    else {
    	echo ('err_empty');
    }
?>