<?php 
	class CategoriesData{
		public static $tablename = "category";

		public function CategoriesData(){
			$this->categoryID = 0;
			$this->category = "";
		}

		public static function getAll(){
			$sql = "SELECT * FROM ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0], new CategoriesData());
		}
	}
?>