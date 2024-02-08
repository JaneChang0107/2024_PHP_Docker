<?php
    sleep(1);
    $request = json_decode(file_get_contents("php://input"), true);
    $value = 0;
    switch ($request['code']) {
        case "1":
            $value = 200;
            break;
        case "2":
            $value = 100;
            break;
        case "3":
            $value = 150;
            break;
    }
    $result = [
        "value" => $value,
    ];
    $json = json_encode($result, JSON_UNESCAPED_UNICODE);
    header("Content-Type: application/json; charset=UTF-8");
    echo $json;
?>
