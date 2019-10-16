<?php

require_once('db.info.php');
//echo "POST:";print_r($_POST);
//echo "</br>SESSION:";print_r($_SESSION);

try{
    $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
if(!isset($_SESSION['loggedin'])){
	header('Location:../index.php');
}
	if(isset($_POST['update_view_select'])){

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
		$sql="UPDATE `news` SET `title`=?,`content`=?,`link`=? WHERE `id`=?";
    $stmt=$db->prepare($sql);
    if($stmt->execute(array($_POST['title'],htmlentities($_POST['content']),htmlentities($_POST['link']),htmlentities($_POST['update_news'])))){
		$_SESSION['status']="updated";
	}else{
		$_SESSION['status']="not updated";
	}
    $stmt->closeCursor();
	}else if(isset($_POST['update_events'])){
		//update news here
		//UPDATE `news` SET `id`=[value-1],`title`=[value-2],`content`=[value-3],`link`=[value-4],`updated`=[value-5]
		print_r("In the events update section");
		$sql="UPDATE `events` SET `content`=?,`link`=? WHERE `id`=?";
    $stmt=$db->prepare($sql);
    if($stmt->execute(array(htmlentities($_POST['content']),htmlentities($_POST['link']),htmlentities($_POST['update_events'])))){
		$_SESSION['status']="updated";
	}else{
		$_SESSION['status']="not updated";
	}
    $stmt->closeCursor();
	}
	if(isset($_POST['submit'])&&$_POST['submit']=="insert"){
	if($_POST['post_type']=="news"){
    $sql="INSERT INTO news(`title`,`content`,`link`) VALUES (?,?,?)";
    $stmt=$db->prepare($sql);
    if($stmt->execute(array($_POST['title'],htmlentities($_POST['content']),htmlentities($_POST['link'])))){
		$_SESSION['status']="updated";
	}else{
		$_SESSION['status']="not updated";
	}
    $stmt->closeCursor();
	}else if($_POST['post_type']=="events"){
	$sql="INSERT INTO events(`content`,`link`) VALUES (?,?)";
    $stmt=$db->prepare($sql);
    if($stmt->execute(array(htmlentities($_POST['content']),htmlentities($_POST['link'])))){
	$_SESSION['status']="updated";
	}else{
		$_SESSION['status']="not updated";
	}
    $stmt->closeCursor();
	
	}else{
		header('Location:../index.php');
	}
	
	}
	/******** DELEtion of records ***************/
	if(isset($_POST['delete'])){
	
	if($_POST['delete']=="delete_news"){
		//echo "for deletion </br></br>";
		//print_r($_POST);
	    foreach($_POST['delete_items'] as $val){
			$sql="DELETE FROM `news` WHERE `id`=?";
			$stmt=$db->prepare($sql);
			if($stmt->execute(array(htmlentities($val)))){
				$_SESSION['status']="deleted";
			}else{
				$_SESSION['status']="not deleted";		
			
			}
			$stmt->closeCursor();
		}
	}else if($_POST['delete']=="delete_events"){
		//echo "for deletion </br></br>";
		//print_r($_POST);
	    foreach($_POST['delete_items'] as $val){
			$sql="DELETE FROM `events` WHERE `id`=?";
			$stmt=$db->prepare($sql);
			if($stmt->execute(array(htmlentities($val)))){
				$_SESSION['status']="deleted";
			}else{
				$_SESSION['status']="not deleted";		
			
			}
			$stmt->closeCursor();
		}
	}
	}
	
	/*** deletion ends **********/

?>