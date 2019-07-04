<?php
require_once('includes/config.php');

$name = $faculty = $address = $strong = "";
$name_err = $faculty_err = "";

  if(isset($_POST["StudentNumber"]) && !empty($_POST["StudentNumber"])){
    $studentNumber = $_POST["StudentNumber"];

    $input_name = $_POST["Name"];

    if (empty($input_name)) {
    $name_err = "名前を入力してください。😢";
  }else {
    $name = $input_name;
  }
  $input_faculty = $_POST["Faculty"];
  if (empty($input_faculty)) {
  $faculty_err = "学部を入力してください。😢";
}else {
  $faculty = $input_faculty;
  }
  $input_address = $_POST["Address"];
  $address = $input_address;

  $input_strong = $_POST["Strong"];
  $strong = $input_strong;

if(empty($name_err) && empty($faculty_err)){
  $sql = "UPDATE Class SET Name = ?,Faculty = ?,Address = ?,Strong = ? WHERE StudentNumber = ?;";

  if($stmt = mysqli_prepare($conn,$sql)){
    mysqli_stmt_bind_param($stmt,"ssssi",$param_name,$param_faculty,$param_address,$param_strong,$param_studentNumber);

    $param_name = $name;
    $param_faculty = $faculty;
    $param_address = $address;
    $param_strong = $strong;
    $param_studentNumber = $studentNumber;

    if(mysqli_stmt_execute($stmt)){
      header("location: schoolVisible.php");
      exit();
    }
    else {
      echo "正常に情報の変更をする事が出来ませんでした。";
    }
  }
  mysqli_stmt_close($stmt);
}
  mysqli_close($conn);
}
else {
  if(isset($_GET["StudentNumber"]) && !empty($_GET["StudentNumber"])){
    $studentNumber = $_GET["StudentNumber"];

    $sql = "SELECT * FROM Class WHERE StudentNumber = ?;";

    if($stmt = mysqli_prepare($conn,$sql)){
      mysqli_stmt_bind_param($stmt,"i",$param_studentNumber);

      $param_studentNumber = $studentNumber;

      if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1){
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          $name = $row["Name"];
          $faculty = $row["Faculty"];
          $address = $row["Address"];
          $strong = $row["Strong"];
        }
        else {
          header("location: student_error.php");
          exit();
        }
    }
    else {
      echo "もう一度やり直せ！";
    }
  }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
  }else {
    header("location: student_error.php");
    exit();
  }
}

?>


<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>学生情報変更</title>
    <style>
      .error {color: red;}</style>
  </head>
  <body>
<div class="wrapper">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="page-header text-center">
          <h2>学生情報変更</h2>
        </div>
        <!-- ここにPHPの設定を行うファイル名をかくことを絶対に忘れるな！！ -->
        <form action="update_student.php" method="POST">
          <div class="form-group">
            <label for="Name">名前</label>
            <input type="text" name="Name" class="form-control" value="<?php echo $name; ?>">
            <span class="error"><?php echo $name_err ?></span>
          </div>
          <div class="form-group">
            <label for="Faculty">学部</label>
            <textarea name="Faculty" class="form-control"><?php echo $faculty;?></textarea>
            <span class="error"><?php echo $faculty_err ?></span>
          </div>
          <div class="form-group">
            <label for="Address">出身</label>
            <input type="text" name="Address" class="form-control" value="<?php echo $address; ?>">
            <span class="error"><?php echo $address_err ?></span>
          </div>
          <div class="form-group">
            <label for="Strong">得意</label>
            <input type="text" name="Strong" class="form-control" value="<?php echo $strong; ?>">
            <span class="error"><?php echo $strong_err ?></span>
          </div>
          <div class="form-group">
            <!-- ？？？？ここでidをどのように活用するのか！？ -->
            <input type="hidden" name="StudentNumber" value="<?php echo $studentNumber;?>">
            <input type="submit" class="btn btn-info" value="submit">
            <a href="schoolVisible.php" class="btn btn-default">戻る</a>
          </div>
        </form>
    </div>
   </div>
  </div>
</div>
  </body>
  </html>
