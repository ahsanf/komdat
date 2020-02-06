<?php
include 'connect.php';

$sql = "SELECT AVG(data) as 'avg' FROM  adc_data ";
$result = mysqli_query($koneksi,$sql);
$data;
if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        $data=  $row['avg'];
        $data = floor($data * 100) / 100;
    }
    echo $data;
}
?>
