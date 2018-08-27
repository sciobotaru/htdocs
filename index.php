<?php
include 'assets/php/includes.php'; //includes for normal site functioning
//got layout from: https://www.w3schools.com/bootstrap/bootstrap_templates.asp
checkCookies();
connectToDatabase();
?>

<!DOCTYPE html>
<html>
	<head>
			<?php getHeadBootstrap400(); ?>
	</head>

	<body>
		<?php getNavBar4(); ?>
		<?php getSearchBar4(); ?>

		<div class="container-fluid text-center">    
  <div class="row content" style="padding-left: 50px; padding-right: 50px;">
    <div class="col-sm-2 sidenav" style="padding-top: 20px;">
      <?php getSideFilterCard(); ?>
    </div>
    <div class="col-sm-8 text-left"> 
      <?php getProducts4(); ?>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>

<?php getFooter(); ?>


	</body>
</html>

<?php
closeDBConnection();
?>

