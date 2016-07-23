<?php  
	namespace App\Store\Cart;

	use App\Store\Base\BaseRepository;
	use App\Store\Cart\Cart;
	use App\Store\User\User;

	/**
	* 
	*/
	class CartRepository extends BaseRepository
	{
		
		function __construct()
		{
			$this->setModel(new Cart);
		}

		public function create($data = array())
		{
			$cart = $this->model->create($data);
			$user = \Auth::user();
			dd($user);
			$cart->user()->associate($user);
			$cart->save();
			return $cart;

		}

		public function getActiveCartForUser(User $user)
		{
			return $this->getModel()->whereUserId($user->id)
					->whereActive(TRUE)->orderBy('created_at', 'DESC')
					->first();
		}

		public function getProductQuantityForUser(User $user, $productId)
		{
			$cart = $this->getActiveCartForUser($user);
			$product = $cart->products()->whereProductId($productId)->first();
			$quantity = $product->pivot->quantity;
			return $quantity;
		}

		public function changeQuantity(User $user, $productId, $quantity = 0)
		{
			$cart = $this->getActiveCartForUser($user);
			$product = $cart->products()->whereProductId($productId)->first();
			$product->pivot->quantity = $quantity;
			return $product->pivot->save();
		}
	}
?>