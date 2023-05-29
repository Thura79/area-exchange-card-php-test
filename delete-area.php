<?php

$filepath = 'area-record/'.$_GET["name"];
echo $filepath;

if(is_file($filepath)){
unlink($filepath);

}
// header("Location:exchange.php");
header("Location:area.php");


