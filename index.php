<?php
include 'assets/php/includes.php'; //includes for normal site functioning
//got layout from: https://www.w3schools.com/bootstrap/bootstrap_templates.asp
checkCookies();
connectToDatabase();
?>

<!DOCTYPE html>
<html>
    <head>
        <?php getHead(); ?>
    </head>

    <body>
    
    <?php getNavBar(); ?>
  
<div class="container-fluid text-center">   
  <div class="row content">

<!-- ##########################################-->      

    <!-- Filter area begin -->
    <div class="col-sm-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <!-- Filter area end -->

    <!-- Product area begin -->
    <div class="col-sm-8 text-left"> 
        <div class="row product-list" id="productList">
            <?php getProducts(); ?>
        </div>
        <?php getPagination(); ?>
    </div>
    <!-- Product area end -->

    <!-- Promotion area begin -->
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
    <!-- Promotion area end -->

<!-- ##########################################-->      

  </div>
</div>

    <!-- Footer area begin -->
    <?php getFooter(); ?>
    <!-- Footer area end -->
      
    </body>
</html>

<?php
closeDBConnection();
?>

