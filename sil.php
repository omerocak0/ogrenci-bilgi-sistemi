<?php

    $baglan = new mysqli('localhost', 'omerocak0', '123456', 'omerocak0');

    $gelen_id = $_GET["id"];

    $sil = "DELETE FROM ogrenci WHERE id=$gelen_id";

    if($baglan->query($sil) == true) {
        header("Location: liste.php");
    }
    else{
        echo "Kişi silinemedi!";
    }
?>