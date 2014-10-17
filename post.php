<?php
session_start();
include('js-css.php');
include('ulax.php');
include('util/util.php');
$css=array();
$css['icon']="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css";
if(isset($_SESSION['yonghu'])){

	
}else{
header("location:index.php");

}

?>
<link rel="stylesheet" type="text/css" href="<?php echo $css['icon'];?>">
 <ol class="breadcrumb">
 	<span class="taz"><a href="post.php?qekin=yes">چىكىنىش</a></span>
  <li><span class="tassz">حۇش كەلدىڭىز<?php echo $_SESSION['yonghu'];?></span></li>
  <?php
 if(isset($_GET['qekin'])){
    session_destroy();
    header("location:index.php");

 }
  ?>

</ol>
<script type="text/javascript">
$(function  () {
	$("#clickme").click(function(){

 var pt=prompt("رەسىم ئادرىسنى يىزىڭ", '<img src=""></img>');
 if(pt!==null){


 }
	});
  $("#code").click(function(){
prompt("كودنى قىستۇرۇڭ", '<pre></pre>');

  });
})
</script>
<div class="jumbotron">
	<ul class="nav nav-tabs" role="tablist" id="myTab">
  <li class="active"><a href="#home" role="tab" data-toggle="tab">تىما يوللاش</a></li>
  <li><a href="#turkusush" role="tab" data-toggle="tab">تۈر قوشۇش</a></li>
  <li><a href="#message" role="tab" data-toggle="tab">تۈر تەھرىرلەش</a></li>

</ul>

<div class="tab-content">
  <div class="tab-pane active" id="home">

  	|<i class="fa fa-picture-o fa-2x" id="clickme"> </i>|
     |<i class="fa fa-code fa-2x" id="code"></i> |
			
<form action="qubul.php" method="post">

	<select name="tur">
			<?php
      $talla=mysql_query("select * from turlar");
      while($rws=mysql_fetch_array($talla)){


	?>
 <option value="<?php echo $rws['id'];?>"><?php echo $rws['turname'];?></option>
 <?php };?>
	</select>
	
</br>
<label>تىما</label>
<input type="text" class="form-control" name="tima" placeholder="ماۋزۇسى">

</br>
<label>مەزمۇنى</label>
<textarea class="form-control"  name="mezmun" rows="11" id="hat"></textarea>

<input type="submit" value="يوللاش" class="btn btn-success"></input>
</form></div>
  <div class="tab-pane" id="turkusush">قوشماقچى بولغان تۈرلەر
  <form action="qubul.php" method="post">
  	<input type="text"  name="turadd"></input>
  </br>
<input type="submit" value="قوشۇش" ></input>
  </form>

  </div>
  <div class="tab-pane" id="message">
    <script type="text/javascript">
$(function  () {
  $("p").dblclick(function(){

     var info=$(this).text();
     var attr=$(this).data('some');
     $.post("edit.php",{data:info,attr:attr},function(uqur){

         alert("تۈر تەھرىرلىنىپ بولدى");
     });
  });
});
</script>
<h4>تەھرىرلىمەكچى بولغان تۈرنىڭ ئىسمىنى قايتا يىزىپ،ئاندىن قوش چەكسىڭىزلا بولىدۇ</h4>
<?php
$qur=mysql_query("select * from turlar");
while($row=mysql_fetch_array($qur)){
?>
<p contenteditable="true" data-some="<?php echo $row['id'];?>"><?php echo $row['turname'];?></p>
<?php };?>
  </div>
  <div class="tab-pane" id="settings">...</div>
</div>

<script>
  $(function () {
    $('#myTab a:first').tab('show')
  })
</script>

</div>
