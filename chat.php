<?php
	session_start();
	$conn=mysqli_connect("localhost","root","","messender");
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$mes=$_POST["msg"];
	$userid=$_POST["user_id"];
	$mail=$_SESSION["email"];
	// echo "$mes";
	$sql1=$conn->query("SELECT * FROM users_det WHERE email = '$mail'");
	echo $sql1->num_rows;
	while($rows=$sql1->fetch_assoc()){
		global $sender_id;
		$sender_id=$rows["User_id"];
	}
	date_default_timezone_set("Asia/Calcutta");
	$time=date("Y-m-d h:i:sa");
	$sql=$conn->query("INSERT INTO message_data (in_msg_id,out_msg_id,message,time) VALUES ('$userid','$sender_id','$mes','$time')");
	if($sql){
		echo time();
	}
	else{
		echo "failed";
	}
?>