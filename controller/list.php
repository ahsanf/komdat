<?php
include 'connect.php';

$sql = "SELECT * FROM adc_data ORDER BY id DESC LIMIT 10 ";
$result = mysqli_query($koneksi,$sql);
$data = [];
if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        array_push($data,$row);
    }

    // var_dump($data);
    echo json_encode($data);
}

?>