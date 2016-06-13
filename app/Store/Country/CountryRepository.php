<?php  
	namespace App\Store\Country;


	use App\Store\Base\BaseRepository;
	use App\Store\Country\Country;

	/**
	* 
	*/
	class CountryRepository extends BaseRepository
	{
		
		public function __construct()
		{
			$this->setModel(new Country);
		}
	}

?>