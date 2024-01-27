<?php
    $baglan = new mysqli('localhost', 'omerocak0', '123456', 'omerocak0');

    $gelen_id = $_GET["id"];

    $ad_soyad = $_POST["ad_soyad"];
    $no = $_POST["no"];
    $ders = $_POST["ders"];
    $vize = $_POST["vize"];
    $final = $_POST["final"];

    if (mysqli_connect_errno()) {
        die("Veri Tabanına Bağlanılamadı: " . mysqli_connect_errno());
    }

    $guncelle = "UPDATE ogrenci SET ad_soyad = '$ad_soyad', no = '$no', ders = '$ders', vize = '$vize', final = '$final' WHERE id=$gelen_id";

    if ($baglan -> query($guncelle) == true) {
        header("Location: liste.php");
    } else {
        echo "Güncelleme Yapılamadı.";
    }
?>