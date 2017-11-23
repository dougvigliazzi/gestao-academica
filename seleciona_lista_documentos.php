<html>

<? // conexao com o mysql

//abre conexão com o banco
include "conexao.php";


$consulta="SELECT * FROM aluno_cad ORDER BY ra DESC";
$resultado=mysql_query($consulta,$conexao);
$totallinhas=mysql_num_rows($resultado);
$cont=1;

?>
<h1><FONT FACE=ARIAL><center>
    <b> 
    <?php echo $totallinhas; ?>
    </b> Alunos. 
  </center></font></h1>
<FONT FACE=ARIAL><center>
  Ordenados pelo RA em ordem Decrescente.
</center></font>

<hr>
<table>
<tr> 
    <td><div align="center"></div></td>
    <td><div align="center"><strong>RA</strong></div></td>
    <td><div align="center"><strong>ALUNO(A)</strong></div></td>
  </tr>
<?php 
while ($reg = mysql_fetch_array($resultado)) {
?>
  
  <tr> 
    <td><a href="atestado_matricula.php?hash=<? echo session_id(); ?>&data=<?php echo $data; ?>&md5=<?php echo md5('douglas'); ?>&nome=<?php echo $reg["nome"]; ?>&ra=<?php echo $reg["ra"]; ?>"></i><img src=imagens/button_edit.png width=20 border=0 alt="Atestado Matricula"></a> 
    </td>
    <td><b> RA: </b><i> 
      <?php echo $reg["ra"]; ?>
      </i></td>
    <td> <b>Nome: </b><i> 
      <?php echo $reg["nome"]; ?>
      </i></td>
  </tr>
  <?php 
$cont = ++$cont;
};

// fecha conexao com o mysql
mysql_close($conexao);

?>
</table>
</html>
