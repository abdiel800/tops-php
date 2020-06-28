<?php

include ROOT.'/core/modules/user/model/UserData.php';
include ROOT.'/core/modules/user/model/RecoverData.php';
include ROOT.'/core/modules/index/model/PostsData.php';
include ROOT.'/core/modules/index/model/CategoriesData.php';
/// en caso de que el parametro action este definido evitamos que se muestre
/// el layout por defecto y ejecutamos el action sin mostrar nada de vista
// print_r($_GET);
if(!isset($_GET["action"])){
//	Bootload::load("default");
	Module::loadLayout("user");
}else{
	Action::load($_GET["action"]);
}

?>