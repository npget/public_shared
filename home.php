<?php
session_start();
error_reporting(0);

$_SESSION['1']['index']='default';
$_SESSION['1']['catalogo']='default';
$_SESSION['1']['home']='highlight';
$_SESSION['1']['news']='default';





include 'function/header_share.php'; 

$array=arrautente();
$mappatura=unserialize($array['mappaziendale']); 
?>

<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> 
<script>
$(window).load(function(){

    function initialize() {
        var map_options = {
            center: new google.maps.LatLng(<?php echo $mappatura[0];?>,<?php echo  $mappatura[1];?>),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var google_map = new google.maps.Map(document.getElementById("map_canvas"), map_options);

        var info_window = new google.maps.InfoWindow({
            content: 'loading'
        });
		
var image ="../favicon.ico";
        var t = [];
        var x = [];
        var y = [];
        var h = [];

        t.push('xxxxx');
        x.push(<?php echo $mappatura[0];?>);
        y.push(<?php echo $mappatura[1];?>);
        h.push("<p><img src='http://<?php echo $_SERVER["HTTP_HOST"];?>/favicon.ico' border='0'><strong>xxxxxx</strong><br/><a target='_blank' href='http://www.novaproget.com'>NOVA</a></p>");


		
		
        var i = 0;
        for ( item in t ) {
            var m = new google.maps.Marker({
                map:       google_map,
                animation: google.maps.Animation.DROP,
                title:     t[i],
                position:  new google.maps.LatLng(x[i],y[i]),
                html:      h[i] ,
				icon:image,
			
            });

             // google.maps.event.addListener(m, 'click', function() {
              google.maps.event.addListener(m, 'click', function() {
              
                info_window.setContent(this.html);
                info_window.open(google_map, this);
            });
            i++;
        }
    }
	


initialize();


});
</script>
</head>

<body onload='show_clock();'> 
<?php
 
 
include  'function/menu_share.php';
// include  'function/social.php';
?>

<div id="centralemedio" class='ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix' >
<?php 
 include 'function/central_share.php';?>  
</div>


<div id='pano'>

</div>












<?php 

include'../0_cls/utenza/footer_share.php';?>
