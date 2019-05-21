<?php
session_start();
?>
<?php
if(array_key_exists("user",$_SESSION)||isset($_SESSION["user"]))
{
    ?>
<html>
<head>
    <title><?php echo $_SESSION["title"];?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard-time.css"> 
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

        <div class = "navbar-header">Dashboard</div>

    </nav>
 <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
            <div class="sidebar-col">
                <img src = "user/default.png" class="sidebar-img"/></div>
            
                <li class="active">
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a>
                </li>
                <li>
                    <a href="profile.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span> Profile</a>
                </li>
                <li>
                    <a href="notify.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-bell fa-stack-1x "></i></span>Notifications</a>
                </li>
                
                <li>
                    <a href="calculator.html"><span class="fa-stack fa-lg pull-left"><i class="fa fa-calculator fa-stack-1x "></i></span>Calculator</a>
                </li>
                <li>
                    <a href="calendar.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-calendar fa-stack-1x "></i></span>Calendar</a>
                </li>
                <li>
                    <a href="about.html"><span class="fa-stack fa-lg pull-left"><i class="fa fa-info fa-stack-1x "></i></span>About</a>
                </li>
                <li>
                    <a href="redirect.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-sign-out fa-stack-1x "></i></span>Logout</a>
                </li>
            </ul>
        
    </div><!-- /#sidebar-wrapper -->
     <div id="container">
    <div id="page-content-wrapper" class = "content-wrapper">
            <div class="container-fluid xyz">
                <div class="row">
                    <?php 
    include "db.php";
                    $usr=strtoupper($_SESSION["user"]);
                $sql = "select full_name from details where rollno='$usr'";
                $result=mysqli_query($conn,$sql);
                
                        $d=date("H");
                        $i=date("i");
                        if($d<12)
                        {
                            $m="Good Morning";
                        echo '<div class="panel panel-success">';
                        }
                        else if($d==12&&$i==0)
                        {
                            $m="Good Noon";
                            echo '<div class="panel panel-warning">';
                        }
                        else if($d<16)
                        {
                            $m="Good Afternoon";
                            echo '<div class="panel panel-info">';
                        }
                        else if($d<20)
                        {
                            $m="Good Evening";
                            echo '<div class="panel panel-danger">';
                        }
                        else
                        { $m="Good Night";
                         echo '<div class="panel panel-primary">';
                        }
    ?>
                    
                    <div class="panel-heading"><i class="fa fa-circle fa-2x"></i><h1 class="panel-title" style="text-align:center;font-size:19px;"><?php while($row=mysqli_fetch_assoc($result)){echo $m.", ".$row["full_name"];}?></h1></div></div>
                
        <div class="row">
                    <div class="col-sm-4 col-lg-12">
                        <div class="panel panel-success" style="background-color:red">
                    <div class="panel-heading"><i class="fa fa-pin fa-2x"></i><h1 class="panel-title" style="text-align:center">
    <?php
        
        $sql = "select distinct * from events";
        $result=mysqli_query($conn,$sql);
        function dateDiff($start,$end)
        {
            $start_ts=strtotime($start);
            $end_ts=strtotime($end);
            $diff=$end_ts-$start_ts;
            return round($diff/86400);
        }
        $count=mysqli_num_rows($result);
        
                        ?></h1>
                            </div>
                        </div>
            </div>
        </div>
                <div id="row">
                <div class="col-sm-4 col-lg-6">
                <center>
                            <div class="col-sm-4 col-lg-6">
                        <div class="panel panel-title bg-red" style="height:90px; width:auto; color:white; padding:25px;background-color:red;border-radius:5px;">
                        
                                <i class="fa fa-calendar fa-3x"> </i>
                            </div>
                            <div class="col-sm-4 col-lg-6">
                                 <div class="panel panel-title bg-red" style=" color:black; padding:25px;background-color:white;border-radius:5px;">
                        
                                </div>
                                    
                                </div></div>
                        </center>
                        
                    </div>
                    </div>
                <div class="col-sm-4 col-lg-6">
                <center>
                <div class="col-sm-4 col-lg-6">
                    <div class="panel panel-title bg-red"style="height:90px; color:white; padding:25px;background-color:green;border-radius:5px;">
                         <i class="fa fa-bell fa-3x"> </i>
                            </div>
                            <div class="col-sm-4 col-lg-6">
                                 <div class="panel panel-title bg-red" style=" color:black; padding:25px;background-color:white;border-radius:5px;">
                        
                                </div>
                                    
                                </div></div>
                        
                    </center>
                
                    </div>
                    
                </div>
        <div class="row">
                    <div class="col-sm-4 col-lg-12">
                        <div class="panel panel-success" style="background-color:red">
                        </div>
            </div>
                </div>
                <div id="row">
                                <center><div class="panel panel-primary"><div class="panel-title">Try out calculator now!! Fix your target and know how much to score now!!!</div></div></center>
                            
                            </div>
                </div>
        </div>
    </div>
    </div>    
    
    
     <script src="js/jquery.min.js"></script>
    <script src="js/sidebar-menu.js"></script>
<!-- Latest compiled JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="js/main.js"></script>

    
</body>
</html>
<?php
}
else
{
    $_SESSION["title"]="out";
    header('location:index.php');
}
?>