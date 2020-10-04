<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>





<table border="1" width=738 heigth=443>


<tbody>


<tr>


<td> 


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
$monografia = $_POST ["monografia"]; 
$titulacao = $_POST ["titulacao"];
$ProjetoDeIntervencao = $_POST ["Projeto de Intervencao"]; 
$ArtigoCientifico = $_POST ["Artigo Cientifico"]; 
$GuiaCurricular = $_POST ["Guia Curricular"];
$palavra1 = $_POST ["palavra1"]; 
$palavra2 = $_POST ["palavra2"]; 
$palavra3 = $_POST ["palavra3"]; 
$palavra4 = $_POST ["palavra4"]; 
$palavra5 = $_POST ["palavra5"]; 


if ($palavra1 != NULL) {

  $um = $palavra1 ;
};
if ($palavra2 != NULL) {

  $dois = $palavra2;
};
if ($palavra3 != NULL) {

  $tres = $palavra3 ;
    };
if ($palavra4 != NULL) {

  $quatro = $palavra4 ;
};
if ($palavra5 != NULL) {

  $cinco = $palavra5;
};



 echo " $sobrenome, $nome. <br/> &nbsp&nbsp&nbsp&nbsp $titulo. /$nome $sobrenome. - Belo Horizonte: ESP-MG, $ano. <br/> &nbsp&nbsp&nbsp&nbsp $pagina f. <br/>&nbsp&nbsp&nbsp&nbsp     Orientador(a): $nomeorientador $sobrenomeorientador.
  <br/> &nbsp&nbsp&nbsp&nbsp    $tipo (Especialização) em $titulacao. <br/>&nbsp&nbsp&nbsp&nbsp     Inclui bibliografia. <br/> &nbsp&nbsp&nbsp&nbsp"    ;
  


  if ($palavra1 != NULL) {

    echo "1."  .$um;
  };


  if ($palavra2 != NULL) {

    echo "2."  .$dois;
  };


  if ($palavra3 != NULL) {

    echo "3."  .$tres;
  };


  if ($palavra4 != NULL) {

    echo "4." .$quatro;
  };


  if ($palavra5 != NULL) {

    echo "5."  .$cinco;
  };


  echo ".I. $sobrenomeorientador, $nomeorientador. II. Escola de Saúde Pública do Estado de Minas Gerais. III. Título";






?>




</td>
</tr>
</tbody>




</table>






    
</body>
</html>




