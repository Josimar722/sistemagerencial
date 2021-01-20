<?php
session_start();
?>
<html> 
	<head><link rel="icon"
			  href="Studio Barber/tesoura.png"
			  type="Studio Barber/tesoura.png">
		<title>Cadastro de Clientes</title>
		<link href="../Caixa - Deivid/css/estilo.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>

	<div id="geral_home">

	<div class="topo_home">
	<p>Paula Rodrigues Studio Barber</p>
	</div><!-- fim do topo home-->
	<div class="menu">
		<ul>
			<li><a href="../Agendamentos%20-%20Adriano/agendamentos.html">Agendamentos</a></li>
			<li><a href="../Cadastro%20de%20Clientes%20-%20Luis/cadCliente.php" class="active">Clientes</a></li>
			<li><a href="../Caixa%20-%20Deivid/caixa.php">Caixa</a></li>
            <li><a href="../Funcionarios%20-%20Eduardo/cadFunc.html">Funcion&#x000E1;rios</a></li>
            <li><a href="../Cadastro%20de%20produtos%20-%20Alex/produto.html">Produtos</a></li>
            <li><a href="../Cadastro%20de%20Servicos%20-%20Josimar/cadServ.html">Servi&#x000E7;os</a></li>
		</ul>
	</div><!-- Fim do menu-->
	
	<fieldset>
		<legend><h2>Cadastro de Clientes</h2></legend>
		
		
		<form 	action="inserirCadCliente.php" 
				enctype="multipart/form-data"
				method="post">
				
						
		
			CPF: 		<input type="text" 
							   name="cpf"
							   maxlength="11" 
					           size="11" 
							   placeholder="Digite o CPF">
						 
						 
			<br>
			<br>

			Nome: <input type="text" 
						 name="nome"
						 maxlength="50" 
						 size="63" 
						 placeholder="Digite o nome do cliente">
			   
			<br>
			<br>
			Data de nascimento: <input type="date" 
							   name="dataNascimento"
							   size="10">
			
			Sexo: 		<input type="radio" 
						 name="sexo" 
						 value="M" 
						 checked>Masculino
				  
						<input type="radio" 
						 name="sexo" 
						 value="F">Feminino
			
			<br>
			<br>
			
			End.: 		<input type="text" 
							   name="endereco"
							   maxlength="50" 
					           size="50" 
							   placeholder="Digite o endere&#x000E7;o">
			
			N&#x000B0;: 		<input type="text" 
							   name="numero"
							   maxlength="6" 
					           size="5" 
							   placeholder="00000">
							   
			<br>
			<br>
			
			Bairro: 		<input type="text" 
							   name="bairro"
							   maxlength="30" 
					           size="35" 
							   placeholder="Digite o Bairro">

			CEP: 		<input type="text" 
							   name="cep"
							   maxlength="8" 
					           size="17" 
							   placeholder="Digite o CEP">

			<br>
			<br>			
			
			E-mail: 	<input type="email" 
							   name="email"
							   maxlength="50" 
					           size="62" 
							   placeholder="email@dominio.com.br">
							   
			<br>
			<br>
			Tel.: 		<input type="celular" 
							   name="telefone"
							   maxlength="10" 
					           size="15" 
							   placeholder="11 2222-3333">
							   
			Cel.: 		<input type="celular" 
							   name="celular"
							   maxlength="11" 
					           size="15" 
							   placeholder="11 9.8888-7777">
			<br>
			<br>	
			
			Cliente cadastrado em: <?php echo date('d/m/y');?>	
			
			<input 	type="hidden"
					name="cadastrado"							   
					value="<?php echo date('Y-m-d') ?>">

		    
			<br>
			<br>
				
										
				Observa&#x000E7;&#x000F5;es:<br>
				<textarea 	name="obs"
							maxlength="200"
							rows="10" 
							cols="72"
						placeholder="Digite uma observa&#x000E7;&#x000E3;o sobre o cliente."></textarea>
				
				<br> <br>
				
				Documento: 
			<input 	type="file" 
					name="documento">
				
				<br> <br>
				
			</fieldset>  
			
			
			<hr>

			
			<input type="submit" value="Inserir">
		</form>
		<a href="listagemCliente.php">
		
			<button>Alterar</button>
			<button>Excluir</button>
		</a>
		
			
			
			
		
	</div><!-- fim do geral home-->
	</body>

			
</html>
