<?php
session_start();
include "conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head><link rel="icon"
			  href="Studio Barber/tesoura.png"
			  type="Studio Barber/tesoura.png">
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../css/estilo.css" rel="stylesheet" type="text/css" />
    <link href="../css/caixa.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="geral_home">
    <div class="topo_home">
    </div><!-- fim do topo home-->

    <div class="botoes">
        <button type="button"><a href="../caixa.php">Retornar</a></button>
    </div><!-- fim do botoes-->
<div class="listagem">
    <h1>Listagem</h1>
    <?php include "conexao.php";  // conectando com o banco

    $comando="SELECT * FROM movimento ORDER BY id";

    $rs = mysqli_query($conexao , $comando) or
    die("Falha na seleção de dados:" .
        mysqli_error($conexao) );

    $linhas = mysqli_num_rows($rs) or
    die("Não há registros no banco...<hr>" . mysqli_error($conexao) );
    ?>
   <legend>Número de registros encontrados até o momento: <?php echo "<b>$linhas</b>" ?></legend><br>

        <table div="tabela_titulo" border="1px">
            <tr class="tr">
                <th>Código</th>
                <th>Tipo de Movimento </th>
                <th>Data</th>
                <th>Categoria</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Forma de Pagamento</th>
                <th>Valor Receita</th>
                <th>Valor Despesa</th>
                <th colspan=2>Ações</th>
            </tr>
            <?php
            $contador=0;

            while( $contador < $linhas )
            {
                $dados = mysqli_fetch_array($rs);		// fetch_array Acessa uma linha do registro coluna por coluna linha por linha.	Array=Matriz

                $id                 = $dados["id"];
                $tipo_movimento     = $dados["tipo_movimento"];
                $data               = $dados["data"];
                $categoria          = $dados["categoria"];
                $tipo               = $dados["tipo"];
                $quantidade         = $dados["quantidade"];
                $forma_pagamento    = $dados["forma_pagamento"];
                $valor_receita      = $dados["valor_receita"];
                $valor_despesa      = $dados["valor_despesa"]; ?>
                <tr class="td">
                    <td><?php echo $id ?></td>
                    <td><?php echo $tipo_movimento ?></td>
                    <td><?php echo $data ?></td>
                    <td><?php echo $categoria ?></td>
                    <td><?php echo $tipo ?></td>
                    <td><?php echo $quantidade ?></td>
                    <td><?php echo $forma_pagamento ?></td>
                    <td><?php echo $valor_receita ?></td>
                    <td><?php echo $valor_despesa ?></td>
                    <td><?php echo"<a href='excluir_mov.php?c=$id'>Excluir</a>";?></td>
                    <td><?php echo"<a href='alterar_mov.php?c=$id'>Alterar</a>";?></td>
                </tr>
                <?php
                $contador++;}?>
        </table>
</div><!-- fim da listagem-->
</div><!-- fim do geral home-->
</body>
</html>