
<?php
$page="notifications";
require_once('../include/header.php');
require_once('../include/edit_notifications.php');
require_once('../include/status.php');
?>
	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Notifications</h4>

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
											
											<form action="notifications.php" method="post">
												<h4>New Notification</h4>
												<div class="form-group">
												<label for="text">Content</label>
												<input type="text" class="form-control" name='content' placeholder="Content of notification" required />
												</div>
												<div class="form-group">
												<label for="text">Link[optional]</label>
												<input type="text" class="form-control" name='link' placeholder="Link for the notification" />
												</div>
												<button type="submit" class="btn btn-success btn-lg" name="submit" value="add_nfc">Submit</a>
											</form>
											
										<!-- tab data end for insert -->
									</div>
									<div class="tab-pane fade" id="update">
										<!-- tab data for update -->
											<div class="panel panel-default">
												<div class="panel-heading">
													Notifications
												</div>
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>Notification_id</th>
																	<th>Content</th>
																	<th>Link</th>
																	<th>Last updated</th>
																	<th>update</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	$sql="Select `id`,`content`,`link`,`updated` FROM `notifications`";
																	$stmt=$db->prepare($sql);
																	$stmt->execute();
																	while($e=$stmt->fetch()){
																
																?>
																<form action="notifications.php" method="post">
																	<tr>
																		<td><?php echo $e['id']; ?></td>
																		<td><input type="text" name="content" value="<?php echo $e['content']; ?>" required ></td>
																		<td><input type="text" name="link" value="<?php echo $e['link']; ?>"></td>
																		<td><?php echo $e['updated']; ?></td>
																		<td><button type="submit" class="btn btn-success btn-sm" name="update" value="<?php echo $e['id'];?>">Update</button></td>
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
										<!-- tab data for update -->
									</div>
									<div class="tab-pane fade" id="delete">
										<!-- tab data for deletion -->
											<div class="panel panel-default">
												<div class="panel-heading">
													Notifications
												</div>
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>Select</th>
																	<th>Notification_id</th>
																	<th>Content</th>
																	<th>Link</th>
																	<th>Last updated</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	$sql="Select `id`,`content`,`link`,`updated` FROM `notifications`";
																	$stmt=$db->prepare($sql);
																	$stmt->execute();
																	while($e=$stmt->fetch()){
																
																?>
																<form action="notifications.php" method="post">
																	<tr>
																		<td><input type="checkbox" name="delete_items[]" value="<?php echo $e['id']; ?>"></td>
																		<td><?php echo $e['id']; ?></td>
																		<td><?php echo $e['content'];?></td>
																		<td><a href="<?php echo $e['link']; ?>"><?php echo $e['link']; ?></a></td>
																		<td><?php echo $e['updated']; ?></td>
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
													Notifications
												</div>
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>Notification_id</th>
																	<th>Content</th>
																	<th>Link</th>
																	<th>Last updated</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	$sql="Select `id`,`content`,`link`,`updated` FROM `notifications`";
																	$stmt=$db->prepare($sql);
																	$stmt->execute();
																	while($e=$stmt->fetch()){
																
																?>
																<form action="notifications.php" method="post">
																	<tr>
																		<td><?php echo $e['id']; ?></td>
																		<td><?php echo $e['content']; ?></td>
																		<td><a href="<?php echo $e['link']; ?>"><?php echo $e['link']; ?></a></td>
																		<td><?php echo $e['updated']; ?></td>
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