<?php
include ('commentdb.php');
     setlocale(LC_TIME,  "ru_RU.UTF-8");
     $str = strftime("%e  %B  %A");
     //$str = mb_convert_case($str , MB_CASE_TITLE, "UTF-8");
     $today = date("Y-m-d H:i:s");
     $sql = "INSERT INTO `comments` (`name` , `comment` , `commenttime` , `day`) VALUES ('".$log."' , '".$comment."' , '$today' , '$str')";
     	if (isset($log) && isset($_POST["comment"]) == 'true' && !empty($log) && !empty($comment)) {
                 $result = $connect_db->query($sql);
                 $row_count = $result->nuw_rows;
        	if ($result === TRUE && !empty($log) && !empty($_POST["comment"])){
                	echo '<br>Сообщение отправлено пользователем '.$log.'';
                }
        }
    	else if (empty($log) && empty($comment) && isset($log) && isset($_POST["comment"]) == 'false'){
       		echo "Заполните поля!";
        }
?>
