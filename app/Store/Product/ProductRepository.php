<?php  
	namespace App\Store\Product;

	use App\Store\Base\BaseRepository;
	use App\Store\Product\Product;

	/**
	* 
	*/
	class ProductRepository extends BaseRepository
	{
		
		public function __construct()
		{
			$this->setModel(new Product);
		}
	}

?>