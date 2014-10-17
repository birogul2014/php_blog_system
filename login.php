<?php

session_start();
include("js-css.php");
include("ulax.php");
if(isset($_POST['username']) &&isset($_POST['password'])){
$user=$_POST['username'];
$pass=md5($_POST['password']);

$qur=mysql_query("SELECT *  from admin where username='$user' AND password='$pass'");

$row=mysql_num_rows($qur);
if($row==1){
	$exlatkuq=$_SESSION['yonghu']=$user;
header("location:post.php");

}else{
	echo "حاتاىق كۅرۉلدى";
}

}

?>
<form action="" method="post">
<label>ئىسىم</label>
<input type="text" class="form-control" name="username" placeholder="ئىسىم">

</br>
<label>مەزمۇنى</label>
<input type="password" class="form-control" name="password" placeholder="پارول">

<input type="submit" value="يوللاش" class="btn btn-success"></input>
</form>
