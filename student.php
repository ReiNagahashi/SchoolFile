<?php
if(isset($_GET["StudentNumber"]) && !empty($_GET["StudentNumber"])){
  require_once("includes/config.php");

  $sql="SELECT * FROM Class WHERE StudentNumber = ?;";

  if($stmt = mysqli_prepare($conn,$sql)){
    mysqli_stmt_bind_param($stmt,"i",$param_id);

    $param_id = $_GET["StudentNumber"];

    if(mysqli_stmt_execute($stmt)){
      $result = mysqli_stmt_get_result($stmt);
      if(mysqli_num_rows($result) == 1){

        $row =  mysqli_fetch_array($result,MYSQLI_ASSOC);
        $name = $row["Name"];
        $faculty = $row["Faculty"];
        $address = $row["Address"];
        $strong = $row["Strong"];
}
  else {
    header('location: student_error.php');
  exit();
}
}else {
  header('location: student_error.php');

}
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    }
    else {
      header('location: student_error.php');
      exit();
      }

        ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>MYSQL-DATABASE</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <h5 class="card-header">学生紹介</h5>
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["Name"];?></h5>
              <p class="card-text">
                <b>出身:</b><?php echo $row["Address"];?><br>
                <b>得意科目:</b><?php echo $row["Strong"];?><br>
              </p>
              <a href="schoolVisible.php" class="btn btn-succsess">戻る</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
