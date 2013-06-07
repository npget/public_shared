<?php
session_start();

$_SESSION['1']['index']='highlight';
$_SESSION['1']['catalogo']='default';
$_SESSION['1']['home']='default';
$_SESSION['1']['news']='default';





include 'function/header_share.php'; 

?>
</head>
<body onload='show_clock();'> 
<script >

    
</script>	
<?php 

print_r($_REQUEST);
//this is menu
include  'function/menu_share.php';


//this is bubble share 
//include'../0_cls/utenza/social.php';
?>

<div id="centralemedio" >

<?php
//qui  cè il core iniziale  delle chiamate 
include 'function/central_share.php';
?>  

</div>


<?php
include 'function/footer_share.php';
?>
