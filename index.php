<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<?php 
session_destroy();
session_unregister("usuario");
?>
<body>
<form name="form1" id="form1" method="post" action="valida.php">
  <table width="350" border="0" align="center" cellpadding="1" cellspacing="0">
    <tr> 
      <td colspan="2"><div align="center"><font face="Verdana, Arial, Helvetica, sans-serif"><strong>Login 
          - Administra&ccedil;&atilde;o</strong></font></div></td>
    </tr>
    <tr> 
      <td width="131"><div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>usuario:</strong></font></div></td>
      <td width="215"><input name="usuario" type="text" id="usuario" /></td>
    </tr>
    <tr> 
      <td><div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>senha:</strong></font></div></td>
      <td><input name="senha" type="password" id="senha" /></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center">
          <input type="submit" value="Login" />
        </div></td>
    </tr>
  </table>
</form>
</body>
</html>
