<?php session_start();
if(isset($_SESSION['user'])){
    header("location:../minor/dashboard.php");
}
  ?>
<!Doctype>
<html>
<head>
  <title></title>
     <link rel="stylesheet" type="text/css" href="../css/main.css">
<style type="text/css">
  .form-control{
    border-radius: 3px;
    padding: 10px 20%;
  }
  .border{
    width: 400px;
    height: 350px;
  }
.loginbutton{
  padding: 10px 37%;
}
.reg{
  color: green;
  font-size: 20px;
}
</style>
</head>
<body >
  <br>
  <br>
  <br>
  <br>
  <br>
<center>
  <div class ="border fadeInUp" >
     <a href ="../minor/register.php" style="text-decoration: underline; margin-left: -300px" class="reg">Register</a>
                <form action="../minor/login.php" method="post">

                  <img src="../html/dti.png"  >
                  <br>
                  <br>
                  <br>
                        <input class="form-control"  type="text" name="user" id="user" placeholder="Username">
                        <label for ="password"></label>
                        <br>
                        <br>
                        <input  class="form-control"  type="password" name="password" id="password"  placeholder="Password">
                        <br>
                        <br>
                        <input class="loginbutton "  type="submit" name="btnSubmit">
                </form>
                <?php @INCLUDE_ONCE('../minor/config.php');
                 if(isset($_POST['btnSubmit'])){
                  $user = $_POST['user'];
                  $password = md5($_POST['password'],true);
                  $stmt = $con->prepare("SELECT * FROM `users` WHERE username = '$user' && `password` = '$password'") or die('Invalid input');

                   if($stmt->execute()){
                    $result = $stmt->get_result();
                    $num_rows = $result->num_rows;
                  }
                  if($num_rows > 0){
                    $_SESSION['user'] = $user;
                    header("location:/ASDMinor/minor/dashboard.php");
                  }else{
                    echo "Invalid input";
                  }
                  $con->close();
                }
                ?>
              </div>
    </center>
</body>
</html>
