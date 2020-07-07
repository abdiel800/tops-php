<?php 
if (isset($_GET['post'])) {
	try {
		$post = PostsData::getById($_GET['post']);	
	} catch (Exception $e) {
		Core::redir("./?module=user&view=postform");
	}
} 
?>
<br><br>
<div class="container">
		<h2>Nueva Publicación</h2>
		<form method="POST" action="<?php if(!empty($post->postID)){ echo './?module=user&action=editpost'; }else{ echo './?module=user&action=newpost'; } ?>">
			<label><?php if(!empty($post->postID)) echo "ID: ".$post->postID; ?></label>
			<input type="hidden" name="txtPostID" value="<?php if(!empty($post->postID)) echo $post->postID; ?>">
		  <div class="row">
		    <div class="col-md-4 form-group">
		      <input name="txtTitle" type="text" class="form-control" placeholder="Título" value="<?php if(!empty($post->title)) echo $post->title; ?>" required>
		    </div>
		    <div class="col-md-4 form-group">
		        <select name="slcCategory" class="form-control custom-select mr-sm-2">
		        	<option value="<?php if(!empty($post->categoryID)) echo $post->categoryID; ?>" selected><?php if(!empty($post->category)) echo $post->category; ?></option>
        			<?php $categories = CategoriesData::getAll();
        				foreach ($categories as $ct) {
        					echo "<option value=".$ct->categoryID." >".$ct->category."</option>";
        				}
        			 ?>
      			</select>
		    </div>
		  </div>
		  <div class="row">
		    <div class="col-md-4 form-group">
		      <input name="txtImageName" type="text" class="form-control" placeholder="Nombre de la Imagen" value="<?php if(!empty($post->imageName)) echo $post->imageName; ?>">
		    </div>
		    <div class="col-md-4 form-group">
		      <input name="txtTags" type="text" class="form-control" placeholder="Tags" value="<?php if(!empty($post->tags)) echo $post->tags; ?>">
		    </div>
		  </div>
		  <div class="row">
		    <div class="col-md-8 form-group">
		  	<label>Publicación: </label><br>
		      <textarea name="txtBody" class="form-control" rows="12" required><?php if(!empty($post->body)) echo $post->body; ?></textarea>
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-10">

		      <button type="submit" class="btn btn-primary">Enviar</button>
		    </div>
		  </div>
		</form>
</div>