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


function getProducts4($products)
{
    foreach($products as $product)
    {
?>

<div class="card custom-card">
    <?php getFlyingDiscount($product); ?>
    <?php getShopInfo(); ?>
    <div style="width:100%;height:290px;">
        <?php getProductSideMenu($product); ?>
        <?php getProductImage($product); ?>
    </div>
    <?php getProductSpecifications($product); ?>
    <?php getProductInformation($product); ?>
</div>

<?php
    }
}
?>

<?php
function getShopInfo()
{
?>
<div class="shop-info">
    <img data-toggle="tooltip" data-placement="right" data-html="true" data-animation="true" data-delay='{ "show": 150, "hide": 0 }' title="<b>PCGarage.</b> Click pentru a afla detalii despre magazin." src="assets/img/pcgarage.jpg">
    <div class="economiseste" data-toggle="tooltip" data-placement="right" data-html="true" data-animation="true" data-delay='{ "show": 150, "hide": 0 }' title="Economiseste. Vezi <b>telefoane cu aceleasi performante in alte magazine sau de la alti producatori.</b>">
        <i class="fas fa-hand-holding-usd"></i>
    </div>
    <!--<div data-toggle="tooltip" data-placement="right" data-html="true" data-animation="true" data-delay='{ "show": 150, "hide": 0 }' title="<b>PCGarage.</b> Click pentru a afla detalii despre magazin." style="margin-left: 10px;height: 100%;width: 30px;display:block;float:left;cursor:pointer;">
        <i class="fas fa-info-circle" style="font-size: 20px;margin-top: 5px;margin-left: 6px;color: #575864;"></i>
    </div>-->
</div>
<?php
}
?>

<?php
function getProductSideMenu($products)
{
?>
<div class="side-bar">
    <div class="evolutie" data-toggle="tooltip" data-placement="right" data-html="true" data-animation="true" data-delay='{ "show": 150, "hide": 0 }' title="Pretul a <b>crescut</b>. Mai asteapta.">
        <i class="far fa-arrow-alt-circle-up"></i>
        <p>Evolutie</p>
    </div>

    <div class="rating" data-toggle="modal" data-target="#exampleModal" data-placement="right" data-html="true" data-animation="true" data-delay='{ "show": 150, "hide": 0 }' title="Rating evaluat de site-ul nostru: <b>3.8</b>. Click pentru review-uri.">
            <i class="fas fa-star-half-alt"></i>
        <p>3.8/5</p>
    </div>

    <div class="istoric" data-toggle="tooltip" data-placement="right" data-html="true" data-animation="true" data-delay='{ "show": 150, "hide": 0 }' title="<b>Istoric pret.</b> Click pentru detalii.">
        <i class="fas fa-history"></i>
        <p>Istoric</p>
    </div>
    <div class="youtube" data-toggle="tooltip" data-placement="right" data-html="true" data-animation="true" data-delay='{ "show": 150, "hide": 0 }' title="<b>Vezi review complet</b> pe Youtube. Click pentru vizionare.">
        <i class="fab fa-youtube"></i>
        <p>Youtube</p>
    </div>
    <div class="share" data-toggle="tooltip" data-placement="right" data-html="true" data-animation="true" data-delay='{ "show": 150, "hide": 0 }' title="Daca ai gasit un deal, nu-l tine doar pentru tine. <b>Spune-le si prietenilor pe Facebook.</b>">
        <i class="fas fa-share-alt"></i>
        <p>Share</p>
    </div>
    <div class="voteaza" data-toggle="tooltip" data-placement="right" data-html="true" data-animation="true" data-delay='{ "show": 150, "hide": 0 }' title="Voteaza deal-ul daca te-a impresionat. Sorteaza produsele dupa voturi si afla ce au votat altii.">
        <i class="far fa-thumbs-up"></i>
        <p>Voteaza (343)</p>
    </div>
</div>
<?php
}
?>

<?php
function getProductImage($product)
{
?>
<div class="product-image">
    <img src="<?php echo $product['LinkToPicture'] ?>" height=100%>
</div>
<?php
}
?>

<?php
function getProductSpecifications($products)
{
?>
<div class="specifications">
    <div class="memory">
        <div class="ram">
        <p><?php echo $products['RAMSize']?></p>
        </div>
        <div class="internal">
        <p><?php echo $products['MemorySize']?></p>
        </div>
    </div>
    <div class="display">
        <div class="type">
        <p><?php echo $products['DisplayType']?></p>
        </div>
        <div class="size">
        <p><?php echo $products['DisplaySize']?></p>
        </div>
    </div>
    <div class="performance">
        <div class="resolution">
        <p><?php echo $products['CameraResolution']?></p>
        </div>
        <div class="frequency">
        <p><?php echo $products['ProcessorSpeed']?></p>
        </div>
    </div>
</div>
<?php
}
?>

<?php
function getProductInformation($product)
{
?>
<div style="height: 109px;">
   <div data-toggle="tooltip" data-placement="top" data-html="true" data-animation="true" data-delay='{ "show": 300, "hide": 0 }' title="<?php echo $product['ProductTitle']?>" style="height: 45%;text-align:  center;">
      <a href="<?php echo $product['LinkToProduct']?>" target="_blank" style="padding-top:5px;font-weight:bold;font-size:14px;"><?php echo substr($product['ProductTitle'], 0, 55)."..."?></a>
   </div>
   <div style="text-align:center;height: 20%;font-weight:  400;"><span style="color: #091;"><?php echo $product['StockStatus']?></span>
   </div>
   <div style="height: 30%;">
      <div style="width: 33%;display:block;float:left;height: 25%;font-size: 11px;padding-top: 5px;padding-left: 5px;"><s><?php echo $product['NewPrice']?><sup>00</sup> Lei  </s><span style="font-weight:  bold;">(-36%)</span>
      </div>
      <div style="width: 33%;display:block;float:left;height: 25%;font-size: 12px;padding-top: 5px;padding-left: 5px;"><button type="button" class="btn btn-outline-primary btn-sm" style="font-size: 12px;width: 100%;font-weight: bold;padding: 3px;">Vezi oferta</button>
      </div>
      <div style="width: 33%;display:block;float:left;height: 25%;font-size: 16px;padding-top: 5px;padding-left: 5px;text-align:  right;color: red;font-weight:  bold;"><span><?php echo $product['NewPrice']?><sup>00</sup> Lei</span>
      </div>
   </div>
</div>
<?php
}
?>

<?php
function getFlyingDiscount($product)
{
?>
<span style="height: 24px;width: 70px;border-radius: 7px;position: absolute;background: linear-gradient(to right, rgb(136,18,18) , rgb(237,50,38));
        margin-left: 175px;margin-top: 35px;text-align: center;color: #fff;opacity: 0.9;">
        <strong><?php echo $product['DiscountBrut']?> Lei </strong>
    </span>
<?php
}
?>

<?php
function getModal()
{
?>

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php
}
?>

<?php
//seteaza datele in modal de ficare data cand e chemat (request in baza de date)
function setModal()
{

}
?>