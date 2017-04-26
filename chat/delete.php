<?php

require_once 'commentdb.php';
session_start();
$log = $_SESSION["login"];
$message = $_POST["message"];
$namemess = $_POST["namemess"];
$timemess = $_POST["timemess"];


$sql = "SELECT *FROM comments WHERE name='".$namemess."' AND comment='".$message."' AND commenttime='".$timemess."'";
$result = $connect_db->query($sql);
$num_row = $result->num_rows;

if (empty($message) || empty($namemess) || empty($timemess)) {
	echo "Нету данных для удаления";
	exit;
}

$sql1 = "DELETE FROM comments WHERE name='".$namemess."' AND comment='".$message."' AND commenttime='".$timemess."'";
$result1 = $connect_db->query($sql1);
$num_row1 = $result1->num_rows;
echo "Сообщение удалено";

?>
