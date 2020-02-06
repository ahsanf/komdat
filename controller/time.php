<?php
include 'connect.php';

$sql = "SELECT * FROM adc_data ORDER BY id DESC LIMIT 1";
$result = mysqli_query($koneksi,$sql);
$data;
if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        $data=$row['time'];
    }
    echo $data;
}
?>