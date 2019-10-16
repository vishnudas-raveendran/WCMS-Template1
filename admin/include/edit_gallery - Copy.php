<?php
session_start();
//print_r($_SESSION);
//print_r($_POST);
require_once('db.info.php');
require_once('../php_image_magician.php');
try{
    $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}

if(isset($_POST['update'])){
	 $sql="UPDATE `gallery` SET `title`=?,`caption`=?,`name`=? WHERE `id`=?";
    $stmt=$db->prepare($sql);
    if($stmt->execute(array($_POST['title'],htmlentities($_POST['caption']),htmlentities($_POST['name']),htmlentities($_POST['update'])))){
		
		if(!isset($_FILES['image']) && $_FILES['image']['size']==0){
		$_SESSION['status']="updated";
		$stmt->closeCursor();
		header('Location:../presentation/gallery.php');
		}else if($_FILES['image']['size']>0){
				
				$dir="../../images/gallery";
				 if (!file_exists($dir) and !is_dir($dir)) {
					mkdir($dir);         
				}
				 
				 /*delete the previous image */
				 $sql="SELECT `img_ref` FROM gallery WHERE `id`=?";
			$stmt=$db->prepare($sql);
			$stmt->execute(array(htmlentities($_POST['update'])));
			$e=$stmt->fetch();
			$path="../../images/gallery/".$e['img_ref'].".jpg";
			if(unlink ($path)){ echo "previous image deleted";}else{ echo "Error deleting previous image";}  
			//get info from the form
				  $pic=htmlentities($_FILES['image']['name']);
				  $rpic=md5($pic);
				
				 $savein="../../images/gallery/";
				 $savein=$savein.basename($rpic.".jpg");
				 $sql="UPDATE `gallery` SET `img_ref`=? WHERE `id`=?";
				 if(move_uploaded_file($_FILES['image']['tmp_name'],$savein))
					  {
						  
						 echo "<br>The image ". basename( $_FILES['image']['name']). " has been uploaded."; 
							
					 }else{
					 
							 $_SESSION['status']="not uploaded";
							header('Location:../presentation/gallery.php');
						 } 
					}
					$stmt=$db->prepare($sql);
					if($stmt->execute(array(htmlentities($rpic),htmlentities($_POST['update'])))){
						$_SESSION['status']="uploaded";
						header('Location:../presentation/gallery.php');
					}else{
						$_SESSION['status']="not uploaded";
						header('Location:../presentation/gallery.php');
					}
		}
	else{
		$_SESSION['status']="not updated";
		$stmt->closeCursor();
		header('Location:../presentation/gallery.php');
	}
}else if(isset($_POST['delete'])){

	

		//echo "for deletion </br></br>";
		//print_r($_POST);
	    foreach($_POST['delete_items'] as $val){
			$sql="SELECT `img_ref` FROM gallery WHERE `id`=?";
			$stmt=$db->prepare($sql);
			$stmt->execute(array(htmlentities($val)));
			$e=$stmt->fetch();
			$path="../../images/gallery/".$e['img_ref'].".jpg";
			$sql="DELETE FROM `gallery` WHERE `id`=?";
			$stmt=$db->prepare($sql);
			if($stmt->execute(array(htmlentities($val)))){
				if(unlink ($path)){
				
				$_SESSION['status']="deleted";
				header('Location:../presentation/gallery.php');
				}else{
				$_SESSION['status']="not deleted";		
				header('Location:../presentation/gallery.php');
				}
				
			}else{
				$_SESSION['status']="not deleted";		
				header('Location:../presentation/gallery.php');
			}
			
	
}
$stmt->closeCursor();
}    
?>