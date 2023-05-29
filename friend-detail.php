<?php


$friends = [];
$dataFileName = "friend-data.json";

if (file_exists($dataFileName) && filesize($dataFileName)) {
    $friends = json_decode(file_get_contents($dataFileName), true);
}

?>

<div class=" d-flex justify-content-start g-3 align-items-center">
    <img src="<?= $friends[$_GET["index"]]["photo"] ?>" width="100px" height=" 100px">
    <div class="">
        <h4>Name = <?= $friends[$_GET["index"]]["friend-name"] ?></h4>
        <p>Phone = <?= $friends[$_GET["index"]]["friend-phone"] ?></p>
        <p>Address = <?= $friends[$_GET["index"]]["friend-address"] ?></p>
    </div>
</div>