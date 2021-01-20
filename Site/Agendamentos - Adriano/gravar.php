<?php
// Variaveis
 $codAgendamento       = $_POST["codAgendamento"];
 
 $nomeCliente          = $_POST["nomeCliente"];
 
 $nomeServico          = $_POST["nomeServico"];
 $dataAgendamento      = $_POST["dataAgendamento"];
 $horaAgendamento      = $_POST["horaAgendamento"];
 $obs                  = $_POST["obs"];
 $documentoNovo    	   = $_FILES["documentoNovo"]["name"];
// conectar com o banco
include "conexao.php";



// Comando para alteração no banco
$sql = "UPDATE agendamentos SET 
                  codAgendamento='$codAgendamento',
                 
                  nomeCliente='$nomeCliente',
                 
                  nomeServico='$nomeServico',
                  dataAgendamento='$dataAgendamento',
                  horaAgendamento='$horaAgendamento',
				  obs='$obs'";
				  
if($documentoNovo<>"")		
		$sql = $sql . ", documento='$documentoNovo' ";

$sql = $sql . "WHERE codAgendamento='$codAgendamento'";

// conectar com o banco
include "conexao.php";

if($documentoNovo<>"")
	{
		// chegou - transferir a foto que chegou
		$nomeTemporario=$_FILES["documentoNovo"]["tmp_name"];
		
		$destino="documento/$documentoNovo" ;
		
		if( move_uploaded_file ($nomeTemporario,
							$destino) )
			echo "Arquivo $destino recebido com sucesso!";
		else
			die("Erro no recebimento do arquivo do 
			  documento:" . $_FILES["documentoNovo"]["error"] );
	}

mysqli_query($conexao, $sql) or
die("Erro na altera&#x000E7;&#x000E3;o de dados:" .
    mysqli_error($conexao));

echo "Dados do agendamento codigo <b>$codAgendamento</b> alterados com sucesso!";
?>
<hr>
Clique <a href="listagemagendamentos.php">aqui</a> para continuar.