<html>
<head>
<title> </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
//abre conexão com o banco
include "conexao.php";

$sql="select distinct docente from doc_disc where docente is not null";
$reg_query=mysql_query($sql,$conexao);
?>
<body>
<form action="inclui_aluno_exe.php" method="post" enctype="multipart/form-data">
  <table width="100%" border="0">
    <tr> 
      <td colspan="6"><div align="center"><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cadastrar 
          Novo Aluno</strong></font></div></td>
    </tr>
    <tr bgcolor="#6699FF"> 
      <td colspan="4"> <div align="center"><strong><font color="#FFFFFF" size="3" face="Verdana, Arial, Helvetica, sans-serif">IDENTIFICA&Ccedil;&Atilde;O</font></strong></div></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">RA</font></strong></div></td>
      <td width="72"><input name="ra" type="text" id="ra" size="12" maxlength="8"> 
        <input name="senha" type="hidden" id="senha22" value="12345" size="8"></td>
      <td width="92"><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Semestre</font></strong></div></td>
      <td colspan="3"><select name="semestre" id="select2">
          <option value="1" selected>1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome</font></strong></div></td>
      <td colspan="5"><input name="nome" type="text" size="70"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Filia&ccedil;&atilde;o</font></strong></div></td>
      <td colspan="5"><textarea name="filiacao" cols="65" rows="3" id="filiacao"></textarea></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Estado 
          civil </font></strong></div></td>
      <td colspan="5"><select name="estado_civil" id="select4">
          <option value="solteiro/a">Solteiro(a)</option>
          <option value="casado/a">Casado(a)</option>
          <option value="divorciado/a">Divorciado(a)</option>
          <option value="desquitado/a">Desquitado(a)</option>
          <option value="viuvo/a">Vi&uacute;vo(a)</option>
        </select></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Data 
          Nascimento </font></strong></div></td>
      <td colspan="5"><input name="data_nasc" type="text" id="data_nasc" size="12" maxlength="10"> 
        <div align="right"><strong></strong></div>
        <div align="right"><strong></strong></div></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Local 
          Nascimento </font></strong></div></td>
      <td colspan="5"><input name="local_nasc" type="text" id="local_nasc2" size="50"> 
        <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">UF</font></strong> 
        <input name="uf_nasc" type="text" id="uf_nasc2" size="8"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">RG</font></strong></div></td>
      <td colspan="5"><input name="rg" type="text" id="rg" size="20" maxlength="20"> 
        <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">CPF</font></strong> 
        <input name="cpf" type="text" id="cpf" size="20" maxlength="20"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Endere&ccedil;o 
          Origem</font></strong></div></td>
      <td colspan="5"><input name="endereco" type="text" id="endereco" size="90"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Cidade 
          Origem</font></strong></div></td>
      <td colspan="5"><input name="cidade" type="text" id="cidade" size="70"> 
      </td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">CEP</font></strong></div></td>
      <td colspan="5"><input name="cep" type="text" id="cep" size="20" maxlength="20"> 
        <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">UF</font></strong> 
        <input name="uf" type="text" id="uf2" size="8"></td>
    </tr>
    <tr> 
      <td> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Telefone 
          Origem </font></strong></div></td>
      <td colspan="5"><input name="fone" type="text" id="fone" size="20" maxlength="20"> 
        <strong></strong></td>
    </tr>
    <tr> 
      <td> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Endere&ccedil;o 
          Local</font></strong></div></td>
      <td colspan="5"><input name="endereco_local" type="text" id="endereco_local" size="90"></td>
    </tr>
    <tr> 
      <td> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Cidade 
          Local </font></strong></div></td>
      <td colspan="5"><input name="cidade_local" type="text" id="cidade_local" size="70"> 
      </td>
    </tr>
    <tr> 
      <td> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">CEP 
          Local </font></strong></div></td>
      <td colspan="5"><input name="cep_local" type="text" id="cep_local" size="20" maxlength="20"> 
        <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">UF</font></strong> 
        <input name="uf_local" type="text" id="uf2" size="8"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">e-mail</font></strong></div></td>
      <td colspan="5"><input name="email" type="text" id="email" size="70"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Telefone 
          Local </font></strong></div></td>
      <td colspan="5"><input name="fone_local" type="text" id="fone_local" size="20" maxlength="20"> 
        <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Telefone 
        Rec. 
        <input name="fone_rec" type="text" id="fone_rec" size="20" maxlength="20">
        <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Telefone 
        Cel. 
        <input name="fone_cel" type="text" id="fone_cel" size="20" maxlength="20">
        </font></strong> </font></strong></td>
    </tr>
    <tr> 
      <td> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Tipo 
          de Ingresso</font></strong></div></td>
      <td colspan="5"> <strong> 
        <select name="tipo_ingresso" id="tipo_ingresso">
          <option value="vestibular">Vestibular</option>
          <option value="transferido">Transferido</option>
          <option value="especial">Especial</option>
          <option value="reingresso">Reingresso</option>
          <option value="ouvinte">Ouvinte</option>
        </select>
        </strong></td>
    </tr>
    <tr> 
      <td><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Ano 
          Vestibular</font></strong></div></td>
      <td colspan="5"><input name="vestibular_ano" type="text" id="vestibular_ano" size="8" maxlength="4"></td>
    </tr>
    <tr> 
      <td><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Notas</font></strong></div></td>
      <td colspan="5"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        CG: 
        <input name="nota_cg" type="text" id="cep_local3" size="8" maxlength="6">
        / CE: 
        <input name="nota_ce" type="text" id="cep_local4" size="8" maxlength="6">
        / LP: 
        <input name="nota_lp" type="text" id="cep_local5" size="8" maxlength="6">
        </font></strong></td>
    </tr>
    <tr> 
      <td><div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Classifica&ccedil;&atilde;o</strong></font></div></td>
      <td colspan="5"><input name="classificacao" type="text" id="cep_local6" size="5" maxlength="3"></td>
    </tr>
    <tr> 
      <td><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Transferido</font></strong></div></td>
      <td colspan="5"><input name="transferido_origem" type="text" id="cep_local7" size="70" maxlength="70"></td>
    </tr>
    <tr> 
      <td><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Reingresso</font></strong></div></td>
      <td colspan="5"><input name="reingresso_origem" type="text" id="transferido_origem" size="70" maxlength="70"></td>
    </tr>
    <tr> 
      <td valign="top"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Observa&ccedil;&atilde;o</font></strong></div></td>
      <td colspan="5"><textarea name="observacao" cols="70" rows="5" id="observacao"></textarea></td>
    </tr>
    <tr bgcolor="#6699FF"> 
      <td colspan="6"> <div align="center"><strong><font color="#FFFFFF" size="3" face="Verdana, Arial, Helvetica, sans-serif">ESCOLARIDADE</font></strong></div></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Ensino 
          M&eacute;dio</font></strong></div></td>
      <td colspan="5"><input name="em" type="text" id="em" size="70"></td>
    </tr>
    <tr> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Ano 
          Conclus&atilde;o </font></strong></div></td>
      <td colspan="5"><input name="ano_conlusao" type="text" id="ano_conlusao" size="8" maxlength="4"></td>
    </tr>
    <tr bgcolor="#6699FF"> 
      <td colspan="6"> <div align="center"><strong><font color="#FFFFFF" size="3" face="Verdana, Arial, Helvetica, sans-serif">INFORMA&Ccedil;&Otilde;ES 
          ADICIONAIS </font></strong></div></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Habilita&ccedil;&atilde;o</strong></font></td>
      <td colspan="5"><input name="habilitacao" type="text" id="habilitacao" size="70" maxlength="70"></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>ENADE</strong></font></td>
      <td colspan="5"><input name="enade" type="text" id="enade" size="50" maxlength="40"></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>TCC</strong></font></td>
      <td colspan="5"><textarea name="tcc" cols="70" rows="3" id="tcc"></textarea></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Conclus&atilde;o</strong></font></td>
      <td colspan="5"><input name="conclusao" type="text" id="expedicao3" size="20" maxlength="10"></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cola&ccedil;&atilde;o</strong></font></td>
      <td colspan="5"><input name="colacao" type="text" id="colacao" size="20" maxlength="10"></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Expedi&ccedil;&atilde;o 
        Diploma</strong></font></td>
      <td colspan="5"><input name="expedicao" type="text" id="expedicao" size="20" maxlength="10"></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Obseva&ccedil;&otilde;es</strong></font></td>
      <td colspan="5"><textarea name="observacao_ad" cols="70" rows="5" id="observacao_ad"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFCC"> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Grupo 
          Sangu&iacute;neo </font></strong></div></td>
      <td colspan="5"> <input name="gs" type="text" id="gs" size="70"></td>
    </tr>
    <tr bgcolor="#FFFFCC"> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Alergias</font></strong></div></td>
      <td colspan="5"> <input name="alergia" type="text" id="alergia" size="70"></td>
    </tr>
    <tr bgcolor="#FFFFCC"> 
      <td width="130" valign="top"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Situa&ccedil;&otilde;es 
          especiais que requerem aten&ccedil;&atilde;o. Ex.: diabetes, epilepsia, 
          etc. </font></strong></div></td>
      <td colspan="5"> <textarea name="sit_especiais" cols="65" rows="5" id="sit_especiais"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFCC"> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Medica&ccedil;&atilde;o</font></strong></div></td>
      <td colspan="5"> <input name="medicacao" type="text" id="medicacao" size="70"></td>
    </tr>
    <tr bgcolor="#FFFFCC"> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Freq&uuml;&ecirc;ncia 
          da Medica&ccedil;&atilde;o</font></strong></div></td>
      <td colspan="5"> <input name="freq_med" type="text" id="freq_med" size="70"></td>
    </tr>
    <tr bgcolor="#FFFFCC"> 
      <td width="130"> <div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Emerg&ecirc;ncia 
          avisar </font></strong></div></td>
      <td colspan="5"> <input name="emergencia" type="text" id="emergencia" size="70"></td>
    </tr>
    <tr> 
      <td colspan="6"> <div align="left"> 
          <input type="submit" value="Cadastrar">
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
