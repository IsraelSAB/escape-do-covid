<?php

if (isset($_POST['funcao'])) {
	echo "teste1";
	include 'functions.php';
	echo "teste2";
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	if ($_POST['funcao'] == "login"){
		if (login($email, md5($senha))) {
			$_SESSION['email'] = $email;
			header('Location: index.php');
		} else {
			$error = 'Email ou senha incorretos';
		}
		echo $error;
		exit;
	}
	else if ($_POST['funcao'] == "cadastro"){
		echo ("teste3");
		$nome = $_POST['nome'];
		if (cadastro($nome, $email, md5($senha))) {
			$_SESSION['email'] = $email;
			header('Location: index.php');
		} else {
			$error = 'Email já cadastrado';
		}
		echo $error;
		exit;
	}	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Escape Covid</title>
	<link rel="stylesheet" type="text/css" href="styleLogin.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="POST">
					<label for="chk" aria-hidden="true">Criar Conta</label>
					<input type="text" name="nome" placeholder="Nome" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="senha" placeholder="Senha" required="">
					<input type="hidden" name="funcao" value="cadastro">
					<button>Criar</button>
				</form>
			</div>

			<div class="login">
				<form method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="senha" placeholder="Senha" required="">
					<input type="hidden" name="funcao" value="login">
					<button>Entrar</button>
				</form>
			</div>
	</div>
</body>
</html>