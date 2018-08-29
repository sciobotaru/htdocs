<?php
function getSortDropdown()
{
?>
<div style="height:60px;">
   <div class="btn-group dropright" style="margin-left:10px;margin-top:20px;">
      <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ordoneaza dupa  </button>
      <div class="dropdown-menu" x-placement="right-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(152px, 0px, 0px);">
         <a class="dropdown-item" href="#">Pret crescator</a>
         <a class="dropdown-item" href="#">Pret descrescator</a>
         <a class="dropdown-item" href="#">Discount %</a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="#">Rating</a>
      </div>
   </div>
</div>
<?php
}
?>