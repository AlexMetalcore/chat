<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-3.1.1.js"></script>
<script type="text/javascript" src="js/formlog.js"></script>
<meta charset="utf-8">
<title>Форма входа в чат</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="login">
	<i><p style="text-align: center; font-size: 50px; color: black; text-shadow: 2px 2px 2px black;">Вас приветствует чат</p></i>
	<div class="logstyle">
		<form id="formlog" onsubmit="return false"> 
			<label for="namelog">Ваше имя:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" maxlength="20" id="namelog" class="log" name="login"><br><br>
			<label for="passlog">Ваш пароль:&nbsp;&nbsp;</label><input type="password" maxlength="20" id="passlog" class="log" name="password"><br><br>
			<input type="submit" value="Войти" class="button"><a href="register_add.php" class="register">Регистрация</a>
		</form>
	<p class="attention">Заполните поля</p>
	</div>
	<div class="foot">
	<?php include('footer.php'); ?>
	</div>
</body>
</html>
