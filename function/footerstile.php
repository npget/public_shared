<div id='footer' class='ui-state-default ui-corner-all' >
<div class='ui-state-highlight ui-corner-all' style='margin-left:10%;border:0;width:80%;align:center;'>
<p style='padding:8px;'><?echo nl2br(utf8_encode($array['webfooter']));?></p>
<style>
#subfooter { list-style:none; width:50%;height:26px;}
#subfooter li{ float:left; padding: 5px;margin:10px;}
#subfooter a{ cursor:pointer;padding:9px;}
#subfooter li{box-shadow:5px 12px 17px 2px black;}

</style>
<ul id='subfooter' >


<?

if($array['webprivacy']!=""){?>
<li >
<div id="dialog"  title="Privacy di _  <?=$array['nomeaziendale'];?>">
<?echo nl2br(utf8_encode($array['webprivacy']));?></div>
<a  id='dialog_link' >
PRIVACY</a>
</li>
<?}

if($array['webwelcome']!=""){?>
<li >
<div id="msgwelcome"  title="Benvenuto - <?=$array['nomeaziendale'];?>">
<?echo nl2br(utf8_encode($array['webwelcome']));?></div>
<a  id='msgwelcome_link' >
WELCOME</a>
</li>
<?}?>



<li>
<a href='' > ALTRE</a>
</li>


</ul>
<script>
$('#subfooter a').addClass('ui-state-highlight ui-corner-all');
$('#subfooter li').hover(function(){$(this).find('a').css({'position':'relative','top':'-20px'});})
$('#subfooter li').mouseleave(function(){$(this).find('a').css({'position':'relative','top':'0px'});})
$(function() {

$('#dialog').dialog({
					autoOpen: false,
					width: 800,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}
					}
				});
	$('#dialog_link').click(function(){
					$('#dialog').dialog('open');
					return false;
				});
				
				$('#msgwelcome').dialog({
				<?if(($array['webwelcome']!="")and($_SESSION['nomeopvisitato']!=$array['nomeaziendale'])){?>
					autoOpen: true ,<?}else{?>
					autoOpen: false,
					<?}?>

					width: 800,
					buttons: {
						"Ok": function() {$(this).dialog("close");},
						"Contatti": function() {$(this).dialog("close");}
					}
				});
				
				
				
				$('#msgwelcome_link').click(function(){
					$('#msgwelcome').dialog('open');
					return false;
				});
			
				
				
				})
</script>





</div><div style='clear:both;'></div>

<div>
<p>
I.P.<?php
$_SESSION['nomeopvisitato']=$array['nomeaziendale'];

 echo $_SERVER['REMOTE_ADDR'];?>
... <a href='http://novaproget.com'> Novaproget</a> 
</p>	
</div>

                 </div> 

<div id="social-icons-wrapper">
<div id="social-icons" >
<div id="social-icons-inner">
<? if($array['socialgoogle']!=""){?>
<a target="_blank" href="<?=$array['socialgoogle'];?>">
<img width="25" height="25" 
src="<?=root_shared();?>img/g-plus-icon-wrapper-25x25.png" ></a><?}?>
<? if($array['socialtwitter']!=""){?>
<a target="_blank" href="<?=$array['socialtwitter'];?>">
<img width="25" height="25" 
src="<?=root_shared();?>img/twitter-wrapper-icon-25x25.gif" ></a><?}?>
<? if($array['socialfacebook']!=""){?>
<a target="_blank" href="<?=$array['socialfacebook'];?>">
<img width="25" height="25" 
src="<?=root_shared();?>img/facebook-icon_25x25.png" ></a><?}?>
<? if($array['socialskype']!=""){?>
<a target="_blank" href="<?=$array['socialskype'];?>" title='Connetti con skype'>
<img width="25" height="25" 
src="<?=root_shared();?>img/skype_icon_wrapper.jpg" ></a><?}?>



</div></div></div>



<div id='tornaup'  style='bottom: 15px;position: fixed;opacity:0.5;
right: 5px;padding:4px;z-index:6;' class='ui-state-active ui-corner-all'><a href='#top'  >
<img src="<?=root_shared();?>img/novaup.png" border='0'>
</a></div>
<script>
function bottoni()
{var offset = $("#social-icons").offset();
var topPadding = 0;
$(window).scroll(function() {
if ($(window).scrollTop() > offset.top) {
$("#social-icons").stop().animate({marginTop: $(window).scrollTop() - offset.top + topPadding});
  } else {$("#social-icons").stop().animate({marginTop: 0});};
 });}bottoni();
 
 
 
	// fade in #back-top
	$("#tornaup").hide();
	

	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#tornaup').fadeIn('slow');
				$('#tornaup').hover(function(){
				$(this).css({'opacity':'1'});})
				$('#tornaup').mouseleave(function(){
				$(this).css({'opacity':'0.5'});})
			} else {
				$('#tornaup').fadeOut('slow');
			}
		});

		// scroll body to 0px on click
		$('#tornaup a').click(function () {
		$('#tornaup').removeClass('ui-state-active');
		$('#tornaup').addClass('ui-state-highlight');
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
 

</script>
<pre>
<?
//print_r($_SERVER);



?>
</pre>

</body></html>