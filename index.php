<?php
session_start();
error_reporting(0);
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
<script >

    
</script>	
<?php 

print_r();
print_r($_REQUEST);
//this is menu
include  'function/menuutenza.php';


//this is bubble share 
//include'../0_cls/utenza/social.php';
?>

<div id="centralemedio" >

<?php
//qui  cè il core iniziale  delle chiamate 
include 'function/centralemedio.php';
?>  

</div>


<?php
include 'function/footerstile.php';
?>
