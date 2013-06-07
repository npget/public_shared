<?php
session_start();
error_reporting(E_ALL);
include 'conn/conn.php';
$d=idutente();
echo idutente();

$ris=connetti_mysqlpublico();
$q = strtolower($_GET["q"]);

if (!$q) return;

$sql = "SELECT  serial , name ,Codint from products  where id_utenteint='$d' and 
pubblico='PUBBLICO ON' and   name LIKE '$q%' or Codint LIKE '$q%' ";

$rsd = mysql_query($sql,$ris);
while($rs = mysql_fetch_array($rsd)) {
	$cid = $rs['serial'];
	$cname = $rs['name'];
	$cnamecod = $rs['Codint'];
	echo "$cname\n";
    
}
?>