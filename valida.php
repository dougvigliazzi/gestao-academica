<html>
<head>

<title>Validar Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<? 
//registro de session
  session_start();
  session_register("id_usuario");
  session_register("usuario");
  
  
$usuario=$HTTP_POST_VARS["usuario"];
$senha=$HTTP_POST_VARS["senha"];


//abre conexão com o banco
include "conexao.php";

$sqltemp="select * from usuarios where nome = '$usuario'";

$rstemp=$rstemp_query=mysql_query(($sqltemp),$conexao);
$rstemp=mysql_fetch_array($rstemp_query);
if (($rstemp==0))
{
?><body>
<div align="center"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?   echo $usuario; ?>
  </font></b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">, você 
  não é um usuário cadastrado em nosso SISTEMA!<br>
  Tente <A href='index.php'>Conectar-se</a> novamente como um usuário válido 
  <?   exit();
} 

if ($rstemp["senha"]==$senha){
//$usuario=$usuario;
//$senha=$senha;
$ip_session=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$SID=session_id();
echo "<center> <font size=2 face='Verdana, Arial, Helvetica, sans-serif'><b> Você é: ";
echo $rstemp["nome"];
//echo $senha;
echo " - Seu IP está sendo registrado como: ";
//echo $data_session=$data;
echo $ip_session;
$id_usuario=$rstemp["id_usuario"]; 
//session.save('$name_session');
?></b>
  </font> </div>
<form action="admin.html" method="post" name="login">
  <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <input name="sessao" value="<? echo $SID; ?>" type="hidden">
    <input name="usuario" value="<? echo $rstemp["nome"]; ?>" type="hidden">
    <input name="id_usuario" value="<? echo $rstemp["id_usuario"]; ?>" type="hidden">
    <input type="submit" value="Acessar">
    </font> </div>
</form>
<div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?
	
}
  else
{
?>
  <B>SENHA INVÁLIDA!</B><br>
  Tente <A href='index.php'>Conectar-se</a> novamente. </font> </div>
<p align="center"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <? }
mysql_close($conexao);
?>
  </font> 
</body>
</html>
