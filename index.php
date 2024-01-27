<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #333;
            font-size: 30px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 1px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 5px 20px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            float: center; 
        }

        input[type="submit"]{
            background-color: #2ecc71;           
            display: inline-block;
            padding: 8px 12px;
            margin: 5px;
            font-size: 14px;
            border-radius: 5px;
        }
    </style>

</head>
<body>
    <center>
        
    <form action="giris.php" method="post">
    <h3>Giriş Sayfası</h3>
        <table>
            <tr>
                <td>Kullanıcı Adı</td>
                <td><input type="text" name="kadi"></td>
            </tr>

            <tr>
                <td>Şifre</td>
                <td><input type="password" name="sifre"></td>
            </tr>
            <tr>
                <td><input type="submit" name="gonder" value="Giriş Yap"></td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>