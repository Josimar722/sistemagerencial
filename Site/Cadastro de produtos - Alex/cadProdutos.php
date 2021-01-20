<?php

	$nome		    = $_POST["nome"];
	$fabricante	    = $_POST["fabricante"];
	$unidade        =  $_POST["Unidade"] ;
	$preco     	= (float)$_POST["Preco"];
	$Custo			= (float)$_POST["Custo"];
	$quantidade		= (int)$_POST["quantidade"];
	$estoque		= (int)$_POST["estoque"];
	$Localizacao		= $_POST["Localizacao"];
	$Codigo		= (int) $_POST["Codigo"];
	$Descricao		=  $_POST["Descricao"];
	
	$documento		= $_FILES["documento"]["name"];
	$tamanho		= $_FILES["documento"]["size"];
	$tipoArquivo	= $_FILES["documento"]["type"];
	$nomeTemporario	= $_FILES["documento"]["tmp_name"];
	
	$nome="nome";
	if ( isset($_POST["nome"])  )
		$nome =  $_POST["nome"];
    
	$fabricante="fabricante";
	if ( isset($_POST["fabricante"])  )
		$fabricante =  $_POST["fabricante"];
	
	$Unidade="Unidade";
	if ( isset($_POST["Unidade"])  )
		$Unidade =  $_POST["Unidade"];
	
	$Preco="Preco";
	if ( isset($_POST["Preco"])  )
		$Preco =  $_POST["Preco"];
	
	$Custo="Custo";
	if ( isset($_POST["Custo"])  )
		$Custo =  $_POST["Custo"];
	
	$quantidade="quantidade";
	if ( isset($_POST["quantidade"])  )
		$quantidade =  $_POST["quantidade"];
	
	$estoque="estoque";
	if ( isset($_POST["estoque"])  )
		$estoque =  $_POST["estoque"];
	
	$Localizacao="Localizacao";
	if ( isset($_POST["Localizacao"])  )
		$Localizacao =  $_POST["Localizacao"];

	$Codigo="Codigo";
	if ( isset($_POST["Codigo"])  )
		$Codigo =  $_POST["Codigo"];
	
	$Descricao="Descricao";
	if ( isset($_POST["Descricao"])  )
		$Descricao =  $_POST["Descricao"];
	
	
	
		
	if ( strlen($nome) <2 )
		die("Informe nome do produto com o minimo 2 caracteres.");
	
	if ( strlen($fabricante) <2 )
		die("Informe nome do fabricante com o minimo 2 caracteres.");
	
	if ( strlen($preco) <2 )
		die("Informe o preço");
	
	if ( strlen($Custo) <2 )
		die("Informe custo.");
	

	
	echo "<h2>Dados Recebidos</h2>";
	echo "nome: $nome<br>";
	echo "fabricante:$fabricante <br>";
	echo "unidade:$Unidade<br>";
	echo "Pre&#x000E7;o: $Preco<br>";
	echo "Quantidade: $quantidade<br>";
	echo "Estoque minimo: $estoque<br>";
	echo "Localiza&#x000E7;&#x000E3;o: $Localizacao<br>";
	echo "Codigo:$Codigo<br>";
	echo "Descri&#x000E7;&#x000E3;o: $Descricao<br>";
	
	echo "Documento: $documento<br>";
	echo "Tamanho: $tamanho<br>";
	echo "TipoArquivo: $tipoArquivo<br>";
	echo "NomeTemporario: $nomeTemporario<br>";

	// transferir o documento que chegou
	if($documento<>"")
	{
		// chegou - transferir a foto que chegou
		$nomeTemporario=$_FILES["documento"]["tmp_name"];
		
		$destino="documento/$documento" ;
		
		if( move_uploaded_file ($nomeTemporario,
							$destino) )
			echo "Arquivo $destino recebido com sucesso!";
		else
			die("Erro no recebimento do arquivo do 
			  documento:" . $_FILES["documento"]["error"] );
	}
	echo "<hr>";
		
	echo "<hr>";
	echo "1-Conectando no MYSQL (localhost)...<br>";
	
	$con = mysqli_connect(	"localhost" , 
							"root", 
							"" );
							
	echo "2-Abrindo o banco ....<br>";
	
	mysqli_select_db( $con , "salaoDeBeleza") or 
		die("Erro na seleç&#x000E3;o do banco:" .
				mysqli_error($con) );
				
	echo "OK - Banco aberto. <br>"	;
	
	$sql = "INSERT INTO produtos 
	(	nome,fabricante,Unidade,Preco,	
		Custo,quantidade, 
		estoque, Localizacao,Codigo,Descricao,documento
		)
	VALUES (
		'$nome',
		'$fabricante','$unidade','$preco', '$Custo','$quantidade',
		'$estoque','$Localizacao','$Codigo','$Descricao','$documento')";
		//die ($sql);
	echo "<hr>";
	echo "Gravando informa&#x000E7;&#x000F5;es no banco de dados.<br>";
	
	mysqli_query($con, $sql) 
		or die("Erro ao cadastrar produtos:" .
			mysqli_error($con) );
		
	echo "Cadastro do produto <b>$nome</b> finalizado!";

?>
Clique <a href="listagem.php">aqui para continuar.</a> 