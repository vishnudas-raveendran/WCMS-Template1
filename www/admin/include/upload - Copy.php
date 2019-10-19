<?php
session_start();
unset($_SESSION['status']);
//print_r($_FILES);

require_once('db.info.php');

 // dir where images are saved
 
 $dir="../../images/gallery";
 
 if (!file_exists($dir) and !is_dir($dir)) {
    mkdir($dir);         
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
 $savein="../../images/gallery/";
 $savein=$savein.basename($rpic.".jpg");
  
  // connect to db
try{
    $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
$sql="INSERT INTO `gse`.`gallery` (`title`,`name`, `caption`, `Img_ref`) VALUES (?,?,?,?)";
$stmt=$db->prepare($sql);


try{
 if($stmt->execute(array($title,$pic,$caption,$rpic))){$_SESSION['status']="uploaded";}else{ $_SESSION['status']="not uploaded";}
 }catch(PDOException $err){ echo "db err:",$err->getMessage();}
 $stmt->closeCursor();
// echo $savein;
 if(move_uploaded_file($_FILES['image']['tmp_name'],$savein))
  {
     echo "<br>The image ". basename( $_FILES['image']['name']). " has been uploaded."; 
	 $_SESSION['status']="uploaded";
	 header('Location:../presentation/gallery.php');
 } 
 else { 
 
 //Gives and error if its not 
 $_SESSION['status']="not uploaded";
 header('Location:../presentation/gallery.php');
 } 
 ?> 
 
 