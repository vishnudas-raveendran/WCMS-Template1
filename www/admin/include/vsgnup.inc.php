<?php


include_once 'db.info.php';
session_start();
//echo $_POST['type'],$_POST['FrstNme'],$_POST['ScdNme'],$_POST['email'],$_POST['usrnme'],$_POST['pwd'];
if($_SERVER['REQUEST_METHOD']=='POST' && !isset($_POST['Submit']) && !empty($_POST['usrnme']) && !empty($_POST['pwd']))
  {
    try{
    $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
    $sql="INSERT INTO users(type,Frstname,Scdname,email,username,password,active,banned) VALUES (?,?,?,?,?,?,1,0)";
    $stmt=$db->prepare($sql);
    $stmt->execute(array($_POST['type'],htmlentities($_POST['FrstNme']),htmlentities($_POST['ScdNme']),htmlentities($_POST['email']),htmlentities($_POST['usrnme']),htmlentities($_POST['pwd'])));
    $sql="UPDATE users SET loggedin='1',LastLogged WHERE username=? && password=?";
    $stmt=$db->prepare($sql);
    $stmt->execute(array(htmlentities($_POST['usrnme']),htmlentities($_POST['pwd'])));
    $stmt->closeCursor();
    $_SESSION['Loggedin']=1;
    $_SESSION['username']=htmlentities($_POST['usrnme']);
    $_SESSION['firstname']=htmlentities($_POST['FrstNme']);
    $_SESSION['scdname']=htmlentities($_POST['ScdNme']);
    $sql="SELECT usr_id,type FROM users WHERE username=? && password=? ";
    $stmt=$db->prepare($sql);
    $stmt->execute(array(htmlentities($_POST['usrnme']),htmlentities($_POST['pwd'])));
    $e=$stmt->fetch();
   // echo "The userid is",$e['usr_id'];
    //echo "The type is",$_POST['type'];
    $_SESSION['usr_id']=$e['usr_id'];
	$_SESSION['type']=$e['type'];
    if(!$e['usr_id'])
     { echo "Error loading usr_id"; exit;}
    //echo "No error in getting user id";
    if(!strcmp($_POST['type'],"brand"))
     {
         $sql="INSERT INTO brand(brnd_id,brndname,location) VALUES(?,?,?)";
         $stmt=$db->prepare($sql);
         $stmt->execute(array($e['usr_id'],$_SESSION['username'],htmlentities($_POST['location'])));
     }
    else if(!strcmp($_POST['type'],"shop"))
     {
       $sql="INSERT INTO shop(shop_id,shopname,location) VALUES(?,?,?)";
         $stmt=$db->prepare($sql);
         $stmt->execute(array($e['usr_id'],$_SESSION['username'],htmlentities($_POST['location'])));
     }
     else if(!strcmp($_POST['type'],"customer"))
      {  //echo "Entering user data to customer table";
         $sql="INSERT INTO customer(cust_id,custname,location) VALUES(?,?,?)";
         $stmt=$db->prepare($sql);
        // print_r($stmt);
         $stmt->execute(array($e['usr_id'],$_SESSION['username'],htmlentities($_POST['location'])));
        // echo "data entered";
     }   
     $stmt->closeCursor();
    header('Location:../../presentation/userpage.php');
 }
else
 {
   echo 'Invalid entry';
  }


?>
