<?php
session_start();
echo "</br>SESSION:";print_r($_SESSION);
echo "</br>POST:";print_r($_POST);
echo "</br>FILES:";print_r($_FILES);
require_once('db.info.php');
require_once('../include/php_image_magician.php');
try{
    $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}

if(isset($_POST['submit']) && $_POST['submit']=="insert"){
	$dir="../../images/events";
 if (!file_exists($dir) and !is_dir($dir)) {
    mkdir($dir);         
}
 
 if($_FILES['image']['size']==0)
 {
  echo "Invalid upload!!";
   $_SESSION['status']="Invalid upload";
  header('Location:../presentation/events.php');
 
  }
  
  
  //get info from the form
  $title=htmlentities($_POST['title']);
  $pic=htmlentities($_FILES['image']['name']);
  $rpic=md5($pic);
  $caption=htmlentities($_POST['caption']);
  $link=htmlentities($_POST['link']);
 $savein="../../images/events/";
 $savein=$savein.basename($rpic.".jpg");
  
  // connect to db
try{
    $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
$sql="INSERT INTO `ce`.`events` (`title`, `caption`,`link`, `Img_ref`) VALUES (?,?,?,?)";
$stmt=$db->prepare($sql);
 if($stmt->execute(array($title,$caption,$link,$rpic))){
 
			if(move_uploaded_file($_FILES['image']['tmp_name'],$savein))
				  {
					 echo "<br>The image ". basename( $_FILES['image']['name']). " has been uploaded."; 
					 $_SESSION['status']="uploaded";
					 
					 /** resize the image **/
						 $magicianObj = new imageLib($savein);
						 $magicianObj -> resizeImage(368, 256);
						 $magicianObj -> saveImage($savein, 100);
					 header('Location:../presentation/events.php');
				 } else { 
		 
				 //Gives and error if its not 
				 
				 $_SESSION['status']="not uploaded";
				 header('Location:../presentation/events.php');
				}
 }else{$_SESSION['status']="not uploaded";
 header('Location:../presentation/events.php');
 }
 $stmt->closeCursor();
// echo $savein;

 header('Location:../presentation/events.php'); 
}else if(isset($_POST['update'])){
	 $sql="UPDATE `events` SET `title`=?,`caption`=?,`link`=? WHERE `id`=?";
    $stmt=$db->prepare($sql);
    if($stmt->execute(array(htmlentities($_POST['title']),htmlentities($_POST['caption']),htmlentities($_POST['link']),htmlentities($_POST['update'])))){
		
		if(isset($_FILES['image']) && $_FILES['image']['size']==0){
		$_SESSION['status']="updated";
		$stmt->closeCursor();
		echo "here";
		header('Location:../presentation/events.php');
		}else if($_FILES['image']['size']>0){
				
				$dir="../../images/events";
				 if (!file_exists($dir) and !is_dir($dir)) {
					mkdir($dir);         
				}
				 //get info from the form
				 /*delete the previous image */
				 $sql="SELECT `img_ref` FROM events WHERE `id`=?";
			$stmt=$db->prepare($sql);
			$stmt->execute(array(htmlentities($_POST['update'])));
			$e=$stmt->fetch();
			$path="../../images/events/".$e['img_ref'].".jpg";
			if(unlink ($path)){ echo "previous image deleted";}else{ echo "Error deleting previous image";}  
				$pic=htmlentities($_FILES['image']['name']);
				$rpic=md5($pic);
				
				
				 $savein="../../images/events/";
				 $savein=$savein.basename($rpic.".jpg");
				 
				 if(move_uploaded_file($_FILES['image']['tmp_name'],$savein))
					  {
						 echo "<br>The image ". basename( $_FILES['image']['name']). " has been uploaded."; 
						 /** resize the image **/
						 $_SESSION['status']="uploaded";
						 header('Location:../presentation/events.php');
						 
						
							
					 }else{
					 
							 $_SESSION['status']="not uploaded";
							header('Location:../presentation/events.php');
						 } 
					
					
					$sql="UPDATE `events` SET `img_ref`=? WHERE `id`=?";
					$stmt=$db->prepare($sql);
					if($stmt->execute(array(htmlentities($rpic),htmlentities($_POST['update'])))){
						
						$_SESSION['status']="uploaded";
						header('Location:../presentation/events.php');
					}else{
						$_SESSION['status']="not uploaded";
						header('Location:../presentation/events.php');
					}
		}
	}else{
		$_SESSION['status']="not updated";
		$stmt->closeCursor();
		header('Location:../presentation/events.php');
	}
}else if(isset($_POST['delete'])){

	

		//echo "for deletion </br></br>";
		//print_r($_POST);
	    foreach($_POST['delete_items'] as $val){
			$sql="SELECT `img_ref` FROM events WHERE `id`=?";
			$stmt=$db->prepare($sql);
			$stmt->execute(array(htmlentities($val)));
			$e=$stmt->fetch();
			$path="../../images/events/".$e['img_ref'].".jpg";
			$sql="DELETE FROM `events` WHERE `id`=?";
			$stmt=$db->prepare($sql);
			if($stmt->execute(array(htmlentities($val)))){
				if(unlink ($path)){
				
				$_SESSION['status']="deleted";
				header('Location:../presentation/events.php');
				}else{
				$_SESSION['status']="not deleted";		
				header('Location:../presentation/events.php');
				}
			}else{
				$_SESSION['status']="not deleted";		
				header('Location:../presentation/events.php');
			}
			
	
}
$stmt->closeCursor();
}    
?>