<?php 

if (isset($_POST)) {

	//echo $_POST['actualCategory'];
	//echo $_POST['selectCategory']; 
	//echo $_POST['textTitle'];

	$actualCategory = $_POST['actualCategory'];
	$selectCategory = $_POST['selectCategory']; 
	$textTitle = $_POST['textTitle'];

	if ($_POST['selectCategory'] != NULL && $_POST['textTitle'] == NULL) {

		Core::redir("?view=search&category=$selectCategory");
	}elseif ($_POST['selectCategory'] != NULL && $_POST['textTitle'] != NULL) {

		Core::redir("?view=search&category=$selectCategory&title=$textTitle");	
	}
	
}else{
	Core::redir("index.php");
}




?>