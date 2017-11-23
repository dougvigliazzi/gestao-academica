<html>
<head>

<title>Sistema de Apoio a Reuni&otilde;es: Valida&ccedil;&atilde;o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<? 
//registro de session
  session_start();
  session_register("nome_s");
  session_register("ra_s");
  
  
$name_session=$HTTP_POST_VARS["ra"];
$pass_session=$HTTP_POST_VARS["chave"];


$dbname="notas";
$nome=$name_session;
$senha=$pass_session;

//abre conexão com o banco
include "../conexao.php";


$sql_controle="select * from controle_ra where ra LIKE '$nome'";
$rs_controle=mysql_query($sql_controle,$conexao);
$rs_c=mysql_fetch_array($rs_controle);


//busca pelo aluno;
$sqltemp="select * from aluno where ra LIKE '$nome'";

if($rs_c==0){

$rstemp=$rstemp_query=mysql_query(($sqltemp),$conexao);
$rstemp=mysql_fetch_array($rstemp_query);
if (($rstemp==0)){
?>
<body>
<div align="center"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?   echo $nome; ?>
  </font></b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">, você 
  não é um usuário cadastrado em nosso SISTEMA!<br>
  Tente <A href='login.php'>Conectar-se</a> novamente como um usuário válido 
  <?   exit();
}

if ($rstemp["senha"]<>$senha||$rstemp["senha"]=='12345'){
?>
<div align="center"> 
  <B>SENHA INVÁLIDA OU NECESSITA ALTERAR A SENHA INICIAL '12345'. <br>ENTRE NO SISTEMA DE NOTAS E FAÇA A ALTERAÇÃO!</B><br>
  Tente <A href='login.php'>Conectar-se</a> novamente. </font> </div>
<p align="center"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 

  <?
}
  else
{

$name_session=$nome;
$pass_session=$senha;
$ip_session=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$SID=session_id();
echo "<center>
<font size=2 face='Verdana, Arial, Helvetica, sans-serif'><b> Você é: ";
echo $rstemp["nome"];
echo " - R.A.: ";
echo $nome;
$semestre=$rstemp["semestre"];
echo " semestre: $semestre";
echo " - Seu IP está sendo registrado como: ";
//echo $data_session=$data;
echo $ip_session;
//session.save('$name_session');
?></b>
  </font> </div>
<form action="entrada.php" method="post" name="login">
  <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <input name="ra" value="<? echo $SID; ?>" type="hidden">
    <input name="ra" value="<? echo $nome; ?>" type="hidden">
	<input name="sem" value="<? echo $semestre; ?>" type="hidden">
    <input name="nome" value="<? echo $rstemp["nome"];?>" type="hidden">
    <input type="submit" value="Conectar">
    </font> </div>
</form>
<p align="center"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <? }
  
}else{
echo "<h2 align=center>Impossível acessar o sistema, sua <font color=red>REMATRÍCULA </font>já foi realizada! <p>Em caso de problemas contactar a Secretaria Acadêmica!</h2>";
}
mysql_close($conexao);
?>
  </font> 
</body>
</html>
