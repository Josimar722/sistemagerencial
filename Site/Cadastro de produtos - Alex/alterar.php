<html> 
	<head><link rel="icon"
			  href="Studio Barber/tesoura.png"
			  type="Studio Barber/tesoura.png">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		<title>Cadastro de produtos - Alteração</title>
	</head>
<body>	
		<h2>Cadastro de produtos - Alteração</h2>
	<?php
			if (! isset($_GET["c"]))
				die("Chamada incorreta da rotina.");
			
			$codigo = $_GET["c"];
			
			include "conexao.php";
			
			$comando = 
			  "SELECT * FROM produtos";
			
			$registro=mysqli_query($conexao, $comando)
			  or die("Erro na  seleção de dados do Salao:" .
			    mysqli_error($conexao)) ;
			
			$linhas = mysqli_num_rows($registro) 
			or die("Erro na localização de registros: " .
			    mysqli_error($conexao)) ;
			
			if ($linhas==0)
			  die ("Registro $NomeServico não encontrado.
		             será que foi eliminado?");
					 
			$dados = mysqli_fetch_array($registro)
			  or die ("Erro no acesso dos dados!");
			  
			  
			  $Id                 = $dados["Id"];
			  $nome               = $dados["nome"];
			  $Fabricante         = $dados["Fabricante"];
			  $Unidade 		      = $dados["Unidade"];
			  $Preco              = $dados["Preco"];
              $Custo              = $dados["Custo"];
			  $estoque            = $dados["estoque"];
              $quantidade         = $dados["quantidade"];
              $Localizacao        = $dados["Localizacao"];
			  $Codigo             = $dados["Codigo"];
			  $Descricao   	  	  = $dados["Descricao"];
			  $documento		 = $dados["documento"];
		?>

			<h1>Cadastro de produtos</h1>  
			<form 	action="dados_produtos.php" 
				enctype="multipart/form-data"
				method="post">
				
				
		<input type="hidden" name="Id" value="<?php echo $Id ; ?>"><br><br>
		 
		 Nome do produto<input type="text" name="nome" maxlength="30" size="30" placeholder="Digite o nome da marca do produto"value="<?php echo $nome; ?>">
		<bR> <bR> 
		 
		 Fabricante <input type="text" name="Fabricante" maxlength="30" size="30" placeholder="Digite o nome do fabricante"value="<?php echo $Fabricante; ?>">
		<bR> <bR> 	
		 Unidade de medida <input type="number" name="Unidade" maxlength="30" size="30" placeholder="Digite o nome do fabricante"value="<?php echo $Unidade; ?>">
		<bR> <bR> 
		 Preço <input type="number" name="Preco" maxlength="30" size="30" placeholder="Ex 3,33"value="<?php echo $Preco; ?>">
		<bR> <bR> 
		 Custo <input type="text" name="Custo" maxlength="30" size="30" placeholder="Ex 9,33"value="<?php echo $Custo; ?>">
		<bR> <bR> 
		 
		 Quantidades de estoque <input type="number" id="quantidade" name="quantidade" placeholder="Ex: 50"value="<?php echo $quantidade; ?>">
		
		<bR> <bR> 
	   	 Estoque minimo <input type="number" id="estoque" name="estoque" placeholder="Ex: 20"value="<?php echo $estoque; ?>">
		 
		<bR> <bR> 
		 Localizacao <input type="text" name="Localizacao" maxlength="30" size="30" placeholder="Digite a localização do produto"value="<?php echo $Localizacao; ?>">
		<bR> <bR> 
		 
		 Codigo de barra <input type="number" name="Codigo" maxlength="30" size="30" placeholder="Digite o codigo de barra"value="<?php echo $Codigo; ?>">
		  
		<bR> <bR> 
		
		Descrição <br> <textarea name="Descricao" rows="10" cols="80" placeholder=""><?php echo $Descricao; ?></textarea>
			<bR> <bR> 
		 </fieldset>
		 Documento: 
			<input 	type="file" 
					name="documentoNovo">
			<br>
			Documento Armazenado: <?php echo $documento;?>
		 
		 <hr>
  		 <input type="submit" value="Alterar Dados">
	  </form>
	
		
		
</body>
</html>
		
	