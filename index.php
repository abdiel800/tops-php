<?php 
/*
app.listen(process.env.PORT);
let port = process.env.PORT;
if (port == null || port == "") {
  port = 8000;
}
app.listen(port);
*/
?>

<?php
/**
* @author evilnapsis
* @brief Liberando la bestia
**/

session_start();

include "core/autoload.php";

define("ROOT",dirname(__FILE__));


$lb = new Lb();
$lb->loadModule("index");

?>
