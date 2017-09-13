<?php 
/*
$id = 10;
$name = 'Alex';

$arr = ["12ttyu3" , "kjgdjkf" , "345435" , "dfghfghfg"];

function test ($id , $name , $arr) {

	if (gettype($id) == 'string' && gettype($name) == 'integer') {
		return gettype($id) .'<br>'. strlen($name);
	}
	else {
		foreach ($arr as $ar) {
		echo $ar.'<br>';
		}
		//$array = implode(", " , $arr);
		//echo $array.'<br>';
	}
}

echo test($id , $name , $arr);*/

class Test {

	var $id = 'Alex';
	public function __construct() {
 
	}

	public function test($id){
		if (strlen($id) > 2){
			return strlen($id);
		}
		else {
			return false;;
		}
	}
}

$test = new Test();

$test1 = $test->test($id);

echo gettype($test1);
?>
