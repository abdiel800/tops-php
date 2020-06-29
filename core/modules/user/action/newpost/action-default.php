<?php 

if (!empty($_POST) && !empty($_SESSION['user_id'])) {
	
	$postN = new PostsData();
	$postN->title = $_POST['txtTitle'];
	$postN->category = $_POST['slcCategory'];
	$postN->imageName = $_POST['txtImageName'];
	$postN->tags = $_POST['txtTags'];
	$postN->body = $_POST['txtBody'];
	$postN->userID = $_SESSION['user_id'];

	
	try {
		$postN->add();
		Core::alert("Post agregado correctamente");
		Core::redir("./?module=user&view=home");
	} catch (Exception $e) {
		Core::alert("Ha Ocurrido un error.");
		Core::redir("./?module=user&view=postform");
	}
}else{
	Core::alert("Ha Ocurrido un error. Asegurese de haber llenado los campos requeridos.");
	Core::redir("./?module=user&view=postform");
}





 ?>