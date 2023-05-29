<?php include "./head.php" ?>

<h1>Area Calculator</h1>

<?php include "./server.php" ?>

<form class=" row g-3" method="post">
    <div class="col-4">
        <input class=" form-control" type="number" placeholder="width" name="width" required>

    </div>
    <div class="col-4">
        <input class=" form-control" type="number" placeholder="breadth" name="breadth" required>

    </div>
    <div class="col-2">
        <button name="area-button" class=" w-100 btn btn-outline-primary">Calculate</button>

    </div>
</form>

<?php
$fileName = "area-record";

if (is_dir($fileName)) :
    $record = array_filter(scandir($fileName), fn ($r) => $r !== "." && $r !== "..");
    if (count($record)) :
?>

        <table class=" table">
            <th>
                <tr>
                    <td>Width</td>
                    <td>Breadth</td>
                    <td>Area</td>
                    <td>Control</td>
                </tr>
            </th>
            <tbody>
                <tr>
                    <?php foreach ($record as $re) :
                        $file = $fileName . "/" . $re;
                        $stream = fopen($file, "r");
                        $j = fread($stream, filesize($file));
                        $arr = json_decode($j, true);
                    ?>
                        <td>
                            <?= $arr["width"] ?> ft
                        </td>
                        <td><?= $arr["breadth"] ?> ft</td>
                        <td><?= $arr["area"] ?> sqft</td>
                        <td>
                            <a href="delete-area.php?name=<?= $re ?>" class=" btn btn-sm btn-danger">Delete</a>
                        </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    <?php endif; ?>
<?php endif; ?>
<?php include "./footer.php" ?>