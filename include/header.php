<!--

Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
require_once('../include/db.info.php');
try{
    $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
?>
<!DOCTYPE HTML>
<html>
<head>

		
		<!-- Search engine meta-tags -->
		
		
		<meta name="description" content="This is the official website of the Civil engineering department of Sahrdaya College of Engineering and Technology." />
		
		<meta name="author" content="Dept. of CE">
		<meta name="robots" content="index, follow">
		<meta name="revisit-after" content="14 days">
<title>Dept. of CE | Sahrdaya College of Engineering and Technology</title>
<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="../assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Civil Engineering department, Sahrdaya College of Engineering and Technology" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="../assets/js/jquery-1.8.3.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="../assets/js/move-top.js"></script>
<script type="text/javascript" src="../assets/js/easing.js"></script>
 <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
<!---End-smoth-scrolling---->
<!-- favicon -->

<link rel="apple-touch-icon" sizes="57x57" href="../assets/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../assets/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../assets/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../assets/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../assets/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../assets/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../assets/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../assets/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../assets/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
<link rel="manifest" href="../assets/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../assets/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- favicon ends -->
		<!--navigation-->
			<div class="header">
				<div class="container">
					<div class="header-top">
						<div class="logo">
							<a href="index.html">Department of <span>Civil Engineering</span></a>
							
						</div>
						<div class="small-logo">
						<a href="http://www.sahrdaya.ac.in">Sahrdaya College of Engineering and Technology</a>
						</div>
						<div class="top-menu">
							<span class="menu"><img src="../images/nav.png" alt="menu"/> </span>
							<ul>
								<li><a href="../index.php" <?php if($page=="home"){echo "class=\"active\"";}?>>home</a></li>
								<li><a href="vam.php" <?php if($page=="vam"){echo "class=\"active\"";}?>>Vision and Mission</a></li>
								
								<li><a href="academics.php" <?php if($page=="acad"){echo "class=\"active\"";}?>>Academics</a></li>
								
								<li><a href="publications.php" <?php if($page=="papers"){echo "class=\"active\"";}?>>Publications</a></li>
								<li><a href="achievements.php" <?php if($page=="ach"){echo "class=\"active\"";}?>>Achievements</a></li>
								<li><a href="facilities.php" <?php if($page=="fac"){echo "class=\"active\"";}?>>facilities</a></li>
								<li><a href="staff.php" <?php if($page=="staff"){echo "class=\"active\"";}?>>Staff Profile</a></li>
								<li><a href="gallery/" <?php if($page=="gallery"){echo "class=\"active\"";}?>>Gallery</a></li>
								<li><a href="news.php" <?php if($page=="news"){echo "class=\"active\"";}?>>News</a></li>
								<li><a href="events.php" <?php if($page=="events"){echo "class=\"active\"";}?>>Events</a></li>
								<!--<li><a href="contact.php" <?php if($page=="contact"){echo "class=\"active\"";}?>>Contact us</a></li>-->
							</ul>
						</div>
						 <!--script-nav-->
						 <script>
						 $("span.menu").click(function(){
						 $(".top-menu ul").slideToggle("slow" , function(){
						 });
						 });
						 </script>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		<!--navigation-->
</head>