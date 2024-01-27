    <?php
    $baglan = new mysqli('localhost', 'omerocak0', '123456', 'omerocak0');

    if (mysqli_connect_errno()) {
        die("Veri Tabanına Bağlanılamadı." . mysqli_connect_errno());
    }

    $username = $_POST["kadi"];
    $password = $_POST["sifre"];

    $sql = "SELECT * FROM ogrenci WHERE username='$username' AND password='$password'";

    $sonuc = $baglan->query($aql);

    if($sonuc->num_rows==1) {
        echo "Giriş Başarılı";
    }
    else{
        echo "Giriş başarısız";
    }

    
    $baglan->close();

    ?>