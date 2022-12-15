<?php
	session_start();
	if(isset($_POST['user_id'])){
	$userid=$_POST["user_id"];}
	$mail=$_SESSION["email"];
	$conn=mysqli_connect('localhost','root','','messender');
	$sql1=$conn->query("SELECT * FROM users_det WHERE email = '$mail'");
	while($rows=$sql1->fetch_assoc()){
		global $sender_id;
		$sender_id=$rows["User_id"];
	}
	$sql2=$conn->query("SELECT * FROM message_data");
					while ($row=$sql2->fetch_assoc()) {
						if($row['in_msg_id']==$userid && $row['out_msg_id']==$sender_id ){
							echo  '<div class="out-mes">
										<div class="out-out-mes">
											<div class="out-text">'.$row['message'].'
												<span style="font-size:75%;margin-left:5px;margin-right: 5px;color:darkgray;">'.$row['time'].'<i class="bi bi-check2-all" style="font-size:20px;color:black;position: relative; top: 3.5px;left: 3px;z-index: 0;" id="tick"></i></span>
											</div>
										</div>
									</div>';
						}
						else if($row['in_msg_id']==$sender_id && $row['out_msg_id']==$userid){ 
							echo '<div class="in-mes">
								<div class="in-in-mes">
									<div class="in-text">
										'.$row['message'].'<span style="font-size:75%;margin-left:15px;margin-right: 2px;color:darkgray;">'.$row['time'].'</span>
									</div>
								</div>

							</div>
							<br>';

					
						
						}

						
					}
?>