
<?php
$page="gallery";
require_once('../include/header.php');
require_once('../include/status.php');
require_once('../include/db.info.php');
if(isset($_SESSION['loggedin'])){
header('Location:../index.php');

}
//print_r($_SESSION);
//print_r($_POST);
?>
<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Gallery</h4>

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
                                <li class="active"><a href="#insert" data-toggle="tab">Upload new image</a>
                                </li>
                                <li class=""><a href="#edit" data-toggle="tab">Edit Gallery</a>
                                </li>
                                <li class=""><a href="#delete" data-toggle="tab">Delete Images</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="insert">
                                    <h4>Upload new image</h4></br>
									<div class="alert alert-info">
									Note: Please ensure that the image filenames are different while uploading to ensure images are not replaced.
									</div>
								</br>
								 <form enctype="multipart/form-data" action="../include/upload.php" method="post">
								 <div class="form-group">
								<label for="text">Title</label>
								<input type="Text" width="10" name="title" placeholder="Title" required/>
								</div>
								<div class="form-group">
								<label for="text">Caption</label>
								<input type="Text" width="10" name="caption" placeholder="caption">
								</div>
								  <div class="form-group">
								<label for="file">File</label>
								<input type="file" name="image"> 
								</div>
								 <button type="submit" class="btn btn-success btn-lg" value="update" name="update">Upload</button>
								   </form>
								</div>
							
								<!---- edit gallery  --->
								
								<div class="tab-pane fade" id="edit">
                                    <h4>Edit Gallery</h4></br>
									<div class="alert alert-info">
									Note: Please ensure that the image filenames are different while uploading to ensure images are not replaced.
									</div>
								</br>
								 <?php
						try{
						$db=new PDO(DbInfo,DbUser,DbPwd);
						 }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
						$sql="SELECT `id`,`title`,`caption`,`img_ref` FROM gallery";
						$stmt=$db->prepare($sql);
						$stmt->execute();
						?>
						
						<div class="panel panel-default">
						<div class="panel-heading">
							Gallery Items
						</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
											
                                            <th>Title</th>
                                            <th>Caption</th>
											<th>Image</th>
											<th>Choose image</th>
											<th>Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										while($e=$stmt->fetch()){
											
										?>


                                        <tr>
											<form enctype="multipart/form-data" action="../include/edit_gallery.php" method="POST">
                                            
                                            <td><input type="text" name="title" value="<?php echo $e['title']; ?>"required/></td>
                                            <td><input type="text" name="caption" value="<?php echo $e['caption']; ?>">
											</td>
											<td><img src="../../images/gallery/thumbs/<?php echo $e['img_ref']?>.jpg" width="150" height="100"></td>
											<td><input type="file" name="image"> </td>
											<td><button type="submit" class="btn btn-success btn-sm" name="update" value="<?php echo $e['id']?>">Update</button></td>
											</form>
                                        </tr>
									


<?php
}
$stmt->closeCursor();
?>
</tbody>
                                </table>
                            </div>
                        </div>
					</div>


								</div>  <!-- edit gallery tab ends here -->
								
								<!--- edit gallery ends -->
								
								
								<!-- delete gallery contents -->
								<div class="tab-pane fade" id="delete">
                                    <h4>Delete Items</h4></br>
									<div class="alert alert-info">
									Note: Please ensure that the image filenames are different while uploading to ensure images are not replaced.
									</div>
								</br>
								 <?php
						try{
						$db=new PDO(DbInfo,DbUser,DbPwd);
						 }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
						$sql="SELECT `id`,`title`,`caption`,`img_ref` FROM gallery";
						$stmt=$db->prepare($sql);
						$stmt->execute();
						?>
						
						<div class="panel panel-default">
						<div class="panel-heading">
							Gallery Items
						</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
											<th>Select</th>
											
                                            <th>Title</th>
                                            <th>Caption</th>
											<th>Image</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										while($e=$stmt->fetch()){
											
										?>


                                        <tr>
											<form action="../include/edit_gallery.php" method="POST">
											<td><input name="delete_items[]" type="checkbox" value="<?php echo $e['id']; ?>"></td>
                                            
                                            <td><?php echo $e['title']; ?></td>
                                            <td><?php echo $e['caption']; ?>
											</td>
											<td><img src="../../images/gallery/thumbs/<?php echo $e['img_ref']?>.jpg" width="150" height="100"></td>
											
                                        </tr>
									


<?php
}
$stmt->closeCursor();
?>
</tbody>
                                </table>
								<button type="submit" class="btn btn-success btn-lg" name="delete" value="<?php echo $e['id']?>">Delete</button>
								</form>
                            </div>
                        </div>
					</div>


								</div>
								
								<!-- delete gallery contents -->
							</div>
							
						</div>
					</div>
					</div>
				</div>
</div>
   
<?php require_once('../include/footer.php');?>