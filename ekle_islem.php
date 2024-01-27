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

$ekle = "INSERT INTO ogrenci (ad_soyad, no, ders, vize, final) VALUES ('$ad_soyad', '$no', '$ders', '$vize', '$final')";

if ($baglan->query($ekle) == true) {
    header("Refresh: 3; url=http://localhost/ODEV/liste.php");
    echo "<h1>Öğrenci Eklendi</h1>";
} else {
    echo "Ekleme Yapılamadı.";
}
?>