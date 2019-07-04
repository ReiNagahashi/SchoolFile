<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>大宮進研ゼミ</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>　
  <?php
  require_once('includes/config.php');
  $sql="CREATE TABLE IF NOT EXISTS Class(
    StudentNumber INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(20) NOT NULL,
    Faculty VARCHAR(20) NOT NULL,
    Address VARCHAR(50),
    reg_date TIMESTAMP)";

    // if($conn->query($sql) == TRUE)
    //   echo "Table created successfully<br>";
    // else
    //   echo "Error creating Table".$conn->$error;
    //   $stmt=$conn->prepare("INSERT INTO Class(Name,Faculty,Address)VALUES(?,?,?)");
    //   $stmt->bind_param("sss",$name,$faculty,$address);
    //
    //   $name = "花田　由美";
    //   $faculty = "経済学部";
    //   $address = "静岡県";
    //   $stmt->execute();
    //
    //   $name = "梶原　貴教";
    //   $faculty = "経営学部";
    //   $address = "長野県";
    //   $stmt->execute();
    //
    //   $name = "吉野　健";
    //   $faculty = "文学部";
    //   $address = "神奈川県";
    //   $stmt->execute();
    //
    //   $name = "長橋　怜";
    //   $faculty = "経営学部";
    //   $address = "東京都";
    //   $stmt->execute();
    //
    //   $name = "金城　淳";
    //   $faculty = "スポーツ学部";
    //   $address = "沖縄県";
    //   $stmt->execute();
    //
    //   echo "New record inserted succsessfully";
      $stmt->close();
      $conn->close();




   ?>


</body>
</html>
