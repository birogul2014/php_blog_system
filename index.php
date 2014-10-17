<?php

include('js-css.php');
include('ulax.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">
.carousel img {

  top: 0;
  left: 0;
  min-width: 100%;
  height: 500px;
}
</style>
<title>tormahiri</title>

<meta charset ="utf-8"name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
  <ol class="breadcrumb">
  <li><a href="index.php">باش بەت</a></li>
  <li><a href="makala.php">ماقالە</a></li>
  <li class="active">ۅەققىدە</li>
</ol>

<div class="jumbotron">

  <h1>  <?php
$xml=simplexml_load_file("static-file/data.xml");
foreach ($xml as  $value) {
  echo $value->title;
  $kimmat=$value->timilar;
}

  ?></h1>
<p>كومپيۇتېرغا مۇناسىۋەتلىك ئەڭ يىڭى مودا پىروگىرامما تىللىرى ۋە بۇ ساھەدىكى قالتىس تېخنىكىلار تونۇشتۇرىلىدۇ!</p>
</div>
<div class="container">
<div class="row">
  <div class="col-md-6">
  
  <p class="bg-primary"></p>
<div class="list-group">
  <a href="#" class="list-group-item active">
    <?php echo $GLOBALS['kimmat'];?>
    <?php
 $qur=mysql_query("SELECT *  from uyghur order by id desc limit 0,10");
 while($row=mysql_fetch_array($qur)){
  ?>
  </a>
  <a href="korush.php?id=<?php echo $row['id'];?>" class="list-group-item"><?php echo $row['tima'];?></a>
<?php };?>
</div>
  
</div>
  <div class="col-md-6">

  
  <p class="bg-primary"></p>
<div class="list-group">
  <a href="#" class="list-group-item active">
     <?php echo $GLOBALS['kimmat'];?>
    <?php
 $qur=mysql_query("SELECT *  from uyghur order by id desc limit 10,20");
 while($row=mysql_fetch_array($qur)){
  ?>
  </a>
  <a href="korush.php?id=<?php echo $row['id'];?>" class="list-group-item"><?php echo $row['tima'];?></a>
<?php };?>
</div>
  
  </div>
</div>
</div>

</body>
</html>