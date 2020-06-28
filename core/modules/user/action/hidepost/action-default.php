<?php 

if (isset($_GET['post']) && $_GET['post'] != "" && isset($_GET['ps']) && $_GET['ps'] != "" && !empty($_SESSION['user_id'])) {

	try {
		PostsData::updatePostState($_GET['ps'], $_GET['post']);
		Core::alert("Cambio realizado exitosamente");
		Core::redir("./?module=user&view=home");
	} catch (Exception $e) {
		Core::alert("Ha Ocurrido un error.");
		Core::redir("./?module=user&view=postform");
	}

}

?>