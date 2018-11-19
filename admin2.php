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
    
    <?php
        $xml = readXml('xmldeals/AllDiscountedProducts.xml');
        clearDatabase('all_discounted_products');
        writeXmlToDatabase($xml, 'all_discounted_products');
    ?>

    </div>

<?php getFooter2(); ?>


	</body>
</html>

<?php
closeDBConnection();
?>

