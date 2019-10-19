<?php
//include_once '../include/config.php';
include_once 'db.info.php';
session_start();
//print_r($_POST);
if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['submit']=='LOGIN' && !empty($_POST['usrnme']) && !empty($_POST['pswd']))
  {
    try{
     $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
    $sql="SELECT * FROM users WHERE username=? && password=?";
    $stmt=$db->prepare($sql);
    //echo $_POST['usrnme'],$_POST['pswd'];
    $stmt->execute(array(htmlentities($_POST['usrnme']),htmlentities($_POST['pswd'])));
    $e=$stmt->fetch();
    if($e)
      {
         //Logged Successfully!!
         $stmt->closeCursor();
         if($e['banned'])
           { 
             $_SESSION['LOGSTATUS']='Sorry!!You have been banned from Qstore';
             header('Location:../../presentation/login.php');
           }
         else 
          {
              try 
               {
                  $db=new PDO(DbInfo,DbUser,DbPwd);
               } catch(PDOException $e){ echo 'Connection Failed:',$e->getMessage(); }
               $sql="UPDATE users SET loggedin='1' WHERE username=? && password=?";
               $stmt=$db->prepare($sql);
               $stmt->execute(array(htmlentities($_POST['usrnme']),htmlentities($_POST['pswd'])));
               $stmt->closeCursor();
               $_SESSION['Loggedin']=1;
               $_SESSION['username']=$_POST['usrnme'];
               $_SESSION['usr_id']=$e['usr_id'];
               $_SESSION['firstname']=$e['FrstName'];
               $_SESSION['scdname']=$e['ScdName'];
			   $_SESSION['type']=$e['type'];
               unset ($_SESSION['LOGSTATUS']);
               header('Location:../../presentation/userpage.php');
          }
      }
    else
      {
         //echo "Login Unsuccessfull";
         $stmt->closeCursor();
          $_SESSION['LOGSTATUS']='Username or password is incorrect';
          header('Location:../../presentation/login.php');
       }
     
  }
else
  {
     //echo "Login Unsucessfull!!";
     $_SESSION['LOGSTATUS']='Username and password cannot be left empty!!';
     header('Location:../../presentation/login.php');
    
  }
  
?>