<?php require_once('Connections/anchieta.php'); 

$currentPage = $HTTP_SERVER_VARS["PHP_SELF"];
$disciplina=$_GET["id_doc_disc"];
$credito=$_GET["creditos"];

$ano=date("Y");

//verifica semestre
$m=date("m");
if($m<=6||$m=12){
$sem="1";
}else{
$sem="2";
}

$maxRows_chamada = 21;
$pageNum_chamada = 0;
if (isset($HTTP_GET_VARS['pageNum_chamada'])) {
  $pageNum_chamada = $HTTP_GET_VARS['pageNum_chamada'];
}
$startRow_chamada = $pageNum_chamada * $maxRows_chamada;

mysql_select_db($database_anchieta, $anchieta);

/*$query_chamada = "SELECT distinct rd.ra,ac.nome,rd.id_doc_disc,rd.creditos,rd.ano,rd.sem,dd.cod_disc,dd.disciplina,dd.docente FROM ra_disc rd inner join doc_disc dd on dd.id_doc_disc=rd.id_doc_disc inner join aluno_cad ac on rd.ra = ac.ra WHERE rd.id_doc_disc = '$disciplina' and rd.ano = '2008' and rd.sem = '1' ORDER BY ac.nome asc";*/

$query_chamada = "SELECT distinct rd.ra,ac.nome,rd.id_doc_disc,rd.creditos,rd.ano,rd.sem,dd.cod_disc,dd.disciplina,dd.docente FROM ra_disc rd inner join doc_disc dd on dd.id_doc_disc=rd.id_doc_disc inner join aluno_cad ac on rd.ra = ac.ra WHERE rd.id_doc_disc = '$disciplina' and rd.ano = '$ano' and rd.sem = '$sem' ORDER BY ac.nome asc";

$query_limit_chamada = sprintf("%s LIMIT %d, %d", $query_chamada, $startRow_chamada, $maxRows_chamada);
$chamada = mysql_query($query_limit_chamada, $anchieta) or die(mysql_error());
$row_chamada = mysql_fetch_assoc($chamada);

if (isset($HTTP_GET_VARS['totalRows_chamada'])) {
  $totalRows_chamada = $HTTP_GET_VARS['totalRows_chamada'];
} else {
  $all_chamada = mysql_query($query_chamada);
  $totalRows_chamada = mysql_num_rows($all_chamada);
}
$totalPages_chamada = ceil($totalRows_chamada/$maxRows_chamada)-1;

$queryString_chamada = "";
if (!empty($HTTP_SERVER_VARS['QUERY_STRING'])) {
  $params = explode("&", $HTTP_SERVER_VARS['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_chamada") == false && 
        stristr($param, "totalRows_chamada") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_chamada = "&" . implode("&", $newParams);
  }
}
$queryString_chamada = sprintf("&totalRows_chamada=%d%s", $totalRows_chamada, $queryString_chamada);
?>

<html>
<head>
<title>................................</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<link href="historico/bordas.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div id="Layer1" style="position:absolute; left:11px; top:12px; width:144px; height:74px; z-index:1"><img src="imagens/logo_csv_trans.gif" width="170"></div>
<table width="995" border="1" cellpadding="0" cellspacing="0" class="QuadroBorda">
  <tr> 
    <td colspan="33"><div align="center"> 
        <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong><font face="Arial, Helvetica, sans-serif">UNIVERSIDADE 
          ESTADUAL PAULISTA <br>
          &quot;J&Uacute;LIO DE MESQUITA FILHO&quot; </font></strong></font><font face="Arial, Helvetica, sans-serif"><br>
          <strong><font size="2">Campus Experimental do Litoral Paulista</font></strong><br>
          <font size="1">P&ccedil;a. Infante D. Henrique, s/n&ordm; - Pq. Bitaru 
          S&atilde;o Vicente - SP - CEP 11330-900 - Tel. (13) 3569-9400</font></font> 
      </div></td>
  </tr>
  <tr valign="middle"> 
    <td height="21" colspan="33"> <div align="center"><strong><font size="3" face="Verdana, Arial, Helvetica, sans-serif">FREQ&Uuml;&Ecirc;NCIA 
        MENSAL</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="33"><font size="2" face="Arial, Helvetica, sans-serif"><strong>CURSO: 
      Ci&ecirc;ncias Biol&oacute;gicas - Bacharelado, com Habilita&ccedil;&otilde;es 
      em Biologia Marinha e Gerenciamento Costeiro</strong></font></td>
  </tr>
  <tr> 
    <td colspan="16"><font size="1" face="Arial, Helvetica, sans-serif">DISCIPLINA: 
      <?php echo $row_chamada['disciplina']; ?> - <?php $doc=$row_chamada['docente']; echo $row_chamada['docente']; ?></font></td>
    <td colspan="6"><font size="1" face="Arial, Helvetica, sans-serif">AULAS 
      PREVISTAS:</font></td>
    <td colspan="2" ><font size="1" face="Arial, Helvetica, sans-serif">____h</font></td>
    <td width="15"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td colspan="7""><font size="1" face="Arial, Helvetica, sans-serif">LABORAT&Oacute;RIO:</font></td>
    <td width="50"><font size="1" face="Arial, Helvetica, sans-serif">____h</font></td>
  </tr>
  <tr> 
    <td colspan="16"><font size="1" face="Arial, Helvetica, sans-serif">C&Oacute;DIGO: 
      <?php echo $row_chamada['cod_disc']; ?></font></td>
    <td colspan="6"><font size="1" face="Arial, Helvetica, sans-serif">PROVAS:</font></td>
    <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif">____h</font></td>
    <td width="15"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td colspan="7"><font size="1" face="Arial, Helvetica, sans-serif">PESQUISA:</font></td>
    <td width="50"><font size="1" face="Arial, Helvetica, sans-serif">____h</font></td>
  </tr>
  <tr> 
    <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif">ANO/SEMESTRE:<?php echo $ano; echo " - $ano_sem"; ?> / <?php echo $sem_atual; echo " - $sem"; ?></font></td>
    <td colspan="14"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td colspan="6"><font size="1" face="Arial, Helvetica, sans-serif">AULAS MENOS 
      PROVAS</font></td>
    <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif">____h</font></td>
    <td width="15"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td colspan="7"><font size="1" face="Arial, Helvetica, sans-serif">LEITURA 
      DIRIGIDA:</font></td>
    <td width="50"><font size="1" face="Arial, Helvetica, sans-serif">____h</font></td>
  </tr>
  <tr> 
    <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif">CARGA HOR&Aacute;RIA: 
      <?php /*$creditos=$row_chamada['creditos'];*/ echo $credito * 15; ?>
      </font></td>
    <td colspan="14"><font size="1" face="Arial, Helvetica, sans-serif">ANO LETIVO: 
      <?php echo $ano; ?></font></td>
    <td colspan="6"><font size="1" face="Arial, Helvetica, sans-serif">EXPOSITIVAS</font></td>
    <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif">____h</font></td>
    <td width="15"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td colspan="7"><font size="1" face="Arial, Helvetica, sans-serif">SEMIN&Aacute;RIOS:</font></td>
    <td width="50"><font size="1" face="Arial, Helvetica, sans-serif">____h</font></td>
  </tr>
  <tr> 
    <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif">CR&Eacute;DITOS: 
      <?php /*echo $row_chamada['creditos'];*/ echo " $credito"; ?></font></td>
    <td colspan="14"><font size="1" face="Arial, Helvetica, sans-serif">M&Ecirc;S:</font> 
      <select name="mes">
        <option>janeiro</option>
        <option>fevereiro</option>
        <option>mar&ccedil;o</option>
        <option>abril</option>
        <option>maio</option>
        <option>junho</option>
        <option>julho</option>
        <option>agosto</option>
        <option>setembro</option>
        <option>outubro</option>
        <option>novembro</option>
        <option>dezembro</option>
      </select>
	</td>
    <td colspan="6"><font size="1" face="Arial, Helvetica, sans-serif">DEMONSTRATIVA:</font></td>
    <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif">____h</font></td>
    <td width="15"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td colspan="7"><font size="1" face="Arial, Helvetica, sans-serif">OUTROS:</font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif">____h&nbsp;</font></td>
  </tr>
  <tr class="Linha"> 
    <td width="70" height="20" rowspan="2" valign="middle"> 
      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;RA</font><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></div></td>
    <td width="350" height="20" rowspan="2" valign="middle"> 
      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif">NOME</font><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></div></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="50" height="20" rowspan="2" valign="middle"> 
      <div align="center"><font size="1" face="Arial, Helvetica, sans-serif">FALTAS</font><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></div></td>
  </tr>
  <tr class="Linha"> 
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <?php do { ?>
  <tr class="Linha"> 
    <td height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;<?php echo $row_chamada['ra']; ?></font></td>
    <td width="350" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;<?php echo strtoupper($row_chamada['nome']); ?></font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="15" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="50" height="20"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <?php } while ($row_chamada = mysql_fetch_assoc($chamada)); ?>
</table>
<table border="0" width="100%" align="right">
  <tr> 
    <td width="50%" align="left" valign="bottom"> <font size="2" face="Arial, Helvetica, sans-serif"> 
      <?php
	   if ($pageNum_chamada == $totalPages_chamada) { // Show if not last page 
      printf("<p>__________________________________________<p>");
	  echo $doc; 
       } // Show if not last page ?>
      </font></td>
    <td width="5%" height="69" align="center"> <font size="2" face="Arial, Helvetica, sans-serif"> 
      <?php if ($pageNum_chamada > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?id_doc_disc=$disciplina&pageNum_chamada=%d%s", $currentPage, 0, $queryString_chamada); ?>">Primeiro</a> 
      <?php } // Show if not first page ?>
      </font></td>
    <td width="5%" align="center"> <font size="2" face="Arial, Helvetica, sans-serif"> 
      <?php if ($pageNum_chamada > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?id_doc_disc=$disciplina&pageNum_chamada=%d%s", $currentPage, max(0, $pageNum_chamada - 1), $queryString_chamada); ?>">Retornar</a> 
      <?php } // Show if not first page ?>
      </font></td>
    <td width="15%" align="center"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp; 
      RA <?php echo ($startRow_chamada + 1) ?> a <?php echo min($startRow_chamada + $maxRows_chamada, $totalRows_chamada) ?> de <?php echo $totalRows_chamada ?> </font></td>
    <td width="5%" align="center"> <font size="2" face="Arial, Helvetica, sans-serif"> 
      <?php if ($pageNum_chamada < $totalPages_chamada) { // Show if not last page ?>
      <a href="<?php printf("%s?id_doc_disc=$disciplina&pageNum_chamada=%d%s", $currentPage, min($totalPages_chamada, $pageNum_chamada + 1), $queryString_chamada); ?>">Avan&ccedil;ar</a> 
      <?php } // Show if not last page ?>
      </font></td>
    <td width="5%" align="center"> <font size="2" face="Arial, Helvetica, sans-serif"> 
      <?php if ($pageNum_chamada < $totalPages_chamada) { // Show if not last page ?>
      <a href="<?php printf("%s?id_doc_disc=$disciplina&pageNum_chamada=%d%s", $currentPage, $totalPages_chamada, $queryString_chamada); ?>">&Uacute;ltimo</a> 
      <?php } // Show if not last page ?>
      </font></td>
  </tr>
</table>
</p>
</body>
</html>
<?php
mysql_free_result($chamada);
?>

