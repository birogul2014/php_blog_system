<?php

include('js-css.php');
include('ulax.php');
include('util/util.php');
include('ps_pagination.php');
  
  //Connect to mysql db
  $conn = mysql_connect('localhost','root','');
  mysql_set_charset('utf8', $conn);
  if(!$conn) die("Failed to connect to database!");
  $status = mysql_select_db('uyghur2014', $conn);
  if(!$status) die("Failed to select database!");
  $sql = 'SELECT *  from uyghur order by  id desc';
  $sqlcount=mysql_query("select count(*) as hammis from uyghur");
  $tapkin=mysql_fetch_array($sqlcount);
  $total=$tapkin['hammis'];

  
  $pager = new PS_Pagination($conn, $sql, 4, $total );
$pager->setDebug(true);

?>
<!DOCTYPE html>
<html lang="en" ng-app="myapp">
<head>
  <style type="text/css">
.carousel img {

  top: 0;
  left: 0;
  min-width: 100%;
  height: 500px;
}
img{
  width: 100%;
}

.panel-body img{

background:#FFF url(ajax.gif) no-repeat center center;
}
a.hat-ranggi{
  color: #D91E18;
}

</style>
 <script>
 $(function  () {
      function tolukikran(element) {
  if(element.requestFullScreen) {
    element.requestFullScreen();
  } else if(element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if(element.webkitRequestFullScreen) {
    element.webkitRequestFullScreen();
  }
}
$("body").dblclick(function(){

tolukikran(document.documentElement);
});
$("img").each(function(){
  bln=$(this).attr("src");
  
  $(this).attr('src','blank.gif').attr('data-echo',bln);
 
});

})

    echo.init({
      offset: 100,
      throttle: 250,
      unload: false,
      callback: function (element, op) {
        console.log(element, 'has been', op + 'ed')
      }
    });
    </script>
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
         $item=$value->turlar;
}

  ?></h1>
<p>كومپيۇتېرغا مۇناسىۋەتلىك ئەڭ يىڭى مودا پىروگىرامما تىللىرى ۋە بۇ ساھەدىكى قالتىس تېخنىكىلار تونۇشتۇرىلىدۇ!</p>
</div>
<!--gird-->

<div class="container">

 <!-- <p class="bg-success">  ۅازىرقى ۋاقىت {{date | date:'dd-MM-yyyy'}},|ۅەممە ماقالە سانى <?php echo $total;?>|</p>-->

  <div class="row">

<div class=" col-md-8">
    <?php
$rs = $pager->paginate();
  if(!$rs) die(mysql_error());
  while($row = mysql_fetch_assoc($rs)) {
 
  ?>
<div class="panel panel-primary">
  <div class="panel-heading">

    <h3 class="panel-title"> <?php  echo $row['tima'];?>|<?php echo $row['id'];?>|</h3>
    
  </div>
  <div class="panel-body">



   <?php  kiskartix($row['mezmun'],0,610); ?>

 </br>
<a href="korush.php?id=<?php echo $row['id'];?>" class="hat-ranggi">تولۇق ئوقۇش</a>
  </div>

</div>
<?php };?>
 
<!--pagination-->
<ul class="pager">
 <div class="btn-group">


  <button type="button" class="btn btn-default"><?php echo $pager->renderLast();?></button>
    <button type="button" class="btn btn-default"><?php echo $pager->renderNext();?></button>
    <button type="button" class="btn btn-default"><?php echo $pager->renderFirst();?></button>

</div>
</ul>
 



  
</ul>
<!--paginationedn-->
</div>

 <!--autohor-->

<div class="row" >

  <div class="col-sm-6 col-md-4">
    <div class="jumbotron">
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    تۈرلەر <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
        <?php
$iz=mysql_query("select * from turlar");
while($row=mysql_fetch_array($iz)){
 $id=$row['id'];
  ?>
    <li>  <a href=usage.php?tur=<?php echo  $id;?> ><?php echo $row['turname'];?></a></li>
        
       
     <?php };?>



  </ul>
</div>
  </div>

    </div>
    
  <div class="col-sm-6 col-md-4"ng-controller="tormahiri" >

    <div class="thumbnail" ng-repeat="arhip in bio">


      <img src="{{arhip.rasim}}" class="rasim">
      <div class="caption" >
       <center><h3>{{arhip.name}}</h3></center> 
<p>
<center>{{arhip.bio}}</center>
</p>     


 </div>
    </div>
  </div>
</div>
 <!--autohrend-->

  </div>
</div>
<!--gird end-->

</body>
</html>
