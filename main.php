
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MesSender</title>
	<link rel="short icon " type="image/png" href="logo.png">
	<link rel="stylesheet" type="text/css" href="siva.css">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" integrity="sha384-eoTu3+HydHRBIjnCVwsFyCpUDZHZSFKEJD0mc3ZqSBSb6YhZzRHeiomAUWCstIWo" crossorigin="anonymous">
	<style>
		#profile{
			position: relative;
			top:10%;

		}
		#circle{
			/*font-size: 51px;*/
			font-weight: bold;
			text-decoration: none;
			/*border: solid;*/
			position: relative;
			left: 47%;
			bottom: -8px;

		}
		#mes-icon{
			position: relative;
			bottom: -9px;
			left: 23%;
		}
		.dots{
			position: relative;
			left: 25%;
			bottom: -8px;

		}
		.sec{
			border-bottom: 1px solid #ccc;
		}
		.3-dots{
			font-size: 150%;display:inline;position: relative; left: 95%;top: -135%;
		}


	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  
</head>
<body vlink="black" link="black" >

			<?php
			session_start();
				if(!isset($_SESSION['email']) || !isset($_SESSION['password'])){
					header("location:login.php");
				}
			?>
					
			<div class="side-body" style="width: 30%;height: 100%; border-bottom: 1px solid #ccc;" >
				<div class="side-head">
					<?php
		  
						$conn=mysqli_connect('localhost','root','','messender');
						$email=$_SESSION['email'];
						$sql=$conn->query("SELECT * FROM users_det WHERE email='$email'");
						while ($rows=$sql->fetch_assoc()) {


					?>
					<img src="images/<?php echo $rows['img']?>" height="40px" width="40px" class="profile" id="profile">
					<p style="display:inline; font-size: 120%; color: red; margin-left: 50px;margin-top: 20px;"> Welcome <?php echo $rows['n_name']?></p>
					<?php
				}

    				?>	

					<a href="#" style="font-size: 150%;display: inline;"><i class="bi bi-chat-left-text" style="color:gray;" id="mes-icon"></i></a>
					<!-- <a href="#" style="font-size: 150%;display:inline;"><i id="circle" style="color:gray;" class="bi bi-dash-circle-dotted"></i></a> -->
					<a href="#" style="font-size: 150%;display:inline;" onclick="openMenu();"><i   style="color:gray;" class="bi bi-three-dots-vertical dots"></i></a>
					<div class="side-menu">
						<ul class="list-unstyled side-menu-list">
							<li style="padding: 13px ; "><a style="color: black;" href="#" class="text-decoration-none">New group</a></li>
							<li style="padding:13px;"><a style="color: black;" href="#" class="text-decoration-none">Starred messages</a></li>
							<li style="padding: 13px;"><a style="color: black;" href="#" class="text-decoration-none">Settings</a></li>
							<li style="padding: 13px;"><a style="color: black;" href="logout.php" class="text-decoration-none">Log out</a></li>
						</ul>

					</div>
					<!-- <img src="3dots.jpg" height="20px" width="20px" class="dots"> -->
					<input type="search" name="search" class="search" placeholder="search or start new chat">

				</div>
				
				<div class="chat">
				<?php
						if(isset($_SESSION['email']) && isset($_SESSION['password'])){
						//$conn=mysqli_connect('localhost','root','','messender');
						//$email=$_SESSION['email'];
						$sql=$conn->query("SELECT * FROM users_det WHERE email!='$email'");
						while ($rows=$sql->fetch_assoc()) {
						
					?>
					<a style="color: black;" class="text-decoration-none sec" href="#" onclick="userid(this)">
					<input type="text" name="user_id" value="<?php echo $rows['User_id']?>" hidden>
					<div class="in"  style="border-bottom: 1px solid #ccc;" >
							
							<img src="images/<?php echo $rows['img']?>" height="40px" width="40px" class="profile" >
							<p class="contact-name" ><?php echo $rows['n_name']?></p>
							<p class="time" >28-10-22</p>
							<p class="lastmsg" >This message is deleted</p>
							
					</div>
					</a>
		
					<?php
						}
					}

    				?>	
    			</div>
				
					
				</div>
		<div class="main-body" id="main-body" style="display:none">
			<div class="contact-head">
				<img src="profile.jpg" height="40px" width="40px" style="transform: translate(10px,8px);" class="profile" id="profilemain">
				<span class="ch-name" id="cname">
					Siva Cse
				</span>
				<i class="bi bi-search" style="font-size: 110%; color:black;position: relative; left: 73%;top: 19%;"></i>
				<div style="width: 30%;position: relative; left:60%; top:20%; display: none;">
					<a onclick="openSearch();" href="#"><input type="search" name="search" class="main-search" id="main-search" ></a>
				</div>
				<a href="#" style="font-size: 150%;display:inline;position: relative; left: 75%;top: 25%;"id="3dots"><i style="color:gray; " class="bi bi-three-dots-vertical " onclick="openMenu2();"></i></a>
				<div class="main-menu">
					<ul class="list-unstyled main-menu-list">
						<li style="padding: 13px ;"><a href="#" class="text-decoration-none">Contact info</a></li>
						<li style="padding:13px;"><a href="#" class="text-decoration-none">Select messages</a></li>
						<li style="padding: 13px;"><a href="#" class="text-decoration-none">Close chat</a></li>
						<li style="padding: 13px;"><a href="#" class="text-decoration-none">Mute Notifications</a></li>
						<li style="padding: 13px;"><a href="#" class="text-decoration-none">Delete Chat</a></li>
					</ul>
				</div>
			</div>
			<div id="top"></div>
			<div id="dummy"></div>
					
			
			<br>
			
	</div>
	<div class="type-foot" id="type-foot" style="display:none">
			<input type="text" name="typing" id="msg" placeholder="type your message" class="typing" >
			<button  class="btn btn-primary send" id="send" ><i class="bi bi-send"></i></button>
			<a href="#top" id="bottom2top" style="font-size: 140%;" class="btn btn-success topb"><i class="bi bi-arrow-up-circle"></i></a>
		</div>
		<script type="text/javascript">
			var user_id;
			var active;
			function userid(s){
				document.getElementById("main-body").style.display="block";
				document.getElementById("type-foot").style.display="block";
				active=s;
				user_id=s.firstChild.nextElementSibling.getAttribute("value");
				var src=s.firstChild.nextElementSibling.nextElementSibling.firstChild.nextElementSibling.src;
				document.getElementById("profilemain").src=src;
				var name=s.firstChild.nextElementSibling.nextElementSibling.firstChild.nextElementSibling.nextElementSibling.innerHTML;
				document.getElementById("cname").innerHTML=name;
				$.ajax({type:'POST',url: "mainsupport.php", datatype:"json",data:{user_id:user_id}, 
					success:function(result){
						$("#dummy").html(result);
						// console.log(result);
				 	}
				});
				setTimeout(function(){userid(active)},3000);

			}
			$("#send").click(()=>{
				var msg=$("#msg").val();
				var data
				if(msg!=""){
					$.ajax({type:'POST',url: "chat.php", datatype:"json",data:{msg:msg,user_id:user_id}, 
						success:function(result){
							// $("#dummy").append(result);
							console.log(result);
					 	}
					});

				}
				document.getElementById("main-body").scrollTop = document.getElementById("main-body").scrollHeight;
				$("#msg").val("");
				setTimeout(userid(active),1000);
			})
			

			function openMenu() {
				var dis=document.getElementsByClassName("side-menu")[0].style.display;
				if(dis=="none"){
					document.getElementsByClassName("side-menu")[0].style.display="inline-block";
					// document.getElementsByClassName("side-head")[0].style.marginTop="-150px";
					// document.getElementsByClassName("side-head")[0].style.marginBottom="10px";
				}
				else{
					document.getElementsByClassName("side-menu")[0].style.display="none";
					// document.getElementsByClassName("side-head")[0].style.marginTop="0px";
				}
			}
			function openMenu2() {
				var dis=document.getElementsByClassName("main-menu")[0].style.display;
				if(dis=="none"){
					document.getElementsByClassName("main-menu")[0].style.display="inline-block";
					document.getElementById("tick").style.zIndex=-1;
				}	
				else{
					document.getElementsByClassName("main-menu")[0].style.display="none";
					document.getElementById("tick").style.zIndex=0;
				}
			}
			function openSearch() {
				var dis=document.getElementById("main-search").style.display;
				if(dis=="none")
				{
					document.getElementById("main-search").style.display="block";
					document.getElementById("3dots").className="3-dots";
				}
				else{
					document.getElementById("main-search").style.display="block";
					document.getElementById("3dots").className="";

				}
			}


		</script>
</body>
</html>