<?php

class ulax{

	public function connect(){

		$con=mysql_connect("localhost","root","");
		mysql_set_charset('utf8', $con);
		$db=mysql_select_db("uyghur2014");
	}
}
$tur=new ulax();
$tur->connect();

?>
