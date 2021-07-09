<p align="center">
<a href="https://github.com/hoangphidev/hwa-tools" target="_blank">
<img src="https://hwavina.com/assets/images/logo-1.png" height="148">
</a>
</p>


<p align="center">
<a href="https://packagist.org/packages/hoangphi/hwa-tools"><img src="https://img.shields.io/packagist/dt/hoangphi/hwa-tools" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/hoangphi/hwa-tools"><img src="https://img.shields.io/packagist/v/hoangphi/hwa-tools" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/hoangphi/hwa-tools"><img src="https://img.shields.io/packagist/l/hoangphi/hwa-tools" alt="License"></a>
</p>

## About

[hwa-tools](https://github.com/hoangphidev/hwa-tools) is a helper package. It helps us to build and develop faster with pre-built functions. This saves a lot of time on future projects.

We share this package to give programmers an extra useful library. We hope people use this package not for commercialization or profit of any kind.

And finally, hope to receive more contributions and shares from all of you.

Thank you very much 🧡

## Install

1. You can install the package via composer:

```shell
composer require hoangphi/hwa-tools
```

2. Optional: The service provider will automatically get registered. Or you may manually add the service provider in your `config/app.php` file:

```php
'providers' => array(
    // ...
    HoangPhi\HwaTools\Providers\HwaToolServiceProvider::class,
);
```

3. You can customize the [`config/hwa_tools.php` config file](https://github.com/hoangphidev/hwa-tools/blob/master/config/hwa_tools.php) . If you customize file `config/hwa_tools.php`. You need to run the command below to clear cache and update the changes.

```shell script
php artisan config:cache

# or

php artisan optimize:clear
```

### Default config file contents

You can view the default config file contents at:

[https://github.com/hoangphidev/hwa-tools/blob/master/config/hwa_tools.php](https://github.com/hoangphidev/hwa-tools/blob/master/config/hwa_tools.php)

## Usage

### Helpers

Since this is a package with helper functions, after installing the package into the project, people can call the helper functions everywhere in the project.

Here are some helper functions we've built:

1. Commons

```php
app_name(); // Get website name, project name - Ex: Laravel

activate_status(); // Get status activate - Ex: 1 - activate

deactivate_status(); // Get status deactivate - Ex: 2 - deactivate

gender_male(); // Get gender male - Ex: 1 - male

gender_female(); // Get gender female - Ex: 1 - female

page_limit(); // Get page limit default in pagination - Ex: 12

```

2. Datetime

```php
current_day(); // Get current day - Ex: 01

current_month(); // Get current month - Ex: 07

current_year(); // Get current year - Ex: 2021

current_date(); // Get current - Ex: 2021-07-01 00:00:01

current_date('H:i:s d/m/Y'); // Get current date with format - Ex: 00:00:01 01/07/2021

custom_date('2021-07-01 00:00:01', 'H:i:s d/m/Y'); // Get customer date with format - Ex: 00:00:01 01/07/2021

custom_date('2021-07-01 00:00:01', 'H:i:s d/m/Y', 'en_EN'); // Get customer date with format and locale for diffForHumans - Ex: 00:00:01 01/07/2021 or 1 seconds or 1 minutes.

```

3. Images

```php
storage_folder_path('users'); // Check and create folder if not existed in storage.

storage_image_path('users', '1.jpg') // Check and get image from image storage path.

storage_image_url('users', '1.jpg') // Get public asset url image from storage.

```

4. Ip info

```php

get_user_agent(); // Get user agent

get_current_ip(); // Get current client ip

get_ip_info('127.0.0.1'); // Get info ip from http://api.ipstack.com

get_client_ip(); // Get client ip from https://ipinfo.io

code_to_country('EN'); // Convert country code to country name. Ex: EN to English

get_os(); // get OS client using

get_client_browser(); // get client browser using

get_device(); // get client device using

```

5. Response API

```php
send_ok_response('Message.', ['name' => 'Phi Hoang', 'phone' => '0989324221']); // Response normal with param 1 is message, param 2 is object or array data.

send_ok_response('Message.', '<paginate_items_object>', true); // Response with param 1 is message, param 2 is data paginate include results with meta, param 3 is boolean true to paginate.

send_created_response('Message.', 1); // Response with code 201 - param 1 is message, param 2 is id.

send_error_response('Message', 400); // Response error with code 400 is default. Message compare with code [401, 404, 403, 500].

```

### MetaTools

This tool helps you to easily manage the extended data fields of certain objects.

1. Create Meta Class with command.

Example: We need CustomerMeta. This tools help us make model file and migration file.

```shell script
php artisan hwa:make:meta Customer -m
```

The above command we have added -m to create the migration file.

2. Add allow type to `config/hwa_tools.php`

```php
'allow_type' => [
    .....
    'customer' => ['id', 'customer_id'],
],
```
3. You need to run the command below to clear cache and update the changes.

```shell script
php artisan config:cache

# or

php artisan optimize:clear
```

4. Run command to migrate the meta migration file to database

```shell script
php artisan migrate
```

After completing the above configuration steps you can use the methods available in the meta model in the classes you want.

```php
// Example
CustomerMeta:_update(1, 'gender', 'male'); // update or add new gender for customer has id is 1
```

Beside the functions and methods we have built, people can also build their own by inheriting our classes.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover a security vulnerability within [hwa-tools](https://github.com/hoangphidev/hwa-tools), please send an e-mail to [Phi Hoang](https://github.com/hoangphidev) via [hoangphidev@gmail.com](mailto:hoangphidev@gmail.com). All security vulnerabilities will be promptly addressed.

## Credits

- [Phi Hoang](https://github.com/hoangphidev)
- [Hwavina Inc.](https://github.com/hwavina)
- [All Contributors](../../contributors)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
