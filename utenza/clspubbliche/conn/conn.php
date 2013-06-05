<?php



    // LA CONNESSIONE

function conn_public(){
         $newris= new mysqli("127.0.0.1", "root", "new-password","sql333894_1");
return $newris;
}


//var_dump(conn_public());
    




function connetti_mysqlpublico(){
//error_reporting();




static $host='127.0.0.1';
static $user='root';
static $password='new-password';
$nomesql='sql333894_1';
 //la pconnect il php lascia la sessione di accesso ,+ il collegamento autetnicato tra i script e il server , anziche rifare 'lautenticazione per navigare da una pagina all'altra ,  a seconda del traffico bisogna avere un canale sempre aperto , il difetto della pconnect connesione persistenti ,se avete lasciato la transazione ,le tabelle create tramite  myisam  non utilizzano il Rollback .
$ris=@mysql_pconnect($host,$user,$password);//la risorsa si connette al databse 
if($ris==null){//se il risultato � sbagliato  non fa nulla   esci 
			exit;}
$esito=mysql_select_db($nomesql,$ris);// selezione del  DB 
if($esito==false){// se � falso  o errato   lo script  il costrutto per la prima if 
				echo 'db non selezionatooooooooooo';
			session_unset();session_destroy();			    exit;				}			

	return $ris;}


			
			function idutente(){
			$nomeutente=$_GET['idutente'];
			return $nomeutente;}

//HO SOSTITUITO NELLA ROOT SHARED CON parsito()
function root_shared(){

return "http://".$_SERVER["HTTP_HOST"] .'/novaproget.com/provaseriashare/function/'; 

}

//function urlconn(){return "novavisualspace";}


//$patchinasito="http://".$_SERVER["HTTP_HOST"] .'/novaproget.com/utenza/'; 
//$patchinagest="http://".$_SERVER["HTTP_HOST"] .'/novaproget.com/novavisualspace/';

function pathsito(){
//return "http://".$_SERVER["HTTP_HOST"] .'/novaproget.com/utenza/'; 
return "http://".$_SERVER["HTTP_HOST"] .'/novaproget.com/provaseriashare/utenza/'; 
}

//usato dentro il menu
function pathsitoutenza(){
//return "http://".$_SERVER["HTTP_HOST"] .'/novaproget.com/utenza/'; 
return "http://".$_SERVER["HTTP_HOST"] .'/novaproget.com/provaseriashare/'; 
}


function pathintapp(){
return "http://".$_SERVER["HTTP_HOST"] .'/novaproget.com/novavisualspace/';

}
function imgpublic($id){
return "http://".$_SERVER["HTTP_HOST"] .'/novaproget.com/_nova_img/'.$id.'/publicimgcatalog/';
//return "http://".$_SERVER["HTTP_HOST"] .'/_nova_img/publicimgcatalog/'.$id.'/';

}

function nomeserver(){

return "http://".$_SERVER["HTTP_HOST"] .'/novaproget.com/';
//return "http://".$_SERVER["HTTP_HOST"]'/';

}

			
			
			
function filestensione ($filename) 
{ 
$filename = strtolower($filename) ;
return end(explode('.',$filename));
    } 

?>