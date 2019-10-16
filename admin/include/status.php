<?php
if(isset($_SESSION['status'])){
if($_SESSION['status']=="deleted"){

			$_SESSION['status_message']="<div class=\"panel panel-success\">
                        <div class=\"panel-heading\" align=\"center\">
                            Success
                        </div>
                        <div class=\"panel-body\">
                            <p align=\"center\">Records have been deleted.</p>
                        </div>
						</div>";


}else if($_SESSION['status']=="not deleted"){

				$_SESSION['status_message']="<div class=\"panel panel-warning\">
                        <div class=\"panel-heading\" align=\"center\">
                            Error
                        </div>
                        <div class=\"panel-body\" align=\"center\">
                            <p>Error in deleting.</p>
                        </div>
					</div>";

}else if($_SESSION['status']=="updated"){
	$_SESSION['status_message']="<div class=\"panel panel-success\">
                        <div class=\"panel-heading\" align=\"center\">
                            Success
                        </div>
                        <div class=\"panel-body\" >
                            <p align=\"center\">Updated</p>
                        </div>
						</div>";
}else if($_SESSION['status']=="not updated"){

				$_SESSION['status_message']="<div class=\"panel panel-warning\">
                        <div class=\"panel-heading\">
                            Error
                        </div>
                        <div class=\"panel-body\" >
                            <p align=\"center\">Error in updating.</p>
                        </div>
					</div>";

}else if($_SESSION['status']=="Invalid upload"){

				$_SESSION['status_message']="<div class=\"panel panel-warning\">
                        <div class=\"panel-heading\" align=\"center\">
                            Error
                        </div>
                        <div class=\"panel-body\" align=\"center\">
                            <p>Invalid file uploaded. Please upload a JPG image or check if the size of file being uploaded is less than 2 MB</p>
                        </div>
					</div>";

}else if($_SESSION['status']=="not uploaded"){

				$_SESSION['status_message']="<div class=\"panel panel-warning\">
                        <div class=\"panel-heading\" align=\"center\">
                            Error
                        </div>
                        <div class=\"panel-body\" align=\"center\">
                            <p>Error in uploading</p>
                        </div>
					</div>";

}else if($_SESSION['status']=="uploaded"){
	$_SESSION['status_message']="<div class=\"panel panel-success\">
                        <div class=\"panel-heading\" align=\"center\">
                            Success
                        </div>
                        <div class=\"panel-body\" >
                            <p align=\"center\">Image has been uploaded</p>
                        </div>
						</div>";
}
}

?>