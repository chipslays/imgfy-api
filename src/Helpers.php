<?php 

use Chipslays\Imgfy\Imgfy;

if (! function_exists('upload_imgfy')) {
    /**
     * Upload images to Imgfy.cf
     *
     * @param string|array $image Path to image file
     * @param bool $secretly Generate super-secretly link
     * 
     * @return array Array with permalinks for uploaded images
     */
    function upload_imgfy($images, $secretly = false) {
        return Imgfy::upload($images, $secretly);
    }
}