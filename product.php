<?
session_start();


$_SESSION['1']['index']='highlight';
$_SESSION['1']['catalogo']='default';
$_SESSION['1']['home']='default';
$_SESSION['1']['news']='default';


include'utenza/clspubbliche/conn/conn.php';
include'../0_cls/utenza/clspubbliche/clsutenza.php';

include'../0_cls/utenza/he.php'; 

?>
</head>
<body onload='show_clock();'> 
	
<? 
include'../0_cls/utenza/menuutenza.php';
//include'../0_cls/utenza/social.php';
?>

<div id="centralemedio"  >
<?include'../0_cls/utenza/centralemedio.php';?>  
</div>

<?
include'../0_cls/utenza/footerstile.php';?>
