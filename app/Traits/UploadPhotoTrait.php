<?php 
namespace App\Traits;
use Carbon\Carbon;

trait UploadPhotoTrait
{
	public function uploadPhoto($file,$owner = "",$loai_xe)
	{

	    $img_extension = $file->getClientOriginalExtension();

	    $owner = changeTitle($owner);

		$date = Carbon::now()->toDateString();

		$img_name = $owner."-".$date."-".uniqid().".".$img_extension;
		$img_path = "../storage/app/".$loai_xe.'/'.$img_name;

		\Storage::put($loai_xe.'/'.$img_name,file_get_contents($file));

		return $img_path;
	}
}