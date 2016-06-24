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
			$products = $this->getModel()->select(['id','name','description','quantity', 'price', 'mark', 'classification_id']);
			return Datatables::of($products)
			->addColumn('action', function($product){
				return "<a  class='btn btn-primary' href='" . route('classification.edit', $product->id) . "'><i class='glyphicon glyphicon-edit'></i>Edit</a>
					<a  class='btn btn-danger delete-products' href='" . route('classification.delete', $product->id) . "' id='delete_products_".$product->id."'><i class='glyphicon glyphicon-remove'></i>Delete</a>
				";
			})
			->make(true);
		}

	}

?>