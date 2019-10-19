<?php
require_once('db.info.php');
session_start();
print_r($_POST);echo"</br>SESSION:";
print_r($_SESSION);
try{
    $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
	if(isset($_POST['update_view_select'])){
	echo "here";
		if($_POST['view_type']=="news"){
			
			$_SESSION['view_type']="news";
			
			
		}else{
			$_SESSION['view_type']="events";
			
		}
	}
	if(isset($_POST['update_news'])){
		//update news here
		//UPDATE `news` SET `id`=[value-1],`title`=[value-2],`content`=[value-3],`link`=[value-4],`updated`=[value-5]
		print_r("In the news update section");
		$sql="UPDATE `news` SET `title`=?,`content`=?,`link`=? WHERE `id`=$_POST[update_news]";
    $stmt=$db->prepare($sql);
    if($stmt->execute(array($_POST['title'],htmlentities($_POST['content']),htmlentities($_POST['link'])))){
		$_SESSION['updated']=1;
	}else{
		$_SESSION['updated']=0;
	}
    $stmt->closeCursor();
	}else if(isset($_POST['update_events'])){
		//update news here
		//UPDATE `news` SET `id`=[value-1],`title`=[value-2],`content`=[value-3],`link`=[value-4],`updated`=[value-5]
		print_r("In the events update section");
		$sql="UPDATE `events` SET `content`=?,`link`=? WHERE `id`=$_POST[update_events]";
    $stmt=$db->prepare($sql);
    if($stmt->execute(array(htmlentities($_POST['content']),htmlentities($_POST['link'])))){
		$_SESSION['updated']=1;
	}else{
		$_SESSION['updated']=0;
	}
    $stmt->closeCursor();
	}
	?>
<div class="form-group">
<form action="test.php" method="POST">
<div class="radio">
<div class="form-group">
<label>
<input type="radio" name="view_type" id="optionsRadios1" value="news" checked />
News
</label>
<label>
<input type="radio" name="view_type" id="optionsRadios1" value="events" />
Event
</label>

</div>
</div>
<button type="submit" class="btn btn-success btn-lg" value="update_view_select" name="update_view_select">Submit</button>
</form>
<hr/>

<?php
if(isset($_SESSION['view_type'])&&$_SESSION['view_type']=="news"){
$sql="SELECT `id`,`title`,`content`,`link` FROM news";
$stmt=$db->prepare($sql);
$stmt->execute();
while($e=$stmt->fetch()){
	//print_r($e);
	echo "<hr/>";
?>
<form action="test.php" method="POST">											
<div class="form-group">
<label for="email">Title</label>
<input type="text" class="form-control" name="title" value="<?php echo $e['title']; ?>">
</div>
<div class="form-group">
<label for="email">Content</label>
<input type="text" class="form-control" name="content" value="<?php echo $e['content']; ?>">
</div>
<div class="form-group">
<label for="email">Link</label>
<input type="text" class="form-control" name="link" value="<?php echo $e['link']; ?>">
</div>
<button type="submit" class="btn btn-success btn-lg" name="update_news" value="<?php echo $e['id']; ?>"></button>
<hr/>
</form>
<?php
}
$stmt->closeCursor();
}else 
/**********new changes **********************/
if(isset($_SESSION['view_type'])&&$_SESSION['view_type']=="events"){
$sql="SELECT `id`,`content`,`link` FROM events";
$stmt=$db->prepare($sql);
$stmt->execute();
while($e=$stmt->fetch()){
	//print_r($e);
	echo "<hr/>";
?>
<form action="test.php" method="POST">											
<div class="form-group">
<label for="email">Content</label>
<input type="text" class="form-control" name="content" value="<?php echo $e['content']; ?>">
</div>
<div class="form-group">
<label for="email">Link</label>
<input type="text" class="form-control" name="link" value="<?php echo $e['link']; ?>">
</div>
<button type="submit" class="btn btn-success btn-lg" name="update_events" value="<?php echo $e['id']; ?>"></button>
<hr/>
</form>
<?php
}
$stmt->closeCursor();
}
									//}//if-else for news/event selection
										?>
									</div>
