<?php 
	class PostsData{
		public static $tablename = "posts";

		public static $tablename2 = "user";

		public static $tablename3 = "category";

		public function PostsData(){
			$this->title = "";
			$this->body = "";
			$this->imageName = "";
			$this->category = "";
			$this->tags = "";
			$this->postDate = "";
			$this->lastUpdate = "";
			$this->userID = 0;
			$this->postState = 1;
			$this->visitors = 0;
		}

		public static function getPostCount(){
			$sql = "SELECT COUNT(*) AS count FROM ".self::$tablename." WHERE postState=1";
			$query = Executor::doit($sql);
			return Model::one($query[0],new PostsData());
		}

		public static function getPostCountByCategory($category){
			$sql = "SELECT COUNT(*) AS count FROM ".self::$tablename." WHERE category='$category' AND postState=1";
			$query = Executor::doit($sql);
			return Model::one($query[0],new PostsData());
		}

		public static function getById($id){
			$sql = "SELECT p.body, c.category, c.categoryID, p.imageName, p.postDate, DATE(p.postDate) AS postDate2, p.postID, p.postState, p.tags, p.title, p.userID, p.visitors, u.username 
					FROM ".self::$tablename." AS p 
					INNER JOIN ".self::$tablename2." AS u ON p.userID = u.id 
					INNER JOIN ".self::$tablename3." AS c ON p.category = c.categoryID 
					WHERE postID=$id AND postState=1";
			$query = Executor::doit($sql);
			return Model::one($query[0],new PostsData());
		}

		public static function getLast(){
			$sql = "SELECT p.body, c.category, p.imageName, p.postDate, DATE(p.postDate) AS postDate2, p.postID, p.postState, p.tags, p.title, p.userID, p.visitors, u.username 
					FROM ".self::$tablename." AS p 
					INNER JOIN ".self::$tablename2." AS u ON p.userID = u.id 
					INNER JOIN ".self::$tablename3." AS c ON p.category = c.categoryID 
					WHERE postState=1 
					ORDER BY postDate DESC LIMIT 0,1";
			$query = Executor::doit($sql);
			return Model::one($query[0],new PostsData());
		}

		public static function getPenultimate(){
			$sql = "SELECT p.body, c.category, p.imageName,p.postDate, DATE(p.postDate) AS postDate2, p.postID, p.postState, p.tags, p.title, p.userID, p.visitors, u.username 
					FROM ".self::$tablename." AS p 
					INNER JOIN ".self::$tablename2." AS u ON p.userID = u.id 
					INNER JOIN ".self::$tablename3." AS c ON p.category = c.categoryID 
					WHERE postState=1 
					ORDER BY postDate DESC LIMIT 1,2";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PostsData());
		}

		public static function getAllByPage($startPage, $postByPage){
			$sql = "SELECT p.body, c.category, p.imageName,p.postDate, DATE(p.postDate) AS postDate2, p.postID, p.postState, p.tags, p.title, p.userID, p.visitors, u.username 
					FROM ".self::$tablename." AS p 
					INNER JOIN ".self::$tablename2." AS u ON p.userID = u.id 
					INNER JOIN ".self::$tablename3." AS c ON p.category = c.categoryID 
					WHERE postState=1 
					ORDER BY postDate DESC LIMIT ".$startPage.", ".$postByPage;
			$query = Executor::doit($sql);
			return Model::many($query[0], new PostsData());
		}

		public static function getAllByPageAndCategory($startPage, $postByPage, $category){
			$sql = "SELECT p.body, c.category, p.imageName, p.postDate, DATE(p.postDate) AS postDate2, p.postID, p.postState, p.tags, p.title, p.userID, p.visitors, u.username 
					FROM ".self::$tablename." AS p 
					INNER JOIN ".self::$tablename2." AS u ON p.userID = u.id 
					INNER JOIN ".self::$tablename3." AS c ON p.category = c.categoryID 
					WHERE c.category='$category' AND postState=1 
					ORDER BY postDate DESC LIMIT ".$startPage.", ".$postByPage;
			$query = Executor::doit($sql);
			return Model::many($query[0], new PostsData());
		}

		public static function getAllPostFiltered($category, $title, $id=0, $start=0, $end=10){
			$sql = "SELECT p.body, c.category, p.imageName, p.postDate, DATE(p.postDate) AS postDate2, p.postID, p.postState, p.tags, p.title, p.userID, p.visitors, u.username 
					FROM ".self::$tablename." AS p 
					INNER JOIN ".self::$tablename2." AS u ON p.userID = u.id 
					INNER JOIN ".self::$tablename3." AS c ON p.category = c.categoryID 
					WHERE postState=1 AND c.category='".$category."' AND p.title LIKE '%".$title."%' AND p.postID != ".$id." 
					ORDER BY postDate DESC LIMIT $start,$end";
			$query = Executor::doit($sql);
			return Model::many($query[0], new PostsData());
		}

		public static function getNumPostByCategory(){
			$sql="SELECT c.categoryID, c.category, COUNT(*) AS numPostByCategory 
					FROM ".self::$tablename." AS p 
					INNER JOIN ".self::$tablename3." AS c ON p.category = c.categoryID 
					WHERE postState=1 
					GROUP BY c.category 
					ORDER BY numPostByCategory DESC";
			$query = Executor::doit($sql);
			return Model::many($query[0], new PostsData());
		}

		public static function getMostViewed(){
			$sql = "SELECT p.body, c.category, p.imageName, p.postDate, DATE(p.postDate) AS postDate2, p.postID, p.postState, p.tags, p.title, p.userID, p.visitors 
					FROM ".self::$tablename." AS p 
					INNER JOIN ".self::$tablename3." AS c ON p.category = c.categoryID 
					WHERE postState=1 
					ORDER BY p.visitors DESC LIMIT 0,5";
			$query = Executor::doit($sql);
			return Model::many($query[0], new PostsData());
		}

		public function addView($id){
			$sql = "UPDATE ".self::$tablename." SET visitors=(visitors+1) WHERE postID = $id";
			Executor::doit($sql);
		}

		//CON LIMIT
		public static function getVideosByCategory($category){
			$sql="SELECT p.body, c.category, p.imageName, p.postDate, DATE(p.postDate) AS postDate2, p.postID, p.postState, p.tags, p.title, p.userID, p.visitors 
				FROM ".self::$tablename." AS p 
				INNER JOIN ".self::$tablename3." AS c ON p.category = c.categoryID 
				WHERE c.category='$category' AND postState=1 ORDER BY postDate DESC LIMIT 0,3";
			$query = Executor::doit($sql);
			return Model::many($query[0], new PostsData());
		}

		//User Module
		public static function getAllByUser(){
			$sql = "SELECT * FROM ".self::$tablename." WHERE userID=".$_SESSION['user_id'];
			$query = Executor::doit($sql);
			return Model::many($query[0], new PostsData());
		}
		

//////////////////////////////////////////////////////////////////////////////////////////////


		public function add(){
			$sql = "INSERT INTO ".self::$tablename." (title, body, imageName, category, tags, userID) ";
			$sql .= "value ('".$this->title."', '".$this->body."', '".$this->imageName."', ".$this->category.", '".$this->tags."','".$this->userID."')";
				Core::alert($sql);
				?><script>alert($sql);</script><?php
			Executor::doit($sql);
		}

		public function update(){

			date_default_timezone_set('America/Guatemala');
			$date = date('Y-m-d H:i:s');
		
			$sql = "UPDATE ".self::$tablename." SET title='".$this->title."', body='".$this->body."', imageName='".$this->imageName."', category=".$this->category.", tags='".$this->tags."', lastUpdate='$date' WHERE postID=".$this->postID;
			Executor::doit($sql);
		}

		public function updatePostState($postState, $postID){
			$sql = "UPDATE ".self::$tablename." SET postState=$postState WHERE postID=$postID";
			Executor::doit($sql);
		}

	}
 ?>