<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>PHP Quizzer</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<header>
		<div class="container">
			<h1>PHP Quizzer</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>You're Done!</h2>
				<p>Congrats! Your Test is Over</p>
				<p>Final Score: <?php echo $_SESSION['score']; ?></p>
				<a href="question.php?n=1" class="start">Take Again</a>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2017, Tanmoy
		</div>
	</footer>
</body>
</html>
<?php session_destroy(); ?>