<?php
namespace App\Traits;
trait DeletePhotoTrait 
{
	public function deletePhoto($image_path)
	{
		$new_path = str_replace("../storage/app","",$image_path);
		\Storage::delete($new_path);
		return true;
	}
}