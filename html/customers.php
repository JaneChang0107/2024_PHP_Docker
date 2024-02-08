<?php
    // sleep(1);
    // $request = json_decode(file_get_contents("php://input"), true);
$value = array(
    array("name" => "Alfreds Futterkiste", "country" => "Germany"),
    array("name" => "Ana Trujillo Emparedados y helados", "country" => "Mexico"),
    array("name" => "Antonio Moreno Taquería", "country" => "Mexico"),
    array("name" => "Around the Horn", "country" => "UK"),
    array("name" => "B's Beverages", "country" => "UK"),
    array("name" => "Berglunds snabbköp", "country" => "Sweden"),
    array("name" => "Blauer See Delikatessen", "country" => "Germany"),
    array("name" => "Blondel père et fils", "country" => "France"),
    array("name" => "Bólido Comidas preparadas", "country" => "Spain"),
    array("name" => "Bon app'", "country" => "France"),
    array("name" => "Bottom-Dollar Marketse", "country" => "Canada"),
    array("name" => "Cactus Comidas para llevar", "country" => "Argentina"),
    array("name" => "Centro comercial Moctezuma", "country" => "Mexico"),
    array("name" => "Chop-suey Chinese", "country" => "Switzerland"),
    array("name" => "Comércio Mineiro", "country" => "Brazil")
);
    // switch ($request['code']) {
    //     case "1":
    //         $value = 200;
    //         break;
    //     case "2":
    //         $value = 100;
    //         break;
    //     case "3":
    //         $value = 150;
    //         break;
    // }
    $result = [
        "value" => $value,
    ];
    $json = json_encode($result, JSON_UNESCAPED_UNICODE);
    header("Content-Type: application/json; charset=UTF-8");
    echo $json;
?>
