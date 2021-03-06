<?php
session_start();
?>
<?php
if(array_key_exists("cri_user",$_SESSION)||isset($_SESSION["cri_user"])||$_SESSION["cri_user"]!="")
{
    ?>
<html>
<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel="stylesheet" type="text/css">
    <style>
        body{
            font-family: 'Roboto';
        }
    </style>
    </head>
<body>
    <nav class="navbar no-margin">
        <div class = "navbar-left">
           <button class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
              <span class="fa fa-list fa-stack-1px"></span>
                    </button>
        </div>
                
<div class = "navbar-left">  
             
        
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active" ><button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="fa fa-list fa-stack-1px"></span> </button></li>
                            </ul>
                </div>
                    </div>            

        <div class = "navbar-header">Event Entry Maker</div>

    </nav>
 <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
            <div class="sidebar-col">
                <img src = "user/default.png" class="sidebar-img"/></div>
            
                <li>
                    <a href="dashboard.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a>
                </li>
                <li>
                    <a href="profile.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span> Profile</a>
                </li>
                 <li>
                    <a href="sd.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-download fa-stack-1x "></i></span>Student detail</a>
                </li>
                
                <li class="pr_active">
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-pencil fa-stack-1x "></i></span>Make event entry</a>
                </li>
               <li>
                    <a href="calendar.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-calendar fa-stack-1x "></i></span>Calendar</a>
                </li>
                <li>
                    <a href="about.html"><span class="fa-stack fa-lg pull-left"><i class="fa fa-info fa-stack-1x "></i></span>About</a>
                </li>
                <li>
                    <a href="../redirect.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-sign-out fa-stack-1x "></i></span>Logout</a>
                </li>
            </ul>
        
    </div><!-- /#sidebar-wrapper -->
     <div id="container">
    <div id="page-content-wrapper" class = "content-wrapper">
            <div class="container-fluid xyz">
	           <div class="row">
                    <div class="col-sm-4 col-lg-12">
                        <?php
                            include "../db.php";
                            $title=$_POST["title"];
                            $usr=$_SESSION["cri_user"];
                            date_default_timezone_set("Asia/Kolkata");
                            $descr=$_POST["description"];
                            $start=$_POST["start"];
                            $sdate=date("Y-m-d",strtotime($start));
                            $end=$_POST["end"];
                            $edate=date("Y-m-d",strtotime($end));
                            $date=date('Y-m-d H:i:s');
                            $sql="insert into events (maker,title,description,startdate,enddate,addeddate) values('$usr','$title','$descr','$sdate','$edate','$date')";
                            if($end==null||$end=="")
                            {
                                $edate=$sdate;
                            }
                            $make=mysqli_query($conn,$sql);
                            if($make)
                            {
                                echo "Entry made successfully";
                            }   
                                else
                                    echo "Error occured! please try again";
                            
                    ?>
                </div>
        </div>
    </div>
    </div>    
    </div></div>
     <script src="../js/jquery.min.js"></script>
    <script src="../js/sidebar-menu.js"></script>
<!-- Latest compiled JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.sparkline.min.js"></script>
    
</body>
</html>
<?php
}
else
{
    $_SESSION["title"]="out";
    header('location:../index.php');
}
?>