<?php
session_start();
error_reporting(E_WARNING);


$_SESSION['1']['index']='default';
$_SESSION['1']['catalogo']='default';
$_SESSION['1']['home']='default';
$_SESSION['1']['news']='highlight';





include 'function/header_share.php'; 

?>
</head>
<body onload='show_clock();'> 
    
<?php 
//this is menu
include  'function/menu_share.php';


//this is bubble share 
//include'../0_cls/utenza/social.php';
?>

<div id="centralemedio" >
<?php
//qui  cè il fulcro delle chiamate 
include 'function/central_share.php';?>  
</div>

<?php
include 'function/footer_share.php';?>