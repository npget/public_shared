<?phpsession_start();include_once 'conn/conn.php';//$d=$_SESSION['idutente'];$ris=connetti_mysqlpublico();$q = strtolower($_GET["q"]);if (!$q) return;$sql = "select DISTINCT cap from utenti where  cap LIKE '$q%' group by IDUtente ";$rsd = mysql_query($sql,$ris);while($rs = mysql_fetch_array($rsd)) {	$cid = $rs['IDUtente'];	$cname = $rs['cap'];	echo "$cname\n";}?>