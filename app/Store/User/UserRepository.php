<?php  
	namespace App\Store\User;

	use App\Store\Base\BaseRepository;
	use App\Store\User\User;

	class UserRepository extends BaseRepository
	{
	   
	    public function __construct()
	    {
	        $this->setModel(new User);
	    }

	    public function rol()
	    {
	    	$count = $this->getAll()->count();
	    	return ($count > 0) ? 'client' : 'admin';
	    }
	}

?>