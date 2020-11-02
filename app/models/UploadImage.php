<?php 

/**
 * 
 */
namespace App\models;
use \Verot\Upload\Upload;

class UploadImage
{
	public static function make($filesImage){
		$handle = new \Verot\Upload\Upload($filesImage);
		if ($handle->uploaded) {
			$handle->file_safe_name = true;
			$handle->image_resize         = true;
			$handle->image_x              = 10000;
			$handle->image_ratio_y        = true;
			$handle->process('uploads/');
			if ($handle->processed) {
				echo 'Картинка загруженно';
				return $handle->clean();
				
			} else {
				echo 'error : ' . $handle->error;
			}
		}
	}
}