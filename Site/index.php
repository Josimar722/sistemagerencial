<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head><link rel="icon"
			  href="Studio Barber/tesoura.png"
			  type="Studio Barber/tesoura.png">
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="Caixa%20-%20Deivid/css/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="geral_home">

    <div class="caixa_login">
        <form method="POST" action="Login/valida_login.php">

            <h1>Área Restrita</h1>

            <label>Email:</label><input class="input_email" type="text" name="email" placeholder="Email" required autofocus><br>

            <label>Senha:</label><input class="input_senha" type="password" name="senha" placeholder="Senha" required autofocus><hr>

            <button type="submit" class="bt_acesso">Acessar</button>

        </form>
        <p>
            <?php
            if(isset($_SESSION['loginErro'])){
                echo $_SESSION['loginErro'];
                unset($_SESSION['loginErro']);
            }
            ?>
        </p>
		<h2> Obs.: Usuario: admin - Senha: admin</h2>
        <p>Somente para pessoas autorizadas, com email e senha cadastrados pelo desenvolvedor.</p>
    </div><!-- fim da caixa de login -->

</div><!-- fim do geral home-->
</body>
</html>