<?php require_once('Connections/anchieta.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $HTTP_SERVER_VARS['PHP_SELF'];
if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
  $editFormAction .= "?" . $HTTP_SERVER_VARS['QUERY_STRING'];
}

if ((isset($HTTP_POST_VARS["MM_update"])) && ($HTTP_POST_VARS["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE aluno SET nome=%s, senha=%s, semestre=%s WHERE ra=%s",
                       GetSQLValueString($HTTP_POST_VARS['textfield'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['textfield2'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['textfield3'], "int"),
                       GetSQLValueString($HTTP_POST_VARS['hiddenField'], "text"));

  mysql_select_db($database_anchieta, $anchieta);
  $Result1 = mysql_query($updateSQL, $anchieta) or die(mysql_error());
}

$colname_registros = "1";
if (isset($HTTP_GET_VARS['ra'])) {
  $colname_registros = (get_magic_quotes_gpc()) ? $HTTP_GET_VARS['ra'] : addslashes($HTTP_GET_VARS['ra']);
}
mysql_select_db($database_anchieta, $anchieta);
$query_registros = sprintf("SELECT * FROM aluno WHERE ra = '%s' ORDER BY nome ASC", $colname_registros);
$registros = mysql_query($query_registros, $anchieta) or die(mysql_error());
$row_registros = mysql_fetch_assoc($registros);
$totalRows_registros = mysql_num_rows($registros);
?>
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <p> 
    <input value="<?php echo $row_registros['nome']; ?>" type="text" name="textfield">
  </p>
  <p> 
    <input value="<?php echo $row_registros['senha']; ?>" type="text" name="textfield2">
  </p>
  <p> 
    <input value="<?php echo $row_registros['semestre']; ?>" type="text" name="textfield3">
    <input type="hidden" name="hiddenField">
  </p>
  <input type="hidden" name="MM_update" value="form1">
  <input type="submit" name="Submit" value="Enviar">
</form>
</body>
</html>
<?php
mysql_free_result($registros);
?>

