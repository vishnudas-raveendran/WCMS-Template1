<?php
require_once('db.info.php');
try{
    $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
if(isset($_POST['submit']) && $_POST['submit']=="add_nfc"){
		$sql="INSERT INTO notifications(`content`,`link`)VALUES(?,?)";
		$stmt=$db->prepare($sql);
		if($stmt->execute(array(htmlentities($_POST['content']),htmlentities($_POST['link'])))){
			$_SESSION['status']="updated";
		}else{
			$_SESSION['status']="not updated";
		}
		$stmt->closeCursor();
}else if(isset($_POST['update'])){
	
	$sql="UPDATE `notifications` SET `content`=?, `link`=? WHERE `id`=?";
	$stmt=$db->prepare($sql);
	if($stmt->execute(array(htmlentities($_POST['content']),htmlentities($_POST['link']),htmlentities($_POST['update'])))){
		$_SESSION['status']="updated";
	}else{
		$_SESSION['status']="not updated";
	}
	$stmt->closeCursor();
}else if(isset($_POST['delete'])){
	foreach($_POST['delete_items'] as $val){
		$sql="DELETE FROM `notifications` WHERE `id`=?";
		$stmt=$db->prepare($sql);
		if($stmt->execute(array(htmlentities($val)))){
			$_SESSION['status']="deleted";
		}else{
			$_SESSION['status']="not deleted";
		}
		$stmt->closeCursor();
	}
}
?>