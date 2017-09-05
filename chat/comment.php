<?php
//$user = "comment";
//$password = "smartit13";
//$db_name = "comment";
//$host = "localhost";

//$name = $_POST["name"];
//$comment = $_POST["comment"];

//$connect_db = new mysqli($host , $user , $password , $db_name);
require_once ('commentdb.php');
//$connect_db->set_charset("utf8");
//        if ($connect_db->connect_error){
//                die ("Ошибка соединения с базой:" . $connect_db->connect_error);
//        }
	if (isset($_POST["name"]) && isset($_POST["comment"]) == 'true' && !empty($name) && !empty($comment)) {
		$sql = "INSERT INTO `comments` (`name` , `comment`) VALUES ('".$name."' , '".$comment."')";

		$result = $connect_db->query($sql);
		$row_count = $result->nuw_rows;
			if ($result === TRUE){
				echo '<p id="errortext">Коммент оставлен пользователем '.$name.'</p>';
			}
}
	//}
	//else {
	//	echo "Оставьте комментарий";
	//}

//$commentsql = $connect_db -> query("SELECT *FROM comments");
//		while ($row = $commentsql -> fetch_array()){
//		echo '<div id="placecomment">Комментарий:' .$row["comment"]. '<br>от' .$row["name"]. '</div>';
//		}
//}
else {
                echo "Оставьте комментарий";
        }
//$connect_db->close();
?>
