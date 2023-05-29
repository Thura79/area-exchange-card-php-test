<?php include "./head.php" ?>

<h1>Friend Card</h1>
<?php
require_once "./friend-logic.php"
?>

<form method="post" enctype="multipart/form-data">
    <div class=" mb-3">
        <label for="" class=" form-label">Friend Name</label>
        <input type="text" name="friend-name" class=" form-control" required>
    </div>

    <div class=" mb-3">
        <label for="" class=" form-label">Friend Phone</label>
        <input type="tel" name="friend-phone" class=" form-control" required>
    </div>
    <div class=" mb-3">
        <label for="" class=" form-label">Friend Address</label>
        <textarea name="friend-address" class=" form-control" rows="5" required></textarea>
        <!-- <input type="text" name="friend-name" class=" form-control" required> -->
    </div>

    <div class=" mb-3">
        <label for="" class=" form-label">Friend Photo</label>
        <input type="file" accept="image/jpeg,image/png" name="friend-photo" class=" form-control" required>
    </div>

    <div class="form-check">
        <input type="checkbox" name="isreal" value="yes" class=" form-check-input" id="isreal">
        <label for="isreal" class=" from-check-label">Real Friend</label>
    </div>

    <button class=" btn btn-primary w-100">Create Friend List</button>
</form>


<div class=" my-5">
    <?php
    $dataFileName = "friend-data.json";
    $friends = json_decode(file_get_contents($dataFileName), true);
    ?>
    <?php foreach ($friends as $key => $friend) : ?>
        <div class="card mb-3">
            <div class="card-body text-center">
                <img src="<?= $friend["photo"] ?>" class=" d-block mx-auto rounded-circle" width="100" height="100">
                <h5><?= $friend["friend-name"] ?></h5>
                <p><?= $friend["friend-phone"] ?></p>
                <a href="./friend-detail.php?index=<?= $key ?>" class=" btn w-100 d-block btn-primary mb-1">Detail</a>
                <a href="./friend-delete.php?index=<?= $key ?>" class=" btn w-100 d-block btn-danger">delete</a>
            </div>
        </div>
    <?php endforeach; ?>

</div>


<?php include "./footer.php" ?>