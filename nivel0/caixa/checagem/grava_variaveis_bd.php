<?php
session_start();

include("../../../include/arruma_link.php");
include("func_data.php");
require_once($pontos."conexao.php");

// SESSIONS
$usuario = $_SESSION["sessao_login"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];


// VARI�VEIS
$txt_cod_prod = $_POST["txt_cod_prod"];
$txt_pet = $_POST["txt_pet"];
$txt_qtde = $_POST["txt_qtde"];
$sel_medida = $_POST["sel_medida"];
$txt_valor = $_POST["txt_valor"];
$txt_especie = $_POST["txt_especie"];
$txt_obs_caixa = $_POST["txt_obs_caixa"];
$data_atual = Convert_Data_Port_Ingl($entrada);

// PEGA O NOME DO PRODUTO

$sql_cp = mysql_query("SELECT * FROM `tab_produto` WHERE codigo='$txt_cod_prod'") or die("Erro ao selecionar   -  PRODUTO  sql_cp");

if ($linha_cp = mysql_fetch_array($sql_cp)){

$txt_produto = $linha_cp['produto'];
$txt_produto = $linha_cp['produto'];
}
// FINAL DA INSTRU��O



$sql = mysql_query("SELECT * FROM `tab_temp_caixa` WHERE usuario='$usuario'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha = mysql_fetch_array($sql)){

//  *******************  ATUALIZA AS VARI�VEIS NO BD TEMP *****************************************

$sql1 = mysql_query("UPDATE `tab_temp_caixa` SET  cod_produto='$txt_cod_prod', produto='$txt_produto', pet='$txt_pet', qtde='$txt_qtde', medida='$sel_medida', valor='$txt_valor', especie='$txt_especie', obs='$txt_obs_caixa', data ='$data_atual' WHERE usuario='$usuario'") or die (mysql_error());

//  -------------------------------------------------------------------------------------------

}else{
//  *******************  INSERE AS VARI�VEIS NO BD TEMP *****************************************

$sql2 = mysql_query("INSERT INTO `tab_temp_caixa` (`codigo`, `cod_produto`, `produto`, `pet`, `qtde`, `medida`,`valor`, `especie`, `obs`, `usuario`, `data`) VALUES (NULL, '$txt_cod_prod', '$txt_produto', '$txt_pet', '$txt_qtde', '$sel_medida', '$txt_valor', '$txt_especie', '$txt_obs_caixa', '$usuario','$data_atual')") or die (mysql_error());

//  -------------------------------------------------------------------------------------------

}


header("Location: ../entrada_caixa.php");

?>
