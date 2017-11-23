<?
include "conexao.php";

$lista="SELECT nome,ra FROM aluno_cad WHERE ra <= '02%'";
$lista_q=mysql_query($lista,$conexao);

while($reg=mysql_fetch_array($lista_q)){
$nome = $reg["nome"];
$ra = $reg["ra"];

//checa parametros
	if(!$nome || !$ra){
		echo "<H1>ERRO</H1>";
	} else {

//gera cabecalhos
		header("Content-type: application/msword");
		header("Content-Disposition: inline, filename=atestado_matr.rtf");

//abre o arquivo modelo
		$arquivo="rtf/atestado.rtf";
		$a_arquivo=fopen($arquivo,"r");

//le arquivo em uma variavel
		$saida=fread($a_arquivo,filesize($arquivo));

		fclose($a_arquivo);

//substituicao pelas variaveis
		$saida = str_replace("<<nome>>",strtoupper($nome),$saida);
		$saida = str_replace("<<ra>>",$ra,$saida);

//encaminha para o navegador
		echo $saida;
	}
}
mysql_close($conexao);
?>
