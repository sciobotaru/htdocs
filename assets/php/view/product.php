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

//private
function getStars($rating)
{
    if($rating == 0)
    {
        return
        '
        <i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
        ';
    }
    elseif($rating > 0 && $rating <= 9)
    {
        return
        '
        <i class="fa fa-star-half-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
        ';
    }
    elseif($rating >= 10 && $rating < 20)
    {
        return
        '
        <i class="fa fa-star"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
        ';
    }
    elseif($rating >= 20 && $rating < 30)
    {
        return
        '
        <i class="fa fa-star"></i>
		<i class="fa fa-star-half-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
        ';
    }
    elseif($rating >= 30 && $rating < 40)
    {
        return
        '
        <i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
        ';
    }
    elseif($rating >= 40 && $rating <= 50)
    {
        return
        '
        <i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star-half-o"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
        ';
    }
    elseif($rating > 50 && $rating < 60)
    {
        return
        '
        <i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o"></i>
        ';
    }
    elseif($rating >= 60 && $rating < 70)
    {
        return
        '
        <i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star-half-o"></i>
		<i class="fa fa-star-o"></i>
        ';
    }
    elseif($rating >= 70 && $rating < 80)
    {
        return
        '
        <i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star-o"></i>
        ';
    }
    elseif($rating >= 80 && $rating < 90)
    {
        return
        '
        <i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star-half-o"></i>
        ';
    }
    else
    {
        return
        '
        <i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
        ';
    }
}
?>

<?php
function getProducts4()
{
    for($i=1; $i <= 8; $i++)
    {
?>
<div class="card" style="min-width:250px; max-width:250px; height:490px; margin-bottom:25px;">
    <div style="margin-top:0;width:100%; height:30px; border-radius:3px;" div="">
        <img src="assets/img/badabum.jpg" height="100%" margin-left="0">
        <div style="margin-right: 0;height: 100%;width: 30px;display:  block;float:  right;">
    	    <i class="fas fa-info-circle" style="font-size: 25px;margin: 2px;"></i>
        </div>
    </div>
    <div style="width:100%;height:290px;">
        <div style="background-color:rgba(0,0,0,.03);border-top: 1px solid rgba(0,0,0,.125);border-bottom: 1px solid rgba(0,0,0,.125);border-radius:3px; height:100%; width:60px; display:block;float:left;">
            
            <div style="border-bottom: 1px solid rgba(0,0,0,.125);height: 48px;text-align:center;"> 
                <i class="far fa-arrow-alt-circle-up" style="font-size: 30px;padding-top: 2px;color: #f52929;"></i>
                <p style="font-size: 9px;font-weight: bold;">Evolutie</p>
            </div>

            <div style="border-bottom: 1px solid rgba(0,0,0,.125);height: 48px;text-align:center;"> 
                <i class="fas fa-star-half-alt" style="font-size: 30px;padding-top: 2px;"></i>
                <p style="font-size: 11px;font-weight: bold;">3.8/5</p>
            </div>

            <div style="border-bottom: 1px solid rgba(0,0,0,.125);height: 48px;text-align:center;"> 
                <i class="fas fa-history" style="font-size: 30px;padding-top: 2px;"></i>
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

            <div style="border-bottom: 1px solid rgba(0,0,0,.125);height: 48px;text-align:center;"> 
                <i class="far fa-thumbs-up" style="font-size: 30px;padding-top: 2px;color: #443fe8;"></i>
                <p style="font-size: 9px;font-weight: bold;">Voteaza (343)</p>
            </div>

        </div>
        <div style="height:100%; width:200px; margin-left:70px;width:178px;text-align:center">
            <img src="assets/img/productPcgarage.jpg" height="100%">
        </div>
    </div>

    <div style="
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid rgba(0,0,0,.125);
    height: 60px;">
        <div style="
        border-right: 1px solid rgba(0,0,0,.125);
        height: 100%;
        width: 83px;
        display:  block;
        float:  left;">
            <div style="
            text-align:  center;
            height: 50%;
            border-bottom: 1px solid rgba(0,0,0,.125);
            ">
                <p>RAM 3 GB</p>
            </div>
                <div style="
                height: 50%;
                text-align:  center;
                ">
                    <p>64 GB</p>
                </div>
        </div>

        <div style="
        border-right: 1px solid rgba(0,0,0,.125);
        height: 100%;
        width: 83px;
        display:  block;
        float:  left;">
            <div style="
            text-align:  center;
            height: 50%;
            border-bottom: 1px solid rgba(0,0,0,.125);
            ">
                <p>S AMOLED</p>
            </div>
                <div style="
                height: 50%;
                text-align:  center;
                ">
                    <p>5.2"</p>
                </div>
        </div>


        <div style="
        height: 100%;
        width: 82px;
        display:  block;
        float:  left;">
            <div style="
            text-align:  center;
            height: 50%;
            border-bottom: 1px solid rgba(0,0,0,.125);
            ">
                <p>5/2 MP</p>
            </div>
                <div style="
                height: 50%;
                text-align:  center;
                ">
                    <p>1.2GH Octa</p>
                </div>
        </div>

    </div>
</div>
<?php
    }
}
?>

