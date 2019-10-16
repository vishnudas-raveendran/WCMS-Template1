<?php
session_start();
//$_SESSION['loggedin']="1";
//echo "POST:";print_r($_POST);
//echo "</br>SESSION:";print_r($_SESSION);

if(isset($_SESSION['loggedin'])){
header('Location:presentation/admin_panel.php');

}
require_once('include/db.info.php');
/** login test **/
if(isset($_POST['uname'])&&isset($_POST['pword'])&&!isset($_SESSION['loggedin'])){
try{
     $db=new PDO(DbInfo,DbUser,DbPwd);
     }catch(PDOException $e){ echo 'Connection to database failed:',$e->getMessage(); exit;}
    $sql="SELECT * FROM users WHERE username=? and password=?";
    $stmt=$db->prepare($sql);
	$stmt->execute(array(htmlentities($_POST['uname']),md5(htmlentities($_POST['pword']))));
    $e=$stmt->fetch();
	echo md5(htmlentities($_POST['pword']));
	//echo $e;
    if($e)
      {
         //Logged Successfully!!
		 $_SESSION['LOGSTATUS']="Welcome ".$e['username'];
		 $_SESSION['loggedin']=1;
			$sql="UPDATE users SET last_logged WHERE id=?";
		   $stmt=$db->prepare($sql);
		   $stmt->execute(array(htmlentities($e['id'])));
		   $stmt->closeCursor();
		   header('Location:presentation/admin_panel.php');
	  }
	 else{
		$_SESSION['LOGSTATUS']="Username/Password is incorrect.";
		
	 }
}
/** login test over**/
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Admin + : Login</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Sahrdaya College of Engineering and Technology</strong>
                    &nbsp;&nbsp;
                    <strong>Support: </strong>vishnudas.raveendran@gmail.com
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    Admin+
                </a>

            </div>

            <div class="left-div">
				<div class="user-settings-wrapper">
                    <ul class="nav">
						<h1>Department of Civil Engineering</h1>
					</ul>
                </div>
                
        </div>
            </div>
        </div>
    <!-- LOGO HEADER END-->
   
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
		  <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Please Login To Enter </h4>
					
                </div>

            </div>
			
			<?php
		if(isset($_SESSION['LOGSTATUS']))
           { 
		   echo<<<MARK
		   <div class="alert alert-info">
			<p align="center">
MARK;
		   echo $_SESSION['LOGSTATUS'];
		   echo "</p></div>";
		   unset($_SESSION['LOGSTATUS']); 
		   }
		  ?>
            <div class="row">
                <div class="col-md-6">
                   <br />
				   <form action="index.php" method="post">
                     <label>Enter Username : </label>
                        <input type="text" class="form-control" name="uname" required/>
                        <label>Enter Password :  </label>
                        <input type="password" class="form-control" name="pword" required/>
                        <hr />
                        <button type="submit" class="btn btn-info" name="login" value="login"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </a>&nbsp;
					</form>
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
                    &copy; 2015 Dept of Civil Engineering | Developed by Vishnudas Raveendran (2012 Batch)</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="js/bootstrap.js"></script>
</body>
</html>
