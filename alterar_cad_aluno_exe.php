<html>
<head>
<title>Completo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false" onview="return false">
<?

$ip=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$ra=$_POST["ra"];
$nome=$_POST["nome"];
$senha=$_POST["senha"];
$sem=$_POST["semestre"];
$filiacao=$_POST["filiacao"];
$estado_civil=$_POST["estado_civil"];
$data_nasc=$_POST["data_nasc"];
$local_nasc=$_POST["local_nasc"];
$uf_nasc=$_POST["uf_nasc"];
$rg=$_POST["rg"];
$cpf=$_POST["cpf"];
$endereco=$_POST["endereco"];
$cidade=$_POST["cidade"];
$cep=$_POST["cep"];
$uf=$_POST["uf"];
$endereco_local=$_POST["endereco_local"];
$cidade_local=$_POST["cidade_local"];
$cep_local=$_POST["cep_local"];
$uf_local=$_POST["uf_local"];
$email=$_POST["email"];
$fone=$_POST["fone"];
$fone_local=$_POST["fone_local"];
$fone_rec=$_POST["fone_rec"];
$fone_cel=$_POST["fone_cel"];
$tipo_ingresso=$_POST["tipo_ingresso"];
$vestibular_ano=$_POST["vestibular_ano"];
$nota_cg=$_POST["nota_cg"];
$nota_ce=$_POST["nota_ce"];
$nota_lp=$_POST["nota_lp"];
$classificacao=$_POST["classificacao"];
$transferido_origem=$_POST["transferido_origem"];
$reingresso_origem=$_POST["reingresso_origem"];
$observacao=$_POST["observacao"];


//variaveis aluno_escolaridade e aluno_info_ad
$ano_conclusao=$_POST["ano_conclusao"];
$em=$_POST["em"];
$gs=$_POST["gs"];
$alergia=$_POST["alergia"];
$sit_esp=$_POST["sit_especiais"];
$medicacao=$_POST["medicacao"];
$freq_med=$_POST["freq_med"];
$emergencia=$_POST["emergencia"];
$habilitacao=$_POST["habilitacao"];
$enade=$_POST["enade"];
$tcc=$_POST["tcc"];
$conclusao=$_POST["conclusao"];
$colacao=$_POST["colacao"];
$expedicao=$_POST["expedicao"];
$observacao_ad=$_POST["observacao_ad"];


//abre conexão com o banco
include "conexao.php";

$hoje = date("d/m/Y - h:i");
$data = date("d/m/Y ");

$erro = mysql_error();

//echo "$disc - $ra - $sem - $nota - $freq";
echo $ra;

$alterar_completo="UPDATE aluno_cad SET ra='$ra',nome='$nome',filiacao='$filiacao',est_civil='$estado_civil',d_nasc='$data_nasc',local_nasc='$local_nasc',uf_nasc='$uf_nasc',rg='$rg',cpf='$cpf',endereco='$endereco',cidade='$cidade',uf='$uf',cep='$cep',email='$email',endereco_local='$endereco_local',cidade_local='$cidade_local',uf_local='$uf_local',cep_local='$cep_local',fone='$fone',fone_rec='$fone_rec',fone_local='$fone_local',fone_cel='$fone_cel',tipo_ingresso='$tipo_ingresso',vestibular_ano='$vestibular_ano',nota_cg='$nota_cg',nota_ce='$nota_ce',nota_lp='$nota_lp',classificacao='$classificacao',transferido_origem='$transferido_origem',reingresso_origem='$reingresso_origem',observacao='$observacao'  WHERE ra='$ra'";
$sql_c = mysql_query($alterar_completo,$conexao) or die ("<h2>Problemas durante a alteração Cadastro. $alterar_completo</h2>");

/*$alterar_aluno="UPDATE aluno SET ra='$ra',nome='$nome' WHERE ra='$ra'";
$sql_a = mysql_query($alterar_aluno,$conexao) or die ("<h2>Problemas durante a alteração Cadastro. $alterar_aluno</h2>");*/

$alterar_escola="UPDATE aluno_escolaridade SET cpf='$cpf',ens_med='$em',ano_conclusao='$ano_conclusao' WHERE ra = '$ra'";
$sql_e = mysql_query($alterar_escola,$conexao) or die ("<h2>Problemas durante a alteração Escolaridade. $alterar_escola</h2>");

$alterar_info_ad="UPDATE aluno_info_ad SET habilitacao='$habilitacao',enade='$enade',tcc='$tcc',data_conclusao='$conclusao',data_colacao='$colacao',data_exp_diploma='$expedicao',obs='$observacao_ad',cpf='$cpf',grupo_sangue='$gs',alergias='$alergia',situacoes='$sit_esp',medicacao='$medicacao',freq_med='$freq_med',emergencia='$emergencia' WHERE ra='$ra'";
$sql_ia = mysql_query($alterar_info_ad,$conexao) or die ("<h2>Problemas durante a alteração Informacoes Adicionais. $alterar_info_ad</h2>");


echo "<h1>Opera&ccedil;&atilde;o efetuada com sucesso!</h1>";
/*
echo "$hoje -- Ação:<b> $alterar_completo </b> || IP: <b>$ip </b><p>";
echo "$hoje -- Ação:<b> $alterar_escola </b> || IP: <b>$ip </b><p>";
echo "$hoje -- Ação:<b> $alterar_info_ad </b> || IP: <b>$ip </b><p>";
*/

$alterar_sub_comp=addslashes($alterar_completo);
$alterar_sub_escola=addslashes($alterar_escola);
$alterar_sub_info_ad=addslashes($alterar_info_ad);


$alterar_log="INSERT INTO logs(ip,data,acao) values('$ip','$hoje','$alterar_sub')";
$sql_l = mysql_query($alterar_log,$conexao) or die ("<h2>Problemas durante a inclusão. $alterar_log</h2>");

$alterar_log_comp="INSERT INTO logs(ip,data,acao) values('$ip','$hoje','$alterar_sub_comp')";
$sql_l = mysql_query($alterar_log_comp,$conexao) or die ("<h2>Problemas durante a inclusão. $alterar_log</h2>");

$alterar_log_escola="INSERT INTO logs(ip,data,acao) values('$ip','$hoje','$alterar_sub_escola')";
$sql_l = mysql_query($alterar_log_escola,$conexao) or die ("<h2>Problemas durante a inclusão. $alterar_log</h2>");

$alterar_log_info="INSERT INTO logs(ip,data,acao) values('$ip','$hoje','$alterar_sub_info_ad')";
$sql_l = mysql_query($alterar_log_info,$conexao) or die ("<h2>Problemas durante a inclusão. $alterar_log</h2>");


// fecha conexao com o mysql
mysql_close($conexao);

echo "<a href='Javascript:history.go(-1)'><< Voltar</a>";

?>
</body>
</html>
