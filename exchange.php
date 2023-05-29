<?php include "./head.php" ?>

<h1>Exchange Calculator</h1>

<?php 

include "./exchange-logic.php";

?>

<form id="exform" method="post"></form>

<div class="row g-3">
    <div class="col-12">
        <label class="form-label">Amount</label>
        <input type="number" form="exform" required name="amount" class="form-control" required id="">
    </div>
    <div class="col-6">
        <label class="form-label">From Currency</label>
        <select form="exform" required name="from" class=" form-select">
            <option value="">Select</option>
            <?php foreach($rate as $key => $value): ?>
                <option value="<?= $key ?>"><?= $key ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-6">
        <label class="form-label">To Currency</label>
        <select form="exform" required name="to" class=" form-select">
            <option value="">Select</option>

            <?php foreach($rate as $key => $value) : ?>
                <option value="<?= $key ?>"><?= $key ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-12">
        <button form="exform" name="button-calculate" class=" btn btn-primary w-100">Calculate</button>
    </div>

    <div class="col-12">
        <h5>Exchange Record</h5>
        <ul class=" list-group">
            <?php foreach(file("exchange-record") as $key => $l): ?>
            <li class=" list-group-item">
                <?= $key+1 ." . ". $l ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php include "./footer.php" ?>