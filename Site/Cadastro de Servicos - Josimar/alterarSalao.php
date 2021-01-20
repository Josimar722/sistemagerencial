<html> 
	<head>
	<link rel="icon"
			  href="Studio Barber/tesoura.png"
			  type="Studio Barber/tesoura.png">
		<meta charset="ANSI">
		<meta name="viewport">
		<title>Cadastro de Sal&#x000E3;o - Altera&#x000E7;&#x000E3;o</title>
	</head>
	<body>	
		<?php
			if(!isset($_GET["c"]))
				die("Rotina executada de forma incorreta!.");
			
			$codigo=(int) $_GET["c"];
			
			if($codigo<1)
				die("Código do Servico informado incorretamente!.");
			
			include "conexao.php";
				
		
			$comandoSQL = "SELECT * FROM servicos WHERE codigo=$codigo";
			
			
			$registro = mysqli_query($conexao , $comandoSQL) or
				die("Erro na recuperação do regitro 
				do pet: " . mysqli_error($conexao));
				
			
			$linhas = mysqli_num_rows($registro);
			if($linhas<1)
				die("O código $codigo não encontrado. Sera que foi excluído?");
			
			
			$dados = mysqli_fetch_array($registro) or
				die("Erro na criação de matriz de 
				dados: " . mysqli_error($conexao)); 
				
				
		$codigo      = $dados["codigo"];
		$NomeServico = $dados["NomeServico"] ;
		$Pago        = $dados["Pago"] ;
		$NomeCliente = $dados["NomeCliente"] ;
		$ValorServico  = $dados["ValorServico"] ;
		$ConcluiuServico  = $dados["ConcluiuServico"] ;
		$DatadaVisita  = $dados["DatadaVisita"] ;
		$Atendidopor  = $dados["AtendidoPor"] ;
		$total  = $dados["Total"] ;
		$obs  = $dados["Obs"] ;
		$Nomefuncionario  = $dados["Nomefuncionario"] ;
		$tipo  = $dados["Tipo"] ;
			
		?>	
		<h2>Cadastro de Servi&#x000E7;os Sal&#x000E3;o - Altera&#x000E7;&#x000E3;o</h2>
		<form 	action="gravarDadosSalao.php" 
				enctype="multipart/form-data"
				method="post">
				
				<input 	type="hidden"
					name="codigo"
					value="<?php echo $codigo;?>">
					
			Nome do Servi&#x000E7;o: <input type="text" name="NomeServico"
					maxlength="30" size="30" value="<?php echo $NomeServico;?>"
			   placeholder="Informe o Servi&#x000E7;o">
			<br>
			<input type="radio" name="Pago" value="Sim" checked>Pago
		    <input type="radio" name="Pago" value="Não">Pagar
			<br><br>
			
			Atendido Por: <input type="text" name="Atendidopor"
					maxlength="30" size="30" value="<?php echo $Atendidopor;?>"
			   placeholder="Informe o Funcion&#x000E1;rio">
			<br><br>
			
			  
			Tipo:
			<select name="tipo">
				<option value="">Escolha</option>
				<option value="B"<?php if ($tipo == 'B')echo 'checked';?>>Barba</option>
				<option value="C"<?php if ($tipo == 'C')echo 'checked';?>>Corte Masculino</option>
				<option value="C">Corte Feminino</option>
				<option value="D"<?php if ($tipo == 'D')echo 'checked';?>>Dia da Noiva</option>
				<option value="M"<?php if ($tipo == 'M')echo 'checked';?>>Maquiagem</option>
				<option value="M">Manicure</option>
				<option value="P"<?php if ($tipo == 'P')echo 'checked';?>>Pedicure</option>
				<option value="O"<?php if ($tipo == 'O')echo 'checked';?>>Outros</option>
				
				
		    </select>
			
			<br><br>
			Total de Servi&#x000E7;o: 
			<input 	type="text" 
					name="total"
					value="<?php echo $total;?>"
					maxlength="99999999" 
					size="1"
					min="1"
					max="99999999"> 
					
		    <br><br>
			Nome do Cliente: <input type="text" name="NomeCliente"
					maxlength="30" size="30" value="<?php echo $NomeCliente;?>"
			   placeholder="Informe o nome do cliente">
			<br><br>
			<fieldset>
				<legend>Descri&#x000E7;&#x000E3;o do Servi&#x000E7;o</legend>
				Concluiu o Servi&#x000E7;o: 
			<input 	type="date" 
					name="ConcluiuServico"
					value="<?php echo $ConcluiuServico;?>"
					min="2000-09-12"
					max="2025-12-31"> <br><br>

				Valor R$:  
				<input 	type="number" 
					name="ValorServico" 
					min="0,00" 
					max="999,999" 
					value="<?php echo $ValorServico;?>"
					placeholder="999,999"
					step="0.001"> <br><br>
					
				<input 	type="checkbox" 
						name="Sim" 
						value="1">
				Este cliente est&#x000E1; devendo?
				<br><br>
				
				
				Observa&#x000E7;&#x000F5;es:<br>
				<textarea 	name="obs" 
							rows="3" 
							cols="80"
						placeholder="Hist&#x000F3;rico Cliente"><?php echo $obs;?></textarea>
				<br>
			</fieldset> 
			
			<br>	
			Data da Visita: 
			<input 	type="date"
					value="<?php echo $DatadaVisita;?>"
					name="DatadaVisita"
					min="2000-09-12"
					max="2025-12-31">
			<br><br>
			
		
			
			Nome do Funcion&#x000E1;rio: <input type="text" name="NomeFuncionario"
		  maxlength="30" size="30" 
		  value="<?php echo $Nomefuncionario;?>"
		 placeholder="Nome do Funcionario"> <br><br>
		 <hr>
			<input type="submit" value="Enviar"> <br>
		</form>
		
	</body>
</html>