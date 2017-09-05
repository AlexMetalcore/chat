<!DOCtype html>
<html>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-3.1.1.js"></script>
<script type="text/javascript" src="js/formreg.js"></script>
<meta charset="utf-8">
<title>Форма регистрации</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="regadd">
	<div class="regstyle">
		<form id="formreg" onsubmit="return false">
			<label for="namereg">Ваше имя:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" maxlength="20" id="namereg" class="reg" name="login"><br><br>
			<label for="passreg">Ваш пароль:&nbsp;&nbsp;</label><input type="password" maxlength="20" id="passreg" class="reg" name="password"><br><br>
			<label for="passreg">Ваш возраст:&nbsp;</label><input type="number" maxlength="3" id="agereg" class="reg" name="age"><br><br>
			<label>Ваш пол:&nbsp;</label>
			<label for="malereg">Мужской:&nbsp;</label><input type="radio" id="malereg" name="sex" value="Мужской">
			<label for="femalereg">Женский:&nbsp;</label><input type="radio" id="femalereg" name="sex" value="Женский"><br><br>
			<input type="submit" value="Зарегистрироваться" class="button"><a href="login_add.php" class="log">Войти</a>
		</form>
	<p class="attention1"></p>
	</div>
	<div class="foot">
	<?php include('footer.php'); ?>
	</div>
</body>
</html>
