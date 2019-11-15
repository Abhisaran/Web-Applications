<?php
session_start();
?>
<?php
include "db.php";
$usrname=$_POST["username"];
$usr=strtoupper($usrname);
$pass=$_POST["password"];
$date=date("Y-m-d",strtotime($pass));
$sql="SELECT * FROM cri_users where username='$usrname' and password='$pass'";
$sel="SELECT * FROM details where rollno='$usr' and dob='$date'";
$result=mysqli_query($conn, $sql);
$res=mysqli_query($conn, $sel);
if(mysqli_query($conn, $sql))
{
    if(mysqli_num_rows($result)>0){
    $_SESSION["cri_user"]=$usrname;
	    $_SESSION["title"]="success";
            header("location:admin/dashboard.php");
    }
 else if(mysqli_query($conn,$sel))
{
    if(mysqli_num_rows($res)>0){
    $_SESSION["user"]=$usrname;
	    $_SESSION["title"]="success";
         header("location:dashboard.php");
    }
    else
        $_SESSION["title"]="error";
     header("location:index.php");
}
}
else{
	$_SESSION["title"]="failure";
    header("location:index.php");
}
?>