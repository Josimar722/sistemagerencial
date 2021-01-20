<?php
session_start();
include "php/conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head><link rel="icon"
			  href="Studio Barber/tesoura.png"
			  type="Studio Barber/tesoura.png">
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css" />
    <link href="css/caixa.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="geral_home">
    <div id="topo_home">
	<p>Paula Rodrigues Studio Barber</p>
    </div><!-- fim do topo home-->
    <div class="menu">
        <ul>
            <li><a href="../Agendamentos%20-%20Adriano/agendamentos.html">Agendamentos</a></li>
            <li><a href="../Cadastro%20de%20Clientes%20-%20Luis/cadCliente.php">Clientes</a></li>
            <li><a href="../Caixa%20-%20Deivid/caixa.php" class="active">Caixa</a></li>
            <li><a href="../Funcionarios%20-%20Eduardo/cadFunc.html">Funcion&#x000E1;rios</a></li>
            <li><a href="../Cadastro%20de%20produtos%20-%20Alex/produto.html">Produtos</a></li>
            <li><a href="../Cadastro%20de%20Servicos%20-%20Josimar/cadServ.html">Servi&#x000E7;os</a></li>
        </ul>
    </div><!-- Fim do menu-->
    <div class="botoes">
        <button type="button"><a href="movimento.php">[+] Movimento</a></button>
        <button type="button"><a href="php/listagem.php">Registros</a></button>
    </div><!-- fim do botoes-->
    <div class="listagem">
        <?php
        $comando="SELECT * FROM movimento ORDER BY id";
        $rs = mysqli_query($conexao , $comando) or die("Falha na seleção de dados:" . mysqli_error($conexao) );
        $linhas = mysqli_num_rows($rs) or die("Não há registros no banco...<hr>" . mysqli_error($conexao) );?>
        <legend>Número de registros existentes no banco de dados até o momento: <?php echo "<b>$linhas</b>" ?></legend><br>
    </div><!-- fim da listagem-->
    <div class="relatorio_mes">
        <fieldset>
            <legend><b>Resumo de Entrada e Saídas...</b></legend>
            <?php       // Comando para somar total de entradas...(linha1)
                $sql="SELECT SUM(valor_receita) as somaEn FROM movimento;";
                $query = mysqli_query($conexao, $sql);
                $linha1 = mysqli_fetch_array($query, MYSQLI_ASSOC);
                     // Comando para somar total  de saídas...(linha2)
                $sql="SELECT SUM(valor_despesa) as somaSai FROM movimento;";
                $query = mysqli_query($conexao, $sql);
                $linha2 = mysqli_fetch_array($query, MYSQLI_ASSOC);
                    // comando para somar despesas + despesa...(linha3)
                $sql="SELECT SUM(valor_receita+valor_despesa) as soma3 FROM movimento;";
                $query = mysqli_query($conexao, $sql);
                $linha3 = mysqli_fetch_array($query, MYSQLI_ASSOC);?><!-- Comandos calculos no banco de dados-->
            <label>Total de Entradas:</label><input class="bts_fieldset" type="text" name="total_Entrada" value="<?php echo $linha1['somaEn']?>" disabled><br><br>
                <label>Total de Saídas:</label><input class="bts_fieldset" type="text" name="total_Saida" value="<?php echo $linha2['somaSai']?>" disabled><br><br>
                    <label>Resultado Total:</label><input class="bts_fieldset" type="text" name="valor_Total" value="<?php echo $linha3['soma3']?>" disabled>
        </fieldset><br>
        <fieldset>
            <legend>Resumo Dinheiro e Cartao</legend>
            <?php       // Comando para somar total valores em dinheiro...(linha4)
            $sql="SELECT SUM(valor_dinheiro) as somaDin FROM movimento;";
            $query = mysqli_query($conexao, $sql);
            $linha4 = mysqli_fetch_array($query, MYSQLI_ASSOC);
                        // Comando para somar total  de valores em cartao...(linha5)
            $sql="SELECT SUM(valor_cartao) as somaCar FROM movimento;";
            $query = mysqli_query($conexao, $sql);
            $linha5 = mysqli_fetch_array($query, MYSQLI_ASSOC);?>
            <label>Total Dinheiro:</label><input class="bts_fieldset" type="text" name="valor_dinheiro" value="<?php echo $linha4['somaDin'] ?>"><br><br>
            <label>Total Cartão:</label><input class="bts_fieldset" type="text" name="valor_cartao" value="<?php echo $linha5['somaCar'] ?>"><br><br>
            <fieldset>
                <legend>Resumo sobre Cartão...</legend>
                <?php   // Comando para somar total de valores debito...(linha6)
                $sql="SELECT SUM(valor_debito) as somaDeb FROM movimento;";
                $query = mysqli_query($conexao, $sql);
                $linha6 = mysqli_fetch_array($query, MYSQLI_ASSOC);
                        // Comando para somar total de valores credito...(linha7)
                $sql="SELECT SUM(valor_credito) as somaCre FROM movimento;";
                $query = mysqli_query($conexao, $sql);
                $linha7 = mysqli_fetch_array($query, MYSQLI_ASSOC);?>

                <label>Total Debito</label><input class="bts_fieldset" type="text" name="valor_debito" value="<?php echo $linha6['somaDeb'] ?>"><br><br>
                <label>Total Credito</label><input class="bts_fieldset" type="text" name="valor_credito" value="<?php echo $linha7['somaCre'] ?>">
            </fieldset>
        </fieldset>
    </div><!-- fim do relatorio do mes -->
</div><!-- fim do geral home-->
</body>
</html>