<?php
 
    $id =1;// $_GET['id']; 為簡潔,直接將id寫上了,正常應該是通過使用者填入的id獲取的
    $db = new PDO('mysql:host=172.19.0.2;dbname=test', 'test', 'test');
    $query = "select bin_data,filetype from ccs_image where id=1";
    $result = $db->query($query);
    $result = $result->fetchAll(2);
//    var_dump($result);
    $data = $result[0]['bin_data'];
    $type = $result[0]['filetype'];
    Header( "Content-type: $type");
    echo $data;

?>
