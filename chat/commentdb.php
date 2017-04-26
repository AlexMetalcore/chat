<?php
session_start();
$user = "comment";
$passworddb = "smartit13";
$db_name = "comment";
$host = "localhost";

//stripslashes - удаляет екранированные символы
function mysql_fix_string($string){
	if (get_magic_quotes_gpc()) {
	$string = stripslashes($string);
	}
	return mysql_real_escape_string($string);
}

function mysql_entities_fix_string($string){
	return htmlentities(mysql_fix_string($string));
}

$log = mysql_entities_fix_string($_SESSION["login"]);
$log = htmlspecialchars($log);
$log = trim($log);

$name = mysql_entities_fix_string($_POST["name"]);
$name = htmlspecialchars($name);
$name = trim($name);

$comment = mysql_entities_fix_string($_POST["comment"]);
$comment = htmlspecialchars($comment);
$comment = trim($comment);

$login = mysql_entities_fix_string($_POST["login"]);
$login = htmlspecialchars($login);
$login = trim($login);

$password = mysql_entities_fix_string($_POST["password"]);
$password = htmlspecialchars($password);
$password = trim($password);
$password = md5($password);

$age = mysql_entities_fix_string($_POST["age"]);
$age = htmlspecialchars($age);
$age = trim($age);

$sex = $_POST["sex"];

$connect_db = new mysqli($host , $user , $passworddb , $db_name);

$connect_db->set_charset("utf8");
        if ($connect_db->connect_error){
                die ("Ошибка соединения с базой:" . $connect_db->connect_error);
        }
//$connect_db->close();
?>
