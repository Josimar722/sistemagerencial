<html> 
	<head><link rel="icon"
			  href="Studio Barber/tesoura.png"
			  type="Studio Barber/tesoura.png">
		<title>Cadastro de Funcion&#x000E1;rios - Altera&#x000E7;&#x000E3;o</title>
	</head>
	<body>
		<h2>Cadastro de Funcion&#x000E1;rios - Altera&#x000E7;&#x000E3;o</h2>
		<?php			
			if(!isset($_GET["c"]))
				die("Rotina executada de forma incorreta!.");
			
			$codigo=(int) $_GET["c"];
			if($codigo<1)
				die("Código do Funcion&#x000E1;rio informado incorretamente!.");
			
			include "conect.php";
				
			$comandoSQL = "SELECT * FROM funcionarios WHERE codigo=$codigo";
			
			$registro = mysqli_query($conect , $comandoSQL) or
				die("Erro na recupera&#x000E7;&#x000E3;o do regitro 
				do funcion&#x000E1;rio: " . mysqli_error($conect));
				
			$linhas = mysqli_num_rows($registro);
			if($linhas<1)
				die("O código $codigo do funcion&#x000E1;rio n&#x000E3;o encontrado. Foi excluido?");
			

			$dados = mysqli_fetch_array($registro) or
				die("Erro na cria&#x000E7;&#x000E3;o de matriz de dados: " . mysqli_error($conect)); 
				
	$codigo          			= $dados ["codigo"];
	$nome           		    = $dados ["nome"];
	$sobrenome      		    = $dados ["sobrenome"];
	$dataNascimento  			= $dados ["dataNascimento"];
	$sexo            			= $dados ["sexo"];
	$rg              			= $dados ["rg"];
	$cpf             			= $dados ["cpf"];
	$estadoCivil     			= $dados ["estadoCivil"];
	$endereco        			= $dados ["endereco"];
	$bairro          			= $dados ["bairro"];
	$cidade          			= $dados ["cidade"];
	$estado          			= $dados ["estado"];
	$cep             			= $dados ["cep"];
	$telefone        			= $dados ["telefone"];
	$celular         			= $dados ["celular"];
	$email           			= $dados ["email"];
	$cargo           			= $dados ["cargo"];		
	$dataAdmissao      			= $dados ["dataAdmissao"];
	$instrucao                  = $dados ["instrucao"];
	$obs         				= $dados ["obs"];
	$documento					= $dados["documento"];
						
		?>
		<form 	action="gravarDadosFunc.php" enctype="multipart/form-data" method="post">
		
			<hr><h3>Identifica&#x000E7;&#x000E3;o</h3></hr>
		<hr>                      </hr>  
		<input 	type="hidden" name="codigo" value="<?php echo $codigo;?>">
		NOME: <input type="text" name="nome" maxlength="15" size="30" placeholder="Informe o nome do funcion&#x000E1;rio" value="<?php echo $nome;?>">  
		SOBRENOME: <input type="text" name="sobrenome" maxlength="25" size="50" placeholder="Informe o sobrenome do funcion&#x000E1;rio" value="<?php echo $sobrenome;?>"><br> 
		DATA DE NASCIMENTO: <input type="date" name="dataNascimento" min="1958-01-01" max="2000-12-31" value="<?php echo $dataNascimento;?>"> 
		SEXO: <select name="sexo"> 
			<option value="">Escolha</option> 
			<option value="M" <?php if($sexo=="M") echo 'selected';?>>Masculino</option> 
			<option value="F" <?php if($sexo=="F") echo 'selected';?>>Feminino</option> 
			</select>   
		
		<hr><h3>Dados Pessoais</h3></hr>
		<hr>                       </hr>
		RG: <input type="text" name="rg" maxlength="12" size="12" placeholder="00.000.000-0" value='<?php echo $rg;?>'>  
		CPF: <input type="text" name="cpf" maxlength="14" size="15" placeholder="000.000.000-00" value='<?php echo $cpf;?>'> 
		ESTADO CIVIL: <select name="estadoCivil"> 
		<option value="">Escolha</option> 
		<option value="C" <?php if($estadoCivil=="C") echo 'selected';?>>Casado</option> 
		<option value="S" <?php if($estadoCivil=="S") echo 'selected';?>>Solteiro</option> 
		<option value="V" <?php if($estadoCivil=="V") echo 'selected';?>>Viúvo</option>
		</select> 
		ENDERE&#x000C7;O: <input type="text" name="endereco" maxlength="25" size="50" placeholder="Informe o endere&#x000E7;o do funcion&#x000E1;rio" value="<?php echo $endereco;?>"> <br><br> 
		BAIRRO: <input type="text" name="bairro" maxlength="25" size="20" placeholder="Bairro" value="<?php echo $bairro;?>">
		CIDADE: <select name="cidade"> 
		<option value="">Escolha</option> 
		<option value="SP" <?php if($cidade=="SP") echo 'selected';?>>S&#x000E3;o Paulo</option> 
		<option value="SZ" <?php if($cidade=="SZ") echo 'selected';?>>Suzano</option> 
		<option value="PO" <?php if($cidade=="PO") echo 'selected';?>>Po&#x000E1;</option> 
		<option value="MGC" <?php if($cidade=="MGC") echo 'selected';?>>Mogi das Cruzes</option> 
		<option value="IT" <?php if($cidade=="IT") echo 'selected';?>>Itaquaquecetuba</option> 
		<option value="FV" <?php if($cidade=="FV") echo 'selected';?>>Ferraz de Vasconcelos</option>
		</select> 
		ESTADO: <input type="text" name="estado" maxlength="10" size="20" placeholder="Estado" value="<?php echo $estado;?>"> <br><br>
		CEP: <input type="text" name="cep" maxlength="9" size="15" placeholder="00000-000" value="<?php echo $cep;?>">
		TELEFONE: <input type="text" name="telefone" maxlength="13" size="15" placeholder="(00)0000-0000" value="<?php echo $telefone;?>">
		CELULAR: <input type="text" name="celular" maxlength="14" size="15" placeholder="(00)00000-0000" value="<?php echo $celular;?>">
		EMAIL: <input type="text" name="email" maxlength="35" size="42" placeholder="email@email.com" value="<?php echo $email;?>">
		
		<hr><h3>Dados Colaborador</h3></hr>
		<hr>                          </hr>
		DATA DE ADMISS&#x000C3;O: <input type="date" name="dataAdmissao" min="2008-01-01" max="2090-12-31" value="<?php echo $dataAdmissao;?>">
		CARGO: <input type="text" name="cargo" maxlength="35" size="50" placeholder="Informe o cargo" value="<?php echo $cargo;?>"> <br><br>
		NIVEL DE INSTRU&#x000C7;&#x000C3;O: <input 	type="radio" name="instrucao" value="G1" <?php if($instrucao=='G1') echo 'checked';?>> 1&#x000B0;Grau
							<input 	type="radio" name="instrucao" value="G2" <?php if($instrucao=='G2') echo 'checked';?>> 2&#x000B0;Grau
							<input 	type="radio" name="instrucao" value="G3" <?php if($instrucao=='G3') echo 'checked';?>> 3&#x000B0;Grau
							<input 	type="radio" name="instrucao" value="MT" <?php if($instrucao=='MT') echo 'checked';?>> M&#x000E9;dio/T&#x000E9;cnico
							<input 	type="radio" name="instrucao" value="SUP" <?php if($instrucao=='SUP') echo 'checked';?>> Superior <br> <br>
		Observa&#x000E7;&#x000F5;es:<br> <textarea 	name="obs" rows="3" cols="80" placeholder="Observa&#x000E7;&#x000F5;es do Funcion&#x000E1;rio"><?php echo $obs;?></textarea><br>
		<hr></hr>
		
		Documento: 
			<input 	type="file" 
					name="documentoNovo">
			<br>
			[Documento Armazenado: <?php echo $documento;?>]
		
			<input type="submit" value="Alterar Dados">
		</form>
	</body>
</html>
