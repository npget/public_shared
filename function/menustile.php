<ul >
                    <li  ><a class='ui-state-default ui-corner-all' href="<? echo $patchinasito;?>?stile=Home">Home</a></li>              
                    <li  ><a class='ui-state-default ui-corner-all' href="<? echo $patchinasito;?>utenti/">Negozi</a></li> 
                    <li ><a  class='ui-state-default ui-corner-all' href="<? echo $patchinasito;?>?stile=Offerte">Offerte</a></li>
                    <li><a  class='ui-state-default ui-corner-all' href="<? echo $patchinasito;?>?stile=Service">Servizi</a></li>
                    <li ><a class='ui-state-default ui-corner-all' href="<? echo $patchinasito;?>?stile=Commenti">Commenti</a></li>       
                </ul>
					<form action="?" >
			<select name='prodotto' id="regioni">
			<!--	<?php// echo $opt->ShowRegioni(); ?>
			--></select>
			<select name='seconda' id="province">
			<option>Scegli...</option>
			</select><!--
			Seleziona un comune:<br />
			<select id="comuni">
			<option>Scegli...</option>
			</select>
			<input type="text" name="keyword" value="<?php echo $_GET['keyword'];?>" id="keyword" class="input_text ac_input" autocomplete="off"/>
			--><input type="submit" id="search-submit" value="OK!" class="input_button large_size"/>
			<p class="ortry">ddd</p>
			<div id="google_translate_element" STYLE='FLOAT:RIGHT;POSITION:RELATIVE;TOP:0PX;RIGHT:9PX'></div><script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'it'
  }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		</form>