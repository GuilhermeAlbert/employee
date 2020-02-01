<?php

namespace App\Utils;
/*
 * Image utils
 *
 * Use method: Image::getCachedPicture();
 */
class Preferences
{
	protected $appends = ['thumb'];

	public function getThumbAttribute()
	{
		return $this->getCachedPicture();
    }
        
	public function getCachedPicture($image)
	{
		$path = asset_url();
        
        if (strpos(asset_url(), "localhost") !== false) {
			$path = env('APP_URL');
        }
        
        return rtrim($path, "/") . "/img/cache/thumb/" . basename($image);
	}
}