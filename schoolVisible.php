<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">

    <title>吉野進学ゼミ</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="page-header">
                <h2 class="pull-left text-center">学生登録者名簿</h2>
              </div>
    <?php
    require_once('includes/config.php');
    $sql = "SELECT * FROM Class";

    if($result = mysqli_query($conn,$sql)){
    if(mysqli_num_rows($result)>0){
    echo "<table class='table table-bordered table-striped'>";
       echo "<thead>";
        echo "<tr>";
          echo "<th>学生番号</th>";
          echo "<th>名前</th>";
          echo "<th>学部</th>";
          echo "<th>登録日時</th>";
          echo "<th colspan=3></th>";
        echo"</tr>";
      echo "</thead>";
      echo"<tbody>";

        while($row = mysqli_fetch_array($result)){
       echo "<tr>";
         echo "<td>".$row['StudentNumber']."</td>";
         echo "<td>".$row['Name']."</td>";
         echo "<td>".$row['Faculty']."</td>";
         echo "<td>".$row['reg_date']."</td>";
         echo "<td><a href='student.php?StudentNumber=".$row['StudentNumber']."'title='View Record'>
         <i class='fa fa-info-circle' ></i>詳細</a></td>";
         echo "<td><a href='graduate.php?StudentNumber=".$row['StudentNumber']."'title='delete Record'>
         <i class='fa fa-graduation-cap'></i>退会手続き</a></td>";
         echo "<td><a href='update_student.php?StudentNumber=".$row['StudentNumber']."'title='update Record'>
         <i class='fa fa-user-circle'></i>学生情報変更</a></td>";
       echo"</tr>";
        }
      echo"</tbody>";
     echo"</table>";
     mysqli_free_result($result);
   }
   else
     echo "<p class='lead'><em>No records were found</em></p>";
   }
   else
     echo "ERROR: Could not able to execute $sql.".mysqli_error($conn);

     // $sql=("ALTER TABLE Class ADD Strong VARCHAR(20)");
     // if($conn->query($sql) == TRUE)
     //   echo "alter added successfully";
     // else
     //   echo "error added:".$conn->error;

     // $sql = "UPDATE CLASS SET Strong = 'PC' where StudentNumber = 1;";
     // $sql .= "UPDATE CLASS SET Strong = 'Math' where StudentNumber = 2;";
     // $sql .= "UPDATE CLASS SET Strong = 'Litellary' where StudentNumber = 3;";
     // $sql .= "UPDATE CLASS SET Strong = 'History' where StudentNumber = 4;";
     // $sql .= "UPDATE CLASS SET Strong = 'Language' where StudentNumber = 5;";
     //
     // if($conn->multi_query($sql) === TRUE)
     //   echo "Table Users Updated succsessfully";
     // else
     //   echo "Error updating table: ".$conn->error;

    ?>
      </div>
    </div>
    <a href="newStudent.php" class="btn btn-success float-right mb-2">新規ご入会をご希望の方へ</a>
  </div>
</div>



  </body>
      </html>
