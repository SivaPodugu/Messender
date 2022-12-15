<?php
	session_start();
	if(isset($_POST['submit'])){
		$conn=mysqli_connect('localhost','root','','messender');
		$mail=$_POST['mail'];
		$pass=$_POST['password'];
		$sql=$conn->query("SELECT * FROM users_det WHERE email='$mail' and password='$pass'");
		if($sql->num_rows>0){
			$_SESSION['email']=$mail;
			$_SESSION['password']=$pass;
			header("location:main.php");
		}
		else{
			$_SESSION['ivlogin']="Either password or email is incorrect";
			header("location:login.php");
		}
		$conn->close();

	}
	else{
		header("location:login.php");
	}
?>