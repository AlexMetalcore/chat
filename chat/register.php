<link rel="stylesheet" type="text/css" href="css/style.css">
<?php
    if (isset($_POST['login'])) { 
	$login = $_POST['login']; 
	if ($login == '') { 
	unset($login);
		} 
	} 

    if (isset($_POST['password'])) { 
	$password=$_POST['password']; 
	if ($password =='') { 
	unset($password);
		} 
	}

	if (empty($login) && empty($password)){
    		echo '<p>Вы не заполнили все поля!</p>';
		return;
	}

		$login = stripslashes($login);
		$login = htmlspecialchars($login);
		$age = stripslashes($age);
		$age = htmlspecialchars($age);
		$sex = stripslashes($sex);
		$sex = htmlspecialchars($sex);
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		$login = trim($login);
		$password = trim($password);
		$age = trim($age);
		$sex = trim($sex);

	include ("commentdb.php");
	$sql = "SELECT * FROM users id WHERE login = '".$login."'";
	$result = $connect_db->query($sql);
	if ($result->num_rows > 0) {
		echo '<p>Извините, введённый вами логин уже есть в базе. Введите другой логин!</p>';
		return;
    	}
        else if (strlen($login) < 3 || strlen($password) < 6) {
                        echo '<p>Логин должен содержать не мение 3 символов и пароль не мение 6 знаков</p>';
	}
	else if (strlen($login) >= 3 && strlen($password) >= 6){
		$sql2 = "INSERT INTO `users` ( `login` , `password` , `age` , `sex`) VALUES('".$login."' , '".$password."' , '".$age."' , '".$sex."')";
		$result2 = $connect_db->query($sql2);
		if ($result2 === TRUE){
    			//echo '<p>Вы успешно зарегистрировались как&nbsp;'.$login.'!<br><a href="login_add.php">Залогинтесь в чат</a></p></br>';
			echo '<p>Вы успешно зарегистрировались как&nbsp;<b id="reguser">'.$login.'!</b></p>';
    		}
 		else {
    			echo '<p>Вы не зарегистрированы!</p>';
    		}
	}
    ?>
