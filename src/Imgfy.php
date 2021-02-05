<?php

namespace Chipslays\Imgfy;

class Imgfy
{
    const API_URL = 'https://imgfy.cf/api/v1';

    /**
     * Upload images to Imgfy.cf
     *
     * @param string|array $image Path to image file
     * @param bool $secretly Generate super-secretly link
     * @return array Array with permalinks for uploaded images
     */
    public static function upload($images, $secretly = false): array
    {
        $curl = curl_init();

        $options = [
            CURLOPT_URL => self::API_URL . '/upload/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 20,
            CURLOPT_POST => true,
        ];

        $images = array_map(fn($item) => new \CurlFile($item, 'image/imgfy'), (array) $images);

        $options[CURLOPT_POSTFIELDS] = array_merge($images, [
            'secret' => $secretly ? '1' : null,
        ]);

        curl_setopt_array($curl, $options);

        $response = json_decode(curl_exec($curl), true);
            
        curl_close($curl);

        return $response['result'];
    }
}
