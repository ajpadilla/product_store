<?php  
	namespace App\Store\Base;
	
	class BaseRepository
	{
		protected $model;
	  
	    public function setModel($model)
	    {
	    	$this->model = $model;
	    }

	    public function getModel()
		{
			return $this->model;
		}

		public function create($data = array())
		{
			$model = $this->model->create($data); 
			return $model;
		}

		public function  getAll($exclude = null)
		{
			if($exclude)
				return $this->getModel()->whereNotIn('id', $exclude)->get();
			return $this->getModel()->all();
		}	

	}
?>