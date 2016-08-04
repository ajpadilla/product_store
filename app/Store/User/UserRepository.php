<?php  
	namespace App\Store\User;

	use App\Store\Base\BaseRepository;
	use App\Store\User\User;
	use Yajra\Datatables\Datatables;

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
			return Datatables::of($users)
			->addColumn('country_id', function($user){
				return $user->country->name;
			})
			->addColumn('photo', function($user){
				$img = '';
				$photo = $user->first_photo;
				if ($photo != false) {
					$img .= "	<a href='#'>
					<img class='mini-photo' alt='" . $photo->filename . "' src='" . asset($photo->complete_thumbnail_path) . "'>
					</a>";
				}
				return $img;
			})
			->addColumn('action', function($user){
				return "<a  class='btn btn-primary' href='" . route('product.edit', $user->id) . "'>
							<i class='glyphicon glyphicon-edit'></i>Edit
						</a><br/>
				";
			})
			->make(true);
		}

	}

?>