<?php
require_once('db.info.php');
//echo "</br>POST:";print_r($_POST);
//echo "</br>Files:";print_r($_FILES);
try{
    $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
if(isset($_POST['submit']) && $_POST['submit']=="add_staff"){

		$name=htmlentities($_POST['name']);
		$desig=htmlentities($_POST['desig']);
		if(isset($_POST['exp'])){
		$exp=htmlentities($_POST['exp']);
		}else{
		$exp=0;
		}
		$qlfn=htmlentities($_POST['qlfn']);
		$aos=htmlentities($_POST['aos']);
		if(isset($_POST['phone'])){
		$ph=htmlentities($_POST['phone']);
		}
		if(isset($_POST['email'])){
		$email=htmlentities($_POST['email']);
		}else{
		$email=NULL;
		}
		
		$sql="INSERT INTO `faculty`(`name`,`designation`, `experience`, `qualifications`, `aos`, `phone`, `email`) VALUES (?,?,?,?,?,?,?)";
		$stmt=$db->prepare($sql);
		if($stmt->execute(array($name,$desig,$exp,$qlfn,$aos,$ph,$email))){
		
		/***Add image **/
			if(!isset($_FILES['image']) || $_FILES['image']['size']==0){
		$_SESSION['status']="updated";
		$stmt->closeCursor();
		}else if($_FILES['image']['size']>0){
				
				$dir="../../images/faculty";
				 if (!file_exists($dir) and !is_dir($dir)) {
					mkdir($dir);         
				}
				 //get info from the form
				 
				  $pic=htmlentities($_POST['name']);
				  echo "pic".$pic;
				  $rpic=md5($pic);
					echo "rpic".$rpic;
				 $savein="../../images/faculty/";
				 $savein=$savein.basename($rpic.".jpg");
				 $sql="UPDATE `faculty` SET `img_ref`=? WHERE `name`=?";
				 if(move_uploaded_file($_FILES['image']['tmp_name'],$savein))
					  {
						 echo "<br>The image ". basename( $_FILES['image']['name']). " has been uploaded."; 
							
					 }else{
					 
							 $_SESSION['status']="not uploaded";
							
						 } 
					
					$stmt=$db->prepare($sql);
					echo "rpic".$rpic;
					if($stmt->execute(array(htmlentities($rpic),htmlentities($_POST['name'])))){
						$_SESSION['status']="uploaded";
					
					}else{
						$_SESSION['status']="not uploaded";
						
					}
		/**end add image **/
		
		}
		
		}else{
			$_SESSION['status']="not updated";
		}
		$stmt->closeCursor();
		
		
		
		
		
}else if(isset($_POST['update'])){
	
	$sql="UPDATE `faculty` SET `name`=?,`designation`=?,`experience`=?,`qualifications`=?,`aos`=?,`phone`=?,`email`=? WHERE `id`=?";
	$stmt=$db->prepare($sql);
	if($stmt->execute(array(htmlentities($_POST['name']),htmlentities($_POST['desig']),htmlentities($_POST['exp']),htmlentities($_POST['qlfn']),htmlentities($_POST['aos']),htmlentities($_POST['phone']),htmlentities($_POST['email']),htmlentities($_POST['update'])))){
		if(!isset($_FILES['image']) || $_FILES['image']['size']==0){
		$_SESSION['status']="updated";
		$stmt->closeCursor();
		}else if($_FILES['image']['size']>0){
				
				$dir="../../images/faculty";
				 if (!file_exists($dir) and !is_dir($dir)) {
					mkdir($dir);         
				}
				 //get info from the form
				 
				  $pic=htmlentities($_POST['name']);
				  $rpic=md5($pic);
				
				 $savein="../../images/faculty/";
				 $savein=$savein.basename($rpic.".jpg");
				 $sql="UPDATE `faculty` SET `img_ref`=? WHERE `id`=?";
				 if(move_uploaded_file($_FILES['image']['tmp_name'],$savein))
					  {
						 echo "<br>The image ". basename( $_FILES['image']['name']). " has been uploaded."; 
							
					 }else{
					 
							 $_SESSION['status']="not uploaded";
							
						 } 
					}
					$stmt=$db->prepare($sql);
					if($stmt->execute(array(htmlentities($rpic),htmlentities($_POST['update'])))){
						$_SESSION['status']="uploaded";
					
					}else{
						$_SESSION['status']="not uploaded";
						
					}
	}else{
		$_SESSION['status']="not updated";
	}
	$stmt->closeCursor();
	
}else if(isset($_POST['delete'])){
	foreach($_POST['delete_items'] as $val){
		$sql="SELECT `img_ref` FROM faculty WHERE `id`=?";
		$stmt=$db->prepare($sql);
		$stmt->execute(array(htmlentities($val)));
		$e=$stmt->fetch();
		
		$path="../../images/faculty/".$e['img_ref'].".jpg";
		$sql="DELETE FROM `faculty` WHERE `id`=?";
		$stmt=$db->prepare($sql);
		if($stmt->execute(array(htmlentities($val)))){
			if(!$e['img_ref']==""){
			if(unlink ($path)){
				
				$_SESSION['status']="deleted";
				
				}else{
				$_SESSION['status']="not deleted";		
				
				}
			}else{
			$_SESSION['status']="deleted";
			}
			
		}else{
			$_SESSION['status']="not deleted";
		}
		$stmt->closeCursor();
	}
}
?>