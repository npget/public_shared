<?

include 'clspubbliche/clsarticoliperslide.php';



if($_GET['serial']){
$e=$_GET['serial'];

tabellaarticoli33($e);
}

	?><script type="text/javascript" src="<?=pathsito();?>ui/jquery-1.8.3.js"></script>
 <style> #contenuto{ width:100%; height:100%; margin:15px;} .testo{ margin:20px; width:90%;} 
#torna{ float:right; width:50%; height:120px; font-size:24px; margin-top:30px; } 
.titolo_box{ margin-left:20px;} .testo-box{ margin:15px;} .apri{ font-size:18px; font-family:Verdana, Geneva, sans-serif; float:right; margin-right:50px;} 
.apri:hover{  font-family:Verdana, Geneva, sans-serif; cursor:pointer;} .chiudi{ font-size:18px; color:#000; font-weight:bold; position:absolute; right:2%; top:0%; cursor:pointer;}  
#box {font-size:14px; padding:10px;width:100%;background-color:#FFF; display:none; z-index:+300; position:absolute; left:30%; top:10%; -moz-border-radius: 15px; -webkit-border-radius: 15px; border-radius: 15px;}
.overlay{ display:none; background:#000; position:fixed; top:0px; bottom:0px;font-size:13px; left:0px; right:0px; z-index:100; cursor:pointer; /*Trasperenza cross browser*/ opacity: 0.7; filter: alpha(opacity=70); -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=70)"; } #box input{ background-color:orange;} hr { -moz-border-bottom-colors: none; -moz-border-image: none; -moz-border-left-colors: none; -moz-border-right-colors: none; -moz-border-top-colors: none; border-color: #CCCCCC; border-right: 0 solid #CCCCCC; border-style: solid; border-width: 1px 0 0; width:60%} 
</style> <script> 
$(document).ready(function() {
 $(".apri").click( function(){
 $('#overlay').fadeIn('fast'); $('#box').fadeIn('slow'); }); 
 $(".chiudi").click( function(){ $('#overlay').fadeOut('fast'); 
 $('#box').hide(); }); $("#overlay").click( function(){ 
 $(this).fadeOut('fast'); $('#box').hide(); }); }); </script> 



<div class="overlay" id="overlay"></div><!--Overlay non toccare!-->
<div id="box">
<h3>CREA Nuova Directory</h3>

<?
if($_GET['serial']){
$e=$_GET['serial'];

tabellaarticoli33($e);
}

?>
<p class="chiudi">X</p>
</div>	


			


			<div style="clear: both;"></div>
					 <a href='#foto' class="apri" >nuova cartella</a>	
			
		<!--<script type="text/javascript">
jQuery(document).ready(function($) { 
$('div.navigation').css({'width' : '99%', 'float' : 'left'}); 
$('div.content').css('display', 'block'); var onMouseOutOpacity = 0.67; 
$('#thumbs ul.thumbs li').opacityrollover({ mouseOutOpacity: onMouseOutOpacity, mouseOverOpacity: 1.0, fadeSpeed: 'fast', exemptionSelector: '.selected' }); 
var gallery = $('#thumbs').galleriffic({ delay: 2500, numThumbs: 17, preloadAhead: 10, enableTopPager: true, enableBottomPager: false, maxPagesToShow: 7, imageContainerSel: '#slideshow', controlsContainerSel: '#controls', captionContainerSel: '#caption', loadingContainerSel: '#loading', renderSSControls: true, renderNavControls: true, playLinkText: 'Play Slideshow', pauseLinkText: 'Pause Slideshow', prevLinkText: '‹ Previous Photo', nextLinkText: 'Next Photo ›', nextPageLinkText: 'Next ›', prevPageLinkText: '‹ Prev', enableHistory: false, autoStart: false, syncTransitions: true, defaultTransitionDuration: 900, onSlideChange: function(prevIndex, nextIndex) { this.find('ul.thumbs').children() .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end() .eq(nextIndex).fadeTo('fast', 1.0); }, 
onPageTransitionOut: function(callback) { this.fadeTo('fast', 0.0, callback); }, onPageTransitionIn: function() { this.fadeTo('fast', 1.0); } }); }); 
		</script>
		-->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '300px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
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
		<div style='position:absolute;bottom:1px;right:10px'>
<table><td>
			<div id="fb-root" ></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1&appId=411187172266211";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments"  data-href="<?='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" data-width="470" data-num-posts="2"></div>
</td></table></div>
		
		</body>
		</html>
		<?
		
		?>
		
	