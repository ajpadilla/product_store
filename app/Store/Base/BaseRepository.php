<?php  
	namespace App\Store\Base;
	
	protected $model;

	class BaseRepository
	{
	  
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

	}
?>