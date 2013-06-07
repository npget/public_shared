<?php 

        
        function metahome(){
            $array=arrautente(); 
            $url="http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'];
            
            
            
            
      // MESSAGGI    
         

                
            
             //meta per pagina messaggi
            if(($_GET['nomeutente']!="")and($_GET['messaggi']=='messaggi')){
                $title="News by -".$array['nomeaziendale'];
                $desc=$array['infoaziendali'];
                $tag=$array['tagutente'];
                $image=nomeserver().'_nova_img/'.idutente().'/imgutenza/_s1_'.$array['weblogo'];
            }
            
            
            // MESSAGGIO SONGOLO 
            if($_GET['idmessage']!=""){
                $idms=$_GET['idmessage'];
                $ris=connetti_mysqlpublico();
                $id=idutente();
               // $idmss= base64_decode($idms);
                $s="SELECT titolonews,tagmess,data from messaggiutentinova where id_utemess='$id' 
                and pubblico = 'pubblicosi' and idmess ='$idms'  ; ";
                $r=mysql_query($s);
                $image=nomeserver().'_nova_img/'.idutente().'/imgutenza/_s1_'.$array['weblogo'];
                while($st=mysql_fetch_assoc($r)){
           extract($st);
           $title=utf8_encode($titolonews).'  by '.$array['nomeaziendale'];
              //    $test= strip_tags(htmlspecialchars_decode($testo));
                  
                  //$test=substr($test,0,1200);
           $desc =$title.','.$tagmess.',';
           
           //$desc=test
           //$desc=substr(,0,800);
                    $tag=$tagmess.','.$data;
                    
                } 
            }
            
            
            //  ARTICOLO SINGOLO 
            if($_GET['serial']!=""){
                $serial=$_GET['serial'];
                $idut=idutente();
                $sqltagge="SELECT * from tagproducts where id_exproduct='$serial' and id_exutentetag='$idut' ";
                $ristagge=mysql_query($sqltagge);
                while($tagextra=mysql_fetch_assoc($ristagge)){
                    extract($tagextra);
                    $title=$titolo;
                    $desc=$description;
                    $tag=$keywords;
                    $image=$urlimgtag;
                    
                    
                }
            }
            
            
            // meta per utente home
            if(($_GET['nomeutente']!="")and($_GET['home']=='home')){
                $title="Welcome -".$array['nomeaziendale'];
                $desc=$array['infoaziendali'];
                $tag=$array['tagutente'];
                $image=nomeserver().'_nova_img/'.idutente().'/imgutenza/_s1_'.$array['weblogo'];
            }
            
        
            
            // meta per pagina contatti 
  if(($_GET['nomeutente']!="")and($_GET['contatti']=='contatti')){
                $title="Contatta   -".$array['nomeaziendale'];
                $desc=$array['infoaziendali'];
                $tag=$array['tagutente'];
                $image=nomeserver().'_nova_img/'.idutente().'/imgutenza/_s1_'.$array['weblogo'];
            }
            
                // meta per utente tag
            if(($_GET['nomeutente']!="")and($_GET['tag']!="")){
                $title="Cerca Parola chiave articoli : ".$_GET['tag']." by  ".$array['nomeaziendale'];
                $desc=$array['infoaziendali'];
                $tag=$array['tagutente'];
                $image=nomeserver().'_nova_img/'.idutente().'/imgutenza/_s1_'.$array['weblogo'];
            }
            
            
            
            
        ?>
        <title><?php echo  $title;?></title>
        <meta name="title" content="<?php echo $title;?>">
        <meta name="keywords" content="<?php echo $tag;?>">
        <meta name="description" content="<?php echo $desc;?>">
        <link rel="canonical" href="<?php echo $url;?>">
        <link rel="image_src" href="<?php echo $image?>">
        <!-- Facebook opengraph -->
        <meta property="og:title" content="<?php echo $title;?>" >
        <meta property="og:image" content="<?php echo $image?>" >
        <meta property="og:description" content="<?php echo $desc;?>" >
        <meta property="og:site_name" content="Stilediroma" >
        <meta property="og:app_id" content="411187172266211" >
        <meta property="og:type" content="article" >
        <meta property="og:url" content="<?php echo $url?>" >
        
        
        <?
            
            
            
        } 
        ?>
        