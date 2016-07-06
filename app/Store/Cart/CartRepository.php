<?php  
	namespace App\Store\Cart;

	use App\Store\Base\BaseRepository;
	use App\Store\Cart\Cart;

	/**
	* 
	*/
	class ClassName extends BaseRepository
	{
		
		function __construct()
		{
			$this->setModel(new Cart);
		}
	}
?>