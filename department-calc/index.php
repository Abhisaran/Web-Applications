<?php
session_start();
?>
<?php
if(array_key_exists("user",$_SESSION)||isset($_SESSION["user"])){
header('location:dashboard.php');
}
else
    if(array_key_exists("cri_user",$_SESSION)||isset($_SESSION["cri_user"])){
header('location:admin/dashboard.php');
}
else{
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title id="title"><?php echo $_SESSION["title"];?></title>
 <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
<!-- jQuery library -->
        <script src="js/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
        function validate()
            {
                var uname = document.getElementById("username").value;
                var pass = document.getElementById("password").value;
                if(uname == "" || uname == null)
                    {
                        document.getElementById("err").innerHTML = "*Username is empty!";
                        return false;
                    }
                else if(pass == "" || pass == null){
                    document.getElementById("err").innerHTML= "*Password is empty!!";
                    return false;
                }
                return true;
                    }
            }
        
        </script>
    
    </head>
    <body class="container">
        <h2>Login</h2>
        <br/>
        <br/>
        <form role="form" action = "login.php" method="post" class = "form" onsubmit="return validate();">
            <div class="form-group fom-group-sm">
                <label for = "username">Username:</label>
                    <input type = "text" name = "username" id = "username" class = "form-control" autocomplete="off" required/><br/>
            </div>
             <div class="form-group">
                 <label for="password">Password:</label>  
                    <input type = "password" name = "password" id="password" class="form-control" autocomplete="off" required/>
                 <br/>
            </div>
            <div class="form-group"><input type = "submit" value="Login" onclick="**return** validate();" class="btn btn-success "/></div>
            
        </form> 
        <p id = "err" class = "warning"></p>
    </body>
</html>
<?php
}
?>