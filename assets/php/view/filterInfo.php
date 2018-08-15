<?php
function getFilterInfo()
{
    global $hotDealsMessage;
    global $requestCategorie;
    global $requestMagazin;
    global $requestPret;
    global $requestSearch;
?>
<div class="filter">
    <h4><?php echo $hotDealsMessage.getFilteredNumberOfProducts($requestCategorie, $requestMagazin, $requestPret, $requestSearch, 'all_discounted_products')?></h4>
</div>
<?php
}
?>