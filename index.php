<?php
session_start();
error_reporting(0);
print_r($_REQUEST);

$_SESSION['1']['index']='highlight';
$_SESSION['1']['catalogo']='default';
$_SESSION['1']['home']='default';
$_SESSION['1']['news']='default';




// QUESTA è una prassi che non si dovrebbe adoperare ma intanto c è 
// sicuramente è un enoooooooooooooorme errore ma .... 
// LA CONNECTION
include 'utenza/clspubbliche/conn/conn.php';
include 'function/clspubbliche/clsutenza.php';
include 'function/he.php'; 

?>
</head>
<body onload='show_clock();'> 
	
<?php 
include  'function/menuutenza.php';
//include'../0_cls/utenza/social.php';
?>

<div id="centralemedio" >
<?php
include 'function/centralemedio.php';?>  
</div>

<?php
include 'function/footerstile.php';?>
