<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Signin Page
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" integrity="sha384-eoTu3+HydHRBIjnCVwsFyCpUDZHZSFKEJD0mc3ZqSBSb6YhZzRHeiomAUWCstIWo" crossorigin="anonymous">
    <style type="text/css">
        body{
            background-color:#0d1117 ;
            color: white;
            font-family: sans-serif;
            text-align: center;
        }
        .signup-container{
            width: 400px;
            background-color: #161b22;
            border: 1px solid #25262d;
            padding-top: 4%;
            padding-right: 4%;
            padding-left: 4%;
            padding-bottom: 1%;
            margin-top: 1%;
            border-radius: 15px;
        }
        input[type=text],input[type=password], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 16px;
            margin-bottom: 26px;
            resize: vertical;
        }

        input[type=submit] {
            width: 100%;
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
        label{
            float: left;
        }
        .new-container {
            width: 23%;
            padding: 2%;
            border: 1px solid rgba(255, 255, 255, 0.5);
            margin-top: 2%;
            border-radius: 5px;
            font-family: sans-serif;
        }

        .new-text {
            color: #fff;
            font-size: .9rem;
            font-weight: lighter;
            opacity: .8;
        }
    </style>
</head>
<body>
    <center>
        <form method="post" enctype="multipart/form-data" id="form" action="signindb.php">
            <div  style="padding-top:1%">
                <img src="logo.png" width="50px" height="50px">
            </div>
            <div style="padding-top:1%; font-size: 1.5rem;">
                Create your account
            </div>
            <?php
                session_start();
                if(isset($_SESSION['email_err'])){
                    echo "<div class='alert alert-danger' role='alert'>
                            ".$_SESSION['email_err']."
                        </div>";
                    unset($_SESSION['email_err']);
                }
                else if(isset($_SESSION['not_success'])){
                    
                    echo "<div class='alert alert-danger' role='alert'>
                            ".$_SESSION['not_success']."
                        </div>";
                    unset($_SESSION['not_success']);
                }
                else if(isset($_SESSION['wrong'])){
                   
                     echo "<div class='alert alert-danger' role='alert'>
                            ". $_SESSION['wrong']."
                        </div>";
                    unset($_SESSION['wrong']);
                }                
                else if(isset($_SESSION['ext_err'])){
                    
                    echo "<div class='alert alert-danger' role='alert'>
                            ". $_SESSION['ext_err']."
                        </div>";
                    unset($_SESSION['ext_err']);
                }
                else if(isset($_SESSION['mail_err'])){
                    echo "<div class='alert alert-danger' role='alert'>
                            ". $_SESSION['mail_err']."
                        </div>";
                    unset($_SESSION['mail_err']);
                }
                else if(isset($_SESSION['img_err'])){
                    echo "<div class='alert alert-danger' role='alert'>
                            ".$_SESSION['img_err']."
                        </div>";
                    unset($_SESSION['img_err']);
                }
                else if(isset($_SESSION['all_err'])){
                     echo "<div class='alert alert-danger' role='alert'>
                            ".$_SESSION['all_err']."
                        </div>";
                    unset($_SESSION['all_err']);
                }
            ?>
            <div class="signup-container">
                <label for="mail">
                    Email:
                </label>
                <input type="text" id="mail" name="email" required placeholder="Enter your email ID">
                <p id="idn" style="display:none; color: red;">Enter valid rgukt mailID</p>
                <label for="nick">
                    Nickname:
                </label>
                <input type="text" id="nick" required placeholder="Enter your Nickname" name="nickname">
                <label for="password">
                    Password:
                </label>
                <input type="password" id="password" name="pass" placeholder="Enter your RguktID" required>
                <p id="psd" style="display:none; color: red;">Check your password:</p>
                <label>Upload Photo:</label>
                <input type="file" name="img" style="margin-bottom: 6%;margin-top: 2%;font-size: 105%;">
                <input type="submit" value="Submit" name="submit">
                <p><a title="Click Here" href="#" style="text-decoration: none;">MesSender</a> to know about us</p>
            </div>
            <div class="new-container">
                <span><span  class="new-text">Account Created ? </span><a href="login.php" style=" list-style-type: none; text-decoration: none;">Signin</a>.</span>
            </div>
        </form>
    </center>
    <script type="text/javascript" >
        function validateEmail()
        {
            var emailAdress=document.getElementById("mail").value;
            var p=/^[a-z,A-Z,0-9][a-z,A-Z,0-9,_,.]*@[a-z]{3,7}\.[a-z]{2,3}(\.[a-z]{2,3})*$/;
            if(p.test(emailAdress))
            {
                return true;
            }
            else
            {
                document.getElementById("idn").style.display="block";
                document.getElementById("mail").style.borderColor="red";
                return false;
            }
        }
        function password()
        {
            var re1=/[a-z]/;
            var re2=/[A-Z]/;
            var re3=/[0-9]/;
            var re4=/@/;
            var pass=document.getElementById("password").value;
            // console.log(pass);
            // console.log(pass.length);
            if((pass.length<6)||!(re1.test(pass))||!(re2.test(pass))||!(re3.test(pass))||!(re4.test(pass)))
            {
                document.getElementById("psd").style.display="block";
                document.getElementById("password").style.borderColor="red";
                return false;
            }
            else
            {
                return true;
            }
        }
        function validate(){
            var res1=password();
            var res2=validateEmail();
            if(res1&&res2){
                alert("Account Created")
            }
            return false;
        }
    </script>
</body>
</html>