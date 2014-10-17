<?php

 include("ulax.php");
 $tur_name=$_POST['data'];
 $tur_id=$_POST['attr'];
$refresh=mysql_query("update turlar set turname='$tur_name' where id='$tur_id'");
if($refresh){
console.log("yegilandi");
}
?>