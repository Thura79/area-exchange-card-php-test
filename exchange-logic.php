<?php

$apiData = file_get_contents("https://forex.cbm.gov.mm/api/latest");

$apiData = json_decode($apiData, true);
$rate = $apiData['rates'];



if (isset($_POST["button-calculate"])) :


    $amount = $_POST["amount"];
    $from = $_POST["from"];
    $to = $_POST["to"];

    
    $mmk = $amount * str_replace(",", "", $rate[$_POST["from"]]);

    $result = $mmk / str_replace(",", "", $rate[$_POST["to"]]);
    $showResult = round($result,2);

    $strem = fopen("exchange-record", "a");
    $text = $amount . $from." from ".$showResult.$to;
    fwrite($strem, $text."\n");
    fclose($strem);

?>


    <div class=" bg-light p-3 border rounded">
        <p class=" mb-0 ">from
            <?= $amount ?>
            <?= $from ?>
            to
            <?= $to ?>

        </p>
        <h1>
            <?= $showResult ?>
            <?= $to ?>

        </h1>

    </div>

<?php endif; ?>