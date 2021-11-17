<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'escape';
    try {
    	return mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    } catch (Exception $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Erro ao conectar ao banco de dados!');
    }
}

function login ($email, $senha) {
	$pdo = pdo_connect_mysql();
	$query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
	$result = mysqli_query($pdo, $query);
	$row = mysqli_fetch_array($result);
	if ($row) {
		$_SESSION['email'] = $row['email'];
		$_SESSION['id_usuario'] = $row['id_usuario'];
		return true;
	} else {
		return false;
	}
}
function is_logged_in() {
	if (isset($_SESSION['usuario'])) {
		return true;
	} else {
		return false;
	}
}

function cadastro ($nome, $email, $senha) {
	$pdo = pdo_connect_mysql();
	$query = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
	$result = mysqli_query($pdo, $query);
	if ($result) {
		return true;
	} else {
		return false;
	}
}

function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>$title</h1>
            <a href="index.php"><i class="fas fa-home"></i>Home</a>
    		<a href="read.php"><i class="fas fa-address-book"></i>Contacts</a>
    	</div>
    </nav>
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
