<?
session_start();
$_SESSION['1']['index']='default';
$_SESSION['1']['catalogo']='default';
$_SESSION['1']['home']='highlight';
$_SESSION['1']['news']='default';
include_once'utenza/clspubbliche/conn/conn.php';
include_once'../0_cls/utenza/clspubbliche/clsutenza.php';
include'../0_cls/utenza/he.php'; 
$array=arrautente();
$mappatura=unserialize($array['mappaziendale']); 
?>

<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> 
<script>
$(window).load(function(){

    function initialize() {
        var map_options = {
            center: new google.maps.LatLng(<?=$mappatura[0];?>,<?=$mappatura[1];?>),
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
        x.push(<?=$mappatura[0];?>);
        y.push(<?=$mappatura[1];?>);
        h.push("<p><img src='http://<?=$_SERVER["HTTP_HOST"];?>/favicon.ico' border='0'><strong>xxxxxx</strong><br/><a target='_blank' href='http://www.novaproget.com'>NOVA</a></p>");


		
		
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
<body > 
 <?
include'../0_cls/utenza/menuutenza.php';
include'../0_cls/utenza/social.php';
?>

<div id="centralemedio" class='ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix' >
<? include '../0_cls/utenza/centralemedio.php';?>  
</div>


<div id='pano'>

</div>












<?
include'../0_cls/utenza/footerstile.php';?>
