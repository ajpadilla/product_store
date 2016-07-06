<?php  
	namespace App\Store\Cart;

	use App\Store\Base\BaseRepository;
	use App\Store\Cart\Cart;
	use App\Store\User\User;

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

	public function getActiveCartForUser(User $user)
	{
		return $this->getModel()->whereUserId($user->id)
				->whereActive(TRUE)->orderBy('create_at', 'DESC')
				->first();
	}
?>