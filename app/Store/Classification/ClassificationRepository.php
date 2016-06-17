<?php 
	namespace App\Store\Classification;

	use App\Store\Base\BaseRepository;
	use App\Store\Classification\Classification;
	use Yajra\Datatables\Datatables;

	/**
	* 
	*/
	class ClassificationRepository extends BaseRepository
	{
		
		public function __construct()
		{
			$this->setModel(new Classification);
		}


		public function table()
		{
			$classifications = $this->getModel()->select(['id','name']);
			return Datatables::of($classifications)
			->addColumn('action', function($classification){
				return '<div class="col-md-6 text-center"> 
							<a href="#edit-classification-'.$classification->id.'" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit</a>
							 <a href="#delete-classification-'.$classification->id.'" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>Delete</a>
						</div>';
			})
			->make(true);
		}

	}
?>