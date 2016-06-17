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
				return "<a  class='btn btn-primary' href='" . route('classification.edit', $classification->id) . "' id='ver_jugador'><i class='glyphicon glyphicon-edit'></i>Edit</a>
					<a  class='btn btn-danger' href='" . route('classification.delete', $classification->id) . "' id='ver_jugador'><i class='glyphicon glyphicon-remove'></i>Delete</a>
				";
			})
			->make(true);
		}

	}
?>