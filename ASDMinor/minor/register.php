<?php
//trigger for particular and reqdiv
session_start();
if(isset($_SESSION['user'])){
   header("location:/ASDMinor/minor/dashboard.php"); 
}
?>
<!Doctype>
<html>

<head>
  <title></title>
          <link rel="stylesheet" type="text/css" href="../css/main.css">


          <style type="text/css">
         

          </style>
</head>
<body bgcolor="#F5F5F5">
<br/>
<br/>
<br/>
<br/>
<center>
<br>
<br>
<center>
<div class ="row fadeInUp" id="test ">
        <div class="col-md-6">
        <br/>
                  <img src="../html/dti.png"  >
                  <br/>
                  <form action="../minor/register.php" method="post">
                    <div class = "form-group ">
                    <br/>
                       &nbsp &nbsp &nbsp &nbsp <label for ="email" style="margin-left:-310px " class="labels"> Email</label>
                       <br>
                       <input class="form-control" type="text" name="email" id="email" placeholder="Enter email" style="text-align:left" >
                       <br>
                    </div>
                         <div class = "form-group">
                      <br>
                         &nbsp<label for ="username" style="margin-left:-255px "  class="labels"> Username</label>
                         <br>
                          <input class="form-control" type="text" name="username" id="username" placeholder=" Enter username" style="text-align:left" required >
                    </div>
                 
                      <div class = "form-group">
                      <br>
                         &nbsp<label for ="firstname" style="margin-left:-255px "  class="labels"> Firstname</label>
                         <br>
                          <input class="form-control" type="text" name="firstname" id="firstname" placeholder="firstname" style="text-align:left" required >
                    </div>

                    <div class = "form-group">
                      <br>
                         &nbsp<label for ="lastname" style="margin-left:-255px "  class="labels"> Lastname</label>
                         <br>
                         <input class="form-control" type="text" name="lastname" id="lastname"  placeholder="lastname" required>
                    </div>


                      <div class = "form-group">
                      <br>
                         &nbsp<label for ="password" style="margin-left:-255px "  class="labels"> Password</label>
                         <br>
                         <input class="form-control" type="password" name="password" id="password"  placeholder="Password" required>
                    </div>

                    <div class = "form-group">
                    <br>
                         &nbsp<label for ="password" style="margin-left:-195px "  class="labels">Confirm Password</label>
                         <br>
                         <input class="form-control" type="password" name="confirmpassword" id="confirmpassword"  placeholder="Confirm Password" style="text-align:left" required>
                    </div><br/>
                    <div >
                      
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
                    <input type="submit" value="Sign Up" class="submitbutton " name="btnRegister" style="margin-left:-68px " > 
                    <br/>
                    <br/>
                    <label for ="downlabel"> @2017.|Procurement System</label></div>
                </form>

            </div>
    </div>
    </center>
</body>
 
</html>

 <?php
if(isset($_SESSION['user'])){
    header("location:../minor/dashboard.php");
}
 @INCLUDE_ONCE('../minor/config.php');
 if(isset($_POST['btnRegister'])){

  $password= md5($_POST['password'],true);
  $username = $_POST['username'];
  if($_POST['password'] == $_POST['confirmpassword']){
  $stmt = $con->prepare("Insert into users(username,password,
first_name,last_name,register_at,email)
    values('".$username."','".$password."','".$_POST['firstname']."','".$_POST['lastname']."',now(),'".$_POST['email']."');");
  if($stmt->execute()){
    header("location:/ITPE/minor/login.php");
    }else{
      echo "error";
    }
  }else{
      session_unset();
        session_destroy();
    header("location:/ITPE/minor/login.php");
  }


}
?>