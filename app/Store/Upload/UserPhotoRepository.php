<?php  
 namespace App\Store\Upload;

 use App\Store\Base\BaseRepository;
 use App\Store\Upload\Upload;
 use App\Store\Upload\UserPhoto;
 use Symfony\Component\HttpFoundation\File\UploadedFile;
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

	public function register(UploadedFile $file, $user_id)
	{
		$this->upload = new Upload($file, 74, 103, 'storage/users/');
		$this->upload->process();
		$data = array('complete_path' => $this->upload->getCompletePublicFilePath(),
				'complete_thumbnail_path'=> $this->upload->getCompleteThumbnailPublicFilePath(),
				'filename' => $this->upload->getFileName(),
				'path' => $this->upload->getUploadPath(),
				'extension' => $this->upload->getFileExtension(),
				'size' => $this->upload->getSize(),
				'mimetype' => $this->upload->getMimeType(),
				'user_id' => $user_id
			);
		parent::create($data);
	}

	public function remove($complete_path, $complete_thumbnail_path, $idPhoto)
	{
		if(\File::exists($complete_path) && \File::exists($complete_thumbnail_path))
		{
			\File::delete($complete_path);
			\File::delete($complete_thumbnail_path);
			parent::delete($idPhoto);
		}
	}
}

?>