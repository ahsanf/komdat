<?php
include 'connect.php';

$sql = "SELECT MIN(data) as 'min' FROM  adc_data ";
$result = mysqli_query($koneksi,$sql);
$data;
if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        $data=  $row['min'];
        $data = floor($data);
    }
    echo $data;
}
?>
