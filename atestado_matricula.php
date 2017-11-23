<html>
<head>
<title>ATESTADO&nbsp;DE&nbsp;MATR&Iacute;CULA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.atestado {
	line-height: 1cm;
	text-indent: 1cm;
	font-family: Arial, Helvetica, sans-serif;
}
.tabela {
	vertical-align: baseline;
	display: table-footer-group;
}
-->
</style>
</head>
<? 
//registro de session
  session_start();
  session_register("nome_s");
  session_register("ra_s");
  
  
$name_session=$HTTP_GET_VARS["ra"];
/*
$dbname="notas";
$ra=$name_session;
$senha=$pass_session;
*/
//abre conexão com o banco
$nome=$_GET["nome"];
$ra=$_GET["ra"];

include "conexao.php";

$sql_controle="select * from controle_ra where ra LIKE '$ra'";
$rs_controle=mysql_query($sql_controle,$conexao);
$rs_c=mysql_fetch_array($rs_controle);

$ano=date("Y");
$dia=date("d");
$meses=date("n");


$mes[1]="janeiro";
$mes[2]="fevereiro";
$mes[3]="março";
$mes[4]="abril";
$mes[5]="maio";
$mes[6]="junho";
$mes[7]="julho";
$mes[8]="agosto";
$mes[9]="setembro";
$mes[10]="outubro";
$mes[11]="novembro";
$mes[12]="dezembro";


//busca pelo aluno;
$sqltemp="select * from aluno_cad where ra LIKE '$ra'";


$rstemp=$rstemp_query=mysql_query(($sqltemp),$conexao);
$rstemp=mysql_fetch_array($rstemp_query);
?>
<body>
<table width="600" border="0" align="center" cellpadding="1" cellspacing="0">
  <tr> 
    <td width="175">
<div align="left"><img src="imagens/logo_csv_trans.gif" width="170"></div></td>
    <td><div align="center"><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong><font face="Arial, Helvetica, sans-serif">UNIVERSIDADE 
        ESTADUAL PAULISTA <br>
        &quot;J&Uacute;LIO DE MESQUITA FILHO&quot; </font></strong></font><font face="Arial, Helvetica, sans-serif"><br>
        <strong><font size="2">Campus Experimental do Litoral Paulista<br>
        Se&ccedil;&atilde;o T&eacute;cnica de Apoio Acad&ecirc;mico - STAA</font></strong><br>
        <font size="1">P&ccedil;a. Infante D. Henrique, s/n&ordm; - Pq. Bitaru 
        S&atilde;o Vicente - SP<br>
        CEP 11330-900 - Tel. (13) 3569-9421/3569-9440</font></font></div></td>
  </tr>
  <tr> 
    <td colspan="2"><div align="center"> 
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <h2><b><font face="Arial, Helvetica, sans-serif">ATESTADO&nbsp;DE&nbsp; 
          MATR&Iacute;CULA</font></b></h2>
      </div></td>
  </tr>
  <tr> 
    <td colspan="2">
      <div align="justify">
<p class="atestado">Atestamos, para os devidos fins, que<strong> <? echo $nome; ?></strong>, 
          RG<strong> <? echo $rstemp["rg"]; ?></strong> e Registro Acad&ecirc;mico 
          n&ordm;<strong> <? echo $ra; ?></strong>, &eacute; aluno(a) 
          regularmente matriculado(a) no ano letivo de <? echo $ano; ?> no Curso 
          de Ci&ecirc;ncias Biol&oacute;gicas &#8211; Bacharelado, do Campus Experimental 
          do Litoral Paulista, da UNESP, Reconhecido pela Portaria CEE n&ordm; 
          193/2004 &#8211; Publicada no D.O.E. de 10/12/2004, Se&ccedil;&atilde;o 
          I, p&aacute;gina 18.</p>
          
        <p class="atestado">Ainda, que o referido curso &eacute; ministrado em 
          per&iacute;odo integral e nos seguintes hor&aacute;rios: das 8:00 &agrave;s 
          12:00 e das 14:00 &agrave;s 18:00 horas, de segunda &agrave;s sextas-feiras.</font></p>
      </div></td>
  </tr>
  <tr> 
    <td colspan="2"><p align="center">&nbsp;</p>
      <p align="center"><font face="Arial, Helvetica, sans-serif">S&atilde;o Vicente, 
        <?php echo $dia; ?> de <? echo $mes[$meses];  ?> de <?php echo $ano; ?>. 
        <br>
        </font></p>
      </td>
  </tr>
  <tr> 
    <td colspan="2"><p align="center" class="atestado">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <p align="center"><font face="Arial, Helvetica, sans-serif">Denise Martins 
        do Valle<br>
        Supervisora T&eacute;cnica de Se&ccedil;&atilde;o<br>
        Se&ccedil;&atilde;o T&eacute;cnica de Apoio Acad&ecirc;mico</font></p></td>
  </tr>
</table>
<? 
mysql_close($conexao);
?>
</body>
</html>
