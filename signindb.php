<?php
	session_start();
	if(isset($_POST['submit'])){
		$conn=mysqli_connect("localhost","root","","messender");
		$mail=$_POST['email'];
		$nname=$_POST['nickname'];
		$pass=$_POST['pass'];
		$img=$_FILES['img'];
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		if(!empty($mail)&&!empty($nname)&&!empty($pass)&&!empty($img)){
			if(filter_var($mail,FILTER_VALIDATE_EMAIL)){
				$sql=$conn->query("SELECT * FROM users_det WHERE email='$mail'");
				if($sql->num_rows>0){
					$_SESSION['email_err']='Email already exists';
					header("location:signin.php");
				}
				else{
					if(isset($_FILES['img'])){

						$img_name = $_FILES['img']['name'];
	                    $img_type = $_FILES['img']['type'];
	                    $tmp_name = $_FILES['img']['tmp_name'];
	                    
	                    $img_explode = explode('.',$img_name);
	                    $img_ext = end($img_explode);
	                    $extensions = ["jpeg", "png", "jpg","JPEG","JPG","PNG"];
	                    if(in_array($img_ext, $extensions) === true){
	                        	$t=time();
	                        	$new_img_name=$t.$img_name;
	                        	if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
	                        		$ins_Query=$conn->query("INSERT INTO users_det (email,n_name,password,img) VALUES ('$mail','$nname','$pass','$new_img_name')");
	                        		if($ins_Query===True){
	                        			$sql=$conn->query("SELECT * FROM users_det WHERE email='{$mail}'");
										if($sql->num_rows>0){
											$_SESSION['success']="Successfully Created";
											header("location:login.php");
										}
										else{
	                                        $_SESSION['not_success']="Email already exists"; 
	                                        header("location:signin.php");
										}
	                        		}
	                        		else{
	                        			$_SESSION['wrong']="Something Went Wrong";
	                        			header("location:signin.php");
	                        		}
	                        	}
	                        	else{
	                        		$_SESSION['wrong']="Something Went Wrong";
	                        		header("location:signin.php");
	                        		}
	                    }
	                    else{
	                    	
	                    	$_SESSION['ext_err']="Extension is not a type belongs to jpeg or png or jpg";
	                    	header("location:signin.php");
	                    }
	                }
	                else{
	                	$_SESSION['img_err']="Please upload an image";
	                	header("location:signin.php");
	                }
				}
			}
			else{
				$_SESSION['mail_err']='Invalid email';
				header("location:signin.php");
			}
		}
		else{
			echo $_SESSION['all_err']='ALL FIELDS required';
			header("location:signin.php");
		}
	}

?>