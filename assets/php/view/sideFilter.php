<?php
function getSideFilter()
{
?>
<div class="side-filter">
    <div class="col-sm-2">

<div class="card">
	<article class="card-group-item">
		<header class="card-header">
			<h6 class="title">Range input </h6>
		</header>
		<div class="filter-content">
			<div class="card-body">
			<div class="form-row">
			<div class="form-group col-md-6">
			  <label>Min</label>
			  <input type="number" class="form-control" id="inputEmail4" placeholder="$0">
			</div>
			<div class="form-group col-md-6 text-right">
			  <label>Max</label>
			  <input type="number" class="form-control" placeholder="$1,0000">
			</div>
			</div>
			</div> <!-- card-body.// -->
		</div>
	</article> <!-- card-group-item.// -->
	<article class="card-group-item">
		<header class="card-header">
			<h6 class="title">Selection </h6>
		</header>
		<div class="filter-content">
			<div class="card-body">
				<div class="custom-control custom-checkbox">
					<span class="float-right badge badge-light round">52</span>
				  	<input type="checkbox" class="custom-control-input" id="Check1">
				  	<label class="custom-control-label" for="Check1">Samsung</label>
				</div> <!-- form-check.// -->

				<div class="custom-control custom-checkbox">
					<span class="float-right badge badge-light round">132</span>
				  	<input type="checkbox" class="custom-control-input" id="Check2">
				 	<label class="custom-control-label" for="Check2">Black berry</label>
				</div> <!-- form-check.// -->

				<div class="custom-control custom-checkbox">
					<span class="float-right badge badge-light round">17</span>
				  	<input type="checkbox" class="custom-control-input" id="Check3">
				  	<label class="custom-control-label" for="Check3">Samsung</label>
				</div> <!-- form-check.// -->

				<div class="custom-control custom-checkbox">
					<span class="float-right badge badge-light round">7</span>
				  	<input type="checkbox" class="custom-control-input" id="Check4">
				  	<label class="custom-control-label" for="Check4">Other Brand</label>
				</div> <!-- form-check.// -->
			</div> <!-- card-body.// -->
		</div>
	</article> <!-- card-group-item.// -->
</div> <!-- card.// -->



    </div>
</div>
<?php
}
?>