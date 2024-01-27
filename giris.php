<?php
    session_start(); // Oturumu başlat

    $baglan = new mysqli('localhost', 'omerocak0', '123456', 'omerocak0');

    // Bağlantı hatası kontrolü
    if (mysqli_connect_errno()) {
        die("Veri Tabanına Bağlanılamadı." . mysqli_connect_errno());
    }

    // POST ile gönderilen kullanıcı adı ve şifre alınır
    $username = $_POST['kadi'];
    $password = $_POST['sifre'];

    // SQL sorgusu oluşturulur ve veritabanından kullanıcı adı ve şifre eşleşmesi kontrol edilir
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $sonuc = mysqli_query($baglan, $sql);

    // Kaç kayıt olduğu sayılır
    $kayit = mysqli_num_rows($sonuc);

    // Eğer sorgudan bir kayıt dönmüşse
    if ($kayit == 1) {
        // Oturum değişkeni ayarlanır
        $_SESSION['giris'] = true;
        // Oturum kontrolü yapılır ve yönlendirme yapılır
        if(isset($_SESSION['giris']) && $_SESSION['giris'] == true) {
            header('Location: liste.php');
        }
    } else {
        // Eğer sorgudan hiç kayıt dönmemişse
        echo "Giriş Başarısız";
    }
?>
