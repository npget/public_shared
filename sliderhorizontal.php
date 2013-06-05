<style>
.cont-new-products{margin:0 auto;padding-bottom:20px;text-align:center;width:99%;}
.cont-new-products ul{text-align:left}
.cont-new-products ul li{float:left;position:relative;width:242px;height:188px}
.cont-new-products ul li .new{display:block;position:absolute;z-index:5;right:-2px;top:0;margin:10px 0 0;width:46px;height:27px;background:url(<?=root_shared();?>img/iconSprite.png?v14) -177px -48px no-repeat}
.cont-new-products ul li a{position:relative;border:3px solid #333;display:block;width:232px;height:174px;overflow:hidden;margin:3px}
.cont-new-products ul li a:hover{border:3px solid #fff100}
.cont-new-products ul li h2,.cont-new-products ul li p{position:absolute;left:0;bottom:0;margin:0 0 12px 6px;font:400 11px/14px Arial;color:#0c0f10}
.culture-ar .cont-new-products ul li h2,.culture-ar .cont-new-products ul li p{left:auto;right:4px;text-align:right}
.cont-new-products ul li h2 span,.cont-new-products ul li p span{background-color:#fff;padding:2px 4px}
.cont-new-products ul li h2 span.name-company,.cont-new-products ul li p span.name-company{font-weight:700}
.cont-new-products ul li h2 span.name-product,.cont-new-products ul li p span.name-product{color:#666}
.cont-new-products ul li img{width:226px;position:absolute;left:-1px;top:-1px}
.ContentFrame{width:99%;overflow:hidden;position:relative;left:10px}
.culture-ar .ContentFrame{float:left}
.TabContent{float:left;overflow:hidden;width:990px;display:inline}
.AllTabs{width:5000px;position:relative}
.TabMenu{width:auto;padding:10px 6px 2px;overflow:hidden;clear:both}
.culture-ar .TabMenu{float:right}
.culture-ar .schedanews_gallery_container .TabMenu{float:none}
.TabMenu a{width:9px;height:9px;display:block;overflow:hidden;cursor:pointer;cursor:hand}
.hovering{background:url(<?=root_shared();?>img/iconSprite.png?v14) -3px -77px no-repeat;width:12px;height:9px}
.selector{background:url(<?=root_shared();?>img/iconSprite.png?v14) -3px -58px no-repeat;width:12px;height:9px}
.schedanews_gallery_container .TabMenu div.alink a.selector{background-position:-239px 0}
.schedanews_gallery_container .TabMenu div.alink a{background:url(<?=root_shared();?>img/iconSprite.png?v14) -239px -19px no-repeat}

.TabMenu div.alink{width:9px;height:9px;float:left;background:url(<?=root_shared();?>img/iconSprite.png?v14) -3px -77px no-repeat;margin-right:5px}
.new-ap{float:left;overflow:hidden;margin-right:10px;margin-left:10px;font:700 12px/12px Arial,sans-serif;color:#fff}
.culture-ar .new-ap{float:right;margin-right:0;margin-left:10px}
.homeSlideBullets{position:absolute;left:466px;bottom:9px}

.product-archive{width:auto}
.cont-product-archive{overflow:hidden;width:auto;display:inline;height:100%}
.cont-new-products{margin:0 auto;text-align:center;width:99%;background:#333;position:relative}
.product-archive ul{text-align:center}
.product-archive ul li{float:left;position:relative;display:inline;width:248px;height:188px}

.product-archive ul li .new,.result .photo .new{display:block;position:absolute;z-index:5;right:-3px;top:0;margin:10px 0 0;width:46px;height:27px;background:url(/images/iconSprite.png?v14) -177px -48px no-repeat}
.product-archive ul li a{display:block;width:240px;height:180px;overflow:hidden;border:1px solid #eee;margin:3px}
.product-archive ul li a:hover,.result .photo a:hover{border:3px solid #fff100;margin:1px}
.product-archive ul li h2{text-align:left}
.product-archive ul li h2,.result .photo h2{position:absolute;left:0;bottom:0;margin:0 0 12px 4px;font:400 11px/14px Arial;color:#0c0f10}
.culture-ar .product-archive ul li h2, .culture-ar .result .photo h2{left:auto;right:5px;text-align:right}
.product-archive ul li h2 span,.result .photo h2 span{background-color:#fff;padding:2px 4px}
.product-archive ul li h2 span.name-company,.result .photo h2 span.name-company{font-weight:700;line-height:18px}
.product-archive ul li h2 span.name-product,.result .photo h2 span.name-product{color:#666}
.product-archive ul li img{height:180px;-ms-interpolation-mode:bicubic}

.contactBtn{position:absolute;left:615px;margin-top:10px;display:inline}
.idTabs{clear:both;margin:0;padding-top:12px}
.col-dx-scheda .idTabs{clear:both;margin:0;padding-top:0 !important;display:none !important}
.IE.v6 .cont-tabs,.IE.v7 .cont-tabs{position:relative;margin:0}
.idTabs ul{display:block;width:auto;height:32px}
.idTabs li{float:left!important;height:32px;display:inline;min-width:50px;width:auto}

.idTabs li a{float:left;display:block;font:400 12px Arial;color:#333;height:32px;width:auto;cursor:pointer;cursor:hand}
.idTabs ul li .selected .spunta-bg{filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ffffff');background:-moz-linear-gradient(top, #fff, #fff);background:-webkit-gradient(linear, left top, left bottom, from(#fff), to(#fff));background-color:#fff;border:1px solid #ccc;border-radius:4px 4px 0 0;display:block;padding:8px 6px;margin:0 3px 0 0;float:left;border-bottom:0!important}
.idTabs ul li .spunta-bg{filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f8fafa', endColorstr='#eaeaea');background:-moz-linear-gradient(top, #f8fafa, #eaeaea);background:-webkit-gradient(linear, left top, left bottom, from(#f8fafa), to(#eaeaea));background-color:#f3f3f3;border:1px solid #ccc;border-radius:4px 4px 0 0;display:block;padding:8px 6px;margin:0 3px 0 0;float:left;border-bottom:0!important}
.idTabs li a.selected{display:block;color:#000;font:700 12px Arial;border-bottom:1px solid #fff}
.items .children-items{display:none;border-top:1px solid #ccc}

.clearfix:after{content:".";display:block;height:0;clear:both;visibility:hidden}
* html>body .clearfix{display:inline-block;width:100%}
* html .clearfix{/* Hides from IE-mac \*/height:1%;/* End hide from IE-mac */}
/* frame style */
#outerImageContainer td.tl,#outerImageContainer td.br{height:15px;width:15px}
#outerImageContainer td.tl{background-image:url(<?=root_shared();?>img/borderTopLeft.png);_background-image:none}
#outerImageContainer td.tc{background-image:url(/images/borderTopCenter.png);_background-image:none}
#outerImageContainer td.ml{background-image:url(/images/borderMiddleLeft.png);_background-image:none}
#outerImageContainer td.mr{background-image:url(/images/borderMiddleRight.png);_background-image:none}
#outerImageContainer td.bc{background-image:url(/images/borderBottomCenter.png);_background-image:none}
#outerImageContainer td.tr{background-image:url(/images/borderTopRight.png);_background-image:none}
#outerImageContainer td.bl{background-image:url(/images/borderBottomLeft.png);_background-image:none}
#outerImageContainer td.br{background-image:url(/images/borderBottomRight.png);_background-image:none}
/*MODAL WINDOWS*/
*{padding:0;margin:0}
#TB_window{font:12px Arial,Helvetica,sans-serif;color:#333}
#TB_secondLine{font:10px Arial,Helvetica,sans-serif;color:#666}
#TB_window a:link{color:#666}
#TB_window a:visited{color:#666}
#TB_window a:hover{color:#000}
#TB_window a:active{color:#666}
#TB_window a:focus{color:#666}

.product-archive ul li a:hover {border:1px solid #EEE;margin:3px}



</style>
<script>
$(document).ready(function () {
    //Initialize 
    //Set the selector in the first tab
    $(".TabMenu a:first").addClass("selector");

    //Basic hover action
    $(".TabMenu a").mouseover(function () { $(this).addClass("hovering"); });
    $(".TabMenu a").mouseout(function () { $(this).removeClass("hovering"); });

    //Add click action to tab menu
    $(".TabMenu a").click(function () {

       PhotoSlide(this);
    });
});

function PhotoSlide(ButtonElement) {
    //Remove the exist selector
    $(".selector").removeClass("selector");
    //Add the selector class to the sender
    $(ButtonElement).addClass("selector");
    //Find the width of a tab
    var TabWidth = $(".TabContent:first").width();
    if (parseInt($(".TabContent:first").css("margin-left")) > 0) TabWidth += parseInt($(".TabContent:first").css("margin-left"));
    if (parseInt($(".TabContent:first").css("margin-right")) > 0) TabWidth += parseInt($(".TabContent:first").css("margin-right"));
    //But wait, how far we slide to? Let find out
    var newLeft = -1 * $(".TabMenu a").index(ButtonElement) * TabWidth;
    //Ok, now slide
    $(".AllTabs").animate({ left: +newLeft + "px" }, 1000);
}

</script>
<div style='clear:both;'></div>
<div class="cont-new-products clearfix">
  <div class="TabMenu clearfix">
    <div class="new-ap" translateonclient="">NOVITA' <?$name=arrautente(); echo $name['nomeaziendale'];?></div>
    <div class="homeSlideBullets">
        <div class="alink"><a id="Tab_0" ></a></div>
        <div class="alink"><a id="Tab_1" ></a></div>
        <div class="alink"><a id="Tab_2"></a></div>
        <div class="alink"><a id="Tab_3" ></a></div>
        <div class="alink"><a id="Tab_4"></a></div>
    </div>
  </div>

	
	  <?
	  	function articolislider(){
		
$i=idutente();
$ris=connetti_mysqlpublico();
$sql="SELECT serial,name,id_utenteint,terzacateforia_ed,Codint  FROM products  
where  id_utenteint='$i' and products.pubblico='PUBBLICO ON'  order by  serial  ";
$sql.="desc limit 0, 4";
$res=mysql_query($sql,$ris);
$max= mysql_num_rows($res);
$i=0;
echo "<ul class='TabContent' style='list-style:none;'>";
while($val=mysql_fetch_array($res)){



extract($val);
$sqlimg="SELECT * from pathimgcatalogo where idex_art='$serial' group by idex_art desc limit 0, 1  ;";
$rese=mysql_query($sqlimg,$ris);
$maxe= mysql_num_rows($rese);
while($vale=mysql_fetch_array($rese)){




extract($vale);
// if(($i+1) % 4 == 0){ 


    

 ?>
 <li> <span class='new' ></span>  
 <a href='<?=pathsitoutenza().eregi_replace(" ","-",$name).'/'.$terzacateforia_ed.'/'.$serial;?>.html'
  style='color:#000;'  >
<p><span class="name-company">  <?echo $name;?> <?echo $i;?> </span></p>
  <img src="<? echo imgpublic($idutentepath).'thumb250x250/'.$pathimg;?>"  />

</a>
 </li> 
<?



$i++;}


}
echo "</ul> <ul class='TabContent' style='list-style:none;'>";
//SECONDA     

$sql="SELECT serial,name,id_utenteint,terzacateforia_ed,Codint  FROM products  
where  id_utenteint='$i' and products.pubblico='PUBBLICO ON'  order by  serial  ";
$sql.="desc limit 4, 4";
$res=mysql_query($sql,$ris);
$max= mysql_num_rows($res);
$i=0;

while($val=mysql_fetch_array($res)){



extract($val);
$sqlimg="SELECT * from pathimgcatalogo where idex_art='$serial' group by idex_art desc limit 0, 1  ;";
$rese=mysql_query($sqlimg,$ris);
$maxe= mysql_num_rows($rese);
while($vale=mysql_fetch_array($rese)){




extract($vale);
// if(($i+1) % 4 == 0){ 


    

 ?>
 <li> <span class='new' ></span>  
 <a href='<?=pathsitoutenza().eregi_replace(" ","-",$name).'/'.$terzacateforia_ed.'/'.$serial;?>.html'
  style='color:#000;'  >
<p><span class="name-company">  <?echo $name;?> <?echo $i;?> </span></p>
  <img src="<? echo imgpublic($idutentepath).'thumb250x250/'.$pathimg;?>"  />

</a>
 </li> 
<?



$i++;}


}



echo "</ul> <ul class='TabContent' style='list-style:none;'>";
//SECONDA     

$sql="SELECT serial,name,id_utenteint,terzacateforia_ed,Codint  FROM products  
where  id_utenteint='$i' and products.pubblico='PUBBLICO ON'  order by  serial  ";
$sql.="desc limit 8, 4";
$res=mysql_query($sql,$ris);
$max= mysql_num_rows($res);
$i=0;

while($val=mysql_fetch_array($res)){



extract($val);
$sqlimg="SELECT * from pathimgcatalogo where idex_art='$serial' group by idex_art desc limit 0, 1  ;";
$rese=mysql_query($sqlimg,$ris);
$maxe= mysql_num_rows($rese);
while($vale=mysql_fetch_array($rese)){




extract($vale);
// if(($i+1) % 4 == 0){ 


    

 ?>
 <li> <span class='new' ></span>  
 <a href='<?=pathsitoutenza().eregi_replace(" ","-",$name).'/'.$terzacateforia_ed.'/'.$serial;?>.html'
  style='color:#000;'  >
<p><span class="name-company">  <?echo $name;?> <?echo $i;?> </span></p>
  <img src="<? echo imgpublic($idutentepath).'thumb250x250/'.$pathimg;?>"  />

</a>
 </li> 
<?



$i++;}


}
echo "</ul> <ul class='TabContent' style='list-style:none;'>";
//SECONDA     

$sql="SELECT serial,name,id_utenteint,terzacateforia_ed,Codint  FROM products  
where  id_utenteint='$i' and products.pubblico='PUBBLICO ON'  order by  serial  ";
$sql.="desc limit 12, 4";
$res=mysql_query($sql,$ris);
$max= mysql_num_rows($res);
$i=0;

while($val=mysql_fetch_array($res)){



extract($val);
$sqlimg="SELECT * from pathimgcatalogo where idex_art='$serial' group by idex_art desc limit 0, 1  ;";
$rese=mysql_query($sqlimg,$ris);
$maxe= mysql_num_rows($rese);
while($vale=mysql_fetch_array($rese)){




extract($vale);
// if(($i+1) % 4 == 0){ 


    

 ?>
 <li> <span class='new' ></span>  
 <a href='<?=pathsitoutenza().eregi_replace(" ","-",$name).'/'.$terzacateforia_ed.'/'.$serial;?>.html'
  style='color:#000;'  >
<p><span class="name-company">  <?echo $name;?> <?echo $i;?> </span></p>
  <img src="<? echo imgpublic($idutentepath).'thumb250x250/'.$pathimg;?>"  />

</a>
 </li> 
<?



$i++;}


}



echo "</ul> <ul class='TabContent' style='list-style:none;'>";
//SECONDA     

$sql="SELECT serial,name,id_utenteint,terzacateforia_ed,Codint  FROM products  
where  id_utenteint='$i' and products.pubblico='PUBBLICO ON'  order by  serial  ";
$sql.="desc limit 16, 4";
$res=mysql_query($sql,$ris);
$max= mysql_num_rows($res);
$i=0;

while($val=mysql_fetch_array($res)){



extract($val);
$sqlimg="SELECT * from pathimgcatalogo where idex_art='$serial' group by idex_art desc limit 0, 1  ;";
$rese=mysql_query($sqlimg,$ris);
$maxe= mysql_num_rows($rese);
while($vale=mysql_fetch_array($rese)){




extract($vale);
// if(($i+1) % 4 == 0){ 


    

 ?>
 <li> <span class='new' ></span>  
 <a href='<?=pathsitoutenza().eregi_replace(" ","-",$name).'/'.$terzacateforia_ed.'/'.$serial;?>.html'  style='color:#000;'  >
<p><span class="name-company">  <?echo $name;?> <?echo $i;?> </span></p>
  <img src="<? echo imgpublic($idutentepath).'thumb250x250/'.$pathimg;?>"  />

</a>
 </li> 
<?



$i++;}


}
echo'</ul>';

}
	
	  ?>
	  

  <div class="ContentFrame" dir="ltr">
    <div class="AllTabs">
    
	<? articolislider();?>

	
    </div>
</div>
  
</div>
<script>
  var _tab = 0;
  var _tabLinks;
  var _interval;
  function RegisterLastProductsRoll(event) {
    _tab = event ? event.target.id.charAt(4) : _tab;
    clearInterval(_interval);
    //_interval = setInterval('_tab=(++_tab)%5;_tabLinks.eq(_tab).click();', 5000);
    _interval = setInterval('_tab=(++_tab)%5;PhotoSlide(_tabLinks.eq(_tab));', 5000);
    
  }
  $(document).ready(function () {
    _tabLinks = $(".TabMenu .alink a[id^=Tab_]");
    _tabLinks.mouseup(RegisterLastProductsRoll);
    RegisterLastProductsRoll();
  });

</script>