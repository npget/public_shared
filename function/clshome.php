<?PHP

//include_once ('conn.php');





function formmessage(){
$id=idutente();


$ris=connetti_mysqlpublico();
$sql="SELECT * FROM utenti where idutente=$id ";
$res=mysql_query($sql,$ris);
$max= mysql_num_rows($res);
while($val=mysql_fetch_array($res)){
extract($val);
$mappatura=unserialize($mappaziendale);
?>

<div style='clear:both;'></div>
<div id='tabs' style='font-size:14px;width:100%;padding:10px;border:0;' >
<ul>
<li><a href='#noi'>NOI </a></li>
<li><a href='#message'>MESSAGE</a></li>
</ul>
<div id='noi' style='height:auto'>

<div style='float:left;'>
<?PHP echo nl2br(stripslashes($infoaziendali));?></div>

 <div style='margin:10px;padding10px;'>

 <div id="map_canvas" style='width:100%;height:300px;'>Google Map 



</div>

</div>


</div>
<div id='message' >
<form method='POST' action='' class='ui-corner-all' 
style='padding:7px;font-family:Arial,helvetica neue,Helvetica,Verdana,sans-serif'>
Nome * <br>
<input style='padding:5px;color:grey;-webkit-border-radius: 5px;
border-radius: 5px;' size='40' type='text'><br>
Email *<br>
<input style='padding:5px;color:grey;-webkit-border-radius: 5px;
border-radius: 5px;'type='text'  size='40' ><br>
Messaggio *<br>
<textarea style='padding:15px;color:grey;overflow:hidden-webkit-border-radius: 5px;
border-radius: 5px;' rows='7'cols='40' ></textarea>
<input type='submit' value='Invia'>


</form>
<script></script>
<pre>
<?PHP
print_r($_POST);
?></pre>

<?PHP
    echo $nomeaziendale;
    echo $sitoaziendale;
    echo $orarioaziendale;
    echo $comuneaziendale;
    echo $cap;
    echo $indirizzoaziendale;
    echo $faxaziendale;
    echo $telaziendale;
    echo $emailaziendalepubblica;
?>



</div>
 </div>


 



 <?PHP

    }

    }
?>