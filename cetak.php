<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'functions2.php';

$mpdf = new \Mpdf\Mpdf();

$mahasiswa = query("SELECT * FROM mahasiswa");

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="print.css" />
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0" >
        <tr>
            <th>No.</th>
            
            <th>Nim</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>fakultas</th>
            <th>Gambar</th>
        </tr>';


    $i = 1;
    foreach($mahasiswa as $row){
        $html .= '<tr class="cetak">
            <td>'. $i++ .'</td>
            <td>'.$row["NIM"].'</td>
            <td>'.$row["Nama"].'</td>
            <td>'.$row["Email"].'</td>
            <td>'.$row["Jurusan"].'</td>
            <td>'.$row["Fakultas"].'</td>
            <td><img src="gambar/'.$row["Gambar"] .'" width="50"></td>
            
        </tr>';
    }


 $html .=   '</table>
</body>
</html>';



$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf', 'I');
?>