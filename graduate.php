<?php
require_once("includes/config.php");

if(isset($_POST["id"]) && !empty($_POST["StudentNumber"])){

  $sql = "DELETE FROM Class WHERE StudentNumber = ?";
  if($stmt=mysqli_prepare($conn,$sql)){
    mysqli_stmt_bind_param($stmt,"i",$param_id); 

    $param_id = trim($_POST["StudentNumber"]);
   if(mysqli_stmt_execute($stmt)){
      header("location:schoolVisible.php");
      exit();
    }
    else {
      echo "退会のお手続きに失敗しました。もう一度やり直してください。";
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

} else {
  if(empty ($_GET["StudentNumber"])){
    header('location: student_error.php');
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
    <title>退会手続き</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h1>ご卒業おめでとうございます！</h1>
            </div>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
              <div class="alert alert-success">
                <input type="hidden" name="StudentNumber" value="<?php echo $_GET["StudentNumber"]; ?>">
                <p>改めまして、ご卒業おめでとうございます。ここで学んできたことは必ず今後の様々な場面でご活躍されるための糧になるでしょう。</p><br>
                <p>
                  <input type="submit" value="退会" class="btn btn-primary">
                  <a href="schoolVisible.php" class="btn btn-secondary">戻る</a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
