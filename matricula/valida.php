<html>
<head>

<title>Sistema Matr&iacute;cula</title>
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
$ra=$name_session;
$senha=$pass_session;

//abre conexão com o banco
include "../conexao.php";

$sql_controle="select * from controle_ra where ra LIKE '$ra'";
$rs_controle=mysql_query($sql_controle,$conexao);
$rs_c=mysql_fetch_array($rs_controle);


//busca pelo aluno;
//$sqltemp="select * from aluno_cad where ra LIKE '$ra'";
$sqltemp="select * from aluno where ra LIKE '$ra'";

//Testa Matricula
//if($rs_c==0){

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

$name_session=$ra;
$pass_session=$senha;
$ip_session=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$SID=session_id();
echo "<center>
<font size=2 face='Verdana, Arial, Helvetica, sans-serif'><b> Aluno: ";
echo $rstemp["nome"];
$nome=$rstemp["nome"];
$nome_s=$nome;
echo " - R.A.: ";
echo $ra;
$semestre=$rstemp["semestre"];
echo " semestre: $semestre";
echo " - Seu IP está sendo registrado como: ";

echo $ip_session;

?></b>
  </font> </div>
<form action="entrada.php" method="post" name="login">
  <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <input name="sessao" value="<? echo $SID; ?>" type="hidden">
    <input name="ra" value="<? echo $ra; ?>" type="hidden">
	<input name="sem" value="<? echo $semestre; ?>" type="hidden">
    <input name="nome" value="<? echo $nome;?>" type="hidden">
    <input type="submit" value="Conectar">
    </font> </div>
</form>
<p align="center"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
<? 
mysql_close($conexao);
?>
  </font> 
</body>
</html>
