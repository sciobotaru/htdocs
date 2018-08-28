<?php
function getSideFilterCard()
{
	getCardBrand();
	getCardRAM();
	getCardInternalMemory();
	getCardRezolutie();
}
?>


<?php
function getCardBrand()
{
?>

<div class="card" style="margin-bottom: 10px;">
    <article class="card-group-item">
        <header class="card-header">
            <h6 class="title">Brand</h6>
        </header>
        <div class="filter-content">
            <div class="card-body" style="padding-bottom: 20px; text-align: left">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Huawei">
                    <label class="custom-control-label" for="Huawei">Huawei <span style="color:#babbbc">(456)</span></label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="iPhone">
                    <label class="custom-control-label" for="iPhone">iPhone <span style="color:#babbbc">(456)</span></label>
                </div>

				<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Zenphone">
                    <label class="custom-control-label" for="Zenphone">Zenphone <span style="color:#babbbc">(456)</span></label>
                </div>

				<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Samsung">
                    <label class="custom-control-label" for="Samsung">Samsung <span style="color:#babbbc">(456)</span></label>
                </div>
            </div>
            <!-- card-body.// -->
        </div>
    </article>
    <!-- card-group-item.// -->
</div>

<?php
}
?>

<?php
function getCardRAM()
{
?>

<div class="card" style="margin-bottom: 10px;">
    <article class="card-group-item">
        <header class="card-header">
            <h6 class="title">RAM</h6>
        </header>
        <div class="filter-content">
            <div class="card-body" style="padding-bottom: 20px; text-align: left">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="1G">
                    <label class="custom-control-label" for="1G">1 GB <span style="color:#babbbc">(456)</span></label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="2G">
                    <label class="custom-control-label" for="2G">2 GB <span style="color:#babbbc">(54)</span></label>
                </div>

				<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="3G">
                    <label class="custom-control-label" for="3G">3 GB <span style="color:#babbbc">(76)</span></label>
                </div>

				<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="4G">
                    <label class="custom-control-label" for="4G">4 GB <span style="color:#babbbc">(98)</span></label>
                </div>
            </div>
            <!-- card-body.// -->
        </div>
    </article>
    <!-- card-group-item.// -->
</div>

<?php
}
?>

<?php
function getCardInternalMemory()
{
?>

<div class="card" style="margin-bottom: 10px;">
    <article class="card-group-item">
        <header class="card-header">
            <h6 class="title">Memorie interna</h6>
        </header>
        <div class="filter-content">
            <div class="card-body" style="padding-bottom: 20px; text-align: left">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="sub4gb">
                    <label class="custom-control-label" for="sub4gb">Sub 4 GB <span style="color:#babbbc">(456)</span></label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="4gb">
                    <label class="custom-control-label" for="4gb">4 GB <span style="color:#babbbc">(456)</span></label>
                </div>

				<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="8gb">
                    <label class="custom-control-label" for="8gb">8 GB <span style="color:#babbbc">(78)</span></label>
                </div>

				<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="16gb">
                    <label class="custom-control-label" for="16gb">16 GB <span style="color:#babbbc">(34)</span></label>
                </div>

				<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="32gb">
                    <label class="custom-control-label" for="32gb">32 GB <span style="color:#babbbc">(56)</span></label>
                </div>

				<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="64gb">
                    <label class="custom-control-label" for="64gb">64 GB <span style="color:#babbbc">(12)</span></label>
                </div>

				<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="128gb">
                    <label class="custom-control-label" for="128gb">128 GB <span style="color:#babbbc">(4)</span></label>
                </div>

				<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="256gb">
                    <label class="custom-control-label" for="256gb">256 GB <span style="color:#babbbc">(46)</span></label>
                </div>
            </div>
            <!-- card-body.// -->
        </div>
    </article>
    <!-- card-group-item.// -->
</div>

<?php
}
?>

<?php
function getCardRezolutie()
{
?>

<div class="card" style="margin-bottom: 10px;">
    <article class="card-group-item">
        <header class="card-header">
            <h6 class="title">Rezolutie camera</h6>
        </header>
        <div class="filter-content">
            <div class="card-body" style="padding-bottom: 20px; text-align: left">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="5mp">
                    <label class="custom-control-label" for="5mp">Sub 5 Mp <span style="color:#babbbc">(46)</span></label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="510mp">
                    <label class="custom-control-label" for="510mp">5 - 10 Mp <span style="color:#babbbc">(54)</span></label>
                </div>

				<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="10mp">
                    <label class="custom-control-label" for="10mp">Peste 10 Mp <span style="color:#babbbc">(76)</span></label>
                </div>

            </div>
            <!-- card-body.// -->
        </div>
    </article>
    <!-- card-group-item.// -->
</div>

<?php
}
?>