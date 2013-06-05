<?
//CREATA il giugno2013 
//ricerca per tag album per utenza statica
function searchtagalbum($tag){
error_reporting(0);
$ris=connetti_mysqlpublico();
$id=idutente();



$sqlsid="SELECT * from sliderid where idsli_exidutente='$id'  

and tagslider LIKE'%$tag%' ";

$delta2=mysql_query($sqlsid);
$row=mysql_num_rows($delta2);


while($oneresult=mysql_fetch_assoc($delta2)){

trova2slidedaalbum($oneresult['idslider']);
?>


<?
}}


function trova2slidedaalbum($idslider){
//echo $sqlsid;
$ris=connetti_mysqlpublico();
$id=idutente();
$sql="SELECT  * FROM  slideridimgpath
where       idex_slider = '$idslider'   limit 0,2 ";

$res=mysql_query($sql);

$re=mysql_num_rows($res);

while($resdt=mysql_fetch_array($res)){
extract($resdt);


$b=basename($pathimgslide);


$miniurl=pathintapp().'archivioimmagini/'.str_replace($b,'',$pathimgslide);
$minithumb=$miniurl."thumb_xyw".$b;
?>

<a class="thumb"  >


<img src="<?=$minithumb;?>" alt="<?=$idimg_slider;?>"  />
</a>

<?

}

}


?>