<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenciler</title>

    <style>
        body{
            background-color: #ddd;
        }
        nav {
            background-color: #f1f1f1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        table {
            background-color: #f1f1f1;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            margin: 5px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            color: #fff;
        }

        .btn-update {
            background-color: #3498db;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-add {
            background-color: #2ecc71;
        }
        .btn-out {
            background-color: #ff0000;
        }
        .resim {
            width: 50;
            height: 50px;
            padding: 10px;
        }
        .footer {
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            padding: 10px;
        }
    </style>
    
</head>

<body>

<?php
    
    session_start();

    $baglan = new mysqli('localhost', 'omerocak0', '123456', 'omerocak0');

    if (mysqli_connect_errno()) {
        die("Veri Tabanına Bağlanılamadı." . mysqli_connect_errno());
    }

    $veri = "SELECT * FROM ogrenci";
    $sonuc = $baglan->query($veri);

   

    if ($sonuc->num_rows > 0) {
        // Start table
        
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Ad Soyad</th>
                <th>Numara</th>
                <th>Ders</th>
                <th>Vize</th>
                <th>Final</th>
                <th>Ortalama</th>
                <th>Durum</th>
                <th>Not</th>
                <th>İşlemler</th>
              </tr>";

        // Display data in rows
        while ($cek = $sonuc -> fetch_assoc()) {
            $id = $cek["id"];
            $ad_soyad = $cek["ad_soyad"];
            $no = $cek["no"];
            $ders = $cek["ders"];
            $vize = $cek["vize"];
            $final = $cek["final"];         

            $ort = ($vize * 0.4) + ($final * 0.6);
            
            if($ort>=50 && $final>=50) {
                $durum = "Geçti";
            }
            else {
                $durum = "Kaldı";
            }

            if($durum == "Kaldı") {
                $not = "FF";
            }
            else if($ort >=90) {
                $not = "AA";
            }
            else if($ort >=80) {
                $not = "BA";
            }
            else if($ort >=70) {
                $not = "BB";
            }
            else if($ort >=60) {
                $not = "BC";
            }
            else if($ort >=50) {
                $not = "CC";
            }
            else {
                $not = "FF";
            }
            
            echo "<tr>
                    <td>$id</td>
                    <td>$ad_soyad</td>
                    <td>$no</td>
                    <td>$ders</td>
                    <td>$vize</td>
                    <td>$final</td>
                    <td>$ort</td>
                    <td>$durum</td>
                    <td>$not</td>
                    <td>
                        <button class='btn btn-update' onclick='window.location.href=\"veri_guncelle.php?id=$id\"'>Güncelle</button>
                        <button class='btn btn-delete' onclick='window.location.href=\"sil.php?id=$id\"'>Sil</button>
                    </td>
                  </tr>";
        }
        echo "<nav>";
        echo "<img src='https://www.firat.edu.tr/images/content_menu/163291663713.png' class='resim'>";
       echo "<div>";
       echo "<button class='btn btn-add' onclick='window.location.href=\"ekle.php?id=$id\"'>Yeni Öğrenci Ekle</button>";
       echo "<a href='cikis.php'><button class='btn btn-out'>Çıkış Yap</button></a>";
       echo "</div>";
        echo "</nav>";
        echo "<br>";

        echo "</table>";

        echo "<footer>";
            echo "<p  class='footer'> Ömer Ocak @ 2023| Fırat Üniversitesi TBMYO | Tüm Hakları Saklıdır.</p>";
        echo "</footer>";
       
        
    } else {
        echo "Veri Bulunamadı.";
    }
?>
    
</body>
</html>