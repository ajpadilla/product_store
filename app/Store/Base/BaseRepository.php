<?php  
	namespace App\Store\Base;
	/**
	 * summary
	 */
	
	protected $model;

	class BaseRepository
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        
	    }

	    public function setModel($model)
	    {
	    	$this->model = $model;
	    }
	}
?>