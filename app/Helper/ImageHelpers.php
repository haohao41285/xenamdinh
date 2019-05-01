<?php
function uploadImage($input,$path){
	$pathFile = env('URL_FILE_WRITE');
    $name = $file->getClientOriginalName();
    $name = str_replace(" ", "-", $name);
    $pathImage = '/images/' . $place_ip_license . '/website/' . $folder_upload . '/';
    $filename = strtotime('now') . strtolower($name);
    if (!file_exists($pathFile . $pathImage)) {
        mkdir($pathFile . $pathImage, 0777, true);
    }
    $file->move($pathFile . $pathImage, $filename);
    return $pathImage . $filename;

}