
<?
$url="http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'];

?>
<div id='social-shar3'>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js" 
gapi_processed="true">{lang: 'it'}</script>

 <div class="g-plus" data-action="share" data-annotation="bubble" data-href="<?=$url;?>"></div>
<iframe allowtransparency="true" frameborder="0" scrolling="no" 
src="http://platform.twitter.com/widgets/tweet_button.1363148939.html#_=1363858552827
&amp;count=horizontal&amp;
counturl=<?echo urlencode($url);?>
&amp;

related=novaproget&amp;size=m&amp;
text=<?=$array['nomeaziendale']?>
&amp;url=<?echo urlencode($url);?>&amp;via=novaproget"
 class="twitter-share-button twitter-count-horizontal" style="width: 112px; height: 20px;" title="Twitter Tweet Button" data-twttr-rendered="true">
</iframe>
						
<script type="text/javascript">
if(typeof(tweetmeme_alias) != "undefined") $("#share .twitter-share-button").attr("data-url", tweetmeme_alias);
							else $("#share .twitter-share-button").attr("data-url", document.location.href);
						</script>
						<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
					

	<div style='float: right;position: relative;top:-8px;left: -70%;'>
	<div class="fb-like" data-href="<?='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" data-send="false" data-width="450" data-show-faces="true" data-font="segoe ui" data-action="recommend" data-layout="button_count" ></div>
		<a href=''>
<img src='<?echo root_shared();?>img/facebook-icon_25x25.png' style='top:3px;;border:0;position:relative;'></a>
								<div id="fb-root"></div>
<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];
  
  
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>	

</div>

			


<!--
<div class="fb-comments" data-href="<?='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" data-width="470" data-num-posts="2"></div>
-->
</div>