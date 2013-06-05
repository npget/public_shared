<?


connetti_mysqlpublico();



function trovaselezionecategoriaarticoli(){
error_reporting(E_ALL);
?> 
<br>
<div id="acc"  style='width:90%;position:relative; font-size:14px;' >
<h3><a href="#<?=$Categoria;?>"> CATEGORIE </a></h3>
		<div>
<?
$ris=connetti_mysqlpublico();
$id= idutente();
$sql = "SELECT * FROM `categorie` where idex_rifutente ='$id' LIMIT 0 , 100  ";
$rsd = mysql_query($sql,$ris);
$ncat = mysql_num_rows($rsd);
$n=$ncat+1;
$t=date('d-m-y-H_s');
$time=$id.'k-'.$n.'-'.$t.'.png';






$target = nomeserver()."_nova_img/".$id."/imgcategorie/";




while($rs = mysql_fetch_array($rsd)) {

if($i%2==1)$colore="'ui-state-highlight'"; //primo colore
else $colore="'ui-state-default ui-corner-all'"; 
extract($rs);
//$_SESSION['riferimento']='categoriecatalogo.php#articoli';

$sqlk1="SELECT * from categorie_sub where categoria_id='$ID_categoria'  Order By  Categoria ASC;";
$n=mysql_query($sqlk1);
$tot=mysql_num_rows($n);
$prova=$tot+1;
$timek1=$id.'K'.$ID_categoria.'sk-'.$prova.'.'.$t.'.png';

?>



		

<div class='ui-state-highlight ui-corner-all' style='float:left;padding:6px;margin:10px;'>
    <h1>
<?=$Categoria;?>   <b><?=$tot;?></b>
</h1>
<img src='<?=$target.'_s_'.$imgcategoria;?>' border='0' width='140px'>
<hr>


<?trovaselezionesottocategorie($ID_categoria,$Categoria);?>

</div>
<?

$i++;
}?>


</div>

<?

}

function trovaselezionesottocategorie($id_ext,$Categoria){
$ris=connetti_mysqlpublico();
$id=idutente();
$sql = "SELECT * FROM `categorie_sub`  where categoria_id='$id_ext'   Order By descrizionecategoria ASC ";


$nk2 = mysql_num_rows($rsd);
$n=nk2+1;
$target = nomeserver()."_nova_img/".$id."/imgcategorie/";
$rsd = mysql_query($sql,$ris);


?>


<ul>

<?
while($rs = mysql_fetch_array($rsd)) {
if($i%2==1)$colore="'ui-state-active ui-corner-all'"; //primo colore
else $colore="''"; 
extract($rs);



?><li>

<h2>
<?=$idsottocateg ;?>
<img src='<?=$target.'_s_'.$pathimgcategoria;?>' width='50px'border='0'align='middle' >

<? echo $descrizionecategoria; ?>
</h2><ul>
<?
$sql2 = "SELECT * FROM `categorie_1sub`  where ex_categoriasub ='$idsottocateg' LIMIT 0 , 40    ";
$rsd2 = mysql_query($sql2,$ris);
echo mysql_num_rows($rsd2);?>

<li><?
trovatercat($idsottocateg);   ?>
</li></ul><hr></li>
<?
$i++;
}?>

<?


}


function trovatercat($idsottocateg){
?><!--
<table>--><ul>
<?
$ris=connetti_mysqlpublico();
$id=idutente();
$target = nomeserver()."_nova_img/".$id."/imgcategorie/";


$sql = "SELECT * FROM `categorie_1sub`  where ex_categoriasub ='$idsottocateg'   Order By  descategtre ASC   ";
$rsd = mysql_query($sql,$ris);

while($rs = mysql_fetch_array($rsd)) {
extract($rs);?>
<li>
<a  href="#">
<? echo $descategtre ; ?>	
</a><BR>

<img src='<?=$target.'_s_'.$urlpathcategoria_1sub; ?>' width='30px'border='0'>

</li>
<?}?>
</ul>
<?}

