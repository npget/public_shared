<?phpob_start();include_once'clsstampadfa4.php';error_reporting(0);if($_POST['seriacosa']){$is=base64_decode($_POST['seriacosa']);}if($_GET['idpax']){$is=base64_decode($_GET['idpax']);}//ob_start();?><style type="text/css"><!--    table.page_header {width: 100%; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }    table.page_footer {width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}    h1 {color: #000033}    h2 {color: #000055}    h3 {color: #000077}    div.niveau    {        padding-left: 5mm;    }--></style><page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt">    <page_header>        <table class="page_header">            <tr>                <td style="width: 50%; text-align: left">                   SCHEDA PUBBLICA  N. <?=$is;?>   				                   </td>				<td style="width: 50%; text-align: right;font-size:10px">                  Stampata Il :<?print(date('d/M/Y').'    H: '.date('H:i'));?>   				                   </td>				            </tr>		        </table>    </page_header><?if($is!=""){vedituttoartinpdf($is);}?>    <page_footer>        <table class="page_footer">            <tr>			<td style="width:50%; text-align: left;font-size:10px">              Stampata Il :<?print(date('d/M/Y').'    H: '.date('H:i'));?>   				                   </td>                <td style="width:50%; text-align: right">                    pagina  [[page_cu]]/[[page_nb]]                </td>            </tr>        </table>    </page_footer>   </page><?php    $content = ob_get_clean();    require_once(dirname(__FILE__).'/html2pdf.class.php');    try    {       $html2pdf = new HTML2PDF('P', 'A4', 'it', true, 'UTF-8', 0);       $html2pdf->writeHTML($content, isset($_GET['vuehtml']));	   $html2pdf->setDefaultFont('Trebuchet ms');       // $html2pdf->createIndex('NOVAGEST', 25, 12, false, true, 1);        $html2pdf->Output('scheda.pdf');    }    catch(HTML2PDF_exception $e) {        echo $e;        exit;    }