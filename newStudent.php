<?php

  require_once('includes/config.php');

  $name = $faculty = $address = $strong = "";
  $name_err = $faculty_err = $address_err = $strong_err = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_name = $_POST["Name"];
    if(empty($input_name)){
      $name_err = "名前が記入されていません🙀";
    }else{
      $name = $input_name;
    }
    $input_faculty = $_POST["Faculty"];
    if (empty($input_faculty)) {
      $faculty_err = "学部が記入されていません😿";
    }else {
      $faculty = $input_faculty;
    }
    $input_address = $_POST["Address"];
    $address = $input_address;

    $input_strong = $_POST["Strong"];
    $strong = $input_strong;

    if(empty($name_err) && empty($faculty_err)){

      $sql = "INSERT INTO Class(Name,Faculty,Address,Strong) VALUES(?,?,?,?)";

      if($stmt = mysqli_prepare($conn,$sql)){
        mysqli_stmt_bind_param($stmt,"ssss",$param_name,$param_faculty,$param_address,$param_strong);
        $param_name = $name;
        $param_faculty = $faculty;
        $param_address = $address;
        $param_strong = $strong;

        if (mysqli_stmt_execute($stmt)) {
          header("location: schoolVisible.php");
          exit();
        }
        else {
          echo "正常に入会をする事が出来ませんでした。もう一度やり直してくだっさい。";
        }
      }
      mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
  }
 ?>


<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>新規入学をご希望の方へ</title>
    <style>
      .error {color: red;}</style>
  </head>
  <body>
<div class="wrapper">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="page-header text-center">
          <h2>create record</h2>
        </div>
        <form action="newStudent.php" method="POST">
          <div class="form-group">
            <label for="Name">お名前</label>
            <input type="text" name="Name" class="form-control" value="<?php echo $name; ?>">
            <span class="error"><?php echo $name_err ?></span>
          </div>
          <div class="form-group">
            <label for="Faculty">学部</label>
            <textarea name="Faculty" rows=5 cols=10 class="form-control"><?php echo $faculty;?></textarea>
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
            <input type="submit" class="btn btn-success" value="submit">
            <a href="schoolVisible.php" class="btn btn-default">戻る</a>
          </div>
        </form>
    </div>
   </div>
  </div>
</div>
  </body>
  </html>
