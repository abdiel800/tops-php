<?php
/**
* @author evilnapsis
* @brief Proceso de Login
**/

if(!empty($_POST)){
			if($_POST["email"]!=""&&$_POST["password"]!=""){
				$user = UserData::getLogin($_POST["email"],sha1(md5($_POST["password"])));
				if($user!=null){
					if($user->is_active){
						$_SESSION["user_id"]=$user->id;
						Core::redir("./?module=user&view=home");
					}else{						
						Core::alert("Usuario inactivo");
						Core::redir("./?module=user&view=activate");
					}
				}else{
					Core::alert("Datos incorrectos");
					Core::redir("./?module=user&view=login");
				}
			}else{
				Core::alert("Datos vacios");
				Core::redir("./?module=user&view=login");
			}
		}
?>