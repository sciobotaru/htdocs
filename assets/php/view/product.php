<?php
//public
function getProducts()
{
    global $requestPage;
    global $requestCategorie;
    global $requestPret;
    global $requestMagazin;
    global $requestSearch;

    
    if($requestCategorie == "" && $requestPret == "" && $requestMagazin == "" && $requestSearch == "") //get first page
    {
        if($requestPage == "") $requestPage = (int)1;

        $result = getProductsFromDatabase((int)$requestPage, 
                                            $requestCategorie, 
                                            $requestMagazin, 
                                            $requestPret, 
                                            $requestSearch,
                                            'all_discounted_products');
    }else{
        $result = getProductsFromDatabase((int)$requestPage, 
                                            $requestCategorie, 
                                            $requestMagazin, 
                                            $requestPret, 
                                            $requestSearch,
                                            'all_discounted_products');
    }
    
    if($result->num_rows == 0)
    {
        ?>
        <p class="text-center">Ups! Niciun produs care sa corespunda criteriilor cautate. <a href="/"> Reseteaza filtrele.</a></p>
        <?php
    }
    
    while($row = $result->fetch_assoc()) 
    {
        $stars = getStars($row["Rating"]);

        if($row["NumberOfReviews"] == 1)
        {
            $reviewFormat = "review";
            $noOfReviews = "(".$row["NumberOfReviews"].")";
        }
        elseif($row["NumberOfReviews"] == "")
        {
            $reviewFormat = "";
            $noOfReviews = "";
        }
        elseif($row["NumberOfReviews"] < 20)
        {
            $reviewFormat = "review-uri";
            $noOfReviews = '('.$row["NumberOfReviews"].')';
        }else
        {
            $reviewFormat = "de review-uri";
            $noOfReviews = '('.$row["NumberOfReviews"].')';
        }
?>
<div class="col-md-3 col-sm-4 col-xs-6 product-item">
        <div class="product-container">
            <div class="row">
                <div class="col-md-12">
                    <img src="<?php echo 'assets/img/'.strtolower($row["Vendor"]).'.jpg'?>" style="height:18px;" href="#" title="<?php echo $row["Vendor"]?>" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="">
                </div>
                <div class="col-md-12">
                    <img class="hot-label" src="<?php echo 'assets/img/hotdeal'.$row["HotLevel"].'.jpg'?>" />
                    <span class="discount-label"><strong><?php echo $row["Discount"] ?></strong></span>
                    <div><a href="<?php echo $row["LinkToProduct"]?>" target="_blank" class="product-image"><img src="<?php echo $row["LinkToPictureThumbnail"]?>" onError="this.onerror=null;this.src=\'/assets/img/noimage.jpg\';" data-bs-hover-animate="pulse" style="margin-top:3px;"></a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-rating">
                    <?php echo $stars?>
                    <a class="hidden-sm hidden-md hidden-lg small-text"><?php echo $noOfReviews?></a>
                    <a class="hidden-xs small-text"><?php echo $row["NumberOfReviews"].' '.$reviewFormat?></a>
                    </div>
                    <a href="<?php echo $row["LinkToProduct"]?>" target="_blank"><p class="product-description"><?php echo $row["ProductTitle"]?></p></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-md-12" style="color:rgb(17,207,0);">
                            <p class="discount"><?php echo $row["StockStatus"]?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-6">
                            <s class="product-old-price"><?php echo '('.$row["OldPrice"].')'?></s>
                            <p class="discount"><?php echo '('.$row["Discount"].')'?></p>
                        </div>
                        <div class="col-xs-6">
                            <p class="product-price"><?php echo $row["NewPrice"].' Lei'?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php    	
    }
}


function getProducts4()
{
    for($i=1; $i <= 8; $i++)
    {
?>

<div class="card" style="min-width:250px; max-width:250px; height:490px; margin-bottom:25px;">
    <?php getFlyingDiscount(); ?>
    <?php getShopInfo(); ?>
    <div style="width:100%;height:290px;">
        <?php getProductSideMenu(); ?>
        <?php getProductImage(); ?>
    </div>
    <?php getProductSpecifications(); ?>
    <?php getProductInformation(); ?>
</div>

<?php
    }
}
?>

<?php
function getShopInfo()
{
?>
<div style="margin-top:0;width:100%;height:30px;border-radius:3px;" div="">
    <img src="assets/img/pcgarage.jpg" height="100%" margin-left="0">
    <div style="margin-right: 10px;height: 100%;width: 30px;display:  block;float:  right;">
        <i class="fas fa-hand-holding-usd" style="font-size: 25px;margin: 2px;color: #575864;"></i>
    </div>
    <div style="margin-left: 10px;height: 100%;width: 30px;display:  block;float: left;">
        <i class="fas fa-info-circle" style="font-size: 20px;margin-top: 5px;margin-left: 6px;color: #575864;"></i>
    </div>
</div>
<?php
}
?>

<?php
function getProductSideMenu()
{
?>
<div style="background-color:rgba(0,0,0,.03);border-top: 1px solid rgba(0,0,0,.125);border-bottom: 1px solid rgba(0,0,0,.125);border-radius:3px; height:100%; width:60px; display:block;float:left;">
    <div style="border-bottom: 1px solid rgba(0,0,0,.125);height: 48px;text-align:center;">
        <i class="far fa-arrow-alt-circle-up" style="font-size: 30px;padding-top: 2px;color: #f52929;"></i>
        <p style="font-size: 9px;font-weight: bold;">Evolutie</p>
    </div>
    <div style="border-bottom: 1px solid rgba(0,0,0,.125);height: 48px;text-align:center;">
        <i class="fas fa-star-half-alt" style="font-size: 30px;padding-top: 2px;color:#f9bf3c;"></i>
        <p style="font-size: 11px;font-weight: bold;">3.8/5</p>
    </div>
    <div style="border-bottom: 1px solid rgba(0,0,0,.125);height: 48px;text-align:center;">
        <i class="fas fa-history" style="font-size: 30px;padding-top: 2px;color: #575864;"></i>
        <p style="font-size: 9px;font-weight: bold;">Istoric</p>
    </div>
    <div style="border-bottom: 1px solid rgba(0,0,0,.125);height: 48px;text-align:center;">
        <i class="fab fa-youtube" style="font-size: 30px;padding-top: 2px;color: #f52929;"></i>
        <p style="font-size: 9px;font-weight: bold;">Youtube</p>
    </div>
    <div style="border-bottom: 1px solid rgba(0,0,0,.125);height: 48px;text-align:center;">
        <i class="fas fa-share-alt" style="font-size: 30px;padding-top: 2px;color: #7c79e4;"></i>
        <p style="font-size: 9px;font-weight: bold;">Share</p>
    </div>
    <div style="height: 48px;text-align:center;">
        <i class="far fa-thumbs-up" style="font-size: 30px;padding-top: 2px;color: #443fe8;"></i>
        <p style="font-size: 9px;font-weight: bold;">Voteaza (343)</p>
    </div>
</div>
<?php
}
?>

<?php
function getProductImage()
{
?>
<div style="height:100%;margin-left:70px;width:178px;text-align:center;padding:3px;">
    <img src="assets/img/productPcgarage.jpg" height="100%">
</div>
<?php
}
?>

<?php
function getProductSpecifications()
{
?>
<div style="background-color: rgba(0,0,0,.03);border-bottom: 1px solid rgba(0,0,0,.125);height: 60px;font-size:13px;font-weight:bold;color:#575864;">
    <div style="border-right:1px solid rgba(0,0,0,.125);height: 100%;width: 83px;display:block;float:left;">
        <div style="text-align:center;height:50%;padding-top:5px;border-bottom: 1px solid rgba(0,0,0,.125);">
        <p>3 GB</p>
        </div>
        <div style="height:50%;padding-top:5px;text-align:center;">
        <p>64 GB</p>
        </div>
    </div>
    <div style="border-right: 1px solid rgba(0,0,0,.125);height: 100%;width: 83px;display:block;float:left;">
        <div style="text-align:center;height:50%;padding-top:5px;border-bottom: 1px solid rgba(0,0,0,.125);">
        <p>S AMOLED</p>
        </div>
        <div style="height:50%;padding-top:5px;text-align:  center;">
        <p>5.2"</p>
        </div>
    </div>
    <div style="height: 100%;width: 82px;display:block;float:left;">
        <div style="text-align:center;height:50%;padding-top:5px;border-bottom: 1px solid rgba(0,0,0,.125);">
        <p>5/2 MP</p>
        </div>
        <div style="height:50%;padding-top:5px;text-align:center;">
        <p>1.2GH Octa</p>
        </div>
    </div>
</div>
<?php
}
?>

<?php
function getProductInformation()
{
?>
<div style="height: 109px;">
   <div style="height: 45%;text-align:  center;">
      <a href="#" style="padding-top:5px;font-weight:bold;font-size:14px;">Telefon mobil Allview X4 Soul LITE, Dual SIM, Dual Camera, 16GB, 4G,</a>
   </div>
   <div style="text-align:center;height: 20%;font-weight:  400;"><span style="color: #091;">In Stoc</span>
   </div>
   <div style="height: 30%;">
      <div style="width: 33%;display:block;float:left;height: 25%;font-size: 11px;padding-top: 5px;padding-left: 5px;"><s>999<sup>00</sup> Lei  </s><span style="font-weight:  bold;">(-36%)</span>
      </div>
      <div style="width: 33%;display:block;float:left;height: 25%;font-size: 12px;padding-top: 5px;padding-left: 5px;"><button type="button" class="btn btn-outline-primary btn-sm" style="font-size: 12px;width: 100%;font-weight: bold;padding: 3px;">Vezi oferta</button>
      </div>
      <div style="width: 33%;display:block;float:left;height: 25%;font-size: 16px;padding-top: 5px;padding-left: 5px;text-align:  right;color: red;font-weight:  bold;"><span>999<sup>00</sup> Lei</span>
      </div>
   </div>
</div>
<?php
}
?>

<?php
function getFlyingDiscount()
{
?>
<span style="height: 24px;width: 70px;border-radius: 7px;position: absolute;background: linear-gradient(to right, rgb(136,18,18) , rgb(237,50,38));
        margin-left: 175px;margin-top: 35px;text-align: center;color: #fff;opacity: 0.9;">
        <strong>-200 Lei </strong>
    </span>
<?php
}
?>