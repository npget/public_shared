<?
	
	connetti_mysqlpublico();
	$array=arrautente();
	function stamparticolo($e){
		$array=arrautente(); 
		$id=idutente();
		$ris=connetti_mysqlpublico();
		$sql="SELECT * from products, categorie ,categorie_sub,marchebrand ,utenti 
		where 
		
		products.serial ='$e' 
		and products.id_utenteint ='$id'
		and  products.marchebrand_idex=marchebrand.id_marca  
		and products.IDCategoria=categorie.ID_categoria 
		and  products.sottocategoria_id = categorie_sub.idsottocateg 
		ORDER BY  serial   desc LIMIT 1;";
		$risquery=mysql_query($sql,$ris);
		$valori=mysql_fetch_array($risquery);
		extract ($valori);	
		
	?>
	
	
	<link rel="stylesheet" href="<?=root_shared();?>ui/scorriart.css" type="text/css" />
	
	<script type="text/javascript" src="<?=root_shared();?>ui/jquery.slider2013.js"></script>
	<script type="text/javascript" src="<?=root_shared();?>ui/jquery.opacityrollover.js"></script>
	
	
	
	
	
	<div id="gallery" class="content">
		<div id="controls" class="controls"></div>
		<div class="slideshow-container">
			<div id="loading" class="loader"></div>
			<div id="slideshow" class="slideshow" ></div>
			<!--<div id="slideshow" class="slideshow"></div>-->
		</div>
		<div id="caption" class="caption-container"></div>
	</div>	
	
	
	
	<div id="thumbs" class="navigation">
		<ul class="thumbs noscript">
			
			
			<?
				
				
				//RISTAMPA LE IMMAGGINI AZIENDALI 
				//$ir= unserialize($pathimg);
				$ris=connetti_mysqlpublico();
				$tpath="SELECT * FROM pathimgcatalogo where idex_art='$serial'   ;";
				$rsu=mysql_query($tpath);
				while($rsutl=mysql_fetch_array($rsu)){
					
					extract($rsutl);
					
					$paththumb=nomeserver()."_nova_img/".$id_utenteint."/publicimgcatalog/thumb150x150/";
					$patht250=nomeserver()."_nova_img/".$id_utenteint."/publicimgcatalog/thumb250x250/";
				?>
				<li>
					<a class="thumb" name="leaf" href="<? ECHO $patht250;print_r($pathimg);?>"  title="<?=$file;?>">
					<img src="<?ECHO $paththumb;print_r($pathimg);?>" width='50px' />
					</a>
					<div class="caption">
						<div class="download">
							<a href="<? ECHO nomeserver().'pdf.'.eregi_replace("=","",base64_encode($serial));?>/<? echo eregi_replace(" ","-",$name); ?>" target='_blank'>SCHEDA </a>
						</div>
						<div class="image-title"><?=$name.'-'.$file;?></div>
						<div class="image-desc">GRANDEZZA ORIGINALe</div>
					</div></li>
					
					
			<?}?>
		</ul></div>
		
		
		
		<div id='tabs' style='float:left;width:95%;position:relative;margin-left:2.5%;margin-right:2.5%' >
			<ul style='border:none;'   >
				
				<li >
					
				<a href='#desc'>Caratteristiche</a></li>
				<li><a href='#note'>Note varie</a></li>
				<li><a href='#artlink'>Prodotti Correlati </a></li>
				
			</ul>
			<div id='desc' style='height:300px;'>
				Nome <? echo $name; ?><br>
				Id <? echo $serial; ?><br>
				Codice <? echo $Codint; ?><br>
				<table border='1'>
					<?
						$select="Select referenzearticoli from categorie_sub where categoria_id='$IDCategoria' ;";
						$selris=mysql_query($select);
						$risselect=mysql_fetch_assoc($selris);
						$v=unserialize($risselect['referenzearticoli']);
						$r=unserialize($ubicazione);
						$conta=0; 
						$coppiahtml=$html=''; 
						foreach($v as $vt => $nomeval)
						{ 
							$coppiahtml.="<td width='50px'>".utf8_encode($nomeval)."
							</td><td>".utf8_encode($r[$vt])."</td>";
							if($conta%2==1){ 
								$html.="<tr>$coppiahtml</tr>";     
								$coppiahtml=''; 
							} 
							
							$conta++; 
						} if($coppiahtml)$html.="<tr>$coppiahtml<td colspan='2'></td></tr>";            
						
						
						echo $html;
					?>
					
					
					
					
					
					
					<??>
					
					
					
					
					
					
				</table>
			</div>
			<div id='note'><?
				
			echo (($Note));?></div>
			<div id='artlink'>
				<center>
					N.D.
				</center></div>
				
				
		</div>
		
		
		
		
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '50%', 'float' : 'left','position':'relative'});
				$('div.content').css('display', 'block');
				
				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.5;
				$('#thumbs ul.thumbs li').opacityrollover({
			mouseOutOpacity:   onMouseOutOpacity,
			mouseOverOpacity:  1.0,
			fadeSpeed:         'fast',
			exemptionSelector: '.selected'
			});
			
			// Initialize Advanced Galleriffic Gallery
			var gallery = $('#thumbs').galleriffic({
			delay:                     2500,
			numThumbs:                 15,
			preloadAhead:              10,
			enableTopPager:            true,
			enableBottomPager:         true,
			maxPagesToShow:            7,
			imageContainerSel:         '#slideshow',
			controlsContainerSel:      '#controls',
			captionContainerSel:       '#caption',
			loadingContainerSel:       '#loading',
			renderSSControls:          true,
			renderNavControls:         true,
			playLinkText:              'Play Slideshow',
			pauseLinkText:             'Pause Slideshow',
			prevLinkText:              '&lsaquo; Previous Photo',
			nextLinkText:              'Next Photo &rsaquo;',
			nextPageLinkText:          'Next &rsaquo;',
			prevPageLinkText:          '&lsaquo; Prev',
			enableHistory:             false,
			autoStart:                 false,
			syncTransitions:           true,
			defaultTransitionDuration: 900,
			onSlideChange:             function(prevIndex, nextIndex) {
			// 'this' refers to the gallery, which is an extension of $('#thumbs')
			this.find('ul.thumbs').children()
			.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
			.eq(nextIndex).fadeTo('fast', 1.0);
			},
			onPageTransitionOut:       function(callback) {
			this.fadeTo('fast', 0.0, callback);
			},
			onPageTransitionIn:        function() {
			this.fadeTo('fast', 1.0);
			}
			});
			});
			</script>
			
			
			
			
			
			<?php }
			
			
			
			
			
			function articoloprivato($pubblico,$nomeaziendale,$IDUtente){
			if($pubblico==="PUBBLICO OFF"){
			$idutente=base64_encode($IDUtente);
			
			messaggionew2012("ARTICOLO PRIVATO ! </h1><h1><b>$nomeaziendale</b>",
			"<a>LASCIA MESSAGGIO </a>
			<form method='POST'>
			<fieldset>
			<textarea style='font-family:Trebuchet ms;font-size:14px;overflow:auto' cols='50'row='6' > </textarea>
			<Input type='submit' name='INVIA MESSAGGIO '></fieldset>
			</form>
			<hr> <a href='../../PUB/utenti/?FormRegister=$idutente'>VEDI UTENTE</a>","");
			
			
			exit;
			
			}}
			
			function tabellaarticoli33($e){
			error_reporting(E_ALL);
			$ris=connetti_mysqlpublico();
			
			
			$sql="SELECT * from products, categorie ,categorie_sub,marchebrand ,utenti 
			where 
			
			products.serial ='$e' 
			and products.id_utenteint =utenti.IDUtente 
			and  products.marchebrand_idex=marchebrand.id_marca  
			and products.IDCategoria=categorie.ID_categoria 
			and  products.sottocategoria_id = categorie_sub.idsottocateg 
			ORDER BY  serial   desc LIMIT 1;";
			$risquery=mysql_query($sql,$ris);
			$valori=mysql_fetch_array($risquery);
			extract ($valori);	
			
			
			
			?>
			<title><?=$name;?> <?=$Codint;?></title>
			<link rel="stylesheet" href="<?=root_shared();?>ui/basic.css" type="text/css" />
			<link rel="stylesheet" href="<?=root_shared();?>ui/slider-2.css" type="text/css" />
			<script type="text/javascript" src="<?=root_shared();?>ui/jquery-1.8.3.js"></script>
			<script type="text/javascript" src="<?=root_shared();?>ui/jquery.slider2013.js"></script>
			<script type="text/javascript" src="<?=root_shared();?>ui/jquery.opacityrollover.js"></script>
			
			<script type="text/javascript">
			document.write('<style>.noscript { display: none; }</style>');
			</script>
			</head>
			<html>
			
			<?
			
			//articoloprivato($pubblico,$nomeaziendale,$IDUtente);
			
			?><body>
			<div >
			<div id="container">
			
			
			
			
			
			
			
			<div id="gallery" class="content">
			<div id="controls" class="controls"></div>
			<div class="slideshow-container">
			<div id="loading" class="loader"></div>
			<div id="slideshow" class="slideshow" ></div>
			<!--<div id="slideshow" class="slideshow"></div>-->
			</div>
			<div id="caption" class="caption-container"></div>
			</div>	
			
			
			
			
			
			<div id="thumbs" class="navigation">
			<ul class="thumbs noscript">
			
			
			<?
			
			
			//RISTAMPA LE IMMAGGINI AZIENDALI 
			//$ir= unserialize($pathimg);
			$ris=connetti_mysqlpublico();
			$tpath="SELECT * FROM pathimgcatalogo where idex_art='$serial'   ;";
			$rsu=mysql_query($tpath);
			if(!mysql_num_rows($rsu)){  echo'FOTONON DISPO';
			}
			while($rsutl=mysql_fetch_array($rsu)){
			
			extract($rsutl);
			
			$paththumb=nomeserver()."_nova_img/".$id_utenteint."/publicimgcatalog/thumb150x150/";
			$patht250=nomeserver()."_nova_img/".$id_utenteint."/publicimgcatalog/img/";
			?>
			<li>
			<a class="thumb" name="leaf" href="<? ECHO $patht250;print_r($pathimg);?>"  title="<?=$file;?>">
			<img src="<?ECHO $paththumb;print_r($pathimg);?>" width='50px' />
			</a>
			<div class="caption">
			<div class="download">
			<a href="<? ECHO nomeserver().'gestionedati/labelART/?idpax='. base64_encode($serial);?>" target='_blank'>SCHEDA </a>
			</div>
			<div class="image-title"><?=$name.'-'.$file;?></div>
			<div class="image-desc">GRANDEZZA ORIGINALe</div>
			</div></li>
			
			
			<?}?>
			</ul></div></div></div>
			<!--
			
			<div id='tabs'>
			<ul>
			<li><a href='#note'>NOte</a></li>
			<li><a href='#note1'>NOte2</a></li>
			</ul>
			<div id='note'><? //echo (($Note));?></div>
			<div id='note1'><? //echo (($Note));?></div>
			
			
			</div>
			-->
			
			
			
			
			
			<?php }
			
			
						