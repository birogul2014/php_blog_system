<?php
include("ulax.php");
include("js-css.php");
include("util/util.php");
define('togra', "مۇۋەپپىقيەتلىك قوشۇلدى");
define('boxluk', "</br>");
if(isset($_POST['vote'])&&isset($_POST['voteid'])){

	$vote=$_POST['vote'];
	$bilat=$_POST['voteid'];
	echo $bilat;
	mysql_query("update uyghur set love='$vote' where id='$bilat'");
}
?>


	<?php
	if(isset($_POST['tima'])&& isset($_POST['tur']) && $_POST['mezmun']){
		$tima=mysql_real_escape_string($_POST['tima']);
		$turlar=mysql_real_escape_string($_POST['tur']);
		$mezmun=mysql_real_escape_string($_POST['mezmun']);
		$insert=mysql_query("insert into uyghur(tima,mezmun,turname,visit,love)values('$tima','$mezmun','$turlar','0','0')");
		if($insert){
			echo '<div class="jumbotron">togra boxluk </div>';
			
home(".","قايتىش");
			
		}
	}

	?>

<div class="jumbotron">
	<?php
	if(isset($_POST['turadd'])){
		$tur=$_POST['turadd'];
		echo $tur;
		$tur_add=mysql_query("insert into turlar(turname)values('$tur')");
		if($tur_add){
			echo togra;
			echo boxluk;

			home(".","قايتىش");
		}

	}

	?>
</div>