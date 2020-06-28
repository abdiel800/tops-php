<?php 

if (!empty($_POST) && !empty($_SESSION['user_id'])) {
	
	$postU = new PostsData();

	$postU->postID = $_POST['txtPostID'];
	$postU->title = $_POST['txtTitle'];
	$postU->category = $_POST['slcCategory'];
	$postU->imageName = $_POST['txtImageName'];
	$postU->tags = $_POST['txtTags'];
	$postU->body = $_POST['txtBody'];
	$postU->userID = $_SESSION['user_id'];

	try {
		$postU->update();
		Core::alert("Post editado correctamente");
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