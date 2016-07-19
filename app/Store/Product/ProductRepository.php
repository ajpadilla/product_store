<?php  
	namespace App\Store\Product;

	use App\Store\Base\BaseRepository;
	use App\Store\Product\Product;
	use App\Store\User\User;
	use App\Store\Cart\CartRepository;
	use Yajra\Datatables\Datatables;

	/**
	* 
	*/
	class ProductRepository extends BaseRepository
	{
		private $cartRepository;
		public function __construct()
		{
			$this->setModel(new Product);
			$this->cartRepository = new CartRepository();
		}

		public function table()
		{
			$products = $this->getModel()->select(['id','name','description','quantity', 'price', 'active','mark', 'classification_id']);
			return Datatables::of($products)
			->addColumn('classification', function($product){
				return $product->classification->name;
			})
			->addColumn('photo', function($product){
				$img = '';
				$photo = $product->first_photo;
				if ($photo != false) {
					$img .= "	<a href='#'>
					<img class='mini-photo' alt='" . $photo->filename . "' src='" . asset($photo->complete_thumbnail_path) . "'>
					</a>";
				}
				return $img;
			})
			->addColumn('action', function($product){
				return "<a  class='btn btn-primary' href='" . route('product.edit', $product->id) . "'>
							<i class='glyphicon glyphicon-edit'></i>Edit
						</a><br/>
						<a  class='btn btn-info show-product' href='#' id='show_product_".$product->id."'>
							<i class='glyphicon glyphicon-zoom-in'></i>Show
						</a><br/>
						<a  class='btn btn-danger delete-products' href='' id='delete_products_".$product->id."'>
							<i class='glyphicon glyphicon-remove'></i>Delete
						</a><br/>
						<a  class='btn btn-primary' href='" . route('photoProduct.create', $product->id) . "'>
							<i class='glyphicon glyphicon-camera'></i>Add Photo
						</a>
				";
			})
			->make(true);
		}

		public function update($data = array())
		{
			$product = $this->get($data['product_id']);
			$product->update($data);
			return $product;
		}

		public function addToUserWishlist($productId, User $user)
		{
			if($this->existsInWishlist($productId, $user))
				return FALSE;
			$product = $this->get($productId);
			return $product->wishlist()->attach($user->id) == NULL;
		}

		public function existsInWishlist($productId, User $user)
		{
			return $this->getModel()->where('id','=', $productId)->whereHas('wishlist', function($q) use ($user)
			{
				$q->where('user_id', '=', $user->id);
			})->count();
		}

		public function getArrayForTopWishlist($productId)
		{
			$product = $this->get($productId);
			return [
				'name' => $product->name,
				'url' => route('products.show', $productId),
				'url-delete' => route('wishlist.delete-ajax', $productId)
			];
		}

		public function existsInUserCart($productId, User $user)
		{
			return $this->getModel()->where('id', '=', $productId)->whereHas('carts', function($q) use ($user)
			{
    			$q
			    	->where('user_id', '=', $user->id)
			    	->where('active', '=', TRUE);

			})->count();
		}

		public function addToUserCart($productId, $quantity, User $user)
		{
			if($this->existsInUserCart($productId, $user))
				return FALSE;
			$cart = $this->cartRepository->getActiveCartForUser($user);
			return $cart->products()->attach($productId, ['quantity' => $quantity]) == NULL;
		}


		public function getArrayForTopCart(User $user, $productId)
		{
			$product = $this->get($productId);
			$this->cartRepository = new CartRepository();
			return [
				'name' => $product->name,
				'quantity' => $this->cartRepository->getProductQuantityForUser($user, $productId),
				'url' => route('product.show', $productId),
				//'url-delete' => route('cart.delete-ajax', $productId)
			];
		}

		public function deleteFromUserCart($productId, User $user)
		{
			if ($this->existsInUserCart($productId, $user)){
				$cart = $this->cartRepository->getActiveCartForUser($user);
				return $cart->products()->detach($productId) > 0;
			}
			return FALSE;
		}
	}
?>