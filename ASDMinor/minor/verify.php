 <?php
 if(isset($_POST['btnRegister'])){
	$password= md5($_POST['password'],true);
	if($_POST['password'] == $_POST['confirmpassword']){
	$stmt = $con->prepare("Insert into users(username,password,
first_name,last_name,register_at,email)
    values('".$_POST['username']."','".$password."','".$_POST['firstname']."','".$_POST['lastname']."',now(),'".$_POST['email']."');");
	if($stmt->execute()){
	  header("location:/ASDMinor/minor/login.php");
	  }else{
	  	echo "error";
	  }
	}else{
	    session_unset();
  	    session_destroy();
		header("location:/ASDMinor/minor/login.php");
	}
}else{
	header("location:/ASDMinor/minor/login.php");
}
?>