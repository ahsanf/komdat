<?php
include 'connect.php';

$sql = "SELECT MAX(data) as 'max' FROM  adc_data ";
$result = mysqli_query($koneksi,$sql);
$data;
if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        $data=  $row['max'];
        // $data = floor($data);
    }
    echo $data;
}
?>
