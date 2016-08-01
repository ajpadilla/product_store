<?php  
	namespace App\Store\Order;

	use App\Store\Base\BaseRepository;
	use App\Store\Order\Order;
	/**
	* 
	*/
	class OrderRepository extends BaseRepository
	{
		
		public function __construct()
		{
			$this->setModel(new Order);
		}
	}

?>