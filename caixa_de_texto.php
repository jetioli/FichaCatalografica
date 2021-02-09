<?php
require('fpdf.php');

class PDF_TextBox extends FPDF
{

/**
 * Draws text within a box defined by width = w, height = h, and aligns
 * the text vertically within the box ($valign = M/B/T for middle, bottom, or top)
 * Also, aligns the text horizontally ($align = L/C/R/J for left, centered, right or justified)
 * drawTextBox uses drawRows
 *
 * This function is provided by TUFaT.com
 */
function drawTextBox($strText, $w, $h, $align='L', $valign='T', $border=true)
{
    $xi=$this->GetX();
    $yi=$this->GetY();
    
    $hrow=$this->FontSize;
    $textrows=$this->drawRows($w,$hrow,$strText,0,$align,0,0,0);
    $maxrows=floor($h/$this->FontSize);
    $rows=min($textrows,$maxrows);

    $dy=0;
    if (strtoupper($valign)=='M')
        $dy=($h-$rows*$this->FontSize)/2;
    if (strtoupper($valign)=='B')
        $dy=$h-$rows*$this->FontSize;

    $this->SetY($yi+$dy);
    $this->SetX($xi);

    $this->drawRows($w,$hrow,$strText,0,$align,false,$rows,1);

    if ($border)
        $this->Rect($xi,$yi,$w,$h);
}

function drawRows($w, $h, $txt, $border=0, $align='J', $fill=false, $maxline=0, $prn=0)
{
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 && $s[$nb-1]=="\n")
        $nb--;
    $b=0;
    if($border)
    {
        if($border==1)
        {
            $border='LTRB';
            $b='LRT';
            $b2='LR';
        }
        else
        {
            $b2='';
            if(is_int(strpos($border,'L')))
                $b2.='L';
            if(is_int(strpos($border,'R')))
                $b2.='R';
            $b=is_int(strpos($border,'T')) ? $b2.'T' : $b2;
        }
    }
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $ns=0;
    $nl=1;
    while($i<$nb)
    {
        //Get next character
        $c=$s[$i];
        if($c=="\n")
        {
            //Explicit line break
            if($this->ws>0)
            {
                $this->ws=0;
                if ($prn==1) $this->_out('0 Tw');
            }
            if ($prn==1) {
                $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
            }
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $ns=0;
            $nl++;
            if($border && $nl==2)
                $b=$b2;
            if ( $maxline && $nl > $maxline )
                return substr($s,$i);
            continue;
        }
        if($c==' ')
        {
            $sep=$i;
            $ls=$l;
            $ns++;
        }
        $l+=$cw[$c];
        if($l>$wmax)
        {
            //Automatic line break
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
                if($this->ws>0)
                {
                    $this->ws=0;
                    if ($prn==1) $this->_out('0 Tw');
                }
                if ($prn==1) {
                    $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                }
            }
            else
            {
                if($align=='J')
                {
                    $this->ws=($ns>1) ? ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
                    if ($prn==1) $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
                }
                if ($prn==1){
                    $this->Cell($w,$h,substr($s,$j,$sep-$j),$b,2,$align,$fill);
                }
                $i=$sep+1;
            }
            $sep=-1;
            $j=$i;
            $l=0;
            $ns=0;
            $nl++;
            if($border && $nl==2)
                $b=$b2;
            if ( $maxline && $nl > $maxline )
                return substr($s,$i);
        }
        else
            $i++;
    }
    //Last chunk
    if($this->ws>0)
    {
        $this->ws=0;
        if ($prn==1) $this->_out('0 Tw');
    }
    if($border && is_int(strpos($border,'B')))
        $b.='B';
    if ($prn==1) {
        $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
    }
    $this->x=$this->lMargin;
    return $nl;
}
// Daqui pra baixo teste Jefferson
public $nome;
public $sobrenome;
public $titulo;
public $subtitulo;
public $local;
public $ano;
public $pagina;
public $sobrenomeorientador;
public $nomeorientador;
public $tipo;
public $monografia;
public $titulacao;
public $ProjetoDeIntervencao;
public $ArtigoCientifico;
public $GuiaCurricular;
public $palavra1;
public $palavra2;
public $palavra3;
public $palavra4;
public $palavra5;


 function GetAName($nome, $sobrenome, $titulo, $subtitulo, $local, $ano, $pagina, $sobrenomeorientador, $nomeorientador,$tipo, $monografia, $titulacao, $ProjetoDeIntervencao, $ArtigoCientifico, $GuiaCurricular, $palavra1, $palavra2, $palavra3, $palavra4, $palavra5 ) {

    $this->nome = $nome;
    $this->sobrenome = $sobrenome;
    $this->titulo = $titulo;
    $this->subtitulo = $subtitulo;
    $this->local = $local;
    $this->ano = $ano;
    $this->pagina = $pagina;
    $this->sobrenomeorientador = $sobrenomeorientador;
    $this->nomeorientador = $nomeorientador;
    $this->tipo = $tipo;
    $this->monografia = $monografia;
    $this->titulacao = $titulacao;
    $this->ProjetoDeIntervencao = $ProjetoDeIntervencao;
    $this->ArtigoCientifico = $ArtigoCientifico;
    $this->GuiaCurricular = $GuiaCurricular;
    $this->palavra1 = $palavra1;
    $this->palavra2 = $palavra2;
    $this->palavra3 = $palavra3;
    $this->palavra4 = $palavra4;
    $this->palavra5 = $palavra5;

    $this->um = $um;
    $this->dois = $dois;
    $this->tres = $tres;
    $this->quatro = $quatro;
    $this->cinco = $cinco;



    


    




  


}

//Função para mostrar as palavras-chave.

function Palavras($palavra1,$palavra2,$palavra3,$palavra4,$palavra5) {
   
    if (($palavra1 != NULL) and ($palavra2 != NULL) and ($palavra3 != NULL) and ($palavra4 != NULL)and ($palavra5 != NULL)) {
        $um = '1.'. $palavra1;
        $dois = '2.'. $palavra2;
        $tres = '3.' . $palavra3;
        $quatro = '4.'. $palavra4;
        $cinco = '5.'. $palavra5;
        return $um .$dois .$tres .$quatro .$cinco;
  
    }

elseif (($palavra1 != NULL) and ($palavra2 != NULL) and ($palavra3 != NULL) and ($palavra4 != NULL)) {
    $um = '1.'. $palavra1;
    $dois = '2.'. $palavra2;
    $tres = '3.' . $palavra3;
    $quatro = '4.'. $palavra4;
    return $um. $dois. $tres. $quatro;
  }

elseif (($palavra1 != NULL) and ($palavra2 != NULL) and ($palavra3 != NULL)) {
    $um = '1.'. $palavra1;
    $dois = '2.'. $palavra2;
    $tres = '3.' . $palavra3;
    return $um. $dois. $tres;
  }

elseif (($palavra1 != NULL) and ($palavra2 != NULL)) {
    $um = '1.'. $palavra1;
    $dois = '2.'. $palavra2;
    
    return $um. $dois;

}


elseif ($palavra1 != NULL) {

   $um = '1.'. $palavra1;
   return $um;
  }
  
    
        
        
      }
    

};

?>
