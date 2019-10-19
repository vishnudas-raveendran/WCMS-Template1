<?php
$page="staff";
require_once('../include/header.php');
require_once('../include/edit_staff.php');
require_once('../include/status.php');
if(isset($_SESSION['loggedin'])){
header('Location:../index.php');

}
?>
<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Staff</h4>

                </div>

            </div>
			<?php 
			if(isset($_SESSION['status'])){
			  print $_SESSION['status_message'];
			  unset($_SESSION['status']);
			  unset($_SESSION['status_message']);
			}
			
			?>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 ">
						<div class="panel panel-default">
							<div class="panel-heading">
								Editor+
							</div>
							<div class="panel-body">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#insert" data-toggle="tab">Insert</a>
									</li>
									<li class=""><a href="#update" data-toggle="tab">Update</a>
									</li>
									<li class=""><a href="#delete" data-toggle="tab">Delete</a>
									</li>
									<li class=""><a href="#view" data-toggle="tab">View</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="insert">
										<!-- tab data for insert -->
											
											<form enctype="multipart/form-data" action="staff.php" method="post">
												<h4>New staff</h4>
												<div class="form-group">
												<label for="text">Name</label>
												<input type="text" class="form-control" name='name' placeholder="Name of the faculty" required />
												</div>
												<div class="form-group">
												<label for="text">Designation</label>
												<input type="text" class="form-control" name='desig' placeholder="Designation" required />
												</div>
												<div class="form-group">
												<label for="number">Experience</label>
												<input type="integer" class="form-control" name='exp' placeholder="Experience" />
												</div>
												<div class="form-group">
												<label for="text">Qualifications</label>
												<input type="text" class="form-control" name='qlfn' placeholder="qualifications of the faculty" required />
												</div>
												<div class="form-group">
												<label for="text">Area of Specialisation</label>
												<input type="text" class="form-control" name='aos' placeholder="Area of Specialisation" required />
												</div>
												<div class="form-group">
												<label for="tel">Phone</label>
												<input type="number_format" class="form-control" name='phone' placeholder="Phone" />
												</div>
												<div class="form-group">
												<label for="email">Email</label>
												<input type="email" class="form-control" name='email' placeholder="Email"/>
												</div>
												<div class="form-group">
												<label for="file">Image of faculty</label>
												<input type="file" name="image"> 
												</div>
												<button type="submit" class="btn btn-success btn-lg" name="submit" value="add_staff">Submit</a>
											</form>
											
										<!-- tab data end for insert -->
									</div>
									<div class="tab-pane fade" id="update">
										<!-- tab data for update -->
											<div class="panel panel-default">
												<div class="panel-heading">
													Update Staff
												</div>
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>Sl. no.</th>
																	<th>Name</th>
																	<th>Designation</th>
																	<th>Experience</th>
																	<th>Qualification</th>
																	<th>Area of Specialisation</th>
																	<th>Phone</th>
																	<th>Email</th>
																	<th>Image</th>
																	<th>Change Image</th>
																	<th>Update</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	$sql="SELECT `id`, `name`, `experience`,`designation`, `qualifications`, `aos`, `phone`, `email`, `img_ref` FROM `faculty`";
																	$stmt=$db->prepare($sql);
																	$stmt->execute();
																	$i=1;
																	while($e=$stmt->fetch()){
																
																?>
																<form enctype="multipart/form-data" action="staff.php" method="post">
																	<tr>
																		<td><?php echo $i; ?></td>
																		<td><input type="text" name="name" value="<?php echo $e['name']; ?>" required ></td>
																		<td><input type="text" name="desig" value="<?php echo $e['designation']; ?>" required ></td>
																		<td><input type="number" name="exp" min="0" step="1" value="<?php echo $e['experience']; ?>"></td>
																		<td><input type="text" name="qlfn" value="<?php echo $e['qualifications']; ?>"></td>
																		<td><input type="text" name="aos" value="<?php echo $e['aos']; ?>"></td>
																		<td><input type="tel" name="phone" value="<?php echo $e['phone']; ?>"></td>
																		<td><input type="email" name="email" value="<?php echo $e['email']; ?>"></td>
																		<td>
																		<img src="../../images/faculty/<?php echo $e['img_ref']?>.jpg" width="100" height="100"></td>
																		
																		<td><input type="file" name="image"> </td>
																		<td><button type="submit" class="btn btn-success btn-sm" name="update" value="<?php echo $e['id'];?>">Update</button></td>
																	</tr>
																</form>
															
											<?php
											$i++;
											}
											$stmt->closeCursor();
											?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										<!-- tab data for update -->
									</div>
									<div class="tab-pane fade" id="delete">
										<!-- tab data for deletion -->
											<div class="panel panel-default">
												<div class="panel-heading">
													Delete Staff
												</div>
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>Select</th>
																	<th>Sl no.</th>
																	<th>Name</th>
																	<th>Designation</th>
																	<th>Experience</th>
																	<th>Qualification</th>
																	<th>Specialisation</th>
																	<th>Email</th>
																	<th>Image</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	$sql="SELECT `id`,`designation`, `name`, `experience`, `qualifications`, `aos`, `email`, `img_ref` FROM `faculty`";
																	$stmt=$db->prepare($sql);
																	$stmt->execute();$i=1;
																	while($e=$stmt->fetch()){
																
																?>
																<form action="staff.php" method="post">
																	<tr>
																		<td><input type="checkbox" name="delete_items[]" value="<?php echo $e['id']; ?>"></td>
																		<td><?php echo $i; ?></td>
																		<td><?php echo $e['name']; ?> </td>
																		<td><?php echo $e['designation']; ?> </td>
																		<td><?php echo $e['experience']; ?></td>
																		<td><?php echo $e['qualifications']; ?></td>
																		<td><?php echo $e['aos']; ?></td>
																		<td><?php echo $e['email']; ?></td>
																		<td><img src="../../images/faculty/<?php echo $e['img_ref']?>.jpg" width="100" height="100"></td>
																	</tr>
																
															
											<?php
											}
											$stmt->closeCursor();
											?>
															</tbody>
														</table>
														<button type="submit" class="btn btn-success btn-lg" name="delete" value="delete">Delete selected</button>
														</form>
													</div>
												</div>
											</div>
										<!-- tab data for deletion -->
									</div>
									<div class="tab-pane fade" id="view">
										<!-- tab data for view -->
											<div class="panel panel-default">
												<div class="panel-heading">
													Staff list
												</div>
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	
																	<th>Sl.no.</th>
																	<th>Name</th>
																	<th>Designation</th>
																	<th>Experience</th>
																	<th>Qualification</th>
																	<th>Specialisation</th>
																	<th>Phone</th>
																	<th>Email</th>
																	<th>Image</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	$sql="SELECT `id`, `name`,`designation`, `experience`, `qualifications`, `aos`,`phone`, `email`, `img_ref` FROM `faculty`";
																	$stmt=$db->prepare($sql);
																	$stmt->execute();
																	$i=0;
																	while($e=$stmt->fetch()){
																
																?>
																<form action="staff.php" method="post">
																	<tr>
																		<td><?php $i++;echo $i; ?></td>
																		<td><?php echo $e['name']; ?></td>
																		<td><?php echo $e['designation']; ?></td>
																		<td><?php echo $e['experience']; ?></td>
																		<td><?php echo $e['qualifications']; ?></td>
																		<td><?php echo $e['aos']; ?></td>
																		<td><?php echo $e['phone']; ?></td>
																		<td><?php echo $e['email']; ?></td>
																		<td><img src="../../images/faculty/<?php echo $e['img_ref']?>.jpg" width="100" height="100"></td>
																	</tr>
																</form>
															
																<?php
																}
																$stmt->closeCursor();
																?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										<!-- tab data ends for view -->
									</div>
							    </div>
							<!-- closing div tags of main tags -->
							</div>
						</div>
					</div>
				</div>
			</div>
<?php require_once('../include/footer.php');?>