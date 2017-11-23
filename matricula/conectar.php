<?php
$user="root";
$chave="";
$db="notas";

$conexao=mysql_connect("localhost",$user,$chave);

mysql_select_db($db,$conexao);

$consulta="SELECT * FROM alunos WHERE ra='nome'";
$resultado=mysql_query($consulta,$conexao);


?>
