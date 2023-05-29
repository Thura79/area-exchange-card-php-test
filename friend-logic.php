<?php


$friends = [];
$dataFileName = "friend-data.json";

if(file_exists($dataFileName) && filesize($dataFileName)){
    $friends = json_decode(file_get_contents($dataFileName), true);
}



if($_FILES["friend-photo"]["error"] === 0){
    $dir = "friend-zone";
    if(!is_dir($dir)){
        mkdir($dir);
    }

    $newName = $dir."/".uniqid()."friend.".pathinfo($_FILES["friend-photo"]["name"])["extension"];
    move_uploaded_file($_FILES["friend-photo"]["tmp_name"],$newName);

    $indo = $_POST;
    $indo["photo"] = $newName;
    array_push($friends,$indo);
    
    file_put_contents($dataFileName, json_encode($friends));

    
}
