<?php
require_once('../../include/db.info.php');
?>
<!DOCTYPE HTML>
<!--

thanks to:
	Lens by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Website Title here</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading-0 is-loading-1 is-loading-2">

		<!-- Main -->
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1>Gallery</h1>
						<p><a href="../home.php">Home</a></p>
						<!--<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
							<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>-->
					</header>

				<!-- Thumbnail -->
				
					<section id="thumbnails">
						<?php
try{
						$db=new PDO(DbInfo,DbUser,DbPwd);
						 }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
						$sql="SELECT `title`,`link`,`caption`,`img_ref` FROM gallery";
						$stmt=$db->prepare($sql);
						$stmt->execute();
						while($e=$stmt->fetch()){
					
?>
						<article>
							<a class="thumbnail" href="../../images/gallery/full/<?php echo $e['img_ref']; ?>.jpg" data-position="left center"><img src="../../images/gallery/thumbs/<?php echo $e['img_ref']; ?>.jpg" alt="<?php echo $e['title']; ?>" /></a>
							<h2><?php echo $e['title']; ?></h2>
							<p><?php echo $e['caption']; ?></p>
						</article>
						<?php
						}
						?>
					</section>

				<!-- Footer -->
					<!-- <footer id="footer">
						<ul class="copyright">
							MIT License
						</ul>
					</footer> -->

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>