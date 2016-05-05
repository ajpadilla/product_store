<?php  
 namespace App\Store\Upload;

 use App\Store\Base\BaseRepository;
  use App\Store\Upload\Upload;
 use App\Store\Upload\UserPhoto;
/**
* 
*/
class UserPhotoRepository extends BaseRepository
{
	protected $upload;
	function __construct()
	{
		  $this->setModel(new UserPhoto);
	}

	public function FunctionName($value='')
	{
		# code...
	}
}

?>