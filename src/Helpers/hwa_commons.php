<?php

use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;

if (!function_exists('app_name')) {

    /**
     * @return Repository|Application|mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

/*
|--------------------------------------------------------------------------
| Get app domain from app_url
|--------------------------------------------------------------------------
*/


if (!function_exists('app_domain')) {

    function app_domain()
    {
        $app_url = config('app.url');
        $parse = parse_url($app_url);
        return $parse['host'];
    }
}

/*
|--------------------------------------------------------------------------
| Status = Activate | Deactivate
|--------------------------------------------------------------------------
*/

if (!function_exists('activate_status')) {

    /**
     * Activate status
     *
     * @return Repository|Application|mixed
     */
    function activate_status()
    {
        return config('hwa_tools.status.activate');
    }
}

if (!function_exists('deactivate_status')) {

    /**
     * Deactivate status
     *
     * @return Repository|Application|mixed
     */
    function deactivate_status()
    {
        return config('hwa_tools.status.deactivate');
    }
}

/*
|--------------------------------------------------------------------------
| Gender = Male | Female
|--------------------------------------------------------------------------
*/

if (!function_exists('gender_male')) {

    /**
     * Gender male
     *
     * @return Repository|Application|mixed
     */
    function gender_male()
    {
        return config('hwa_tools.gender.male');
    }
}

if (!function_exists('gender_female')) {

    /**
     * Gender female
     *
     * @return Repository|Application|mixed
     */
    function gender_female()
    {
        return config('hwa_tools.gender.female');
    }
}

/*
|--------------------------------------------------------------------------
| Paginate = page_limit
|--------------------------------------------------------------------------
*/

if (!function_exists('page_limit')) {

    /**
     * Paginate page limit
     *
     * @return Repository|Application|int|mixed
     */
    function page_limit()
    {
        return config('hwa_tools.page_limit') ?: intval(12);
    }
}

/*
|--------------------------------------------------------------------------
| Modify .env file
|--------------------------------------------------------------------------
*/

if (!function_exists('setEnv')) {

    /**
     * Change value .env
     *
     * @param $data
     * @return bool
     */
    function setEnv($data)
    {
        if (empty($data) || !is_array_assoc($data) || !is_array($data) || !is_file(base_path('.env'))) {
            return false;
        }

        $env = file_get_contents(base_path('.env'));

        $env = explode("\n", $env);

        foreach ($data as $data_key => $data_value) {

            $updated = false;

            foreach ($env as $env_key => $env_value) {

                $entry = explode('=', $env_value, 2);

                // Check if new or old key
                if ($entry[0] == $data_key) {
                    $env[$env_key] = $data_key . '=' . $data_value;
                    $updated       = true;
                } else {
                    $env[$env_key] = $env_value;
                }
            }

            // Lets create if not available
            if (!$updated) {
                $env[] = $data_key . '=' . $data_value;
            }
        }

        $env = implode("\n", $env);

        file_put_contents(base_path('.env'), $env);

        return true;
    }
}

/*
|--------------------------------------------------------------------------
| Check array assoc
|--------------------------------------------------------------------------
*/

if (!function_exists('is_array_assoc')) {

    /**
     * Check array assoc
     *
     * @param array $arr
     * @return bool
     */
    function is_array_assoc(array $arr)
    {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}

/*
|--------------------------------------------------------------------------
| Random string = 10 string
|--------------------------------------------------------------------------
*/

if (!function_exists('generate_random_string')) {

    function generate_random_string($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
