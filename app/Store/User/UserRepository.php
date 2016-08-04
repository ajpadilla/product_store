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

	  	public function hasActive(User $user)
	  	{
			return $user->active;
		}

		public function update($data = array())
		{
			$user = $this->get($data['user_id']);
			$user->update($data);
			return $user;
		}

		public function table()
		{
			$users = $this->getModel()->select(['id','first_name','last_name','username', 'email', 'address','post_code', 'country_id', 'phone', 'active', 'role']);
			return Datatables::of($products)
			->addColumn('classification', function($users){
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

	}

?>