<html>
<head>
<title> </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
//abre conexão com o banco
include "conexao.php";

$ra=$HTTP_GET_VARS['ra'];

$sql="select * from aluno_cad where ra = '$ra'";
$reg_query=mysql_query($sql,$conexao);
?>

<body>
<div id="Layer1" style="position:absolute; left:649px; top:127px; width:123px; height:170px; z-index:1"><img src="foto.php?ra=<? echo $ra; ?>" width=110 bordercolor="black" border=1></div>
<form method="post" action="alterar_cad_aluno_exe.php">
  <table width="100%" border="0">
    <tr> 
      <td colspan="5"><div align="center"><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>Alterar 
          Dados de Alunos</strong></font></div></td>
    </tr>
    <tr bgcolor="#6699FF"> 
      <td colspan="3"> <div align="center"><strong><font color="#FFFFFF" size="3" face="Verdana, Arial, Helvetica, sans-serif">IDENTIFICA&Ccedil;&Atilde;O</font></strong></div></td>
    </tr>
    <? while($reg=mysql_fetch_array($reg_query)){ ?>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">RA</font></strong></div></td>
      <td width="72"><input name="ra" type="text" id="ra" size="12" maxlength="8" value="<? echo $reg["ra"]; ?>"> 
      </td>
      <td colspan="3"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
          </font></strong></div></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome</font></strong></div></td>
      <td colspan="4"><input name="nome" type="text" size="70"  value="<? echo $reg["nome"]; ?>"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Filia&ccedil;&atilde;o</font></strong></div></td>
      <td colspan="4"><textarea name="filiacao" cols="55" rows="3" id="filiacao"><? echo $reg["filiacao"]; ?></textarea></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Estado 
          civil </font></strong></div></td>
      <td colspan="4"><select name="estado_civil" id="select4">
          <option value="<? echo $reg["est_civil"]; ?>"><? echo $reg["est_civil"]; ?></option>
          <option value="solteiro(a)">Solteiro(a)</option>
          <option value="casado(a)">Casado(a)</option>
          <option value="divorciado(a)">Divorciado(a)</option>
          <option value="desquitado(a)">Desquitado(a)</option>
          <option value="viuvo(a)">Vi&uacute;vo(a)</option>
        </select></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Data 
          Nascimento </font></strong></div></td>
      <td colspan="4"><input name="data_nasc" type="text" id="data_nasc" size="12" maxlength="10"  value="<? echo $reg["d_nasc"]; ?>"> 
        <div align="right"><strong></strong></div>
        <div align="right"><strong></strong></div></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Local 
          Nascimento </font></strong></div></td>
      <td colspan="4"><input name="local_nasc" type="text" id="local_nasc2" size="50"  value="<? echo $reg["local_nasc"]; ?>"> 
        <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">UF</font></strong> 
        <input name="uf_nasc" type="text" id="uf_nasc2" size="8"  value="<? echo $reg["uf_nasc"]; ?>"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">RG</font></strong></div></td>
      <td colspan="4"><input name="rg" type="text" id="rg" size="20" maxlength="20"  value="<? echo $reg["rg"]; ?>"> 
        <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">CPF</font></strong> 
        <input name="cpf" type="text" id="cpf" size="20" maxlength="20"  value="<? echo $reg["cpf"]; ?>"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Endere&ccedil;o 
          Origem </font></strong></div></td>
      <td colspan="4"><input name="endereco" type="text" id="endereco" size="90"  value="<? echo $reg["endereco"]; ?>"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Cidade 
          Origem </font></strong></div></td>
      <td colspan="4"><input name="cidade" type="text" id="cidade" size="70" value="<? echo $reg["cidade"]; ?>"> 
      </td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">CEP</font></strong></div></td>
      <td colspan="4"><input name="cep" type="text" id="cep" size="20" maxlength="20" value="<? echo $reg["cep"]; ?>"> 
        <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">UF</font></strong> 
        <input name="uf" type="text" id="uf2" size="8" value="<? echo $reg["uf"]; ?>"></td>
    </tr>
    <tr> 
      <td> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Telefone 
          Origem </font></strong></div></td>
      <td colspan="4"><input name="fone" type="text" id="fone" size="20" maxlength="20" value="<? echo $reg["fone"]; ?>"> 
        <strong></strong></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">e-mail</font></strong></div></td>
      <td colspan="4"><input name="email" type="text" id="email" size="70" value="<? echo $reg["email"]; ?>"></td>
    </tr>
    <tr> 
      <td> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Endere&ccedil;o 
          Local </font></strong></div></td>
      <td colspan="4"><input name="endereco_local" type="text" id="endereco_local" size="90"  value="<? echo $reg["endereco_local"]; ?>"></td>
    </tr>
    <tr> 
      <td> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Cidade 
          Local </font></strong></div></td>
      <td colspan="4"><input name="cidade_local" type="text" id="cidade_local" size="70" value="<? echo $reg["cidade_local"]; ?>"> 
      </td>
    </tr>
    <tr> 
      <td> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">CEP</font></strong></div></td>
      <td colspan="4"><input name="cep_local" type="text" id="cep_local" size="20" maxlength="20" value="<? echo $reg["cep_local"]; ?>"> 
        <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">UF</font></strong> 
        <input name="uf_local" type="text" id="uf2" size="8" value="<? echo $reg["uf_local"]; ?>"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Telefone 
          Local </font></strong></div></td>
      <td colspan="4"><input name="fone_local" type="text" id="fone_local" size="20" maxlength="20" value="<? echo $reg["fone"]; ?>">
        <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Telefone 
        Recado 
        <input name="fone_rec" type="text" id="fone_rec" size="20" maxlength="20" value="<? echo $reg["fone_rec"]; ?>">
        <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> Telefone 
        Cel. <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
        <input name="fone_cel" type="text" id="fone_cel2" value="<? echo $reg["fone_cel"]; ?>" size="20" maxlength="20">
        </font></strong></font></strong> </font></strong></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Tipo 
          de Ingresso</font></strong></div></td>
      <td colspan="4"> <select name="tipo_ingresso" id="tipo_ingresso">
          <option value="<? echo $reg["tipo_ingresso"]; ?>"><? echo $reg["tipo_ingresso"]; ?></option>
          <option value="vestibular">Vestibular</option>
          <option value="transferido">Transferido</option>
          <option value="especial">Especial</option>
          <option value="reingresso">Reingresso</option>
          <option value="ouvinte">Ouvinte</option>
        </select></td>
    </tr>
    <tr> 
      <td><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Ano 
          Vestibular</font></strong></div></td>
      <td colspan="5"><input name="vestibular_ano" type="text" id="vestibular_ano" value="<? echo $reg["vestibular_ano"]; ?>" size="8" maxlength="4"></td>
    </tr>
    <tr> 
      <td><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Notas</font></strong></div></td>
      <td colspan="5"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        CG: 
        <input name="nota_cg" type="text" id="cep_local3" value="<? echo $reg["nota_cg"]; ?>" size="8" maxlength="6">
        / CE: 
        <input name="nota_ce" type="text" id="cep_local4" value="<? echo $reg["nota_ce"]; ?>" size="8" maxlength="6">
        / LP: 
        <input name="nota_lp" type="text" id="cep_local5" value="<? echo $reg["nota_lp"]; ?>" size="8" maxlength="6">
        </font></strong></td>
    </tr>
    <tr> 
      <td><div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Classifica&ccedil;&atilde;o</strong></font></div></td>
      <td colspan="5"><input name="classificacao" type="text" id="cep_local6" value="<? echo $reg["classificacao"]; ?>" size="5" maxlength="3"></td>
    </tr>
    <tr> 
      <td><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Transferido</font></strong></div></td>
      <td colspan="5"><input name="transferido_origem" type="text" id="cep_local7" value="<? echo $reg["transferido_origem"]; ?>" size="70" maxlength="70"></td>
    </tr>
    <tr> 
      <td><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Reingresso</font></strong></div></td>
      <td colspan="5"><input name="reingresso_origem" type="text" id="transferido_origem" value="<? echo $reg["reingresso_origem"]; ?>" size="70" maxlength="70"></td>
    </tr>
    <tr> 
      <td valign="top"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Observa&ccedil;&atilde;o</font></strong></div></td>
      <td colspan="5"><textarea name="observacao" cols="70" rows="5" id="observacao"><? echo $reg["observacao"]; ?></textarea></td>
    </tr>
<? } ?>	
    <tr bgcolor="#6699FF"> 
      <td colspan="5"> <div align="center"><strong><font color="#FFFFFF" size="3" face="Verdana, Arial, Helvetica, sans-serif">ESCOLARIDADE</font></strong></div></td>
    </tr>
<?
$sql_e="select * from aluno_escolaridade where ra = '$ra'";
$reg_query_e=mysql_query($sql_e,$conexao);

while($reg_e=mysql_fetch_array($reg_query_e)){ ?>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Ensino 
          M&eacute;dio</font></strong></div></td>
      <td colspan="4"><input name="em" type="text" id="em" size="70" value="<? echo $reg_e["ens_med"]; ?>"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Ano 
          Conclusao </font></strong></div></td>
      <td colspan="4"><input name="ano_conclusao" type="text" id="ano_conclusao" size="70" value="<? echo $reg_e["ano_conclusao"]; ?>"></td>
    </tr>
    <? } ;?>
    <tr bgcolor="#6699FF"> 
      <td colspan="5"> <div align="center"><strong><font color="#FFFFFF" size="3" face="Verdana, Arial, Helvetica, sans-serif">INFORMA&Ccedil;&Otilde;ES 
          ADICIONAIS </font></strong></div></td>
    </tr>
    <?
$sql_ia="select * from aluno_info_ad where ra = '$ra'";
$reg_query_ia=mysql_query($sql_ia,$conexao);

while($reg_ia=mysql_fetch_array($reg_query_ia)){ 
?>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Habilita&ccedil;&atilde;o</strong></font></td>
      <td colspan="5"><input name="habilitacao" type="text" id="habilitacao" value="<? echo $reg_e["habilitacao"]; ?>" size="70" maxlength="70"></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>ENADE</strong></font></td>
      <td colspan="5"><input name="enade" type="text" id="enade" value="<? echo $reg_e["enade"]; ?>" size="50" maxlength="40"></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>TCC</strong></font></td>
      <td colspan="5"><textarea name="tcc" cols="70" rows="3" id="tcc"><? echo $reg_e["tcc"]; ?></textarea></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Conclus&atilde;o</strong></font></td>
      <td colspan="5"><input name="conclusao" type="text" id="expedicao3" value="<? echo $reg_e["data_conclusao"]; ?>" size="20" maxlength="10"></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cola&ccedil;&atilde;o</strong></font></td>
      <td colspan="5"><input name="colacao" type="text" id="colacao" value="<? echo $reg_e["data_colacao"]; ?>" size="20" maxlength="10"></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Expedi&ccedil;&atilde;o 
        Diploma</strong></font></td>
      <td colspan="5"><input name="expedicao" type="text" id="expedicao" value="<? echo $reg_e["data_exp_diploma"]; ?>" size="20" maxlength="10"></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Obseva&ccedil;&otilde;es</strong></font></td>
      <td colspan="5"><textarea name="observacao_ad" cols="70" rows="5" id="observacao_ad"><? echo $reg_e["obs"]; ?></textarea></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Grupo 
          Sangu&iacute;neo </font></strong></div></td>
      <td colspan="4"><input name="gs" type="text" id="gs" size="70" value="<? echo $reg_ia["grupo_sangue"]; ?>"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Alergias</font></strong></div></td>
      <td colspan="4"><input name="alergia" type="text" id="alergia" size="70" value="<? echo $reg_ia["alergias"]; ?>"></td>
    </tr>
    <tr> 
      <td width="130" valign="top"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Situa&ccedil;&otilde;es 
          especiais que requerem aten&ccedil;&atilde;o. Ex.: diabetes, epilepsia, 
          etc. </font></strong></div></td>
      <td colspan="4"><textarea name="sit_especiais" cols="65" rows="5" id="sit_especiais"><? echo $reg_ia["situacoes"]; ?></textarea></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Medica&ccedil;&atilde;o</font></strong></div></td>
      <td colspan="4"><input name="medicacao" type="text" id="medicacao" size="70" value="<? echo $reg_ia["medicacao"]; ?>"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Freq&uuml;&ecirc;ncia 
          da Medica&ccedil;&atilde;o</font></strong></div></td>
      <td colspan="4"><input name="freq_med" type="text" id="freq_med" size="70" value="<? echo $reg_ia["freq_med"]; ?>"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Emerg&ecirc;ncia 
          avisar </font></strong></div></td>
      <td colspan="4"><input name="emergencia" type="text" id="emergencia" size="70" value="<? echo $reg_ia["emergencia"]; ?>"></td>
    </tr>
    <? } ?>
    <tr> 
      <td colspan="5"> <div align="left"> 
          <input type="submit" value="Atualizar Agora">
        </div></td>
    </tr>
  </table>  
</form>

<?
// fecha conexao com o mysql
mysql_close($conexao);
?>

</body>
</html>
