<html> 
	<head>
		<title>Agendamentos - Altera&#x000E7;&#x000E3;o</title>
	</head>
	<body>	
		<h2>Agendamentos - Altera&#x000E7;&#x000E3;o</h2>
		<?php
			if (! isset($_GET["c"]))
				die("Chamada incorreta da rotina.");
			
			$codAgendamento = $_GET["c"];
			
			include "conexao.php";
			
			$comando = 
			  "SELECT * FROM agendamentos WHERE codAgendamento=$codAgendamento";
			
			$registro=mysqli_query($conexao, $comando)
			  or die("Erro na sele&#x000E7;&#x000E3;o de agendamento:" .
			    mysqli_error($conexao)) ;
			
			$linhas = mysqli_num_rows($registro) 
			or die("Erro na localiza&#x000E7;&#x000E3;o de registros: " .
			    mysqli_error($conexao)) ;
			
			if ($linhas==0)
			  die ("Registro $codAgendamento n&#x000E3;o encontrado.
		             Será que foi eliminado?");
					 
			$dados = mysqli_fetch_array($registro)
			  or die ("Erro no acesso dos dados!");
			 
		$codAgendamento 	 = $dados["codAgendamento"] ;
		$codigoCliente 		 = $dados["codigoCliente"] ;
		$nomeCliente   		 = $dados["nomeCliente"] ;
		$codigoServico 		 = $dados["codigoServico"] ;
		$nomeServico 		 = $dados["nomeServico"] ;
		$dataAgendamento	 = $dados["dataAgendamento"] ;
		$horaAgendamento	 = $dados["horaAgendamento"] ;
		$obs  				 = $dados["obs"] ;
		$documento			 = $dados["documento"];
			
		?>
		
		<form 	action="gravar.php" 
				enctype="multipart/form-data"
				method="post">
			
			C&#x000F3;digo: <?php echo "$codAgendamento" ?> <br>
			<input type="hidden" name="codAgendamento" 
			value ="<?php echo "$codAgendamento" ?>">
			<br>
			
			Cliente: <input type="text" name="nomeCliente"
					maxlength="30" size="30" 
			   placeholder="Informe o nome do Cliente"
			   value="<?php echo $nomeCliente; ?>">
			<br>
		   
			Servi&#x000F3;o:
			<select name="nomeServico">
				<option value="Corte Feminino" <?php if ($nomeServico =='Corte Feminino') echo 'selected'; ?>>Corte Feminino</option>
				<option value="Corte Masculino" <?php if ($nomeServico =='Corte Masculino') echo 'selected'; ?>>Corte Masculino</option>
				<option value="Corte Infantil" <?php if ($nomeServico =='Corte Infantil') echo 'selected'; ?>>Corte Infantil</option>
				<option value="Escova Tradicional" <?php if ($nomeServico =='Escova Tradicional') echo 'selected'; ?>>Escova Tradicional</option>
				<option value="Escova progressiva" <?php if ($nomeServico =='Escova Progressiva') echo 'selected'; ?>>Escova progressiva</option>
				<option value="Escova Definitiva" <?php if ($nomeServico =='Escova Definitiva') echo 'selected'; ?>>Escova Definitiva</option>
				<option value="Hidratação" <?php if ($nomeServico =='Hidratação') echo 'selected'; ?>>Hidrata&#x000E7;&#x000E3;o</option>
				<option value="Reconstrução" <?php if ($nomeServico =='Reconstrução') echo 'selected'; ?>>Reconstru&#x000E7;&#x000E3;o</option>
				<option value="Apliques" <?php if ($nomeServico =='Apliques') echo 'selected'; ?>>Apliques</option>
				<option value="Manicure" <?php if ($nomeServico =='Manicure') echo 'selected'; ?>>Manicure</option>
				<option value="Pedicure" <?php if ($nomeServico =='Pedicure') echo 'selected'; ?>>Pedicure</option>
				<option value="ManicureEPedicure" <?php if ($nomeServico =='ManicureEPedicure') echo 'selected'; ?>>Manicure e Pedicure</option>
				<option value="Depilação" <?php if ($nomeServico =='Depilação') echo 'selected'; ?>>Depila&#x000E7;&#x000E3;o</option>
				<option value="Maquiagem" <?php if ($nomeServico =='Maquiagem') echo 'selected'; ?>>Maquiagem</option>
				<option value="Coloração" <?php if ($nomeServico =='Coloração') echo 'selected'; ?>>Colora&#x000E7;&#x000E3;o</option>
				<option value="Balayagem" <?php if ($nomeServico =='Balayagem') echo 'selected'; ?>>Balayagem</option>
				<option value="Mechas" <?php if ($nomeServico =='Mechas') echo 'selected'; ?>>Mechas</option>
				<option value="MechasCalifornianas" <?php if ($nomeServico =='MechasCalifornianas') echo 'selected'; ?>>Mechas Californianas</option>
				<option value="Reflexos" <?php if ($nomeServico =='Reflexos') echo 'selected'; ?>>Reflexos</option>
		    </select>
			
			<br>
			Data: 
			<input 	type="date" 
					name="dataAgendamento"
					min="2018-09-12"
					max="2025-12-31"
					value="<?php echo $dataAgendamento;?>">
			<br>
					
			Hor&#x000E7;rio:
			<select name="horaAgendamento">
				<option value="8:00" <?php if ($horaAgendamento =='8:00:00') echo 'selected'; ?>>8:00</option>
				<option value="8:30" <?php if ($horaAgendamento =='8:30:00') echo 'selected'; ?>>8:30</option>
				<option value="9:00" <?php if ($horaAgendamento =='9:00:00') echo 'selected'; ?>>9:00</option>
				<option value="9:30" <?php if ($horaAgendamento =='9:30:00') echo 'selected'; ?>>9:30</option>
				<option value="10:00" <?php if ($horaAgendamento =='10:00:00') echo 'selected'; ?>>10:00</option>
				<option value="10:30" <?php if ($horaAgendamento =='10:30:00') echo 'selected'; ?>>10:30</option>
				<option value="11:00" <?php if ($horaAgendamento =='11:00:00') echo 'selected'; ?>>11:00</option>
				<option value="11:30" <?php if ($horaAgendamento =='11:30:00') echo 'selected'; ?>>11:30</option>
				<option value="12:00" <?php if ($horaAgendamento =='12:00:00') echo 'selected'; ?>>12:00</option>
				<option value="12:30" <?php if ($horaAgendamento =='12:30:00') echo 'selected'; ?>>12:30</option>
				<option value="13:00" <?php if ($horaAgendamento =='13:00:00') echo 'selected'; ?>>13:00</option>
				<option value="13:30" <?php if ($horaAgendamento =='13:30:00') echo 'selected'; ?>>13:30</option>
				<option value="14:00" <?php if ($horaAgendamento =='14:00:00') echo 'selected'; ?>>14:00</option>
				<option value="14:30" <?php if ($horaAgendamento =='14:30:00') echo 'selected'; ?>>14:30</option>
				<option value="15:00" <?php if ($horaAgendamento =='15:00:00') echo 'selected'; ?>>15:00</option>
				<option value="15:30" <?php if ($horaAgendamento =='15:30:00') echo 'selected'; ?>>15:30</option>
				<option value="16:00" <?php if ($horaAgendamento =='16:00:00') echo 'selected'; ?>>16:00</option>
				<option value="16:30" <?php if ($horaAgendamento =='16:30:00') echo 'selected'; ?>>16:30</option>
				<option value="17:00" <?php if ($horaAgendamento =='17:00:00') echo 'selected'; ?>>17:00</option>
				<option value="17:30" <?php if ($horaAgendamento =='17:30:00') echo 'selected'; ?>>17:30</option>
				<option value="18:00" <?php if ($horaAgendamento =='18:00:00') echo 'selected'; ?>>18:00</option>
				<option value="18:30" <?php if ($horaAgendamento =='18:30:00') echo 'selected'; ?>>18:30</option>
				<option value="19:00" <?php if ($horaAgendamento =='19:00:00') echo 'selected'; ?>>19:00</option>
			</select>
			<br> <br>
					
								
			Observa&#x000E7;&#x000F5;es:<br>
				<textarea 	name="obs" 
							rows="3" 
							cols="80"
						placeholder="Observa&#x000E7;&#x000F5;es"><?php echo $obs;?></textarea>
				<br>
			 
			
			<br>	
			
			Documento: 
			<input 	type="file" 
					name="documentoNovo">
			<br>
			[Documento Armazenado: <?php echo $documento;?>]
			
			<hr>

			
			<input type="submit" value="Enviar">
		</form>
	</body>
</html>