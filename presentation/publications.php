<?php 
$page="papers";
require_once('../include/header.php');
require_once('../include/db.info.php');
try{
    $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
?>


			

<div class="about-section">
				<div class="container">
						<div class="about-grid">
							<h3 align="center" style="color:#747474">Publications </h3></br></br>
								<div class="panel panel-default">
												<div class="panel-heading" align="center">
												 View Publications
												</div>
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>Sl. No.</th>
																	<th>Title</th>
																	<th>Author(s)</th>
																	<th>Publisher</th>
																	<th>Date of Publication</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	$sql="Select * FROM `papers`";
																	$stmt=$db->prepare($sql);
																	$stmt->execute();
																	$i=1;
																	while($e=$stmt->fetch()){
																
																?>
																<form action="papers.php" method="post">
																	<tr>
																		<td><?php echo $i; ?></td>
																		<td><?php echo $e['title']; ?></td>
																		<td><?php echo $e['author']; ?></td>
																		<td><?php echo $e['publisher']; ?></td>
																		<td><?php echo $e['date']; ?></td>
																	</tr>
																</form>
															
																<?php
																$i++;}
																$stmt->closeCursor();
																?>
															</tbody>
														</table>
													</div>
												</div>
								</div>
								
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
</div>



<?php require_once('../include/footer.php');?>