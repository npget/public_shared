<?php
	
	//$newris=conn_public();
	
	$ris=connetti_mysqlpublico();
	
	function querydtagproduct($nome){
		$ris=connetti_mysqlpublico();
		
		$b=idutente();
		
		$sql="SELECT * FROM tagproducts,products  where  tagproducts.id_exutentetag='$b' and
		products.pubblico='PUBBLICO ON' and 
		tagproducts.id_exproduct=products.serial and 
		tagproducts.keywords LIKE '%$nome%'  order by  serial  desc limit 0, 100";
		$res=mysql_query($sql,$ris);
		$max= mysql_num_rows($res);
		if(!$max){echo '<h1>ARTICOLI NON PRESENTI </h1>';}else{
			scorritagutenza();
			
			
			filtri($_SESSION['risperpagina'],$tot,$pages,$ordine);
			?><h2> Articoli Presenti  <strong><?=$max;?></strong></h2> <?
			
			stamparisart($res);
		}
	}
	
	
	
	
	function formricerca(){
		
	?>		<script src="<?=root_shared();?>jquery.autocomplete.js"/></script>
	<script type="text/javascript" >
		$(document).ready(function() {
			$("#namproduct").autocomplete("<?=pathsito();?>clspubbliche/completproduct.php", {
				width: 360,
				matchContains: true,
				//	mustMatch: true,
				//minChars: 0,
				//multiple: true,
				//highlight: false,
				//multipleSeparator: ",",
				selectFirst: false
			});	})
	</script>
	<style>.ac_results {
		padding: 0px;
		border: 1px solid black;
		background-color: white;
		overflow: hidden;
		z-index: 99999;
		}
		
		.ac_results ul {
		width: 100%;
		list-style-position: outside;
		list-style: none;
		padding: 0;
		margin: 0;
		}
		
		.ac_results li strong{ color:red;}
		.ac_results li {
		margin: 0px;
		padding: 2px 5px;
		cursor: default;
		display: block;
		/* 
		if width will be 100% horizontal scrollbar will apear 
		when scroll mode will be used
		*/
		/*width: 100%;*/
		
		font-size: 18px;
		font-family: arial, sans-serif;
		/* 
		it is very important, if line-height not setted or setted 
		in relative units scroll will be broken in firefox
		*/
		line-height: 16px;
		overflow: hidden;
		border: 2px solid #AAA/*{borderColorContent}*/;
		}
		
		.ac_loading {
		background: white url('utenza/indicator.gif') right center no-repeat;
		}
		
		.ac_odd {
		background-color: #eee;
		}
		
		.ac_over {
		background-color: #0A246A;
		color: white;
		}
		
		
		
	</style>
	<form method='GET' action='<? echo pathsitoutenza();?>'>
		
		<input type='text' id='namproduct' name='b' size='30' value='<?php echo $_GET['namproduct'];?>' style='padding:3px;color:black;overflow:hidden-webkit-border-radius: 5px;
		border-radius: 5px;' placeholder='TROVA NOME E CODICI' onchange='document.submit();'>
	<input type='submit' value='Trova' class='ui-state-active'> </form>
	<?php
	}
	
	
	
	function arrautente($id){
		//$id=16;
		$id=idutente();
		
	//	$ris=connetti_mysqlpublico();
		$newris = conn_public();
	
		$sql="SELECT * FROM utenti,webpubblic 
		where utenti.IDUtente=$id AND  webpubblic.id_exutente=$id   order by IDUtente";
	//	$res=mysql_query($sql,$ris);
		$res= $newris -> query ($sql);
	
    
    
    	$max= mysqli_num_rows($res);
		while($val=mysqli_fetch_assoc($res)){
			
			$arrayutente=$val;
		}
		return $arrayutente;
		
	}
	function script($id1){
		?>    <script>
		$("#fotodesc-<?=$id1;?>").hide();
		$("#anim<?=$id1;?>").animate({'opacity':'0.4'});
		$("#anim<?=$id1;?>").hover(function(){  
			//$("#anim<?=$id1;?> b").click(function(){  
			
			$("#anim<?=$id1;?>").stop().animate({'opacity':'1.0'});
			//$("#anim<?=$id1;?>").stop().animate({'opacity':'1.0',top:'-10'});
			$("#fotodesc-<?=$id1;?>").show('slow');
			//    $(this).animate({top:'10'}, 300 );  
		});  
		//$("#anim<?=$id1?>").mouseleave(function(){  
		$("#anim<?=$id1;?>").mouseleave(function(){  
			
			
			//  $(this).animate({top: '0'}, 300 );  
			//$("#fotodesc-<?=$id1;?>").hide();
			
			$(this).stop().animate({'opacity':'0.5',top:'0'},300);
			//  $("#fotodesc-<?=$id1;?>").animate({'opacity':'0.0'});
			$("#fotodesc-<?=$id1;?>").hide('slow');
		}); 
		</script> <?
		
	}
	
	function scorripercategorie($id1,$id2,$id3){
		$ris=connetti_mysqlpublico();
		//$b=16;
		$b=idutente();
		if($id1!=""){
			$sqlcat="SELECT * from categorie where 
			categorie.ID_categoria='$id1'  and 
			categorie.idex_rifutente='$b' ";
		}
		if($id2!=""){
			$sqlcat="SELECT * from categorie, categorie_sub where
			categorie_sub.idsottocateg='$id2' and 
			categorie.ID_categoria=categorie_sub.categoria_id and 
			categorie.idex_rifutente='$b' ";
		}
		
		if($id3!=""){
			$sqlcat="SELECT * from categorie, categorie_sub,categorie_1sub where
			categorie_1sub.id_categoria_1sub='$id3' and 
			categorie_1sub.excategoria=categorie.ID_categoria and 
			categorie_1sub.ex_categoriasub=categorie_sub.idsottocateg  and
		categorie.idex_rifutente='$b'";}
		$riscat=mysql_query($sqlcat);
		$risultati=mysql_fetch_assoc($riscat);
	?>
	<div class='ui-corner-all ui-state-active' id='scorrere' >
		
		<a href="<?php echo pathsitoutenza().$risultati['ID_categoria'].'/'. preg_replace("/[^0-9a-zA-Z]/","-",$risultati['Categoria']);?>/"><?=$risultati['Categoria'];?> > ></a>
		<?php
		
		
		 if ($risultati['descrizionecategoria']!=""){
		     $url_conn=$risultati['ID_categoria'].'/'. preg_replace("/[^0-9a-zA-Z]/","-",$risultati['Categoria'])
		     
		     ?>
			<a href="<?=pathsitoutenza().$url_conn.'/'. preg_replace("/[^0-9a-zA-Z]/","-",$risultati['descrizionecategoria']).'/'.$risultati['idsottocateg'];?>"><?=$risultati['descrizionecategoria'];?> > ></a>
			<a href="<?=pathsitoutenza().$url_conn.'/'.preg_replace("/[^0-9a-zA-Z]/","-",$risultati['descrizionecategoria']).'/'.preg_replace("/[^0-9a-zA-Z]/","-",$risultati['descategtre']).'/'.$risultati['id_categoria_1sub'];?>/"><?=$risultati['descategtre'];?></a>
		<?}?>
		
	</div>
	<?
		
	}


	function querydanome($nome){
		$ris=connetti_mysqlpublico();
		//$b=16;
		$b=idutente();
		
		$sql="SELECT * FROM products  where  id_utenteint='$b' and
		products.pubblico='PUBBLICO ON'
		and name LIKE '%$nome%'  order by  serial  desc limit 0, 100";
		$res=mysql_query($sql,$ris);
		$max= mysql_num_rows($res);
		if(!$max){echo '<h1>ARTICOLI NON PRESENTI </h1>';}else{
			
			
			
			filtri($_SESSION['risperpagina'],$tot,$pages,$ordine);
			?><h2> Articoli Presenti  <strong><?=$max;?></strong></h2> <?
			stamparisart($res);
		}}
		
		
		
		
		function metahome($titolo,$desc,$tag,$image){
			$array=arrautente(); 
			$url="http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'];
			
			
			
			if($_GET['idmessage']!=""){
				$idms=$_GET['idmessage']."==";
				$ris=connetti_mysqlpublico();
				$id=idutente();
				$idmss= base64_decode($idms);
				$s="SELECT * from messaggiutentinova where id_utemess='$id' 
				and pubblico = 'pubblicosi' and idmess ='$idmss'  ; ";
				$r=mysql_query($s);
				$image=nomeserver().'_nova_img/'.idutente().'/imgutenza/_s1_'.$array['weblogo'];
				while($st=mysql_fetch_assoc($r)){
					
					extract($st);
					$title=utf8_encode($titolonews);
					$desc=substr(eregi_replace(" \n\r","",strip_tags(htmlspecialchars_decode($testo))),0,200);
					$tag=$data.$desc;
					
				}
			}
			
			
			
			if($_GET['serial']!=""){
				$serial=$_GET['serial'];
				$idut=idutente();
				$sqltagge="SELECT * from tagproducts where id_exproduct='$serial' and id_exutentetag='$idut' ";
				$ristagge=mysql_query($sqltagge);
				while($tagextra=mysql_fetch_assoc($ristagge)){
					extract($tagextra);
					$title=$titolo;
					$desc=$description;
					$tag=$keywords;
					$image=$urlimgtag;
					
					
				}
			}
            
            
			// meta per utente home
			if(($_GET['nomeutente']!="")and($_GET['home']=='home')){
				$title="Welcome -".$array['nomeaziendale'];
				$desc=$array['infoaziendali'];
				$tag=$array['tagutente'];
				$image=nomeserver().'_nova_img/'.idutente().'/imgutenza/_s1_'.$array['weblogo'];
			}
            
            //meta per pagina messaggi
            if(($_GET['nomeutente']!="")and($_GET['messaggi']=='messaggi')){
                $title="News by -".$array['nomeaziendale'];
                $desc=$array['infoaziendali'];
                $tag=$array['tagutente'];
                $image=nomeserver().'_nova_img/'.idutente().'/imgutenza/_s1_'.$array['weblogo'];
            }

            
            // meta per pagina contatti 
  if(($_GET['nomeutente']!="")and($_GET['contatti']=='contatti')){
                $title="Contatta   -".$array['nomeaziendale'];
                $desc=$array['infoaziendali'];
                $tag=$array['tagutente'];
                $image=nomeserver().'_nova_img/'.idutente().'/imgutenza/_s1_'.$array['weblogo'];
            }
            
                // meta per utente tag
            if(($_GET['nomeutente']!="")and($_GET['tag']!="")){
                $title="Cerca Parola chiave articoli : ".$_GET['tag']." by  ".$array['nomeaziendale'];
                $desc=$array['infoaziendali'];
                $tag=$array['tagutente'];
                $image=nomeserver().'_nova_img/'.idutente().'/imgutenza/_s1_'.$array['weblogo'];
            }
            
            
            
            
		?>
		<title><?php echo  $title;?></title>
		<meta name="title" content="<?php echo $title;?>">
		<meta name="keywords" content="<?php echo $tag;?>">
		<meta name="description" content="<?php echo $desc;?>">
		<link rel="canonical" href="<?php echo $url;?>">
		<link rel="image_src" href="<?php echo $image?>">
		<!-- Facebook opengraph -->
		<meta property="og:title" content="<?php echo $title;?>" >
		<meta property="og:image" content="<?php echo $image?>" >
		<meta property="og:description" content="<?php echo $desc;?>" >
		<meta property="og:site_name" content="Stilediroma" >
		<meta property="og:app_id" content="411187172266211" >
		<meta property="og:type" content="article" >
		<meta property="og:url" content="<?php echo $url?>" >
		
		
		<?
			
			
			
		} 
		
		
		function trovalistarticoli($id){
			$ris=connetti_mysqlpublico();
			//$b=16;
			$b=idutente();
			idutente();
			
			if(empty ($id)){
				$sql="SELECT * FROM products  where  id_utenteint='$b' and
				products.pubblico='PUBBLICO ON' order by  serial  desc limit 0, 10 ";
				
				
				
				}else{
				$sql="SELECT * FROM products  where  id_utenteint='$b' 
				and
				products.pubblico='PUBBLICO ON' and terzacateforia_ed='$id'  ";
				
				
				
				$tot=(mysql_num_rows(mysql_query($sql)));
				//se posto il numero di risultati per pagina 
				if($_POST['num']){$_SESSION['risperpagina']=$_POST['num'];}
				//else{
				//senno divido per 4 il totale del count 
				if($_SESSION['risperpagina']==""){$_SESSION['risperpagina']=ceil($tot/4);}
				
				
				$pages=ceil($tot/$_SESSION['risperpagina']);
				
				$sql.="group by ";
				//$pagine=
				if($_POST['ordine']=='Prezzo Min'){ $sql.=" price  ASC ";}
				if($_POST['ordine']=='Prezzo MAx'){$sql.=" price  DESC ";}
				if($_POST['ordine']=='recente max'){$sql.=" serial  DESC ";}
				if($_POST['ordine']=='recente min'){$sql.=" serial ASC "; }
				if($_POST['ordine']==''){$sql.=" serial DESC "; }
				
				
				if(($_GET['page']==1)or($_GET['page']==0)){
					$sql.=" limit 0, $_SESSION[risperpagina] ";
					}else{
					$pagesi=$_GET['page'];
					if(($_GET['page']==2)){
						$pagesi=$_GET['page']/2;
						$desclimit=ceil($_SESSION['risperpagina']*$pagesi);
						
						$sql.=" limit $desclimit, $_SESSION[risperpagina] ";
						}else{
						
						$desclimit=ceil($_SESSION['risperpagina']*$pagesi)-$_SESSION['risperpagina'];
						
						$sql.=" limit $desclimit, $_SESSION[risperpagina] ";
					}}
					scorripercategorie(null,null,$_GET['viewpeoductsovertree']);
					filtri($_SESSION['risperpagina'],$tot,$pages,$ordine);
					
					//print_r($_POST);
					//print_r($_GET);
					//print_r($_SERVER);
			}
			
			
			$res=mysql_query($sql,$ris);
			$max= mysql_num_rows($res);
			if(!$max){echo '<h1>ARTICOLI NON PRESENTI </h1>';}else{
				//echo $sql;
				if($_POST['griglia']!=""){
				$_SESSION['divpagina']=$_POST['griglia'];}
				
				
				if($_POST['lista']!=""){$_SESSION['divpagina']=$_GET['lista'];}
				
				if($_SESSION['divpagina']=='griglia'){
				stamparisartlista($res);}
				
				if($_SESSION['divpagina']=='lista'){stamparisart($res);}
				if($_SESSION['divpagina']==''){ stamparisart($res);}
				
			}}
			
			
			
			function filtri($num,$tot,$p,$ordine){
				//print_r($_GET);
				//print_r($_POST);
				//print_r($_SESSION['risperpagina']);
			?>
			<form method='POST' action='' name='formfiltri'>
				
				TOTALI - [<?=$tot;?>]--Ordine Per 
				<select name='ordine' onchange='document.formfiltri.submit();'>
					<option value='<?=$_POST['ordine'];?>'><?=$_POST['ordine'];?>
						<option value='recente max'>recente max
							<option value='recente min'>recente min
								<option value='Prezzo MAx'>Prezzo MAx
									<option value='Prezzo Min'>Prezzo Min  
									</select>
									--VEDI
									<select name='num' onchange='document.formfiltri.submit();'>
										
										
										<option value='<?=$num;?>'><?=$num;?>
											<option value='5'>5
												<option value='10'>10
													<option value='20'>20
														<option value='30'>30</select>
														
														<button type='submit' name='lista' value='lista' class='ui-state-active'>
															<img src='<?=root_shared();?>img/per_page.gif' border='0'>
														</button>
														<button type='submit' name='griglia' value='griglia'><img src='' border='0'></button>
														
														<div class='tabpagine' style='position:relative;float:right;left:-5%'>Pagine.<?
															for($i=0; $i < $p ; $i++){
																
																//url per impaginazione
																if(($_GET['page']=="")){
																	?><script>
																	$(".tabpagine a :first").addClass("ui-state-active");
																</script>
																<?
																	
																	
																$url="page/";}
																else{ $url="../../page/";
																	
																	if($_GET['page']==$i+1){
																		
																		
																		$active='ui-state-active';}else{
																		$active='ui-state-default';
																	}
																	
																	
																}
																
																//colore classe hover e stato pagina 
																
																
																
																
																
															?>
														<a href='<?=$url.($i+1);?>/'class='<?=$active;?>' style='padding-left:4px;text-decoration:none;padding:4px;' ><?=$i+1;?></a><?}?>
														</div>
														<script>
															//$(".tabpagine a :first").addClass("ui-state-active");
															$(".tabpagine a").mouseover(function () { $(this).addClass("ui-state-hover"); });
															$(".tabpagine a").mouseout(function () { $(this).removeClass("ui-state-hover"); });
														</script>
														
														
														
													</form>
													<?
													}
													
													
													//STAMPA LISTA
													function stamparisartlista($res){
														$ris=connetti_mysqlpublico();
													?>
													<table class='ui-corner-all' width='90%' >
														<?
															
															while($val=mysql_fetch_array($res)){
																$id1++;
																//if($id1%2==1)$col="'ui-state-active ui-corner-all'"; //primo colore
																//else $col="'ui-state-default ui-corner-all'"; //secondo colore
																extract($val);
																
																$sqlimg="SELECT * from pathimgcatalogo where idex_art='$serial' group by idex_art ;";
																$rese=mysql_query($sqlimg,$ris);
																$maxe= mysql_num_rows($rese);
																
																while($vale=mysql_fetch_array($rese)){
																	extract($vale);
																	//ECHO imgpublic($idutentepath);
																?>
																
																<tr  class='ui-corner-all'  >
																	<td>
																		<a href='<?=pathsitoutenza().eregi_replace(" ","-",$name).'/'.$terzacateforia_ed.'/'.$serial;?>.html'>
																		
																		<? echo substr_replace($name,'<br>',21 ,0 );?></a>
																		
																		</td><td>
																		<?=$price;?> 
																		<?=$serial;?> 
																	</td>
																	<td>
																		
																		<img src='<? echo imgpublic($idutentepath).'thumb/'.$pathimg;?>'
																		class='ui-corner-all' style='max-width:200px;max-height:200px'>
																		</td><td>
																		
																		
																		
																		
																		<img src='<?=root_shared();?>img/apibtnr02.gif'border='0'>
																		
																	</td></tr>
																	<? 
																		
																		
																		
																	}?>
																	
																	
																	
																	<?
																		
																	}?></table><?
																	
													}
													
													
													
													
													
													//GRIGLIA
													function stamparisart($res){
														$ris=connetti_mysqlpublico();
													?>
													<div id ='prodotto'class='ui-stae-active ui-corner-all' style='position:relative;margin-left:10px;margin-bottom:250px;float:left' ><ul><?
														
														while($val=mysql_fetch_array($res)){
															$id1++;
															//if($id1%2==1)$col="'ui-state-active ui-corner-all'"; //primo colore
															//else $col="'ui-state-default ui-corner-all'"; //secondo colore
															extract($val);
															
															$sqlimg="SELECT * from pathimgcatalogo where idex_art='$serial' group by idex_art ;";
															$rese=mysql_query($sqlimg,$ris);
															$maxe= mysql_num_rows($rese);
															
															while($vale=mysql_fetch_array($rese)){
																extract($vale);
																//ECHO imgpublic($idutentepath);
															?>
															
															<li  style='background-color:#fff;list-style:none;height:250px;box-shadow:3px  3px 1px #757575;
															float:left;width:200px;margin:20px;padding:9px;position:relative;' id="animp<?=$id1;?>" class='ui-corner-all'  >
																<span  style='border-TOP-left-radius: 15px;
																height:80px;font-size:13px;position:absolute;right:0px;bottom:0px;padding:20px;border:0;' 
																class='ui-state-active'  >  
																	<a href='<?=pathsitoutenza().eregi_replace(" ","-",$name).'/'.$terzacateforia_ed.'/'.$serial;?>.html'>
																	
																	<? echo substr_replace($name,'<br>',21 ,0 );?></a><br>
																	<?=$price;?> <br>
																	<?=$serial;?> <br>
																	
																</span>
																
																<img src='<? echo imgpublic($idutentepath).'thumb/'.$pathimg;?>'
																class='ui-corner-all' style='max-width:200px;max-height:200px'>
																
																
																
																
																
																<span id='fotodescp-<?=$id1;?>' 
																style='position:absolute;top:0px;right:0px;height:50px;'> 
																	<img src='<?=root_shared();?>img/apibtnr02.gif'border='0'>
																</span>
															</li>
															<script>
																$("#fotodescp-<?=$id1;?>").hide();
																
																$("#animp<?=$id1;?>").hover(function(){  
																	//$("#anim<?=$id1;?> b").click(function(){  
																	
																	
																	//$("#anim<?=$id1;?>").stop()
																	$("#fotodescp-<?=$id1;?>").show('slow').animate({'opacity':'1.0',top:'-10'});
																	
																	//    $(this).animate({top:'10'}, 300 );  
																});  
																//$("#anim<?=$id1?>").mouseleave(function(){  
																$("#animp<?=$id1;?>").mouseleave(function(){  
																	
																	
																	//  $(this).animate({top: '0'}, 300 );  
																	//$("#fotodesc-<?=$id1;?>").hide();
																	
																	// $(this).stop().animate({'opacity':'1.5',top:'0'},300);
																	//  $("#fotodesc-<?=$id1;?>").animate({'opacity':'0.0'});
																	$("#fotodescp-<?=$id1;?>").hide('slow');
																}); 
															</script>
															<? 
																
																
																
															}?>
															
															
															
															<?
																
															}?></ul></div><?
															
													}
													
													
													
													
													
													
													
													function scorricat2daid($idcat){
														//$b=16;
														$b=idutente();
														?>II categorie(rg640 clsutenza )
														<?php
														$ris=connetti_mysqlpublico();
														$sql="SELECT  *   FROM  categorie_sub ,categorie where 
														categorie.idex_rifutente='$b' and 
														categoria_id='$idcat'  group by idsottocateg  ";
														
														$res=mysql_query($sql,$ris);
														$max= mysql_num_rows($res);
														
														while($val=mysql_fetch_assoc($res)){
															
															$id1++;
															if($id1%2==1)$colore="'ui-state-active ui-corner-all'"; //primo colore
															else $colore="'ui-state-default ui-corner-all'"; //secondo colore
															extract($val);
														?>
														
														<div style='background-image:url(<?=nomeserver();?>_nova_img/<?=$b;?>/imgcategorie/_s_<?=$pathimgcategoria;?>);background-repeat:no-repeat;
														cursor:pointer;margin:10px;padding:10px;float:left;width:120px;height:120px;' id="anim<?=$id1;?>" class=<?=$colore;?> >
															<b class=<?$colore;?> ></b>
															<div id='fotodesc-<?=$id1;?>' class=<?=$colore;?> style='position:absolute;font-size:14px;padding:5px;'> 
																<a href='<? echo preg_replace("/[^0-9a-zA-Z]/","-",$descrizionecategoria)."/".$idsottocateg;?>'>
																<?=$descrizionecategoria;?>cc</a>
															</div>
															
															
															
															
														<? echo script($id1);?></div>
														
													<?}
													
													
													
													 }
													
													
													
													
													function trovale3categorie($i,$b){
													?>
													TERZE CATEGORIE  
													<?php 
														
														$ris=connetti_mysqlpublico();
														
														$sql="SELECT  *   FROM  categorie_1sub 
														where ex_categoriasub='$i'
														
														
														group by 	id_categoria_1sub ";
														$res=mysql_query($sql,$ris);
														$max= mysql_num_rows($res);
														
														while($val=mysql_fetch_assoc($res)){
															$id1++;
															if($id1%2==1)$colore="'ui-state-active ui-corner-all'"; //primo colore
															else $colore="'ui-state-default ui-corner-all'"; //secondo colore
															extract($val);
															$slart=" SELECT COUNT(serial) from products where products.terzacateforia_ed=$id_categoria_1sub  ";
															$risart=mysql_query($slart);
															$risfet=mysql_fetch_row($risart);
															
														?>
														
														
														<div style='background-image:url(<?=nomeserver();?>_nova_img/<?=$b;?>/imgcategorie/_s_<?=$urlpathcategoria_1sub;?>);background-repeat:no-repeat;
														cursor:pointer;margin:10px;padding:10px;float:left;width:120px;height:120px;position:relative;padding:5px;' id="anim<?=$id1;?>" class=<?=$colore;?> >
															<b class=<?php echo $colore;?> ></b>
															<div id='fotodesc-<?php $id1;?>'style='position:absolute;font-size:14px;padding:5px;z-index:2;' class=<?=$colore;?>>
																
																<a href='<?php echo preg_replace("/[^0-9a-zA-Z]/","-",$descategtre);?>/<?=$id_categoria_1sub;?>/'><?=$descategtre; ?></a>
																
																<span  style='top:0px;'>Articoli
																<? print_r($risfet[0]); ?></span>
															</div>	
															
															
															
														<? //echo script($id1);?> </div>
													<?}}
													
													
													
													function scorricategoriedaaccordion(){
														$i=idutente();
														
													?>CATALOGO
													<div id="accordion"  style='float:right;width:100%; font-size:14px;' ><?
														$ris=connetti_mysqlpublico();
														
														$sql="SELECT  *   FROM  categorie   where idex_rifutente='$i' ";
														$res=mysql_query($sql,$ris);
														$max= mysql_num_rows($res);
														
														while($val=mysql_fetch_assoc($res)){
															
															
															extract($val);
														?><h3><a href="#<?=$Categoria;?>"><?=$Categoria;?></a></h3>
														<div>
															
															<?
																$sqlsubcat=" SELECT * from categorie_sub where categoria_id ='$ID_categoria' ";
																$ressub=mysql_query($sqlsubcat,$ris);
																while($valsub=mysql_fetch_assoc($ressub)){
																	extract($valsub);
																	$sqlp="SELECT count(id_categoria_1sub) from categorie_1sub where ex_categoriasub='$idsottocateg'
																	order by id_categoria_1sub ";
																	$riss=mysql_query($sqlp);
																	$va=mysql_fetch_row($riss);
																	
																	if($va[0]>0){
																		//echo "<a href='?namecat=$descrizionecategoria&vedicateg=$idsottocateg'>
																		echo "<a href='".pathsitoutenza().preg_replace("/[^0-9a-zA-Z]/","-",$descrizionecategoria)."/$idsottocateg'
																		style='text-decoration:none;'>";}else{
																	echo "<a>";}
																	
																	
																	
																	echo $descrizionecategoria."</a>
																	
																	<hr>";
																	//
																}
															?>
															
															
															
															
														</div>
													<?}?></div><?}
													
													
													
													
													
													
													
													
													
													
													function scorricategoriecatalogoneldiv($i){
														$i=idutente();
														$ris=connetti_mysqlpublico();
														?><div class='ui-corner-all' style='margin-left:10px;margin-bottom:10px;' >
														<?
															$sql="SELECT  *   FROM  categorie   where idex_rifutente='$i' ";
															$res=mysql_query($sql,$ris);
															$max= mysql_num_rows($res);
															
															while($val=mysql_fetch_assoc($res)){
																$id1++;
																if($id1%2==1)$colore="'ui-state-active ui-corner-all'"; //primo colore
																else $colore="'ui-state-default ui-corner-all'"; //secondo colore
																extract($val);
															?>
															
															
															<div style='background-image:url(<? echo nomeserver()."_nova_img/".$idex_rifutente."/imgcategorie/_s_".$imgcategoria;?>);
															cursor:pointer;margin:10px;padding:10px;float:left;background-repeat:no-repeat;
															width:250px;height:190px;position:relative;' id="anim<?=$id1;?>" class=<?=$colore;?> >
																
																
																<?////<img src='".nomeserver()."_nova_img/".$idex_rifutente."/imgcategorie/_s_".$imgcategoria."' width='100px' align='middle'>
																?>
																<div id='fotodesc-<?=$id1;?>' class=<?=$colore;?>
																style='
																opacity:0.9;position:absolute;bottom:0px;padding:5px;min-height:40%;width:90%'  >
																	
																	<a href='<?php pathsitoutenza().$ID_categoria.'/'. preg_replace("/[^0-9a-zA-Z]/","-",$Categoria)?>/'
																	style='font-size:16px;color:#fffff;padding:10px;'><?=$Categoria;?></a>
																	
																	</a>
																</div>
																
																
																
																<? echo script($id1);?>
															</div>
														<?  }?>
														
														
													</div><?   }
													
													
													
													
													
													
													
													//DA MENU
													function scorricategoriecatalogo(){
														$i=idutente();
														$target = nomeserver()."_nova_img/".$i."/imgcategorie/";
														$ris=connetti_mysqlpublico();
													
															$sql="SELECT  *   FROM  categorie   where idex_rifutente='$i' order by idex_rifutente ";
															$res=mysql_query($sql,$ris);
															$max= mysql_num_rows($res);
															if($max>=1){	
																?>
<div id='sottomenu' class='ui-state-default'  >
	<ul><?php
															while($val=mysql_fetch_assoc($res)){
																extract($val);
																
																echo "<li class='ui-state-default ui-corner-all' >
																<a href='".pathsitoutenza().$ID_categoria."/". preg_replace("/[^0-9a-zA-Z]/","-",$Categoria)."/'>"
																.ucfirst(strtolower($Categoria))."</a>
																";
																
																$sqlsubcat=" SELECT * from categorie_sub where categoria_id ='$ID_categoria' order by idsottocateg limit 0, 50 ";
																$ressub=mysql_query($sqlsubcat,$ris);
																
																?><ul class='hidden'>
																<li class='ui-state-hover' style='position:fixed;left:5%;heigth:200px;width:90%;'>
																	<?
																		
																		while($valsub=mysql_fetch_assoc($ressub)){
																			
																			extract($valsub);
																			?><center><div  >
																				<img src="<?echo $target.'_s_'.$pathimgcategoria ?>" width='150px' align='middle'>
																				<?php
																				
																				$url_connect=$ID_categoria."/". preg_replace("/[^0-9a-zA-Z]/","-",$Categoria).'/'.$descrizionecategoria;
																					
																					echo $descrizionecategoria."<hr>";
																					
																					appoggiopersopra($valsub['idsottocateg'],$url_connect);
																					
																					
																					echo "</div></center>";
																					
																					
																					
																				}
																				echo'</li></ul>';
																				
																				
																				echo "</li>";
																			}
																			echo '</ul></div>';
																		?><script>
																				$('#sottomenu li ul').css({display: "none",left: "auto"});
		$('#sottomenu li').hover(function() {
			$(this).find('ul').stop(true, true).slideDown('fast');
			
			$(this).removeClass('ui-state-default');
			$(this).addClass('ui-state-hover');
			//$(this).css({'padding-bottom':'15px'});
		
			},
	function() {
		$(this).find('ul').stop(true,true).fadeOut('fast');
		
		$(this).removeClass('ui-state-hover');
			$(this).addClass('ui-state-default');
			// $(this).css({'padding-bottom':'0px''});
		});
																			</script>
																			<?
																			}
																		}
																		
																		
																		function appoggiopersopra($idsottocateg,$url_connect){
																			$ris=connetti_mysqlpublico();
																			$i=idutente();
																			$target = nomeserver()."_nova_img/".$i."/imgcategorie/";
																			$sqlp="SELECT * from categorie_1sub  where ex_categoriasub='$idsottocateg'   ";
																			$riss=mysql_query($sqlp);
																			
																			while($rs = mysql_fetch_assoc($riss)) {
																				
																			extract($rs);?>
																			
																			
																			<a href='<?echo pathsitoutenza().$url_connect.'/'.preg_replace("/[^0-9a-zA-Z]/","-",$descategtre);?>/<?=$id_categoria_1sub;?>/'>
																			
																			<img src='<?=$target.'_s_'.$urlpathcategoria_1sub; ?>' width='30px'border='0'>
																			<? echo ucfirst(strtolower($descategtre)) ; ?>	
																			</a><br>
																			
																			
																			
																			
																			<?}
																			
																			
																		}
																		
																		
																		
																		
																		function trovatutteleterzecategorie(){
																			?><center><div style=''><?
																				$i=idutente();
																				$ris=connetti_mysqlpublico();
																				$sql="SELECT * FROM  categorie_1sub , categorie  WHERE  categorie.idex_rifutente = '$i'  
																				and categorie_1sub.excategoria=categorie.ID_categoria group by id_categoria_1sub ";
																				
																				$r=mysql_query($sql,$ris);
																				
																				//var_dump(mysql_fetch_assoc($r));
																				$id1=0;
																				while ($f=mysql_fetch_assoc($r)){
																					
																					extract($f);
																					
																					$sqlart="SELECT count(serial) from products where  terzacateforia_ed ='$id_categoria_1sub' and id_utenteint='$i' ";
																					$max=mysql_query($sqlart,$ris);
																					$maxcount=mysql_fetch_array($max);
																					
																					
																					$id1++;
																					
																				?>
																				<div  id="animat<?=$id1;?>" style='cursor:pointer;margin:10px;padding:10px;float:left;width:200px;height:180px;'  class=<?=$colore;?> >
																					<? if($maxcount[0]==0){?>
																						<a href="#"><?}else{?><a href='<?echo pathsitoutenza().preg_replace("/[^0-9a-zA-Z]/","-",$descategtre);?>/<?=$id_categoria_1sub;?>/'>
																					<?}?><img src='<?=nomeserver();?>_nova_img/<?=$i;?>/imgcategorie/_s_<?=$urlpathcategoria_1sub;?>' border='0' width='200px'height='170px'>
																					</a>
																					
																					<div  id='foto<?=$id1;?>'class='ui-state-default ui-corner-all' style='border: 3px solid rgb(255, 241, 0);
																					margin: 1px;
																					overflow: hidden;
																					top:-25%;
																					position: relative;
																					width: 190px;
																					display: block;
																					
																					z-index: 2;'><h3><?=$descategtre; ?></h3>
																					<span  style='top:0px;'>Articoli
																					<? print_r($maxcount[0]); ?></span>
																				</div>
																				
																				
																				
																			</div>
																			
																			
																			
																			<script>
																				$("#foto<?=$id1;?>").hide();
																				$("#animat<?=$id1;?>").animate({'opacity':'0.4'});
																				$("#animat<?=$id1;?> img").hover(function(){  
																					//$("#anim<?=$id1;?> b").click(function(){  
																					$("#animat<?=$id1;?>").css({'border':'4px solid  rgb(255, 241, 0)','margin':'4px','margin-left':'8px'});
																					$("#animat<?=$id1;?>").stop().animate({'opacity':'1.0'});
																					//$("#anim<?=$id1;?>").stop().animate({'opacity':'1.0',top:'-10'});
																					$("#foto<?=$id1;?>").show('slow');
																					//    $(this).animate({top:'10'}, 300 );  
																				});  
																				//$("#anim<?=$id1?>").mouseleave(function(){  
																				$("#animat<?=$id1;?>").mouseleave(function(){  
																					$("#animat<?=$id1;?>").css({'border':'0','margin':'10px'});
																					
																					
																					//  $(this).animate({top: '0'}, 300 );  
																					//$("#fotodesc-<?=$id1;?>").hide();
																					
																					$(this).stop().animate({'opacity':'0.5',top:'0'},300);
																					//  $("#fotodesc-<?=$id1;?>").animate({'opacity':'0.0'});
																					$("#foto<?=$id1;?>").hide('slow');
																				}); 
																				</script><?
																				
																			}?> </div></center>
																			<?
																				
																			}
																			
																			
																			
																			
																			
																			
																			
																			
																			
																			
																			function scorritagutenza(){
																				$aray=arrautente();
																				?><div style='width:400px;margin-top:100px;height:Auto;float:left;' class='ui-state-default ui-corner-all'> <?
																					$r=explode(',',$aray['tagutente']);
																					shuffle($r);
																					$i=0;
																					
																					$ptag=str_replace('_','',$_GET['tag']);
																					foreach($r as $v){
																						if($v==$ptag){$class="class='ui-state-highlight ui-corner-all'";
																							$font=rand(25,26);
																							$pad=rand(3,8);
																							}else{$class='';
																							
																							$font=rand(10,25);
																							$pad=rand(3,8);
																						}
																						
																						?><div style='float:left;font-size:<?=$font;?>px;padding:<?=$pad;?>px;' <?=$class;?> >
																						<a href='<?echo pathsitoutenza().utf8_encode($v);?>_'style='text-decoration:none;' ><?echo utf8_encode($v);?></a></div><?
																						if($i > 8){ break;}
																						$i++;
																					}
																				?></div><?
																				echo $ptag;
																			}
																			
																			
																			
																			
																			
																			
																			
																			
																			
																																