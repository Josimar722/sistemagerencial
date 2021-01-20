<?php
//Entrada das Variaveis:
$tipo_movimento     = $_POST["tipo_movimento"];
$data               = $_POST["data"];
$categoria          = $_POST["categoria"];
$tipo               = $_POST["tipo"];
$quantidade         = (int) $_POST["quantidade"];
$forma_pagamento    = $_POST["forma_pagamento"];
$tipo_cartao        = $_POST["tipo_cartao"];
$valor              = (float) $_POST["valor"];
// validar documento
$documento		= $_FILES["documento"]["name"];
$tamanho		= $_FILES["documento"]["size"];
$tipoArquivo	= $_FILES["documento"]["type"];
$nomeTemporario	= $_FILES["documento"]["tmp_name"];
//Validando os campos de entrada...
if (($tipo_movimento <> "R") and ($tipo_movimento <> "D")) die ("Informar o Tipo do Movimento...");
if ($data =="") die ("Data deve ser informada.");
if ($categoria == "") die ("Categoria deve ser informado.");
if ($tipo == "") die ("Tipo de <b>$categoria</b> deve ser informado.");
if ($quantidade == 0) die ("Quantidade deve ser informado.");
if ($forma_pagamento == "") die ("Forma de Pagamento deve ser informado.");
if (($forma_pagamento == "Cartao") and ($tipo_cartao == "")) die ("Tipo do Cartão deve ser informado.");
if ($valor == 0) die ("Valor deve ser informando.");
// Validar documento
if (($categoria == "Conta") and ($documento == "")) die ("Informe o comprovante da conta, para proseguir...");
// Separando valores receita de despesas...
if ($tipo_movimento == "R") $valor_receita = $valor; else $valor_receita=0;
if ($tipo_movimento == "D") $valor_despesa = $valor; else $valor_despesa=0;
// Separando dinheiro de cartao...
$valor_cartao = 0;
$valor_dinheiro = 0;
if ($forma_pagamento == "Dinheiro") $valor_dinheiro = $valor; elseif ($forma_pagamento == "Cartao") $valor_cartao = $valor;
// Separando Debito e Credito...
$valor_debito = 0;
$valor_credito = 0;
if ($tipo_cartao == "Debito") $valor_debito = $valor_cartao; elseif ($tipo_cartao == "Credito") $valor_credito = $valor_cartao;
// Exibindo dados fornecidos...
echo "<h2>Dados Recebidos</h2>";
echo "Tipo do Movimento: $tipo_movimento<br>";
echo "Data: $data <br>";
echo "Categoria: $categoria<br>";
echo "Tipo: $tipo<br>";
echo "Quantidade: $quantidade<br>";
echo "Forma de Pagamento: $forma_pagamento<br>";
echo "Tipo do Cartão: $tipo_cartao<br>";
echo "Valor: $valor<br>";
echo "Documento: $documento<br>";
echo "Tamanho: $tamanho<br>";
echo "Tipo arquivo: $tipoArquivo<br>";
echo "Nome temporario: $nomeTemporario<br>";
echo "<hr>";
// transferir o documento que chegou
if($documento<>"") {
    // chegou - transferir a foto que chegou
    $nomeTemporario=$_FILES["documento"]["tmp_name"];
    $destino="../documento/$documento" ; if( move_uploaded_file ($nomeTemporario, $destino) )
echo "Arquivo $destino recebido com sucesso!"; else die("Erro no recebimento do arquivo do documento:" . $_FILES["documento"]["error"] );}
//Conectando no MYSQL
include "conexao.php";
// inserindo dados para para a tabela movimento no mysql
$sql = "INSERT INTO movimento 
(tipo_movimento,    data, categoria, tipo, quantidade, forma_pagamento, tipo_cartao, valor_receita, valor_despesa, valor_dinheiro, valor_cartao,   valor_debito,  valor_credito,   documento)
VALUES 
('$tipo_movimento','$data','$categoria', '$tipo', '$quantidade', '$forma_pagamento', '$tipo_cartao', '$valor_receita', '$valor_despesa', '$valor_dinheiro','$valor_cartao','$valor_debito', '$valor_credito', '$documento')";
mysqli_query($conexao, $sql)
or die("Erro na inclusão do movimento: " .
    mysqli_error($conexao) );
echo "Movimento finalizado com sucesso!<br><br>";
// Redirecionando a Pagina de Volta...
?>
<h2>Clique <a href='../caixa.php'>aqui </a> para continuar.</h2>