<?php
session_start();
error_reporting(0);


$_SESSION['1']['index']='default';
$_SESSION['1']['catalogo']='default';
$_SESSION['1']['home']='default';
$_SESSION['1']['news']='highlight';




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
//this is menu
include  'function/menuutenza.php';


//this is bubble share 
//include'../0_cls/utenza/social.php';
?>

<div id="centralemedio" >
<?php
//qui  cè il fulcro delle chiamate 
include 'function/centralemedio.php';?>  
</div>

<?php
include 'function/footerstile.php';?>