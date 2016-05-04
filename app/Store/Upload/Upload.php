<?php  
	namespace App\Store\Upload;

	use DateTime;
	use Intervention\Image\Facades\Image;
	use Symfony\Component\HttpFoundation\File\UploadedFile;

	class Upload
	{

		private $file;
		private $fileName;
		private $fileNameInDir;
		private $thumbnailFileNameInDir;
		private $fileExtension;
		private $size;
		private $mimeType;
		private $uploadPath;
		private $publicFilePath;
		private $thumbnailWidth;
		private $thumbnailHeight;
		
		function __construct(UploadedFile $file, $thumbnailWidth = 74, $thumbnailHeight = 103, $publicFilePath='')
		{
			$this->file = $file;
			$this->fileName = substr($file->getClientOriginalName(), 0, -4);
			$this->fileExtension = 'jpg';
			$this->size = $file->getSize();
			$this->mimeType = $file->getMimeType();
			$this->thumbnailWidth = $thumbnailWidth;
			$this->thumbnailHeight = $thumbnailHeight;
			$this->publicFilePath = $publicFilePath;
		}
	}
?>