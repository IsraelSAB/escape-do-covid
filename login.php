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
	<title>Escape do Covid</title>
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
					<input type="text" name="cpf" placeholder="CPF" required="">
					<input type="date" name="datNasc" placeholder="Data Nascimento" required="">
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

	<div class="questionario">
		<input type="checkbox" id="chkQuest" aria-hidden="true">

		<div>
			<p>Realiza práticas esportivas regularmente?</p>
			<input type="radio" name="esporte" id="opt1" value="Sim">
			<label for="opt1">Sim</label>
			<input type="radio" name="esporte" id="opt2" value="Nao">
			<label for="opt2">Não</label>

			<p>Possui alguma comorbidade?</p>
			<input type="radio" name="comorbidade" id="opt1" value="Sim">
			<label for="opt1">Sim</label>
			<input type="radio" name="comorbidade" id="opt2" value="Nao">
			<label for="opt2">Não</label>

			<p>É fumante?</p>
			<input type="radio" name="fumante" id="opt1" value="Sim">
			<label for="opt1">Sim</label>
			<input type="radio" name="fumante" id="opt2" value="Nao">
			<label for="opt2">Não</label>

			<p>Esta acima do peso?</p>
			<input type="radio" name="peso" id="opt1" value="Sim">
			<label for="opt1">Sim</label>
			<input type="radio" name="peso" id="opt2" value="Nao">
			<label for="opt2">Não</label>
		</div>

		<div class = "vacina">
			<br><label for="chkQuest" aria-hidden="true">Vacinação</label>

			<br><br><label>Data da Primeira Dose:</label>
			<input type="date" name="Dose1" required="">
			<br><br><label>Data da Segunda Dose:</label>
			<input type="date" name="dose2" required="">

		</div>

		

	</div>
</body>
</html>