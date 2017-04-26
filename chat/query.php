<?php
include ('commentdb.php');
        $commentsql = $connect_db->query("SELECT *FROM comments WHERE id ORDER BY id DESC;");
        	while ($row = $commentsql -> fetch_array()) {
                	if (session_status() == PHP_SESSION_ACTIVE && $log == $row["name"]) {
                        	echo '<span class="message"><br><br>Сообщение:&nbsp;<span class="comm">'.$row["comment"].'</span>&nbsp;&nbsp;<a href="#" class="delete" title="'.$row["comment"].'" id="'.$row["name"].'" type="'.$row["commenttime"].'">(удалить сообщение)</a><br><i>пользователь&nbsp;&nbsp;<b style="color: black;"><span class="namemess">'.$row["name"]. '</span></b></a></i><br><b>Дата и время:&nbsp;'.$row["day"]. '&nbsp;в&nbsp;<span class="commtime">' .$row["commenttime"]. '</span></b></span>';
                        }
                        else {
                        	echo '<span class="message"><br><br>Сообщение:&nbsp;'.$row["comment"].'&nbsp;&nbsp;<br><i>пользователь&nbsp;&nbsp;<b style="color: black;">' .$row["name"]. '</b></a></i><br><b>Дата и время:&nbsp;'.$row["day"]. '&nbsp;в&nbsp;' .$row["commenttime"]. '</b></span>';
                                                }
                                        }
                        ?>

