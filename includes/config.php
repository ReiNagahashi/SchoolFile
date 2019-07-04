<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSQL-DATABASE</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
    define("SERVERNAME","localhost");
    define("USERNAME","root");
    define("PASSWORD","root");
    define("DBNAME","demo");
    //↑↑↑このデータベースの名前にテーブルを入れるので、このconfigを継承したらそのテーブルも使用することができる
    $conn=mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DBNAME);

    if(!$conn)
          die("connection failed".mysqli_connect_error());
          else
            echo "connected Successfuly<br>";

            ?>
             </body>
              </html>
