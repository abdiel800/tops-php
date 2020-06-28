
<br><br>
<?php
if(isset($_SESSION["user_id"])):
	$user = UserData::getById($_SESSION["user_id"]);
?>
<div class="container">
	<div class="row">
	<div class="col-md-12">
<div class="btn-toolbar pull-right">
<div class="btn-group">
	<a href="./?module=user&view=postform" class="btn btn-warning">Nuevo Post</a>
</div>
<div class="btn-group">
	<a href="./?module=user&view=config" class="btn btn-warning">Configurar</a>
</div>
<div class="btn-group">
	<a href="./?module=user&action=processlogout" class="btn btn-danger">Salir</a>
</div>
</div>
	<h2>Hola, <?php echo $user->name;?></h2>
<hr>
<p>Mis Posts</p>
	
	  <table class="table table-striped">
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>Título</th>
	        <th>Categoria</th>
	        <th>Fecha de publicación</th>
	        <th>Última actualización</th>
	        <th>Estado</th>
	        <th>Visitantes</th>
	        <th>Opciones</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php $users = PostsData::getAllByUser(); 
	    		foreach ($users as $user) {
	    			$ps1 = ($user->postState == 1) ? 'Activo' : 'Inactivo';
	    			echo "<tr>";
	    			echo "<td>".$user->postID."</td>";
	    			echo "<td>".$user->title."</td>";
	    			echo "<td>".$user->category."</td>";
	    			echo "<td>".$user->postDate."</td>";
	    			echo "<td>".$user->lastUpdate."</td>";
	    			echo "<td>".$ps1."</td>";
	    			echo "<td>".$user->visitors."</td>";
	    			echo "<td><a href='./?module=user&view=postform&post=".$user->postID."' class='btn btn-primary'>Editar</a></td>";

	    			$ps = ($user->postState == 1) ? 0 : 1;
	    			$ps3 = ($user->postState == 1) ? "Ocultar" : "Mostrar";
	    			echo "<td><a href='./?module=user&action=hidepost&ps=$ps&post=".$user->postID."' class='btn btn-primary'>".$ps3."</a></td>";
	    			
	    			echo "<tr>";
	    		}
	    	?>
	    </tbody>
	  </table>

	</div>
	</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php else: Core::redir("./"); endif;?>