<?
	
	
	$ris=connetti_mysqlpublico();
	$array=arrautente();
	
	function leggimesgsingle($idms){
	
		//$idms=$idms."==";
		$ris=connetti_mysqlpublico();
		$id=idutente();
		//$idmss= base64_decode($idms);
		
		$s="SELECT * from messaggiutentinova where id_utemess='$id' 
		and pubblico = 'pubblicosi' and idmess ='$idms'  ; ";
		$r=mysql_query($s);
		while($st=mysql_fetch_assoc($r)){
			
			extract($st);
			trovatags();
			
			
			
			if($_SESSION['idutente']==$id){
				echo "<a target='_blank'
				href='".pathintapp()."MESSAGINGNEW/?editamesaggio=".base64_encode('editamesaggio')."&editaid=".base64_encode($idmess)."'>MODIFICA </a>";
				
			}
			?><div class='none'>
			<TABLE><TR><TD>
				<h2><?echo utf8_encode($titolonews);?></H2>
				</TD>
				<TD> tag: <?
				$stag=explode(",",$tagmess);
				foreach($stag as $ki=>$k){
					echo $k;
					}
					?> <span style='position:absolute;font-size:13px;'>
				Scritto il <?=$data;?> </span>
					</TD></TR></table>
					<table>
					<TR><TD style='padding-left: 3%;width: 96%;'>
					<?
					echo htmlspecialchars_decode($testo);?></TD><TD></TD></TR></TABLE>
					
					</div><?
		}
	}
	
	function formricercamesg(){
	?>
	<form method='POST' >
		
		
	</form>
	
	
	<?
		
	}
	
	
	function trovatags(){
		$ris=connetti_mysqlpublico();
		/*
			if($_SESSION['idutente']!=""){$id=$_SESSION['idutente'];}
			if($_SESSION['idex_utente']!=""){$id=$_SESSION['idex_utente'];}
		*/
		$id=idutente();
		$sql = "SELECT tagmess FROM messaggiutentinova,utenti  where
		utenti.IDUtente='$id' and  pubblico = 'pubblicosi' and
		messaggiutentinova.id_utemess = '$id' group by tagmess ";
		$tagres=mysql_query($sql);
		while($tagin = mysql_fetch_assoc($tagres)){
			extract($tagin);
			$esctg.=','.$tagmess.',';
		}
		
		$esctag=explode(",",$esctg);
		$esctag=array_unique($esctag);
		
		?><div style='font-size:0.9em;margin:-2% 5% 1% 5%; width:90%; '><?
			$url_query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
			parse_str($url_query);
			$int=1;
			foreach($esctag as $ki=>$k){
				
				if($tg==$k){$class="class='ui-state-default' style='margin-left:12px;text-decoration:none;' ";
					}else{
					$class="class='' style='margin-left:12px;text-decoration:none;'";}
				?><a href='<?=pathsitoutenza();?>news/?tg=<?=$k;?>' <?=$class;?>><?=$k;?></a><?
				if(!($int %14)){
					echo '<br>';
					
					}
			$int++;
			}?>
			
			</div><?
			
			
			
			
	}
	
	
	
	
	function scorrimessaggi(){
		//STAMPO I TAG 
		
		trovatags();
		
		
		
		//RICEVO LA QUERY 
		
		
		
		
		$ris=connetti_mysqlpublico();
		$id=idutente();
		
		$s="SELECT * from messaggiutentinova where id_utemess='$id' 
		and pubblico = 'pubblicosi'  ";
		
		$url_query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
		parse_str($url_query);
		if($tg){$s.="  and tagmess LIKE  '%$tg%'"; }
		
		
		
		$r=mysql_query($s);
		?><div style='width:100%;margin-bottom:300px; background-color:#fff;' ><table ><?
			while($st=mysql_fetch_assoc($r)){
				if($i%2==1)$color="ui-state-highlight"; //primo colore
				else $color="ui-state-default"; //secondo colore
				extract ($st);
				
				if((filestensione ($dccmess)=="avi")or(filestensione ($dccmess)=="mpeg")){$figura="src='".pathintapp()."menuimg/ante.png' TITLE='TIPO ARCHIVIO'";}
				if((filestensione ($dccmess)=="zip")or(filestensione ($dccmess)=="rar")){$figura="src='".pathintapp()."menuimg/zip.png' TITLE='TIPO ARCHIVIO'";}
				if((filestensione ($dccmess)=="jpg")or(filestensione ($dccmess)=="png")or(filestensione ($dccmess)=="gif")or(filestensione ($dccmess)=="jpeg")){$figura="src='".pathintapp()."menuimg/tnt_icon_13.png'TITLE='TIPO IMMAGINE ' ";}
				if((filestensione ($dccmess)=="doc")or(filestensione ($dccmess)=="odt")or(filestensione ($dccmess)=="docx")){$figura="src='".pathintapp()."menuimg/doc.jpg'TITLE='TIPO DOCUMENTO WORD ' ";}
				if((filestensione ($dccmess)=="xls")or(filestensione ($dccmess)=="xlsx")or(filestensione ($dccmess)=="xls")){$figura="src='".pathintapp()."menuimg/xls.jpg'TITLE='TIPO DOCUMENTO CALCOLO ' ";}
				if(filestensione ($dccmess)=="swf"){$figura="src='".pathintapp()."menuimg/ante.png' title='TIPO  SWF '";}
				if(filestensione ($dccmess)=="pdf"){$figura="src='".pathintapp()."menuimg/adobe.png' title='TIPO  PDF '";}
				if(filestensione ($dccmess)==""){$figura="src='".pathintapp()."menuimg/deletiamolo.jpg'  ";}
				
				
				
				////$tagliato=$testo;
				//$tagliato=substr(htmlspecialchars_decode($testo),0,10);
				$tagliato=$titolonews;
				?><tr><td style='padding:10px;margin:20px;width:20%;font-size:10px;'>
				<?=$data;?><!--<a href='#'><img <?=$figura;?>width='50px' border='0' ></a>--></td>
				<td VALIGN='MIDDLE'><strong>
					<?ECHO utf8_encode($tagliato);?><a href='<?=pathsitoutenza();?>news/
					<?=$idmess;?>.<?echo preg_replace('/[^A-Za-z0-9]/','-',$tagliato);?>.html'>Leggi</a>
				</strong>
				</td></tr>
				
				<?
				}?></table></div>
				
				
				
				<?
					
					
					
					
					
				}				