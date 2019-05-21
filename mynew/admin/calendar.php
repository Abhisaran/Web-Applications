<?php
session_start();
?>
<?php
if(array_key_exists("cri_user",$_SESSION)||isset($_SESSION["cri_user"]))
{
include "../db.php";
$file=fopen("events.xml","r+");
date_default_timezone_set("Asia/Kolkata");
$date=date("Y-m-d");
$sql="select distinct * from events";
function dateDiff($start,$end)
{
  $start_ts=strtotime($start);
  $end_ts=strtotime($end);
  $diff=$end_ts-$start_ts;
  return round($diff/86400);
}
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

for($i=0;$i<$count;$i++)
{
while($row=mysqli_fetch_assoc($result)){
    if(date('Y-m-d')<$row["startdate"]&&(dateDiff(date('Y-m-d'),$row["enddate"])<=30))
    {
        fseek($file,-11,SEEK_END);
        $write1="\n"."<event>"."\n";
        fwrite($file,$write1);
        $write2="<id>".$row["id"]."</id>"."\n";
        fwrite($file,$write2);
        $write3="<name>".$row["title"]."</name>"."\n";
        fwrite($file,$write3);
		$write4="<startdate>".$row["startdate"]."</startdate>"."\n";
		fwrite($file,$write4);
        $write5="<enddate>".$row["enddate"]."</enddate>"."\n";
        fwrite($file,$write5);
		$write6="<starttime></starttime>"."\n"."<endtime></endtime>"."\n"."<color>#9f4b99</color>"."\n"."<url></url>"."\n"."</event>"."\n"."</monthly>"."\n";
        fwrite($file,$write6);
        
    }
}
}
fclose($file);

    ?>
<html>
<head>
    <title>Calendar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel="stylesheet" type="text/css">
    	<style type="text/css">
		
		h1 {
		
			text-align: center;
			font-size: 77px;
			text-shadow: 0 0px 30px rgba(0, 0, 0, 0.2);
		}
		h2 {
		
			font-size:30px;
			text-shadow: 0 0px 20px rgba(0, 0, 0, 0.3);
			color:#fff;
		}
		

		input[type="text"] {
			padding: 15px;
			border-radius: 2px;
			font-size: 16px;
			outline: none;
			border: 2px solid rgba(255, 255, 255, 0.5);
			background: rgba(63, 78, 100, 0.27);
			color: #fff;
			width: 250px;
			box-sizing: border-box;
			font-family: "Trebuchet MS", Helvetica, sans-serif;
		}
		input[type="text"]:hover {
			border: 2px solid rgba(255, 255, 255, 0.7);
		}
		input[type="text"]:focus {
			border: 2px solid rgba(255, 255, 255, 1);
			background:#eee;
			color:#222;
		}

		.button {
			display: inline-block;
			padding: 15px 25px;
			margin: 25px 0 75px 0;
			border-radius: 3px;
			color: #fff;
			background: #000;
			letter-spacing: .4em;
			text-decoration: none;
			font-size: 13px;
		}
		.button:hover {
			background: #3b587a;
		}
		.desc {
			max-width: 250px;
			text-align: left;
			font-size:14px;
			padding-top:30px;
			line-height: 1.4em;
		}
		.resize {
			background: #222;
			display: inline-block;
			padding: 6px 15px;
			border-radius: 22px;
			font-size: 13px;
		}
		@media (max-height: 700px) {
			.sticky {
				position: relative;
			}
		}
		@media (max-width: 600px) {
			.resize {
				display: none;
			}
		}
	</style>
	<link rel="stylesheet" href="../css/monthly.css">
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

        <div class = "navbar-header">Calendar</div>

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
                
                <li>
                    <a href="mee.html"><span class="fa-stack fa-lg pull-left"><i class="fa fa-pencil fa-stack-1x "></i></span>Make event entry</a>
                </li>
                <li class="pr_active">
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-calendar fa-stack-1x "></i></span>Calendar</a>
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
                        <center>
                    <div class="page">
		<div style="width:100%; max-width:600px; display:inline-block;">
			<div class="monthly" id="mycalendar"></div>
		</div>
		
                            </div></center>
                    
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

 <script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/monthly.js"></script>
<script type="text/javascript">
	$(window).load( function() {

		$('#mycalendar').monthly({
			mode: 'event',
			//jsonUrl: 'events.json',
			//dataType: 'json'
			xmlUrl: 'events.xml'
		});

		$('#mycalendar2').monthly({
			mode: 'picker',
			target: '#mytarget',
			setWidth: '250px',
			startHidden: true,
			showTrigger: '#mytarget',
			stylePast: true,
			disablePast: true
		});

	switch(window.location.protocol) {
	case 'http:':
	case 'https:':
	// running on a server, should be good.
	break;
	}

	});
</script>
   
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