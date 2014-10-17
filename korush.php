<?php
session_start();
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
img{
  width: 100%;
}
.panel-body img{

background:#FFF url(ajax.gif) no-repeat center center;
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


    <?php
$id= $_GET['id'];
 $qur=mysql_query("SELECT tima,mezmun,visit,love,id  from uyghur where id='$id'");
 $tap=mysql_fetch_array($qur);
 $visti=$tap['visit'];

?>

<div class="panel panel-primary">
  <div class="panel-heading">

    <h3 class="panel-title"><?php
if(isset($_SESSION['yonghu'])){

  echo nl2br($tap['tima']);
}else{
echo nl2br($tap['tima']);


}

     ?>
<?php
$vis=$visti+1;
mysql_query("update uyghur set visit='$vis' where id ='$id'");

?>

   </h3>
  </div>
  <div class="panel-body">
    <?php 

if(isset($_SESSION['yonghu'])){

echo nl2br($tap['mezmun']);
echo "</br>";
echo "</br>";
echo "<a href='post.php'>|يڭى يازما|</a>";
echo "<a href='edit.php?id={$tap['id']}'>|تەۅرىرلەش|</a>";
echo "<a href='korush.php?del={$tap['id']}'>|ئۅچۉرۉش|</a>";
if(isset($_GET['del'])){
  $del=$_GET['del'];
 $qur=mysql_query("delete from uyghur where id='$del'");
 If($qur){

  header("location:makala.php");
 }


}
}else{

 echo nl2br($tap['mezmun']);

}
    ?>
   <p>
  زىيارەت سانى :<?php echo $vis;?>
</br>
ياقتۇرغىنى:<?php echo $tap['love'];?>
   </p>
   <center><span class="tormahiri btn btn-primary" data-vote="<?php echo $tap['love'];?>">ياقتۇردۇم</span></center>
<script type="text/javascript">

$(function(){
$(".tormahiri").click(function(){
    var bilat=$(this).data('vote');
       coutnbilat=bilat+1;
       
    var kimlik='<?php echo $id;?>';
   $.post('qubul.php',{vote:coutnbilat,voteid:kimlik},function(data){
if(data!==0){

  alert("success");
}

   });
});

})
</script>
 </div>
</div>
</body>
</html>