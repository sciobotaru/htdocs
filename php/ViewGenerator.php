<?php

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

function getPaginationFormat($connResult, $requestPage, $paginationPosition)
{
?>	
    <ul class="pagination">
        <li><a aria-label="Previous" style="cursor: pointer;"><span aria-hidden="true" id="anterioara'.$paginationPosition.'"><<</span></a></li>
        <li><a><span id="currentpageno">'.(int)$requestPage.'</span>/<span id="maxpages">100</span></a></li>
        <li><a aria-label="Next" style="cursor: pointer;"><span aria-hidden="true" id="urmatoarea'.$paginationPosition.'">>></span></a></li>
    </ul>
<?php
}
?>