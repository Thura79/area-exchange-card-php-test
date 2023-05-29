<?php if(isset($_POST["area-button"])) :
$fileName = "area-record";


$width = $_POST['width'];
$breadth = $_POST['breadth'];
$area = area($_POST['width'] , $_POST['breadth']);

?>

<table class=" table table-striped">
    <thead>
        <tr>
            <td>Width</td>
            <td>Breadth</td>
            <td>Area</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $width  ?> ft</td>
            <td><?= $breadth  ?> ft</td>
            <td><?= $area ?></td>
        </tr>
    </tbody>
</table>

<?php 


if(!is_dir($fileName)){
    mkdir($fileName);
}

$file = "record".uniqid().".json";
$json = json_encode(["width"=> $width, "breadth"=> $breadth, "area"=> $area]);
$fileStream = fopen($fileName."/".$file,"w");
fwrite($fileStream,$json);
fclose($fileStream);
?>

<?php endif; ?>
