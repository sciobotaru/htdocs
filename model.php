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
    
    <?php getModal();?>
    <?php getNavBar4(); ?>
    <?php getSearchBar4(); ?>

    <div class="container-fluid text-center">    
        <div class="row content" style="padding-left: 50px; padding-right: 10px; height: 300px">
   
        

        </div>
    </div>

<?php getFooter2(); ?>


	</body>
</html>

<?php
closeDBConnection();
?>

