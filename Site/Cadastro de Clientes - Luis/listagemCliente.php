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
    <title>Listagem de Clientes</title>
    <link href="../Caixa%20-%20Deivid/css/estilo.css" rel="stylesheet" type="text/css" />
    <link href="listagem.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="geral_home">
    <div class="topo_home">
    </div><!-- fim do topo home-->
    <div class="botoes">
        <button type="button"><a href="cadCliente.php">Retornar</a></button>
    </div><!-- fim do botoes-->
    <div class="listagem">
        <h1>Listagem</h1>
	<?php	
	
	include "conexao.php";
	
	$comando="SELECT * FROM clientes ORDER BY codigo ";
	
	$rs = mysqli_query($conexao,$comando) or
		die("Falha na seleção de dados:" .
			mysqli_error($conexao) );
			
	//echo "Selecionando dados!<br><br>";
	
	$linhas = mysqli_num_rows($rs) or
		die("<h2>N&#x000E3;o existem registros para serem exibidos.</h2>" . mysqli_error($conexao) ); ?>
	
	<legend>Numero de registros encontrados:<?php echo "<b>$linhas</b>"?></legend><br>
	
	<table div="tabela_titulo" border='1'>
	    <tr class="tr">
	    <th>C&#x000F3;digo</th>
		<th>CPF</th>
		<th>Nome</th>
		<th>Data Nascimento</th>
		<th>Sexo</th>
		<th>Endere&#x000E7;o</th>
		<th>N&#x000FA;mero</th>
		<th>Bairro</th>
		<th>CEP</th>
		<th>E-mail</th>
		<th>Telefone</th>
		<th>Celular</th>
		<th>Cliente cadastrado em</th>
		<th colspan=4>Observa&#x000E7;&#x000F5;es</th>
		<th>Documento</th>
		<th colspan=2>A&#x000E7;&#x000F5;es</th>
	</tr>
	<?php
	$contador=0;
	
	while( $contador < $linhas )
	{ 
		$dados = mysqli_fetch_array($rs); 
		$codigo = $dados["codigo"] ;
		$cpf = $dados["cpf"] ;
		$nome   = $dados["nome"] ;
		$dataNascimento   = $dados["dataNascimento"] ;
		$sexo  = $dados["sexo"] ;
		$endereco   = $dados["endereco"] ;
		$numero   = $dados["numero"] ;
		$bairro   = $dados["bairro"] ;
		$cep   = $dados["cep"] ;
		$email   = $dados["email"] ;
		$telefone   = $dados["telefone"] ;
		$celular   = $dados["celular"] ;
		$cadastrado   = $dados["cadastrado"] ;
		$obs   = $dados["obs"] ;
		$documento		     = $dados["documento"] ;?>
	<tr class="td">
		<td><?php echo $codigo ?></td>
		<td><?php echo $cpf ?></td>
		<td><?php echo $nome ?></td>
		<td><?php echo $dataNascimento ?></td>
		<td><?php echo $sexo ?></td>
	    <td><?php echo $endereco ?></td>
		<td><?php echo $numero ?></td>
		<td><?php echo $bairro ?></td>
	    <td><?php echo $cep ?></td>
		<td><?php echo $email ?></td>
		<td><?php echo $telefone ?></td>
		<td><?php echo $celular ?></td>
	    <td><?php echo $cadastrado ?></td>
	    <td colspan=4><?php echo $obs ?></td>
		<td><?php echo $documento ?></td>
	    <td><?php echo "<a href='excluirCliente.php?c=$codigo'>Excluir </a> ";?></td>
		<td><?php echo "<a href='alterarCliente.php?c=$codigo'>Alterar </a> ";?></td>
	</tr>
	<?php
        $contador++; }?>
    </table>
    </div><!-- fim da listagem-->
</div><!-- fim do geral home-->
</body>
</html>