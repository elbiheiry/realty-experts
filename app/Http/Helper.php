<?php
/**
 * Created by PhpStorm.
 * User: elbih
 * Date: 8/18/2020
 * Time: 10:34 PM
 */

use Intervention\Image\Facades\Image;

if ( ! function_exists( 'admin' ) ) {
	function admin() {
		return auth()->guard( 'admin' );
	}
}

if ( ! function_exists( 'image_store' ) ) {
	function image_store( $image, $path ) {

		$image->store( $path );
		$name = $image->hashName();

		return $name;
	}
}
if ( ! function_exists( 'image_edit' ) ) {
	function image_edit( $image, $path, $width = null, $height = null ) {
		return Image::make( storage_path( 'app/' . $path . '/' . $image ) )
		            ->resize( $width, $height )
		            ->save( storage_path( 'app/' . $path . '/' . $image ) );
	}
}