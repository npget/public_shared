<?php 

    // QUESTO CREA LA serie di in quale categoria ci si trova ..  
    function scorripercategorie($id1,$id2,$id3){
        //$ris=connetti_mysqlpublico();
        $newris = conn_public();
        //$b=16;
        $b=idutente();
        if($id1!=""){
            $sqlcat="SELECT * from categorie where 
            categorie.ID_categoria='$id1'  and 
            categorie.idex_rifutente='$b' ";
        }
        if($id2!=""){
            $sqlcat="SELECT * from categorie, categorie_sub where
            categorie_sub.idsottocateg='$id2' and 
            categorie.ID_categoria=categorie_sub.categoria_id and 
            categorie.idex_rifutente='$b' ";
        }
        
        if($id3!=""){
            $sqlcat="SELECT * from categorie, categorie_sub,categorie_1sub where
            categorie_1sub.id_categoria_1sub='$id3' and 
            categorie_1sub.excategoria=categorie.ID_categoria and 
            categorie_1sub.ex_categoriasub=categorie_sub.idsottocateg  and
        categorie.idex_rifutente='$b'";}
        $riscat=$newris->query($sqlcat);
        $risultati=mysqli_fetch_assoc($riscat);
    ?>
    <div class='ui-corner-all ui-state-active' id='scorrere' >
        
        <a href="<?php echo pathsitoutenza().$risultati['ID_categoria'].'/'. preg_replace("/[^0-9a-zA-Z]/","-",$risultati['Categoria']);?>/"><?php echo $risultati['Categoria'];?> > ></a>
        <?php
        
        
         if ($risultati['descrizionecategoria']!=""){
             $url_conn=$risultati['ID_categoria'].'/'. preg_replace("/[^0-9a-zA-Z]/","-",$risultati['Categoria']);
            
                ?>
            <a href="<?php echo pathsitoutenza().$url_conn.'/'. preg_replace("/[^0-9a-zA-Z]/","-",$risultati['descrizionecategoria']).'/'.$risultati['idsottocateg'];?>"><?php echo $risultati['descrizionecategoria'];?> > ></a>
            <a href="<?PHP echo pathsitoutenza().$url_conn.'/'.preg_replace("/[^0-9a-zA-Z]/","-",$risultati['descrizionecategoria']).'/'.preg_replace("/[^0-9a-zA-Z]/","-",$risultati['descategtre']).'/'.$risultati['id_categoria_1sub'];?>/"><?PHP echo $risultati['descategtre'];?></a>
        <?php 
         } 
         ?>
        
    </div>
    <?php
        
    }
    
    ?>
