<?php
session_start();
require_once('php_image_magician.php');
unset($_SESSION['status']);
//print_r($_FILES);

require_once('db.info.php');

 // dir where images are saved
 
 $dir="../../images/gallery/full";
 $dir2="../../images/gallery/thumbs";
 
 if (!file_exists($dir) and !is_dir($dir)) {
    mkdir($dir);         
}
if (!file_exists($dir2) and !is_dir($dir2)) {
    mkdir($dir2);         
}
 
 if($_FILES['image']['size']==0)
 {
  echo "Invalid upload!!";
   $_SESSION['status']="Invalid upload";
   print_r($_SESSION);
  header('Location:../presentation/gallery.php');
	exit;
  }
  
  
  //get info from the form
  $title=htmlentities($_POST['title']);
  $pic=htmlentities($_FILES['image']['name']);
  $rpic=md5($pic);
  $caption=htmlentities($_POST['caption']);
 $savein="../../images/gallery/full/";
 $savein=$savein.basename($rpic.".jpg");
  
  // connect to db
try{
    $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
$sql="INSERT INTO `ce`.`gallery` (`title`,`name`, `caption`, `Img_ref`) VALUES (?,?,?,?)";
$stmt=$db->prepare($sql);


try{
 if($stmt->execute(array($title,$pic,$caption,$rpic))){$_SESSION['status']="uploaded";}else{ $_SESSION['status']="not uploaded";}
 }catch(PDOException $err){ echo "db err:",$err->getMessage();}
 $stmt->closeCursor();
// echo $savein;
 if(move_uploaded_file($_FILES['image']['tmp_name'],$savein))
  {
     echo "<br>The image ". basename( $_FILES['image']['name']). " has been uploaded."; 
	 $file_src=$savein;
	 echo "<br/>File_src=".$file_src."</br>";
	 
	 $magicianObj = new imageLib($file_src);
	 $magicianObj -> resizeImage(220, 123);
	 $path="../../images/gallery/thumbs/";
	 $file_dest=$path.basename($rpic.".jpg");
	 echo "</br></br>Path: ".$path.basename($rpic.".jpg");
	 $magicianObj -> saveImage($file_dest, 92);
	 $_SESSION['status']="uploaded";
	 header('Location:../presentation/gallery.php');
	 
 } 
 else { 
 
 //Gives and error if its not 
 $_SESSION['status']="not uploaded";
 header('Location:../presentation/gallery.php');
 } 
 ?> 
 
 