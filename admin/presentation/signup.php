<?php
require_once('../include/header.php');
$page="signup";
if(isset($_SESSION['loggedin'])){
header('Location:../index.php');

}
require_once('../include/db.info.php');

/****
This page is authorised for access only by admins who have logged in to admin+

****/
/*if(!isset($_SESSION['loggedin'])){
header('Location:../index.php');

}*/
if(isset($_POST['uname'])&&isset($_POST['pword'])&&$_SERVER['REQUEST_METHOD']=='POST'){

try{
    $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection failed:',$e->getMessage(); exit;}
    $sql="INSERT INTO users(`username`,`password`) VALUES (?,?)";
    $stmt=$db->prepare($sql);
    if($stmt->execute(array(htmlentities($_POST['uname']),md5(htmlentities($_POST['pword']))))){
			$_SESSION['sgnup']="New user account created";
			//echo "here: ",$_SESSION['sgnup'];
	}else{
			$_SESSION['sgnup']="Error creating new account. Check if username exists.";
	}
	$stmt->closeCursor();
    
}

//echo "POST:";print_r($_POST);
//echo "</br>SESSION:";print_r($_SESSION);
//echo "</br>SERver:";print_r($_SERVER);
?>

    <!-- LOGO HEADER END-->
	<div class="content-wrapper">
        <div class="container">
		  <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Create new Admin account</h4>
					
                </div>

            </div>
			<div class="row">
				<?php
		if(isset($_SESSION['sgnup']))
           { 
		   echo<<<MARK
		   <div class="alert alert-success">
			<p align="center">
MARK;
		   echo $_SESSION['sgnup'];
		   echo "</p></div>";
		   unset($_SESSION['sgnup']); 
		   }
		  ?>
                <div class="col-md-6">
                   <br />
				   <form action="signup.php" method="post">
                     <label>Enter Username : </label>
                        <input type="text" class="form-control" name="uname" required/>
                        <label>Enter Password :  </label>
                        <input type="password" class="form-control" name="pword" required/>
                        <hr />
                        <button type="submit" class="btn btn-info" name="submit" value="new_user"><span class="glyphicon glyphicon-user"></span> &nbsp;Create user </a>&nbsp;
					</form>
                </div>
				<div class="col-md-6">
                   <div class="alert alert-info">
				     To delete or edit the user account please change the database directly using softwares such as Phpmyadmin. Contact your admin.
				 
					</div>
				</div>

        </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2015 Dept of General Science | Developed by Vishnudas Raveendran (2012 Batch)</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="../js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../js/bootstrap.js"></script>
</body>
</html>