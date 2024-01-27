<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veriyi Güncelle</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0px;
            padding: 0px;
            text-align: center;
        }

        center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }


        h3 {
            color: #333;
            font-size: 28px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            max-width: 400px;
            margin: auto;
        }

        table {
            width: 100%;
        }

        td {
            padding: 1px;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 20px);
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>


<?php
// URL'den gelen "id" parametresini alır
$gelen_id = $_GET["id"];

// Veritabanına bağlantı yapılır
$baglan = new mysqli('localhost', 'omerocak0', '123456', 'omerocak0');

// Bağlantı hatası kontrolü
if (mysqli_connect_errno()) {
    die("Veri Tabanına Bağlanılamadı." . mysqli_connect_errno());
}

// Belirli bir ID'ye sahip öğrenciyi çekmek için SQL sorgusu oluşturulur
$veri = "SELECT * FROM ogrenci WHERE id=$gelen_id";

// SQL sorgusunu çalıştır
$sonuc = $baglan->query($veri);

// Eğer sorgudan bir veya daha fazla kayıt dönmüşse
if ($sonuc->num_rows > 0) {
    // Veriler listelenecek
    while ($cek = $sonuc->fetch_assoc()) {
        $id = $cek["id"];
        $ad_soyad = $cek["ad_soyad"];
        $ders = $cek["ders"];
        $no = $cek["no"];
        $vize = $cek["vize"];
        $final = $cek["final"];
    }
} else {
    // Eğer sorgudan hiç kayıt dönmemişse
    echo "Veri Bulunamadı.";
}
?>


</head>
<body>
    <center>
        
    <form action="guncelle_islem.php?id=<?php echo $id; ?>" method="post">
    <h3>Bilgileri Güncelle</h3>
        <table>
            <tr>              
                <td>Ad Soyad: </td>
                <td><input type="text" name="ad_soyad" value="<?php echo $ad_soyad; ?>"></td>              
            </tr>

            <tr>               
                <td>Öğr. No:</td> 
                <td><input type="number" name="no" value="<?php echo $no; ?>"></td>            
            </tr>

            <tr>              
                <td>Ders Adı:</td>  
                <td><input type="text" name="ders" value="<?php echo $ders; ?>"></td>                
            </tr>

            <tr>              
                <td>Vize Notu:</td> 
                <td><input type="number" name="vize" value="<?php echo $vize; ?>"></td>               
            </tr>

            <tr>               
                <td>Final Notu:</td> 
                <td><input type="number" name="final" value="<?php echo $final; ?>"></td>              
            </tr>
            <tr>
                <td><input type="submit" value="Güncelle"></td>
            </tr>
            
        </table>
    </form>
    </center>
</body>
</html>