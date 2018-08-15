<?php
function getPagination()
{
    global $requestPage;
    global $totalPages;
?>
<ul class="pagination">
    <li class="pointer"><a aria-label="Previous"><span aria-hidden="true" id="anterioaraup"><<</span></a></li>
    <li><a><span id="currentpageno"><?php echo (int)$requestPage?></span>/<span id="maxpages"><?php echo $totalPages?></span></a></li>
    <li class="pointer"><a aria-label="Next"><span aria-hidden="true" id="urmatoareaup">>></span></a></li>
</ul>
<?php
}
?>