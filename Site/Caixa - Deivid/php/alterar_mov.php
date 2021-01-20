<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head><link rel="icon"
			  href="Studio Barber/tesoura.png"
			  type="Studio Barber/tesoura.png">
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../css/estilo.css" rel="stylesheet" type="text/css" />
    <link href="../css/movimento.css" rel="stylesheet" type="text/css" />
    <link href="../css/caixa.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php
if( ! isset($_GET["c"]))
    die("Chamada incorreta da rotina.");

$id = $_GET["c"];

include "conexao.php";

$comando =	"SELECT * FROM movimento WHERE id=$id";

$registro=mysqli_query($conexao, $comando)
or die("Erro na seleção do movimento." .
    mysqli_error($conexao));

$linhas = mysqli_num_rows($registro)
or die("Erro na localização de registros:" .
    mysqli_error($conexao));

if ($linhas == 0)
    die("Registro $codigo não encontrado. 
						Será que foi eliminado?");

$dados = mysqli_fetch_array($registro)
or die("Erro no acesso dos dados!");

$id                 = $dados["id"];
$tipo_movimento     = $dados["tipo_movimento"];
$data               = $dados["data"];
$categoria          = $dados["categoria"];
$tipo               = $dados["tipo"];
$quantidade         = $dados["quantidade"];
$forma_pagamento    = $dados["forma_pagamento"];
$tipo_cartao    = $dados["tipo_cartao"];
$valor_receita      = $dados["valor_receita"];
$valor_despesa      = $dados["valor_despesa"];
$documento			 = $dados["documento"];

?>

<div id="geral_home">
    <div class="topo_home">
    </div><!-- fim do topo home-->

    <div class="menu">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Agendamentos</a></li>
            <li><a href="caixa.php" class="active">Caixa</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Funcionarios</a></li>
            <li><a href="#">Produtos</a></li>
            <li><a href="#">Serviços</a></li>
        </ul>
    </div><!-- Fim do menu-->

    <div class="botoes">
        <button type="button"><a href="../caixa.php">Retornar</a></button>
    </div><!-- fim do botao voltar-->

    <div class="form_movimento">
        <form action="gravar_dados.php"enctype="multipart/form-data"method="post">

            <input 	type="hidden" name="id" value="<?php echo $id; ?>"><br><!-- id oculto para retiralo do mysql-->

            Tipo do Movimento:
            <select name="tipo_movimento" class="bts_select">
                <option value="R"<?php if ($tipo_movimento =='R') echo 'selected'; ?>>Receita</option>
                <option value="D"<?php if ($tipo_movimento =='D') echo 'selected'; ?>>Despesa</option>
            </select><br><br>

            Data:<input  class="bts_input" type="date" name="data"max="2030-12-31" value="<?php echo $data;?>"><br><br>

            Categoria:
            <select name="categoria" class="bts_select">
                <option value="Conta"<?php if ($categoria =='Conta') echo 'selected'; ?>>Conta</option>
                <option value="Servicos"<?php if ($categoria =='Servicos') echo 'selected'; ?>>Serviço</option>
                <option value="Produtos"<?php if ($categoria =='Produtos') echo 'selected'; ?>>Produto</option>
            </select><br><br>

            Tipo :<input class="bts_input" type="text" name="tipo" value="<?php echo $tipo;?>"><br><br>

            Quantidade:<input class="bts_input_1" type="number" name="quantidade" value="<?php echo $quantidade;?>"><br><br>

            Forma de Pagamento:
            <select name="forma_pagamento" class="bts_select">
                <option value="Dinheiro"<?php if ($forma_pagamento =='Dinheiro') echo 'selected'; ?>>Dinheiro</option>
                <option value="Cartao"<?php if ($forma_pagamento =='Cartao') echo 'selected'; ?>>Cartão</option>
            </select><br><br>

            Tipo do Cartão:
            <select name="tipo_cartao" class="bts_select">
                <option value="">Selecione</option>
                <option value="Debito"<?php if ($tipo_cartao == 'Debito') echo 'selected'; ?>>Debito</option>
                <option value="Credito"<?php if ($tipo_cartao == 'Credito') echo 'selected'; ?>>Crédito</option>
            </select><br><br>

            Valor:
            <input class="b2" placeholder="R$" disabled> <input class="b" type="text" name="valor"
               value="<?php if ($tipo_movimento =="R")echo $valor_receita; else if($tipo_movimento =="D")echo $valor_despesa;?>"><br><br>

            Comprovante:<input type="file" name="documento_novo">
            <br>
            [Documento Armazenado: <?php echo $documento;?>]
            <hr>
            <input type="submit" value="Alterar Dados">
        </form>
    </div><!-- fim do formulario movimento-->

</div><!-- fim do geral home-->
</body>
</html>