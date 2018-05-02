<?php 
require 'db.php';

$data = $_POST;
 
	if (isset($data['enter'])) {
		$errors = array();
		$user = R::findOne('users','login = ?', array($data['login']));

		if($user){
			if(password_verify($data['password'], $user->password)){
				$_SESSION['logged_user'] = $user;
				echo '<div style="font-size: 20px;">'."Ви успішно авторизовані".'</div><hr>';
			}else{
				$errors[] = "Неправильний пароль";
			}
		}else
		{
			$errors[] = "Користувача з таким логіном не існує!!";
		}

		if(! empty($errors)){
			echo '<div style="font-size: 20px;">'.array_shift($errors).'</div><hr>';
		}

	}

?>
<?php if(isset($_SESSION['logged_user'])) : ?>

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
						<li><a><?php echo $_SESSION['logged_user']->login;  ?></a></li>
						<li><a href="/logOut.php">Вийти</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</nav>
</body>
</html>

<?php else : ?>


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
				<form method="post" action="Login.php" class="login">
				    <p>
				      	<label>Логін:</label>
				      	<input type="text" name="login" value="<?php echo @$data['login']; ?>">
				    </p>

				    <p>
				      	<label>Пароль:</label>
				      	<input type="password" name="password" value="<?php echo @$data['password']; ?>">
				    </p>

				    <p class="login-submit">
				     	<button type="submit" name="enter" class="login-button">Війти</button>
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
<?php endif; ?>