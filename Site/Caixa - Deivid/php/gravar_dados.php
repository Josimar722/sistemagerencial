<?php
// Variaveis
$id                 = $_POST["id"];
$tipo_movimento     = $_POST["tipo_movimento"];
$data               = $_POST["data"];
$categoria          = $_POST["categoria"];
$tipo               = $_POST["tipo"];
$quantidade         = (int) $_POST["quantidade"];
$forma_pagamento    = $_POST["forma_pagamento"];
$tipo_cartao        = $_POST["tipo_cartao"];
$valor              = (float)$_POST["valor"];
$documento_novo    	   = $_FILES["documento_novo"]["name"];

if ($tipo_movimento == "R")$valor_receita = $valor; elseif ($tipo_movimento <> "R") $valor_receita = 0;

if ($tipo_movimento == "D") $valor_despesa = $valor; elseif ($tipo_movimento <> "D") $valor_despesa = 0;

if ($forma_pagamento == "Dinheiro") $valor_dinheiro = $valor_receita; elseif ($forma_pagamento <> "Dinheiro") $valor_dinheiro = 0;

if ($forma_pagamento == "Cartao") $valor_cartao = $valor_receita; elseif ($forma_pagamento <> "Cartao") $valor_cartao = 0;

$valor_debito = 0;
$valor_credito = 0;
if ($tipo_cartao == "Debito") $valor_debito = $valor_cartao; elseif ($tipo_cartao == "Credito") $valor_credito = $valor_cartao;

// conectar com o banco
include "conexao.php";



// Comando para alteração no banco
$sql = "UPDATE movimento SET 
                  tipo_movimento='$tipo_movimento',
                  data='$data',
                  categoria='$categoria',
                  tipo='$tipo',
                  quantidade='$quantidade',
                  forma_pagamento='$forma_pagamento',
                  tipo_cartao='$tipo_cartao',
                  valor_receita='$valor_receita',
                  valor_despesa='$valor_despesa',
                  valor_dinheiro='$valor_dinheiro',
                  valor_cartao='$valor_cartao',
                  valor_debito='$valor_debito',
                  valor_credito='$valor_credito'";
if($documento_novo<>"")
    $sql = $sql . ", documento='$documentoNovo' ";

$sql = $sql . "WHERE id='$id'";
    // ver se arquivo chegou...
if($documento_novo<>"") {
    // chegou - transferir a foto que chegou...
    $nomeTemporario = $_FILES["documento_novo"]["tmp_name"];

    $destino="../documento/$documento_novo";

    if (move_uploaded_file($nomeTemporario,
        $destino))
        echo "Arquivo $destino recebido com sucesso!";
    else
        die("Erro no recebimento do arquivo do 
			  documento:" . $_FILES["documento_novo"]["error"]);
}

mysqli_query($conexao, $sql) or
die("Erro na alteração de dados:" .
    mysqli_error($conexao));

echo "<script>window.location='listagem.php';alert('Movimento $id alterados com sucesso! Estaremos retornando click em ok para continuar');</script>";
?>