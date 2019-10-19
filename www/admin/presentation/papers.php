
<?php
$page="papers";
require_once('../include/header.php');
require_once('../include/edit_papers.php');
require_once('../include/status.php');
?>
	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">papers</h4>

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
											
											<form action="papers.php" method="post">
												<h4>New Publication</h4>
												<div class="form-group">
												<label for="text">Title</label>
												<input type="text" class="form-control" name='title' placeholder="Title" required />
												</div>
												<div class="form-group">
												<label for="text">Author</label>
												<input type="text" class="form-control" name='author' placeholder="author" required />
												</div>
												<div class="form-group">
												<label for="text">Publisher</label>
												<input type="text" class="form-control" name='publisher' placeholder="Publisher" required />
												</div>
												<div class="form-group">
												<label for="text">Date of publication</label>
												<input type="date" class="form-control" name='date' placeholder="Date of publication" />
												</div>
												<button type="submit" class="btn btn-success btn-lg" name="submit" value="add_nfc">Submit</a>
											</form>
											
										<!-- tab data end for insert -->
									</div>
									<div class="tab-pane fade" id="update">
										<!-- tab data for update -->
											<div class="panel panel-default">
												<div class="panel-heading">
													Update publications
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
																	$stmt->execute();$i=1;
																	while($e=$stmt->fetch()){
																	
																?>
																<form action="papers.php" method="post">
																	<tr>
																		<td><?php echo $i; ?></td>
																		<td><input type="text" name="title" value="<?php echo $e['title']; ?>" required ></td>
																		<td><input type="text" name="author" value="<?php echo $e['author']; ?>"></td>
																		<td><input type="text" name="publisher" value="<?php echo $e['publisher']; ?>"></td>
																		<td><input type="date" name="date" value="<?php echo $e['date']; ?>"></td>
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
													Delete publications
												</div>
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>Select</th>
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
																		<td><input type="checkbox" name="delete_items[]" value="<?php echo $e['id']; ?>"></td>
																		<td><?php echo $i; ?></td>
																		<td><?php echo $e['title']; ?></td>
																		<td><?php echo $e['author']; ?></td>
																		<td><?php echo $e['publisher']; ?></td>
																		<td><?php echo $e['date']; ?></td>
																	</tr>
																
															
											<?php
											$i++;
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