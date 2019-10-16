<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="robots" content="no index,no follow">
<?php session_start();
/*echo "SESSION:";print_r($_SESSION);
echo "</br>FILES:";print_r($_FILES);
echo "</br>POST:";print_r($_POST);*/
if(!isset($_SESSION['loggedin'])){
header('Location:../index.php');

}
error_reporting(0);
?>
<head>
	 <title>Admin+ | Dept. of CE</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	<!--favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="../favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
	<link rel="manifest" href="../favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="../favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	<!--favicons -->
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
   
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="../css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Sahrdaya College of Engineering and Technology</strong>
                    &nbsp;&nbsp;
                    <strong>Support: </strong>vishnudas.raveendran@gmail.com
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
					Admin+
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">
						<h1>Department of Civil Engineering</h1>
                     </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a  href="../index.php">Dashboard</a></li>
							<li>
							<a <?php if($page=="news")echo "class=\"menu-top-active\""; ?> href="news.php">News</a></li>
							<li>
							<a <?php if($page=="events")echo "class=\"menu-top-active\""; ?> href="events.php">Events</a></li>
                            <li><a <?php if($page=="gallery")echo "class=\"menu-top-active\""; ?> href="gallery.php">gallery</a></li>
                            <li><a <?php if($page=="notifications")echo "class=\"menu-top-active\""; ?> href="notifications.php">Notifications</a></li>
                             <li><a <?php if($page=="staff")echo "class=\"menu-top-active\""; ?> href="staff.php">Staff Profile</a></li>
							 
                           <!-- <li><a <?php if($page=="contact")echo "class=\"menu-top-active\""; ?> href="queries.php">View Queries</a></li> -->
							<li><a <?php if($page=="achievements")echo "class=\"menu-top-active\""; ?> href="achievements.php">Achievements</a></li>
							<li><a <?php if($page=="papers")echo "class=\"menu-top-active\""; ?> href="papers.php">Publications</a></li>
							<li><a <?php if($page=="signup")echo "class=\"menu-top-active\""; ?> href="signup.php">Create new admin</a></li>
							<li><a href="../include/signout.php">Sign out</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>