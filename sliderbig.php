<?
//usato da slider immagini utenza 
function immaginislider1000(){
$i=idutente();

$sqlslide="SELECT * from webslider where id_exrifutente='$i' order by id_ordineslide ";
$rislide=mysql_query($sqlslide);
if(mysql_num_rows($rislide) > 0 ){
//$ir= unserialize($urlimmaginicommeciali);

while($reslide=mysql_fetch_assoc($rislide)){

extract($reslide);
$array.="{'title': '".utf8_encode($title)."','image':'".nomeserver()."_nova_img/$id_exrifutente/imgaziendali/_s_$image',
		'url':'$url','firstline':'".utf8_encode($firstline)."',
		'secondline':'".utf8_encode($secondline)."','firstcolor':'$firstcolor','secondcolor':'$secondcolor'},";
}
?>
<script type="text/javascript">
var slideshowSpeed = 6000;
//clsutenza
var photos = [ <?=substr($array, 0, strlen($array)-1);?>];



$(document).ready(function() {
		
	// Backwards navigation
	$("#back").click(function() {
		stopAnimation();
		navigate("back");
	});
	
	// Forward navigation
	$("#next").click(function() {
		stopAnimation();
		navigate("next");
	});
	
	var interval;
	$("#control").toggle(function(){
		stopAnimation();
	}, function() {
		// Change the background image to "pause"
		$(this).css({ "background-image" : "url(<?=root_shared();?>img/btn_pause.png)" });
		
		// Show the next image
		navigate("next");
		
		// Start playing the animation
		interval = setInterval(function() {
			navigate("next");
		}, slideshowSpeed);
	});
	
	
	var activeContainer = 1;	
	var currentImg = 0;
	var animating = false;
	var navigate = function(direction) {
		// Check if no animation is running. If it is, prevent the action
		if(animating) {
			return;
		}
		
		// Check which current image we need to show
		if(direction == "next") {
			currentImg++;
			if(currentImg == photos.length + 1) {
				currentImg = 1;
			}
		} else {
			currentImg--;
			if(currentImg == 0) {
				currentImg = photos.length;
			}
		}
		
		// Check which container we need to use
		var currentContainer = activeContainer;
		if(activeContainer == 1) {
			activeContainer = 2;
		} else {
			activeContainer = 1;
		}
		
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
		
	};
	
	var currentZindex = -1;
	var showImage = function(photoObject, currentContainer, activeContainer) {
		animating = true;
		
		// Make sure the new container is always on the background
		currentZindex--;
		
		// Set the background image of the new active container
		$("#headerimg" + activeContainer).css({
			"background-image" : "url(" + photoObject.image + ")",
			"display" : "block",
			"z-index" : currentZindex
		});
		
		// Hide the header text
		$("#headertxt").css({"display" : "none"});
		
		// Set the new header text
		$("#firstline").css({"background-color":photoObject.firstcolor,"color":photoObject.secondcolor,'opacity':'0.7'});
		$("#firstline").html(photoObject.firstline);
	
		$("#secondline").css({"background-color":photoObject.secondcolor,"color":photoObject.firstcolor,'opacity':'0.6'});
			$("#secondline").attr("href", photoObject.url)
			.html(photoObject.secondline);
			$("#pictured").css({"background-color":photoObject.firstcolor});
		$("#pictureduri").css({"color":photoObject.secondcolor,"opacity":"0.7"})
				$("#pictureduri")	.attr("href", photoObject.url)
			.html(photoObject.title);
		
		
		// Fade out the current container
		// and display the header text when animation is complete
		$("#headerimg" + currentContainer).fadeOut(function() {
			setTimeout(function() {
				$("#headertxt").css({"display" : "block"});
				animating = false;
			}, 500);
		});
	};
	
	var stopAnimation = function() {
		// Change the background image to "play"
		$("#control").css({ "background-image" : "url(<?=root_shared();?>img/btn_play.png)" });
		
		// Clear the interval
		clearInterval(interval);
	};
	
	// We should statically set the first image
	navigate("next");
	
	// Start playing the animation
	interval = setInterval(function() {
		navigate("next");
	}, slideshowSpeed);
	
});

</script>
<style>

#header { height:312px; position:relative;z-index:3;
margin-left: -27px;
margin-right: -27px;
margin-top:-4px;
margin-bottom:49px;
}
.headerimg {
 background-position: center top;
 background-repeat: no-repeat; width:99%; height:650px; position:absolute;
 	-webkit-border-bottom-left-radius: 26px;
	-webkit-border-bottom-right-radius: 26px;
 background-size: 100%;
 }


/* HEADER TEXT */
#headertxt { width:98%;clear:both  ;display:block;position:relative; top:60%; }
#firstline { color: rgb(255, 255, 255);
font-size: 20px;
padding: 4px 13px 7px;
float: right;
display: block;
opacity: 0.8;
background-color: orange; 

	-moz-border-radius: 6px 6px 0 0;
	-webkit-border-top-left-radius: 16px;
	-webkit-border-top-right-radius: 16px;

letter-spacing:2px;

}
#secondline {
-webkit-border-top-left-radius: 16px;
	-webkit-border-bottom-left-radius: 16px;

background-color: #fff;

color: orange;


 text-decoration:none; font-size:40px; padding:0 13px 10px; float:right;
 opacity:0.6; display:block; clear:both; }
#secondline:hover {



color:green; }

.pictured {opacity:0.7;
	-webkit-border-bottom-left-radius: 16px;
background-color:rgb(51, 118, 204); color:#FFF; font-size:12px; padding:9px 36px; text-transform:uppercase; float:right; display:block; clear:both; margin-top:0px; }
.pictured a { 
font-size:16px; font-style:italic; letter-spacing:0; text-transform:none; color:#FFF; text-decoration:none; }
.pictured a:hover {


 text-decoration:underline; }





/* CONTROLS */
.btn { height:32px; width:32px; float:left; cursor:pointer; }
#back { background-image:url("<?=root_shared();?>img/btn_back.png"); }
#next { background-image:url("<?=root_shared();?>img/btn_next.png"); }
#control { background-image:url("<?=root_shared();?>img/btn_pause.png"); }

/* HEADER HAVIGATION */
#headernav-outer { position: relative;
bottom: -120%;
margin: 0 auto;
padding-left: 20%;}
#headernav {
padding-left: 30%;
 }

/* CONTENT */
#content { color:#575757; background-color:#eee; }
#content p { padding:10px 20px; font-size:16px; width:96%; margin:0 auto; }
#content p a { text-decoration:none; color:#CD2B3A; }
#content p a:hover { text-decoration:underline; color:#7F000C; }
</style>
<div style='clear:both;'></div>
<div id="header">
	
	<div id="headerimgs">
		<div id="headerimg1" class="headerimg"></div>
		<div id="headerimg2" class="headerimg"></div>

	</div>
	<!-- Top navigation on top of the images -->


	<div id="headernav-outer">		

		<div id="headernav">
			<div id="back" class="btn"></div>
			<div id="control" class="btn"></div>
			<div id="next" class="btn"></div>
		</div>
	</div>

	<div id="headertxt">
		<p class="caption">
			<span id="firstline" ></span>
			<a href="#" id="secondline"></a>
		</p>
		<p class="pictured" id='pictured'>
			
			<a href="#" id="pictureduri"></a>
		</p>
	</div>
</div>
<div style='height:159px;'><hr></div>
<?
}
}
immaginislider1000();
?>

