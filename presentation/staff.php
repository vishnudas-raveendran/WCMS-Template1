<?php 
$page="staff";
require_once('../include/header.php');
$sql="SELECT * FROM faculty ORDER BY experience DESC";
$stmt=$db->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll();
?>
<div class="about-section">
				<div class="container">
						<div class="about-grid">
						<h3 align="center" style="color:#747474"> Staff Profile </h3></br></br>
						</div>
				</div>
				<div align="center" style="color:grey">
							<?php 
							if(!$data){
								echo "Would be updated shortly...";
							}
							?>
				</div>
			</div>


	   <div class="container">
	   	 <div class="faculty_top">
		 <?php
			while($data && $e=$stmt->fetch())
				{ 
				$i=1;
		 ?>
	   	  <div class="col-md-4 faculty_grid">
	   	  	<figure class="team_member">
	   	  		<img src="../images/faculty/<?php echo $e['img_ref'];?>.jpg" style="max-width=290 max-height=193" class="img-responsive wp-post-image" alt="<?php echo $e['name'];?>"/>
	   	  		<div></div>
	   	  		<figcaption><h3 class="person-title"><?php echo $e['name'];?></h3>
					<p>Designation: <?php echo $e['designation'];?></p></br>
	   	  			<span class="person-deg"><?php echo $e['qualifications'];?></span>
	   	  			<p>E-mail: <a href="mailto:<?php echo $e['email'];?>"><?php echo $e['email'];?></a></p></br>
					<p>Specialisation: <?php echo $e['aos']; ?></p></br>
	   	  			<p>Experience: <?php echo $e['experience']; ?></p></br>
	   	  		</figcaption>
	   	  	 </figure>
	   	  </div>
	   	 <?php
			if($i==4){
	   	  echo "<div class=\"clearfix\"> </div>";
		  }
		  }
		  ?>
	   	 </div>
	   	 
	   	 
	   	 
	  </div>
		




<?php require_once('../include/footer.php');?>