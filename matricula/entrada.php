<html>
<head>
<title>[Sistema de Matr&iacute;cula]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?
//variaveis

$name=$HTTP_POST_VARS["nome"];
$ra=$HTTP_POST_VARS["ra"];
$sem=$HTTP_POST_VARS["sem"];
$nome=$HTTP_SESSION_VARS["nome"];
$ip_session=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$SID=session_id();

$nome_s=$name;

//abre conexão com o banco
include "../conexao.php";


?>

</head>

<body leftmargin="0" topmargin="0">
<table width="770" border="0">
  <tr> 
    <td colspan="4" bgcolor="#3366CC"> <div align="center"><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>[Sistema de Matr&iacute;cula on line]</strong></font></div></td>
  </tr>
  <tr> 
    <td><p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>[ 
        Aluno: <? echo $nome_s; echo $nome; echo " - R.A.: "; echo $ra; echo " - ".$sem."<sup>o</sup> Semestre ";?> </strong> 
        , Bem Vindo ao Sistema! <strong>]</strong></font></p></td>
    <td> 
      <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></div></td>
    <td>&nbsp;</td>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="index.php" target="_top">SAIR</a></strong></font></td>
  </tr>
  <tr> 
</table>
        <tr>
    <td><table width="100%" border="0">
      <tr>
          <td>
      
        
<table width="100%" border="0">
            <? 



//seleciona registros
$sqltemp="select ra,sem from semestre where ra = '$ra' order by id_s ASC";
$rstemp_query=mysql_query($sqltemp,$conexao);


?>
            <tr> 
              <td> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Disciplinas 
                a Cursar:</strong> [<a href="matricular.php?ra=<?  echo $ra; ?>&sem=<? echo $sem;?>&nome=<? echo $name;?>" target="notas"> 
                <font color="#CC3300"><strong>Escolher Disciplinas</strong></font> 
                </a>] 
                <?   
		$rstemp=null;

		mysql_close($conexao);
		$conexao=null;


?>
                <strong>::::: Disciplinas Selecionadas:</strong>[<a href="matriculado.php?ra=<?  echo $ra; ?>&sem=<? echo $sem; ?>&nome=<? echo $name; ?>" target="disciplinas"> 
                <font color="#CC3300"><strong>Ver Disciplinas</strong></font> 
                </a>] </font> </td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>



