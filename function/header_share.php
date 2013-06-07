<?php
require  'clspubbliche/clsutenza.php';

error_reporting(E_WARNING);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengrahprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" > 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="index, follow">
<?php
// chiama META TAG
include "clspubbliche/clsmetatag.php";
$array=arrautente(); 
metahome();

?>
<meta name="google-site-verification" content="oEKMVrXz_dBCx7uCaSu0j4gFUzqBkMJKSlt-Dl59CiI" />	
<link href="<?php echo root_shared();?>style_share.css" rel="stylesheet" type="text/css">
<link href="<?php echo pathintapp();?>development-bundle/themes/<?php echo $array['webstile'];?>/jquery.ui.all.css" rel="stylesheet" type="text/css">
<link rel="Shortcut Icon" href="<?php echo root_shared();?>favicon.ico" type="image/x-icon">
<script type="text/javascript" src="<?php echo root_shared();?>ui/jquery-1.8.3.js"></script> 
<script type="text/javascript" src="<?php echo root_shared();?>ui/jcorn.js"></script> 
<script type="text/javascript" src="<?php echo root_shared();?>ui/jquery-ui-1.9.2.custom.min.js"></script> 
<script type="text/javascript" >
  var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-XXXXX-X']); _gaq.push(['_trackPageview']);
  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })();
  	
  	//selectautoiconcatenate 
	$(document).ready(function(){
		var scegli = '<option value="0">Scegli...</option>';
		var attendere = '<option value="0">Attendere...</option>';
		$("select#province").html(scegli);
		$("select#province").attr("disabled", "disabled");
		$("select#comuni").html(scegli);
		$("select#comuni").attr("disabled", "disabled");
		$("select#regioni").change(function(){
			var regione = $("select#regioni option:selected").attr('value');
			$("select#province").html(attendere);
			$("select#province").attr("disabled", "disabled");
			$("select#comuni").html(scegli);
			$("select#comuni").attr("disabled", "disabled");
			$.post("slider/select.php", {id_reg:regione}, function(data){
				$("select#province").removeAttr("disabled"); 
				$("select#province").html(data);	
			});
		});	
		$("select#province").change(function(){
			$("select#comuni").attr("disabled", "disabled");
			$("select#comuni").html(attendere);
			var provincia = $("select#province option:selected").attr('value');
			$.post("slider/select.php", {id_pro:provincia}, function(data){
				$("select#comuni").removeAttr("disabled");
				$("select#comuni").html(data);	
			});
		});	
	});
	
	
 //SLIDER IMG 
function centralegrande(timer) {var $active = $('#sliderimmaging IMG.active');if ( $active.length == 0 ) $active = $('#sliderimmaging IMG:last');	var $next =  $active.next().length ? $active.next()	: $('#sliderimmaging IMG:first');$active.addClass('last-active');$next.css({opacity: 0.0}).addClass('active')	.animate({opacity: 1.0}, timer, function() {$active.removeClass('active last-active');					});
					};
function snbrand(timer) {var $active = $('#testadxmarche IMG.active');if ( $active.length == 0 ) $active = $('#testadxmarche IMG:last');	var $next =  $active.next().length ? $active.next()	: 
$('#testadxmarche IMG:first');$active.addClass('last-active');

$next.css({opacity: 0.0}).addClass('active').animate({opacity: 1.0}, timer, function() {$active.removeClass('active last-active');});
					};
					
$(function() {
					setInterval( "centralegrande(1000)", 3000 );
					setInterval( "snbrand(1000)", 3000 );
					});
					
				/*	
 	$(function(){
				$('.ui-state-default').hover(
				
					function(){$(this).addClass('ui-state-hover');},
					function(){$(this).removeClass('ui-state-hover');}
				)
				.mousedown(function(){$(this).addClass('ui-state-active');})
				.mouseup(function(){$(this).removeClass('ui-state-active');})
				.mouseout(function(){$(this).removeClass('ui-state-active');});
			});
			
			*/
			
				$(function(){
			$( "button, input:submit" ).button();
			//$( "button, input:submit,a" ).button();
		//$( "a", ".demo" ).click(function() { return false; });
		
	//	$( '#nasc > li > ul' ).hide().click(function( e ){e.stopPropagation();});$('#nasc > li').toggle(function(){
	 // $(this).find('ul').slideDown();}, function(){$( this ).find('ul').slideUp();});

	 

		
	//$( "#accordion" ).accordion();
		$( "#accordion" ).accordion({collapsible: true, active :0});
 $( "#acc" ).accordion({header: "h3" ,	collapsible: true,autoHeight: false,navigation: true ,active:'none'});
	$("button, input:submit").tooltip();
$("a").tooltip();
	$('#tabs').tabs();
	
	
});
</script>

