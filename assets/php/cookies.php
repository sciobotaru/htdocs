<?php

function checkCookies()
{
	if(isset($_GET['accept-cookies']))
	{
		setcookie('accept-cookies', 'true', time() + 31556925);
		header('Location: ./');
	}
}

function displayCookiesAlert()
{
	if(!isset($_COOKIE['accept-cookies'])) 
	{
	?>
		<div class="cookie-banner">
			<div class="container">
				<p>Prinnnn continuarea utilizarii site-ului, iti exprimi acordul pentru utilizarea fisierelor de tip "Cookie", conform <a href="">Politica de confidentialitate</a></p>
				<a href="?accept-cookies" class="button">Am inteles</a>
			</div>
		</div>
<?php	
	}
}
?>