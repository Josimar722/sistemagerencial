<?php 

			  
			  $Id                 = $_POST["Id"];
			  $nome               = $_POST["nome"];
			  $Fabricante         = $_POST["Fabricante"];
			  $Unidade 		      = $_POST["Unidade"];
			  $Preco              = $_POST["Preco"];
              $Custo              = $_POST["Custo"];
			  $estoque            = $_POST["estoque"];
              $quantidade         = $_POST["quantidade"];
              $Localizacao        = $_POST["Localizacao"];
			  $Codigo             = $_POST["Codigo"];
			  $Descricao   	  	  = $_POST["Descricao"];
			  $documentoNovo    	   = $_FILES["documentoNovo"]["name"];
 	
	include "conexao.php";
	
	$sql = "UPDATE produtos SET nome='$nome',
							   Fabricante='$Fabricante',
							   Unidade='$Unidade',
							   Preco='$Preco',
							   Custo='$Custo',
							   estoque='$estoque',
							   quantidade='$quantidade',
							   Localizacao='$Localizacao',
							   Codigo='$Codigo',
							   Descricao='Descricao'";
							   
							   if($documentoNovo<>"")		
		$sql = $sql . ", documento='$documentoNovo' ";
	
	$sql = $sql . "WHERE id='$Id'";
	
				
// conectar com o banco
include "conexao.php";

if($documentoNovo<>"")
	{
		// chegou - transferir a foto que chegou
		$nomeTemporario=$_FILES["documentoNovo"]["tmp_name"];
		
		$destino="documento/$documentoNovo" ;
		
		if( move_uploaded_file ($nomeTemporario,
							$destino) )
			echo "Arquivo $destino recebido com sucesso!<br>";
		else
			die("Erro no recebimento do arquivo do 
			  documento:" . $_FILES["documentoNovo"]["error"] );
	}

mysqli_query($conexao, $sql) or
die("Erro na altera&#x000E7;ão de dados:" .
    mysqli_error($conexao));

echo "<script>window.location='listagem.php';alert('Movimento <b>$id</b> alterados com sucesso! Estaremos retornando click em ok para continuar');</script>";
?>
				
								"
?>