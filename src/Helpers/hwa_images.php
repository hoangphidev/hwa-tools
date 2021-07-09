<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Storage Image
|--------------------------------------------------------------------------
*/

if (!function_exists('storage_folder_path')) {

    /**
     * Get storage folder path
     *
     * @param $folder
     * @return string
     */
    function storage_folder_path($folder)
    {
        if (!is_dir(public_path('storage'))) {
            Artisan::call('storage:link');
        }

        $path = storage_path('app/public/' . $folder . '/');
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        return $path;
    }
}

if (!function_exists('storage_image_path')) {

    /**
     * Get storage image path
     *
     * @param $folder
     * @param $imageName
     * @return string
     */
    function storage_image_path($folder, $imageName)
    {
        if (!is_dir(public_path('storage'))) {
            Artisan::call('storage:link');
        }

        $path = storage_path('app/public/' . $folder . '/');
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        return storage_path('app/public/' . $folder . '/' . $imageName);
    }
}

if (!function_exists('storage_image_url')) {

    /**
     * Get storage image url
     *
     * @param $folder
     * @param $imageName
     * @return string
     */
    function storage_image_url($folder, $imageName)
    {
        return asset('storage/' . $folder . '/' . $imageName);
    }
}

/*
|--------------------------------------------------------------------------
| S3 Image
|--------------------------------------------------------------------------
*/
