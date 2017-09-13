<?php
	//date("Y-m-d H:i:s")
//class Upload {

$uploadfile = '/usr/local/www/chat/img/'.$_FILES['img']['name'];
function upload ($uploadfile) {
	global 	$newfile;
	//if(isset($_FILES) && isset($_FILES['img']['name'])) {
	if(is_uploaded_file($_FILES['img']['tmp_name'])) {
	$image = $_FILES['img']['name'];
        $image_avatar = explode(".", $image);
        $image_avatar = $image[1];
	$imageType = $_FILES['img']['type'];
	$imageFullName = hash('crc32',time()) . '.' . $image_avatar;
	$str = strpos($uploadfile, ".");
	$uploadfile = substr($uploadfile, -4, $str);
	if ($imageType == 'image/jpeg' || $imageType == 'image/png') {
        if (move_uploaded_file($_FILES['img']['tmp_name'], hash('crc32',time()).$uploadfile)) {
            //echo '<h4>Файл '.hash('crc32',time()).$uploadfile.'<br>успешно загружен!</h4>';
		$newfile = hash('crc32',time()).$uploadfile;
		//print_r($newfile);
        }
    //$dir = "../img/";
    //$files = scandir($dir);
/*    foreach($files as $key=>$val)
    {
    
        if($val != "." && $val != "..")
        {
            $pieces = explode(".", $val); 
            if(strtolower ($pieces[1])== "jpg" || strtolower ($pieces[1])== "jpeg" || strtolower ($pieces[1])== "png")
            {
    
                list($width, $height) = getimagesize("img/".$val);
                if($width>$height)
                {
                    $image = 'width = "150"';
                }
                else
                {
                    $image = 'height = "150"';
                }
		$imageFullName = '../img/' . hash('crc32',time()) . '.' . $val;
		$imageType = $_FILES['type'];
        
            echo
            '<div class="my_foto">
                <img '.$image.' src="img/'.$imageFullName.'" />
            </div>';
            }
        }
    }}*/
        else {
            echo '<h4>Ошибка! Не удалось загрузить файл на сервер!</h4>';
        exit;
        }
        }
}
return '<h4>Файл '.$newfile.'<br>успешно загружен на сервер</h4>';
}


//$upload = new Upload();
//$upload_file = $upload->upload($uploadfile);
echo upload($uploadfile);
//}
	 //header ("Refresh: 3; URL=http://chat.smart-city.com.ua");
// Проверяем установлен ли массив файлов и массив с переданными данными
/*
//if(isset($_FILES) && isset($_FILES['img'])) {
 
  //Переданный массив сохраняем в переменной
  $image = $_FILES['img'];
 
  // Проверяем размер файла и если он превышает заданный размер
  // завершаем выполнение скрипта и выводим ошибку
  if ($image['size'] > 200000) {
    die('error');
  }
 
  // Достаем формат изображения
  $imageFormat = explode('.', $image['name']);
  //$imageFormat = $imageFormat[1];
 
  // Генерируем новое имя для изображения. Можно сохранить и со старым
  // но это не рекомендуется делать
  $imageFullName = '../img/' . hash('crc32',time()) . '.' . $imageFormat;
 
  // Сохраняем тип изображения в переменную
  $imageType = $image['type'];
  // $imageFullName; 
  // Сверяем доступные форматы изображений, если изображение соответствует,
  // копируем изображение в папку images
  if ($imageType == 'img/jpeg' || $imageType == 'img/png') {
    if (move_uploaded_file($image['tmp_name'],$imageFullName)) {
      echo '<h3>Файл успешно загружен на сервер</h3>';
    } else {
      echo '<h4>Ошибка! Не удалось загрузить файл на сервер!</h4>';
    }
  }
//}
print_r($_FILES['img']['name']);
*/
?>

