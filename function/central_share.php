<?php


// la home page
if (($_GET['nomeutente'] != "") and ($_GET['home'] == 'home')) {

    //slideriniziale  se l utente decide di avere lo slide grande iniziale
    include 'sliderbig.php';
    //stampa tutte le terze categorie
    echo '<hr>';
    trovatutteleterzecategorie();

    //stampa i TAG del profilo generale dell utente quello aziendale  , generale
    scorritagutenza();


    // stampa sliderino orizzonatale per articoli in desc limit dall ultimo fino a 16 mi sembra
    include 'sliderhorizontal.php';


    // stampa le categorie madri degli articoli
  //  scorricategoriecatalogoneldiv();
    //include'slidermini.php';
}




// PAGINA NEWS 
if (($_GET['nomeutente'] != "") and ($_GET['messaggi'] == 'messaggi')) {
    include_once 'clspubbliche/clsmessaggi.php';
    scorrimessaggi();
}



//Album slider
if ($_GET['eslider']) {
    parse_str($_SERVER['QUERY_STRING']);
    include_once 'clspubbliche/clsalbumslider.php';
    var_dump($eslider);
    searchtagalbum($eslider);
}

//TAG PRODOTTI
if ($_GET['tag'] != "") {
    querydtagproduct($_GET['tag']);
}

// INIZIO MESSAGGI

if ($_GET['idmessage'] != "") {

    include_once 'clspubbliche/clsmessaggi.php';
    leggimesgsingle($_GET['idmessage']);
}
//FINE MESSAGGI



//passagio per form fa CONTATTI/

if ($_GET['contatti'] == 'contatti') {
    include 'clshome.php';

    formmessage();

}




/////////ARTICOLI
//TROVADAFORM

//PROVATO A SPOSTARE dentrocontr_share
//if ($_GET['b']) {
 // querydanome($_GET['b']);
// }

if ($_GET['serial']) {
        include 'clspubbliche/clscontrollocategorie.php';
    include 'clspubbliche/clsarticoliperslide.php';
    scorripercategorie(null, null, $_GET['cat3']);
    //per products.php
    stamparticolo($_GET['serial']);
}

//trovale3 categorie
if ($_GET['viewpeoductsovertree']) {
     include 'clspubbliche/clscontrollocategorie.php';
        scorripercategorie(null,null,$_GET['viewpeoductsovertree']);
      trovalistarticoli($_GET['viewpeoductsovertree']);
}

if (($_GET['idcat2'])) {
          include 'clspubbliche/clscontrollocategorie.php';
    scorripercategorie(null, $_GET['idcat2'], null);
    trovale3categorie($_GET['idcat2'], idutente());
    include 'slidermini.php';
}

if (($_GET['trovaallcat2'])) {
          include 'clspubbliche/clscontrollocategorie.php';
    scorripercategorie($_GET['trovaallcat2'], null, null);
    scorricat2daid($_GET['trovaallcat2'], $_GET['nomecategoria1'], idutente());
    include 'slidermini.php';
}

//passaggio per product.php fa CATALOGO/
if ($_GET['vedicatalogo'] == 'vedicatalogo') {

    scorricategoriecatalogoneldiv();

    include 'slidermini.php';

    include_once 'clspubbliche/clscategorie.php';
    trovaselezionecategoriaarticoli();

}


/*
 * Qui ancora confusione non so neanche se sono chiamata da qualcosa 
 */
if (($_GET['stile'] == 'Negozi')) {$i = ($_GET['stile']);

    echo '<H1>PAGINA negozi</h1>';
}
if (($_GET['stile'] == 'Offerte')) {$i = ($_GET['stile']);
    echo '<H1>PAGINA offerte';
}
if (($_GET['stile'] == 'Service')) {$i = ($_GET['stile']);
    echo '<H1>PAGINA SERVIZI ';
}
if (($_GET['stile'] == 'Commenti')) {$i = ($_GET['stile']);
    echo '<H1>PAGINA COMMENTI';
}
if (isset($_GET['articolo'])) {$i = ($_GET['articolo']);
    zoomarticolo($i);
}
if (isset($_GET['prodotto'])) {$id = $_GET['prodotto'];
    libera($id);
}
if (isset($_GET['prodotto']) and ($_GET['dettaglio'])) {$id = $_GET['dettaglio'];
    dettaglioarticolo($id);
}
?>

