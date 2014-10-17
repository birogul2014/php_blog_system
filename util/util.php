<?php
function home($url,$back){

	echo "<a href='$url'>$back</a>";
}
function rasim($rasim){

$html = $rasim;

preg_match( '@img src="([^"]+)"@' , $html, $match );

$src = array_pop($match);

echo $src;
	
}
function kiskartix($str,$start,$length){
echo substr($str,$start,$length);

}
function rasim_filter(){
	 $str=file_get_contents("afda.txt");
      $pattern='@img src="([^"]+)"@';
      echo $str;

preg_match('/<img[^>]+>/i',$str,$matchs);
print_r($matchs);
}
function strip($data){

echo strip_tags($data, '<img>');

}


?>