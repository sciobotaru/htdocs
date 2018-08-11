<?php
	if(isset($_GET['accept-cookies']))
	{
		setcookie('accept-cookies', 'true', time() + 31556925);
		header('Location: ./');
	}
?>

<html>
	<head>
		<title>Cookies demo</title>
		<link rel="stylesheet" href="global.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="global.js"></script>
	</head>

	<body>
		<?php
		if(!isset($_COOKIE['accept-cookies'])) 
		{
		?>
		
		<div class="cookie-banner">
			<div class="container">
				<p>Prin continuarea utilizarii site-ului, iti exprimi acordul pentru utilizarea fisierelor de tip "Cookie", conform <a href="">Politica de confidentialitate</a></p>
				<a href="?accept-cookies" class="button">Am inteles</a>
			</div>
		</div>

		<?php
		}
		?>

		<?php
			for($i = 0; $i < 100; $i++)
			{
		?>
		<p>Acesta este un demo despre cookies</p>
		<?php
			}
		?>

	</body>
</html>