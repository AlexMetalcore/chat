<?php
session_start();
$user = "comment";
$passworddb = "smartit13";
$db_name = "comment";
$host = "localhost";
function create_password_hash($strPassword, $numAlgo = 1, $arrOptions = array())
{
    if (function_exists('password_hash')) {
        // php >= 5.5
        $hash = password_hash($strPassword, $numAlgo, $arrOptions);
    } else {
        $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
        $salt = base64_encode($salt);
        $salt = str_replace('+', '.', $salt);
        $hash = crypt($strPassword, '$2y$10$' . $salt . '$');
    }
    return $hash;
}

function verify_password_hash($strPassword, $strHash)
{
    if (function_exists('password_verify')) {
        // php >= 5.5
        $boolReturn = password_verify($strPassword, $strHash);
    } else {
        $strHash2 = crypt($strPassword, $strHash);
        $boolReturn = $strHash == $strHash2;
    }
    return $boolReturn;
}
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
//$password = md5($password);
//$hash = create_password_hash($password);
//$encrypt = password_verify($password, $hash);

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
