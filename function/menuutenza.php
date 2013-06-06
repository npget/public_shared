

<div id='loginhide' style='position:realtive;width:100%;;padding:5px;display:block;'>wewerewr</div>



<div  style='border:0;height:100px; width:100%;' >
	
	
	
<div id='logoutenza' style="	background-image:url(<?php echo nomeserver().'_nova_img/'.idutente().'/imgutenza/_s_';print_r($array['weblogo']);?>);	">
	</div>
	
	
	
	
	<div id='menu'>
		
		
		<ul id='menu'  >
			<li  > <a onclick="location.href='<?php echo pathsitoutenza();?>home'"
				class="ui-state-<? echo $_SESSION['1']['index'];?> ui-corner-all">HOME</a>
				
			</li>        
			<!--
				<li><a onclick="location.href='<?=pathsitoutenza();?>CATALOGO'"
				class="ui-state-<? echo $_SESSION['1']['catalogo'];?> ui-corner-all"> CATALOGO</a>
				</li>
				
			-->
			
			
			<li ><a onclick="location.href='<?=pathsitoutenza();?>news/'"
				class="ui-state-<?echo $_SESSION['1']['news'];?> ui-corner-all"  >
			NEWS</a></li>
			<li><a onclick="location.href='<?=pathsitoutenza();?>contact/'"
				class="ui-state-<?echo $_SESSION['1']['home'];?> ui-corner-all">
				CONTATTI </a>
			</li>
			
			<li>
				<? formricerca();?>
			</li>
			
		</ul>
		
	</div>
	
	<div id='login' style='position:relative;float:right;right:0px;width:20%;z-index:3;margin-top:-30px;cursor:pointer' >
		Login
		<script language="javascript" src='<?=root_shared();?>liveclock.js'></script>
	</div>
	
		<? 
			//dentro clutenza
			scorricategoriecatalogo();
		?>
	
</div>
<div style='clear:both;'></div>
<script>
	$("#loginhide").hide();
	$("#login").click(function(){  
		//$("#anim<?=$id1;?> b").click(function(){  
		$("#loginhide").show('slow');
		
		
		
	});
	
	$(function(){
		$('#menu a').hover(
		
		function(){$(this).addClass('ui-state-highlight');}
		
		)
		
		.mousedown(function(){$(this).removeClass('ui-state-highlight');})
		//.mouseup(function(){$(this).addClass('ui-state-highlight');})
		.mouseout(function(){$(this).removeClass('ui-state-highlight');})
		
		
		
	});
	
	/*
		$(function() {
		$("#logoutenza").animate({'opacity':'1.8'})
		
		.hover(function(){$(this).animate({'left':'90%'}); })
		//.mouseup(function(){$(this).animate({'left':'0px'}); })
		.mouseout(function(){$(this).animate({'left':'0px'}); })
		
		
		
		$("#dopologo").animate({'opacity':'1.0'})
		})
	*/
</script>