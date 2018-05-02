<?php
require "db.php";


$data = $_POST;

	if(isset($data['submit'])){

	if($data['r_password'] != $data['password']){
		$errors[] = 'Паролі не співпадають!';
	}

	if(R::count('users', "login = ?", array($data['login']))>0 ){
		$errors[] = "Користувач з таким логіном уже існує!";
	}

	if(R::count('users', "email = ?", array($data['email']))>0 ){
		$errors[] = "Користувач з таким E-mail уже існує!";
	}


	if(empty($errors) )
	{
		$user = R::dispense('users');
		$user->login = $data['login'];
		$user->email = $data['email'];
		$user->password = password_hash($data['password'],PASSWORD_DEFAULT);
		R::store($user);
		echo '<div style="font-size: 20px;>'."Ви успішно зареєстувалися!!!!".'</div><hr>';
	} else
	{
		echo '<div style="font-size: 20px;">'.array_shift($errors).'</div><hr>';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Мій блог</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
		<meta charset="utf-8">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/styleReg/style.css">
</head>
<body>
	<header class="container">
		<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header">
			<p class="myBlog">My blog</p>
		</div>
	</div>
	</header>
	<nav class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<nav>
					<ul class="menu-main">
						<li><a href="/">Блог</a></li>
						<li><a href="#">Контакти</a></li>
						<li><a href="Login.php">Авторизація</a></li>
						<li><a href="reg.php">Регістрація</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</nav>
	<article class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<form method="post" action="reg.php" class="login">

				    <p>
				      	<label>Логін:</label>
				      	<input type="text" name="login"  placeholder="Введіть логін"  required>
				    </p>

				    <p>
				      	<label>E-mail:</label>
				      	<input type="email" name="Email"  placeholder="Введіть E-mail"  required>
				    </p>

				    <p>
				      	<label>Пароль:</label>
				      	<input type="password" name="password" placeholder="Введіть пароль" required>
				    </p>

				    <p>
				      	<label>Повторіть пароль:</label>
				      	<input type="password" name="r_password" placeholder="Повторіть пароль" >
				    </p>

				    <p class="login-submit">
				     	<input type="submit" name="submit" class="login-button" value="Зареєструватись">
				    </p>
			  </form>
			</div>
		</div>
	</article>
	<footer>
		
	</footer>
</div>
</body>
</html>