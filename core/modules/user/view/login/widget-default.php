<?php
if(isset($_SESSION["user_id"]))
{
	Core::redir("./?module=user&view=home");
}
?>
<br><br><br><br><br><div class="container">
	<div class="row">

		<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default">
		<div class="panel-heading"><center><strong>
		Login - Temporalmente solo para uso administrativo</strong></center>
		</div><br>
		<div class="panel-body">
		<form role="form" method="post" action="./?module=user&action=processlogin">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Correo electronico">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-block btn-default">Acceder</button>
<br> <!--<a href="./?module=user&view=recover">Olvide mi contrase&ntilde;a ...</a>-->
</form>
		</div>
		</div>
		<!-- -->

		</div>
	</div>
</div>
