<?php
session_start();
include('js-css.php');
include('ulax.php');
if(isset($_SESSION['yonghu'])){

	
}else{
header("location:index.php");

}
$id= $_GET['id'];
 $qur=mysql_query("SELECT tima,mezmun,id  from uyghur where id='$id'");
 $tap=mysql_fetch_array($qur);
?>
<h2>تەۅرىرلەش كۅزنىكى</h2>

<form action="" method="post">

<label>تىما</label>
<input type="text" value="<?php echo $tap['tima'];?>" class="form-control" name="tima" >

</br>
<label>مەزمۇنى</label>
<textarea class="form-control" value =""name="mezmun" rows="11"><?php echo $tap['mezmun'];?></textarea>

<input type="submit" value="ساقلاش" class="btn btn-success"></input>
</form>
<?php

if(isset($_POST['tima']) &&isset($_POST['mezmun']) ){
$tm=mysql_real_escape_string($_POST['tima']);
$mz=mysql_real_escape_string($_POST['mezmun']);
 $qur=mysql_query("update uyghur set tima='$tm',mezmun='$mz' where id='$id'");
	 if($qur){
         sleep(1);
         
	 	header("location:makala.php");
	 }
	 else{
	 	echo "<script>alert('يوللانمىدى');</script>";
	 }

}
 if(isset($_POST['data']) &&isset($_POST['attr'])){

 	 	$tur_name=$_POST['data'];
 $tur_id=$_POST['attr'];
$refresh=mysql_query("update turlar set turname='$tur_name' where id='$tur_id'");
if($refresh){
alert("يېڭىلاندى");
}
 }

?>
