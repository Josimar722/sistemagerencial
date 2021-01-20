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
    <link href="css/estilo.css" rel="stylesheet" type="text/css" />
    <link href="css/movimento.css" rel="stylesheet" type="text/css" />
    <link href="css/caixa.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="geral_home">
    <div id="topo_home">
		<p>Paula Rodrigues Studio Barber</p>
    </div><!-- fim do topo home-->

    <div class="botoes">
        <button type="button"><a href="caixa.php">Retornar</a></button>
    </div><!-- fim do botao voltar-->

    <div class="form_movimento">
        <form action="php/caixa_dados.php" enctype="multipart/form-data"method="post">

            Tipo do Movimento:
            <select name="tipo_movimento" class="bts_select">
                <option value="" selected>Selecione</option>
                <option value="R">Receita</option>
                <option value="D">Despesa</option>
            </select><br><br>

            Data:<input  class="bts_input" type="date" name="data"><br><br>

            Categoria:
            <select name="categoria" class="bts_select">
                <option value="" selected>Selecione</option>
                <option value="Conta">Conta</option>
                <option value="Servicos">Serviço</option>
                <option value="Produtos">Produto</option>
            </select><br><br>

            Tipo :<input class="bts_input" type="text" name="tipo" placeholder="Exemplos: luz, corte, gel..."><br><br>

            Quantidade:<input class="bts_input_1" type="number" name="quantidade" min="1"><br><br>

            Forma de Pagamento:
            <select name="forma_pagamento" class="bts_select">
                <option value="" selected>Selecione</option>
                <option value="Dinheiro">Dinheiro</option>
                <option value="Cartao">Cartão</option>
            </select><br><br>

            Tipo do Cartão:
            <select name="tipo_cartao" class="bts_select">
                <option value="" selected>Selecione</option>
                <option value="Debito">Debito</option>
                <option value="Credito">Crédito</option>
            </select><br><br>

            Valor:<input class="bts_input_0" placeholder="R$" disabled> <input class="bts_input" type="text" name="valor"><br><br>

            Comprovante:<input type="file" name="documento">
            <hr>
            <input type="submit" value="Enviar">
        </form>
        <p><b>Observação</b> o comprovante só será nescessario em casos de despesas, quando se tratar de alguma conta...</p>
    </div><!-- fim do formulario movimento-->

</div><!-- fim do geral home-->
</body>
</html>