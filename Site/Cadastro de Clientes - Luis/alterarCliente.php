<?php
session_start();
?>
<html> 
	<head><link rel="icon"
			  href="Studio Barber/tesoura.png"
			  type="Studio Barber/tesoura.png">
		<title>Cadastro de Clientes</title>
	</head>
	
	<body>
		<h2>Cadastro de Clientes - Alteracao</h2>
		
		
		<?php	
		if (! isset($_GET["c"]) )
		die("Chamada incorreta da rotina.");
		$codigo = $_GET["c"];
		
		$codigo=(int) $_GET["c"];
			
			if($codigo<1)
				die("Código do Cliente informado incorretamente!");
	
	include "conexao.php";
	
	$comando = "SELECT * FROM clientes WHERE codigo=$codigo";
		
	$registros = mysqli_query($conexao,$comando) or
		die("Falha na seleção de dados:" .
			mysqli_error($conexao) );
			
	$linhas = mysqli_num_rows($registros) or
		die("Falha na recuperacao dos registros:" . mysqli_error($conexao) );
		
		if ( $linhas  == 0) die ("Registro $codigo não foi encontrado. Será que foi eliminado?");
		
		$dados = mysqli_fetch_array($registros) or die ("Erro no acesso dos dados!");
		
		$codigo=$dados["codigo"];
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
		$documento			 = $dados["documento"];
		
		?>
		
		
		<fieldset>
		<legend><h2>Cadastro de Clientes</h2></legend>
		
		
		<form 	action="gravarDados.php" 
				enctype="multipart/form-data"
				method="post"
				>
				
							 <input type="hidden" 
							   name="codigo"
							   size="11"
							   value="<?php echo $codigo; ?>"
							  >
							  
			
			
			CPF: 		<input type="text" 
							   name="cpf"
							   maxlength="11" 
					           size="11"
							   value="<?php echo $cpf; ?>"
							   placeholder="Digite o CPF">
						 
						 
			<br>
			<br>

			Nome: <input type="text" 
						 name="nome"
						 maxlength="50" 
						 size="63"
						 value="<?php echo $nome; ?>"
						 placeholder="Digite o nome do cliente">
			   
			<br>
			<br>
			Data de nascimento: <input type="date" 
							   name="dataNascimento"
							   value="<?php echo $dataNascimento; ?>"
							   size="10">
			
			Sexo: 		
			<input type="radio" name="sexo" value="M"<?php if ($sexo == 'M')echo 'checked';?>>Masculino
		    <input type="radio" name="sexo" value="F"<?php if ($sexo == 'F')echo 'checked';?>>Feminino
			
			<br>
			<br>
			
			End.: 		<input type="text" 
							   name="endereco"
							   maxlength="50" 
					           size="50"
							   value="<?php echo $endereco; ?>"
							   placeholder="Digite o endereço">
			
			N: 		<input type="text" 
							   name="numero"
							   maxlength="6" 
					           size="5"
							   value="<?php echo $numero; ?>"
							   placeholder="00000">
							   
			<br>
			<br>
			
			Bairro: 		<input type="text" 
							   name="bairro"
							   maxlength="30" 
					           size="35"
							   value="<?php echo $bairro; ?>"
							   placeholder="Digite o Bairro">

			CEP: 		<input type="text" 
							   name="cep"
							   maxlength="8" 
					           size="17"
							   value="<?php echo $cep; ?>"
							   placeholder="Digite o CEP">

			<br>
			<br>			
			
			E-mail: 	<input type="email" 
							   name="email"
							   maxlength="50" 
					           size="62"
							   value="<?php echo $email; ?>"
							   placeholder="email@dominio.com.br">
							   
			<br>
			<br>
			Tel.: 		<input type="celular" 
							   name="telefone"
							   maxlength="10" 
					           size="15"
							   value="<?php echo $telefone; ?>"
							   placeholder="11 2222-3333">
							   
			Cel.: 		<input type="celular" 
							   name="celular"
							   maxlength="11" 
					           size="15"
							   value="<?php echo $celular; ?>"
							   placeholder="11 9.8888-7777">
			<br>
			<br>	
			
			Cliente cadastrado em: 	<input type="date" 
							   name="cadastrado"
							   size="10"
							   value="<?php echo $cadastrado;?>"
							   disabled>
							   
		    
			<br>
			<br>
				
										
				Observacoes:<br>
				<textarea 	name="obs"
							maxlength="200"
							rows="10" 
							cols="72"
							placeholder="Digite uma observacao sobre o cliente."><?php echo $obs;?></textarea>
				<br>
				
				Documento: 
			<input 	type="file" 
					name="documentoNovo">
			<br>
			Documento Armazenado: <?php echo $documento;?>
				
			</fieldset> 
			
						<hr>

			
			<input type="submit" value="Enviar">
			
										
			</form>

			<a href='listagemCliente.php'> <button>Voltar</button> </a>
			
	</body>
</html>