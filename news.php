<?
session_start();
$_SESSION['1']['index']='default';
$_SESSION['1']['catalogo']='default';
$_SESSION['1']['home']='default';
$_SESSION['1']['news']='highlight';
include'utenza/clspubbliche/conn/conn.php';
include'../0_cls/utenza/clspubbliche/clsutenza.php';
include'../0_cls/utenza/he.php'; 
?>
</head>
<body onload='show_clock();'> 
<? 
include'../0_cls/utenza/menuutenza.php';
?>
<div id="centralemedio" >
<?include'../0_cls/utenza/centralemedio.php';?>  
</div>
<?
include'../0_cls/utenza/footerstile.php';?>