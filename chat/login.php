<link rel="stylesheet" type="text/css" href="css/style.css">
<?php
require_once("commentdb.php");
session_start();
	if (isset($_POST['login'])) { 
		$login = $_POST['login']; 
			if ($login == '') { 
				unset($login);
		} 
	}
	if (isset($_POST['password'])) { 
		$password = $_POST['password']; 
			if ($password =='') { 
				unset($password);
		} 
	}
    
if (empty($login) && empty($password)){
    	
	echo '<p>Вы не заполнили все поля!</p>';
	return;	

}
    
//    	$login = stripslashes($login);
//    	$login = htmlspecialchars($login);
//	$password = stripslashes($password);
//    	$password = htmlspecialchars($password);
//    	$login = trim($login);
//    	$password = trim($password);
	$sql = "SELECT * FROM users WHERE login = '".$login."'";
	$result = $connect_db->query($sql);
if ($result->num_rows == 0 ) {

	echo '<p>Извините, введённого вами логина нету в базе!<br><a href="register_add.php">Зарегистрируйтесь</br></p>';
}

else if ($result->num_rows > 0){
	$sql1 = "SELECT * FROM users WHERE password = '".$password."'";
	$result1 = $connect_db->query($sql1);
	if ($result1->num_rows > 0) {
		$_SESSION['login'] = $login;
    		$_SESSION['password'] = $password; 
    		$_SESSION['id'] = $row['id'];
		sleep(2);
		echo "Вы успешно авторизировались как&nbsp;<b id='usersesion'>$login</b>!";
		header ("Refresh: 5; URL=http://chat.smart-city.com.ua");
    	}
//$sql2 = "SELECT * FROM users WHERE password = '".$password."'";
//$result2 = $connect_db->query($sql2);

//	if($row["password"] == 0)  {

//    		echo 'Введите пароль для авторизации!';
//	}
	else {
		echo 'Извините, введённый вами логин или пароль неверный';
	}
}
?>
