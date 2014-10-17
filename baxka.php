 	<?php
   
 	
 	include('util/util.php');
 	include('ps_pagination.php');
 	$conn = mysql_connect('localhost','root','');
 	mysql_set_charset('utf8', $conn);
 	if(!$conn) die("Failed to connect to database!");
 	$status = mysql_select_db('uyghur2014', $conn);
 	if(isset($_GET['tur'])){

 		 	 $tur=$_GET['tur'];
$sql = "select * from uyghur where turname='$tur'";
 	}


  $pager = new PS_Pagination($conn, $sql, 2, 7 );
$pager->setDebug(true);


 	
$rs = $pager->paginate();
 	
  while($row = mysql_fetch_array($rs)) {


  	?>
<h2><?php  echo $row['tima'];?>|<?php echo $row['id'];?></h2>
<p>
<?php echo $row['mezmun']; ?>
</p>

<?php

};?>
<?php echo $pager->renderLast();?>
<?php echo $pager->renderNext();?>