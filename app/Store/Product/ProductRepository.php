<?php  
	namespace App\Store\Product;

	use App\Store\Base\BaseRepository;
	use App\Store\Product\Product;
	use Yajra\Datatables\Datatables;
	/**
	* 
	*/
	class ProductRepository extends BaseRepository
	{
		
		public function __construct()
		{
			$this->setModel(new Product);
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

	}
?>