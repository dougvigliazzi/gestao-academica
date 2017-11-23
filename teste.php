<?php require_once('Connections/anchieta.php'); ?>
<?php
$currentPage = $HTTP_SERVER_VARS["PHP_SELF"];

$maxRows_rs = 10;
$pageNum_rs = 0;
if (isset($HTTP_GET_VARS['pageNum_rs'])) {
  $pageNum_rs = $HTTP_GET_VARS['pageNum_rs'];
}
$startRow_rs = $pageNum_rs * $maxRows_rs;

mysql_select_db($database_anchieta, $anchieta);
$query_rs = "SELECT * FROM aluno";
$query_limit_rs = sprintf("%s LIMIT %d, %d", $query_rs, $startRow_rs, $maxRows_rs);
$rs = mysql_query($query_limit_rs, $anchieta) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);

if (isset($HTTP_GET_VARS['totalRows_rs'])) {
  $totalRows_rs = $HTTP_GET_VARS['totalRows_rs'];
} else {
  $all_rs = mysql_query($query_rs);
  $totalRows_rs = mysql_num_rows($all_rs);
}
$totalPages_rs = ceil($totalRows_rs/$maxRows_rs)-1;

$queryString_rs = "";
if (!empty($HTTP_SERVER_VARS['QUERY_STRING'])) {
  $params = explode("&", $HTTP_SERVER_VARS['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rs") == false && 
        stristr($param, "totalRows_rs") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rs = "&" . implode("&", $newParams);
  }
}
$queryString_rs = sprintf("&totalRows_rs=%d%s", $totalRows_rs, $queryString_rs);
?>
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="770" border="0">
  <tr> 
    <td colspan="6"> <div align="center"><strong><font face="Verdana, Arial, Helvetica, sans-serif">TABELA 
        ALUNOS</font></strong></div></td>
  </tr>
  <tr> 
    <td> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">RA</font></div></td>
    <td> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">NOME</font></div></td>
    <td> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">SENHA</font></div></td>
    <td> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">SEMESTRE</font></div></td>
    <td colspan="2"> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">A&Ccedil;&Atilde;O</font></div></td>
  </tr>
  <?php do { ?>
  <tr bgcolor="#FFFFCC"> 
    <td> 
      <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_rs['ra']; ?></font></div></td>
    <td> 
      <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_rs['nome']; ?></font></div></td>
    <td> 
      <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_rs['senha']; ?></font></div></td>
    <td> 
      <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row_rs['semestre']; ?></font></div></td>
    <td> 
      <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="Untitled-1.php?ra=<?php echo $row_rs['ra']; ?>">alterar</a></font></div></td>
    <td> 
      <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">excluir</font></div></td>
  </tr>
  <?php } while ($row_rs = mysql_fetch_assoc($rs)); ?>
  <tr bgcolor="#FFFFCC"> 
    <td colspan="6"><div align="center"><a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, 0, $queryString_rs); ?>">Primeiro</a> 
        <a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, max(0, $pageNum_rs - 1), $queryString_rs); ?>">Retornar</a> 
        <a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, min($totalPages_rs, $pageNum_rs + 1), $queryString_rs); ?>">Avançar</a> 
        <a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, $totalPages_rs, $queryString_rs); ?>">Último</a> 
      </div></td>
  </tr>
</table>
<p>&nbsp;</p></body>
</html>
<?php
mysql_free_result($rs);
?>

