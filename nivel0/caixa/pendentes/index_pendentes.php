<?php
session_start();

include("../../../include/arruma_link.php");
require($pontos."barra.php");
include($pontos."conexao.php");
include($pontos."include/func_data.php");
//include("checagem/check_finaliza_caixa.php");


$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$checa_retorno = $_SESSION["checa_retorno"];

if ($nivel ==1){$nivel_conv="Usu�rio";}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}

// APAGA OS DADOS DAS VARI�VEIS

$_SESSION["rad_sel_visl"] ="";
$_SESSION["rad_animal_clie"] ="";
$_SESSION["checa_retorno"] ="";
$_SESSION["rad_clie"] ="";
$_SESSION["retorno"] ="";



$select = 5;
?>
<html>
<head>
<title>PetLivre - Sistema para Gerenciamento de Petshop  </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="<?=$pontos;?>js/func_caixa.js"></script>
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
</head>
<body>
  <table width="740" height="420" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td height="102" colspan="2" valign="top"><? include($pontos."include/titulo_cima.php"); ?></td>
    </tr>
    <tr>
      <td width="150" height="280" valign="top"><? include ($pontos."include/menu.php"); ?></td>
      <td width="589"  valign="top"><?php  include($pontos."include/menu_caixa.php"); ?>
	  <? include("lista_pendentes.php"); ?></td>
    </tr>
    <tr>
    <td height="20" colspan="2" valign="top"><div align="center">
      <? include ($pontos."include/rodape.php"); ?>
    </div></td>
    </tr>
</table>
</body>
</html>
