<?php 
$page="events";
require_once('../include/header.php');
$sql="SELECT `title`,`caption`,`link`,`img_ref` FROM events";
$stmt=$db->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll();
?>


			

<div class="about-section">
				<div class="container">
						<div class="about-grid">
						<h3 align="center" style="color:#747474"> Events </h3></br></br>
							
							<div align="center" style="color:grey">
							<?php 
							if(!$data){
								echo "Would be updated shortly...";
							}
							?>
							</div>
							<!-- content for Events -->
							
							<div class="featured">
								<div class="container">
									
										<div class="featured-grids">
											
										
									<?php
									foreach($data as $e){
										
									?>

										<div class="col-md-3 featured-grid">
												<a href="<?php echo $e['link'];?>" class="mask">
											<img src="../images/events/<?php echo $e['img_ref'];?>.jpg" class="img-responsive zoom-img" alt="<?php echo $e['title'];?>"></a>
												<h4><?php echo $e['title'];?></h4>
												<p><?php echo $e['caption'];?></p>
										</div>
                                        
										<?php
										}
										$stmt->closeCursor();
										?>
										
																	
							<div class="clearfix"></div>
										</div>
								</div>
							</div>
							
							<!-- content for achievements ends -->
							
						<div class="clearfix"></div>
					</div>
				</div>
</div>



<?php require_once('../include/footer.php');?>