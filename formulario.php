<?php


 $nome = $_POST ["nome"]; 
 $sobrenome = $_POST ["sobrenome"]; 
 $titulo = $_POST ["titulo"];
$subtitulo = $_POST ["subtitulo"]; 
$local = $_POST ["local"]; 
$ano = $_POST ["ano"]; 
$pagina = $_POST ["pagina"]; 
$sobrenomeorientador = $_POST ["sobrenomeorientador"]; 
$nomeorientador = $_POST ["nomeorientador"]; 
$tipo = $_POST ["tipo"]; 
$titulacao = $_POST ["titulacao"];
$ProjetoDeIntervencao = $_POST ["Projeto de Intervencao"]; 
$ArtigoCientifico = $_POST ["Artigo Cientifico"]; 
$GuiaCurricular = $_POST ["Guia Curricular"];
$palavra1 = $_POST ["palavra1"]; 
$palavra2 = $_POST ["palavra2"]; 
$palavra3 = $_POST ["palavra3"]; 
$palavra4 = $_POST ["palavra4"]; 
$palavra5 = $_POST ["palavra5"]; 

  

require('https://jetioli.github.io/FichaCatalografica/caixa_de_texto.php');


$pdf=new PDF_TextBox();

$pdf-> GetAName($_POST ["nome"], $_POST ["sobrenome"],$_POST ["titulo"], $_POST ["subtitulo"], $_POST ["local"], $_POST ["ano"], $_POST ["pagina"], $_POST ["sobrenomeorientador"], $_POST ["nomeorientador"],$_POST ["tipo"], $_POST ["monografia"], $_POST ["titulacao"], $_POST ["Projeto de Intervencao"], $_POST ["Artigo Cientifico"],$_POST ["Guia Curricular"],  $_POST ["palavra1"],$_POST ["palavra2"], $_POST ["palavra3"], $_POST ["palavra4"], $_POST ["palavra5"] );



$pdf->AddPage();
$pdf->SetFont('Arial','',14);


$pdf->SetXY(45,180);
$pdf->Palavras($_POST ["palavra1"],$_POST ["palavra2"],$_POST ["palavra3"],$_POST ["palavra4"],$_POST ["palavra5"]);
$palavras= $pdf->Palavras($_POST ["palavra1"],$_POST ["palavra2"],$_POST ["palavra3"],$_POST ["palavra4"],$_POST ["palavra5"]);

$pdf->drawTextBox(utf8_decode "$sobrenome, $nome.
     $titulo. /$nome $sobrenome. - Belo Horizonte: ESP-MG, $ano. 
     $pagina f. 
     Orientador(a): $nomeorientador, $sobrenomeorientador.
     $tipo (Especialização) em $titulacao. 
     Inclui bibliografia.
   
     $palavras
    I. $sobrenomeorientador, $nomeorientador. II. Escola de Saúde Pública do Estado de Minas Gerais. III. Título
     "), 125, 75, 'L', 'M');
$pdf->Output();





