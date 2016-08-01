<?php  
	namespace App\Store\Invoice;

	use App\Store\Base\BaseRepository;
	use App\Store\Invoice\Invoice;
	/**
	* 
	*/
	class InvoiceRepository extends BaseRepository
	{
		
		public function __construct()
		{
			$this->setModel(new Invoice);
		}

		public function create($data= array())
		{
			$invoice = $this->model->create($data);
			return $invoice;
		}
	}

?>