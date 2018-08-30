<?php
include 'assets/php/includes.php'; //includes for normal site functioning
//got layout from: https://www.w3schools.com/bootstrap/bootstrap_templates.asp
checkCookies();
connectToDatabase();
?>

<!DOCTYPE html>
<html>
	<head>
			<?php getHeadBootstrap413(); ?>
	</head>

	<body>
		<?php getNavBar4(); ?>
		<?php getSearchBar4(); ?>

		<div class="container-fluid text-center">    
  <div class="row content" style="padding-left: 50px; padding-right: 10px;">
   
    <div class="col-sm-2 sidenav" style="padding-top: 20px;min-width: 230px;">
      <?php getSideFilterCard(); ?>
    </div>

    <div class="col-sm-8 text-left"> 
      <?php getSortDropdown(); ?>
      <div class="card-deck" style="padding-top:20px; padding-bottom:20px;">
        <?php getProducts4(); ?>
      </div>
    </div>

    <div class="col-sm-2 sidenav" style="padding-top: 20px;padding-left:0;padding-right:0;">
      <?php getPromotions(); ?>
    </div>

  </div>
</div>

<?php getFooter2(); ?>


	</body>
</html>

<?php
closeDBConnection();
?>

