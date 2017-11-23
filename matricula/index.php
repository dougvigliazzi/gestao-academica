<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<?
//variaveis

$name=$HTTP_POST_VARS["nome"];
$ra=$HTTP_POST_VARS["ra"];
$sem=$HTTP_POST_VARS["sem"];
$ip_session=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$SID=session_id();

//abre conexão com o banco
include "../conexao.php";


?>
<title>UNESP : S&Atilde;O VICENTE [Rematr&iacute;cula]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<frameset rows="95,*" cols="*" frameborder="NO" border="0" framespacing="0">
  <frame src="login.php" scrolling="NO" noresize name="main">
  <frameset rows="*" cols="50%,*" frameborder="NO" border="0" framespacing="0">
    <frame src="branco.htm" scrolling="AUTO" name="notas" noresize>
    <frame src="branco.htm" scrolling="AUTO" name="disciplinas" noresize>
    <frame src="UntitledFrame-2">
  </frameset>
</frameset>
<noframes><body>

</body></noframes>
</html>
