<?php 
	include "connect.php";
	require "db.php";
?>

<?php if(isset($_SESSION['logged_user'])) : ?>
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
	<article class="container"">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="main" ">
			<?php 
				$resault = mysql_query("SELECT * FROM data") or die(mysql_error());
				$data = mysql_fetch_array($resault);
				do{
					printf('
							<div class="article">
						<p>
							<h2>%s</h2>
							%s
							<a href="view.php?id=%s" class="full";">Прочитать полностью</a>
						</p>
							</div>
						',$data["title"],$data["m_desc"],$data["id"]);
				}
				while($data = mysql_fetch_array($resault));
			?>
				</div>
			</div>
		</div>
	</article>
	<footer>
		
	</footer>
</div>
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
	<article class="container"">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="main" ">
			<?php 
				$resault = mysql_query("SELECT * FROM data") or die(mysql_error());
				$data = mysql_fetch_array($resault);
				do{
					printf('
							<div class="article">
						<p>
							<h2>%s</h2>
							%s
							<a href="view.php?id=%s" class="full";">Прочитать полностью</a>
						</p>
							</div>
						',$data["title"],$data["m_desc"],$data["id"]);
				}
				while($data = mysql_fetch_array($resault));
			?>
				</div>
			</div>
		</div>
	</article>
	<footer>
		
	</footer>
</div>
</body>
</html> 
<?php endif; ?>