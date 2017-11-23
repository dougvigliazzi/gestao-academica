<html>
<head>
<title>Completo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false" onview="return false">
<?
//variaveis aluno e aluno_cad
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

$incluir_completo="insert into aluno_cad(ra,nome,filiacao,est_civil,d_nasc,local_nasc,uf_nasc,rg,cpf,endereco,cidade,cep,uf,endereco_local,cidade_local,uf_local,cep_local,email,fone,fone_local,fone_rec,fone_cel,tipo_ingresso,vestibular_ano,nota_cg,nota_ce,nota_lp,classificacao,transferido_origem,reingresso_origem,observacao,data_cad) 
values('$ra','$nome','$filiacao','$estado_civil','$data_nasc','$local_nasc','$uf_nasc','$rg','$cpf','$endereco','$cidade','$cep','$uf','$endereco_local','$cidade_local','$uf_local','$cep_local','$email','$fone','$fone_local','$fone_rec','$fone_cel','$tipo_ingresso','$vestibular_ano','$nota_cg','$nota_ce','$nota_lp','$classificacao','$transferido_origem','$reingresso_origem','$observacao','$data')";
$sql = mysql_query($incluir_completo,$conexao) or die ("<h2>Problemas durante a inclusão Cadastro. $incluir_completo</h2>");

$incluir="insert into aluno(ra,nome,senha,semestre,data) values('$ra','$nome','$senha','$sem','$hoje')";
$sql = mysql_query($incluir,$conexao) or die ("<h2>Problemas durante a inclusão Aluno. $incluir</h2>");

$incluir_escola="insert into aluno_escolaridade(ra,cpf,ens_med,ano_conclusao) values('$ra','$cpf','$em','$ano_conclusao')";
$sql = mysql_query($incluir_escola,$conexao) or die ("<h2>Problemas durante a inclusão Escolaridade. $incluir_escola</h2>");

$incluir_info_ad="insert into aluno_info_ad(ra,cpf,habilitacao,enade,tcc,data_conclusao,data_colacao,data_exp_diploma,obs,grupo_sangue,alergias,situacoes,medicacao,freq_med,emergencia) values('$ra','$cpf','$habilitacao','$enade','$tcc','$conclusao','$colacao','$expedicao','$observacao_ad','$gs','$alergia','$sit_esp','$medicacao','$freq_med','$emergencia')";
$sql = mysql_query($incluir_info_ad,$conexao) or die ("<h2>Problemas durante a inclusão Info_Ad. $incluir_info_ad</h2>");

$incluir_w="insert into aluno_w(ra,nome,senha,data) values('$ra','$nome','$senha','$hoje')";
$sql_w = mysql_query($incluir_w,$conexao) or die ("<h2>Problemas durante a inclusão Aluno_wap. $incluir_w</h2>");

$incluir_sem="insert into semestre(ra,sem,data) values('$ra','$sem','$hoje')";
$sql_sem = mysql_query($incluir_sem,$conexao) or die ("<h2>Problemas durante a inclusão Semestre. $incluir_sem</h2>");

echo "<h1>Opera&ccedil;&atilde;o efetuada com sucesso!</h1>";
/*
echo "$hoje -- Ação:<b> $incluir </b> || IP: <b>$ip </b><p>";
echo "$hoje -- Ação:<b> $incluir_w </b> || IP: <b>$ip </b><p>";
echo "$hoje -- Ação:<b> $incluir_sem </b> || IP: <b>$ip </b><p>";
*/

$incluir_sub=addslashes($incluir);
$incluir_sub_comp=addslashes($incluir_completo);
$incluir_sub_escola=addslashes($incluir_escola);
$incluir_sub_info_ad=addslashes($incluir_info_ad);
$incluir_sub_w=addslashes($incluir_w);
$incluir_sub_s=addslashes($incluir_sem);


$incluir_log="INSERT INTO logs(ip,data,acao) values('$ip','$hoje','$incluir_sub')";
$sql_l = mysql_query($incluir_log,$conexao) or die ("<h2>Problemas durante a inclusão. $incluir_log</h2>");

$incluir_log_comp="INSERT INTO logs(ip,data,acao) values('$ip','$hoje','$incluir_sub_comp')";
$sql_l = mysql_query($incluir_log_comp,$conexao) or die ("<h2>Problemas durante a inclusão. $incluir_log</h2>");

$incluir_log_escola="INSERT INTO logs(ip,data,acao) values('$ip','$hoje','$incluir_sub_escola')";
$sql_l = mysql_query($incluir_log_escola,$conexao) or die ("<h2>Problemas durante a inclusão. $incluir_log</h2>");

$incluir_log_info="INSERT INTO logs(ip,data,acao) values('$ip','$hoje','$incluir_sub_info_ad')";
$sql_l = mysql_query($incluir_log_info,$conexao) or die ("<h2>Problemas durante a inclusão. $incluir_log</h2>");

$incluir_log_w="INSERT INTO logs(ip,data,acao) values('$ip','$hoje','$incluir_sub_w')";
$sql_l_w = mysql_query($incluir_log_w,$conexao) or die ("<h2>Problemas durante a inclusão. $incluir_log_w</h2>");

$incluir_log_s="INSERT INTO logs(ip,data,acao) values('$ip','$hoje','$incluir_sub_s')";
$sql_l_s = mysql_query($incluir_log_s,$conexao) or die ("<h2>Problemas durante a inclusão. $incluir_log_s</h2>");

// fecha conexao com o mysql
mysql_close($conexao);

echo "<a href='Javascript:history.go(-1)'><< Voltar</a>";

?>
</body>
</html>
