<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Server Requirements
    |--------------------------------------------------------------------------
    |
    | This is the default Laravel server requirements, you can add as many
    | as your application require, we check if the extension is enabled
    | by looping through the array and run "extension_loaded" on it.
    |
    */
    'core' => [
        'minPhpVersion' => '8.0',
    ],
    'final' => [
        'key' => true,
        'publish' => false,
    ],
    'requirements' => [
        'php' => [
            'Ctype',
            'cURL',
            'DOM',
            'Fileinfo',
            'Filter',
            'Hash',
            'Mbstring',
            'OpenSSL',
            'PCRE',
            'PDO',
            'Session',
            'Tokenizer',
            'XML'
        ],
        'apache' => [
            'mod_rewrite',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Folders Permissions
    |--------------------------------------------------------------------------
    |
    | This is the default Laravel folders permissions, if your application
    | requires more permissions just add them to the array list bellow.
    |
    */
    'permissions' => [
        'storage/app/' => '775',
        'storage/framework/' => '775',
        'storage/logs/' => '775',
        'bootstrap/cache/' => '775',
    ],

    /*
    |--------------------------------------------------------------------------
    | Artisan Command
    |--------------------------------------------------------------------------
    |
    | Set the artisan command that you want to run after php artisan migrate
    | https://artisan.page/11.x/#dbseed
    |
    */
    'artisan_command' => [
        'db:seed' => ['--force' => true]
    ],

    /*
    |--------------------------------------------------------------------------
    | Environment Form Wizard Validation Rules & Messages
    |--------------------------------------------------------------------------
    |
    | This are the default form field validation rules. Available Rules:
    | https://laravel.com/docs/11.x/validation#available-validation-rules
    |
    */
    'environment' => [
        'form' => [
            'rules' => [
                'app_name' => 'required|string|max:50',
                'environment' => 'required|string|max:50',
                'environment_custom' => 'required_if:environment,other|max:50',
                'app_debug' => 'required|string',
                'app_timezone' => 'nullable|string|max:50',
                'app_url' => 'required|url',

                'app_demo' => 'required|string|max:50',

                'app_locale' => 'nullable|string|max:50',
                'app_fallback_locale' => 'nullable|string|max:50',
                'app_faker_locale' => 'nullable|string|max:50',

                'app_maintenance_option' => 'nullable|string|max:50',
                'app_maintenance_driver' => 'required_if:app_maintenance_option,driver|string|max:50',
                'app_maintenance_store' => 'required_if:app_maintenance_option,store|string|max:50',

                'php_cli_server_workers' => 'nullable|numeric',

                'bcrypt_rounds' => 'nullable|numeric',

                'log_channel' => 'required|string|max:50',
                'log_stack' => 'nullable|string|max:50',
                'log_deprecations_channel' => 'required|string|max:50',
                'log_level' => 'required|string|max:50',

                'database_connection' => 'required|string|max:50',
                'database_hostname' => 'required_if:database_connection,mysql,pgsql,sqlsrv|string|max:50',
                'database_port' => 'required_if:database_connection,mysql,pgsql,sqlsrv|nullable|numeric',
                'database_name' => 'required_if:database_connection,mysql,sqlite,pgsql,sqlsrv|string|max:50',
                'database_username' => 'required_if:database_connection,mysql,pgsql,sqlsrv|max:50',
                'database_password' => 'required_if:database_connection,mysql,pgsql,sqlsrv|string|max:50',

                'session_driver' => 'required|string|max:50',
                'session_lifetime' => 'required|numeric',
                'session_encrypt' => 'nullable|string|max:50',
                'session_path' => 'nullable|string|max:50',
                'session_domain' => 'nullable|string|max:50',

                'broadcast_driver' => 'nullable|string|max:50',
                'broadcast_connection' => 'nullable|string|max:50',
                'filesystem_disk' => 'required|string|max:50',
                'queue_connection' => 'required|string|max:50',

                'cache_driver' => 'nullable|string|max:50',

                'cache_store' => 'nullable|string|max:50',
                'cache_prefix' => 'nullable|string|max:50',

                'memcached_host' => 'required|string|max:50',

                'redis_client' => 'nullable|string|max:50',
                'redis_host' => 'required|string|max:50',
                'redis_password' => 'nullable|string|max:50',
                'redis_port' => 'required|numeric',

                'mail_mailer' => 'required|string|max:50',
                'mail_scheme' => 'nullable|string|max:50',
                'mail_host' => 'required|string|max:50',
                'mail_port' => 'required|numeric',
                'mail_username' => 'nullable|string|max:50',
                'mail_password' => 'nullable|string|max:50',
                'mail_encryption' => 'nullable|string|max:50',
                'mail_from_address' => 'nullable|email|max:50',
                'mail_from_name' => 'nullable|string|max:50',

                'aws_access_key_id' => 'nullable|string|max:50',
                'aws_secret_access_key' => 'nullable|string|max:50',
                'aws_default_region' => 'required|string|max:50',
                'aws_bucket' => 'nullable|string|max:50',
                'aws_use_path_style_endpoint' => 'required|string|max:50',

                'pusher_app_id' => 'nullable|string|max:50',
                'pusher_app_key' => 'nullable|string|max:50',
                'pusher_app_secret' => 'nullable|string|max:50',
                'pusher_host' => 'nullable|string|max:50',
                'pusher_port' => 'nullable|numeric',
                'pusher_scheme' => 'nullable|string|max:50',
                'pusher_app_cluster' => 'nullable|string|max:50',

                'vite_pusher_app_key' => 'nullable|string|max:50',
                'vite_pusher_host' => 'nullable|string|max:50',
                'vite_pusher_port' => 'nullable|string|max:50',
                'vite_pusher_scheme' => 'nullable|string|max:50',
                'vite_pusher_app_cluster' => 'nullable|string|max:50',

                'vite_app_name' => 'nullable|string|max:50',

                'mix_pusher_app_key' => 'nullable|string|max:50',
                'mix_pusher_app_cluster' => 'nullable|string|max:50',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Installed Middleware Options
    |--------------------------------------------------------------------------
    | Different available status switch configuration for the
    | canInstall middleware located in `canInstall.php`.
    |
    */
    'installed' => [
        'redirectOptions' => [
            'route' => [
                'name' => 'welcome',
                'message' => 'The application is already installed.',
                'data' => [],
            ],
            'url' => [
                'name' => '/',
                'message' => 'The application is already installed.',
                'data' => [],
            ],
            'abort' => [
                'type' => '404',
            ],
            'dump' => [
                'data' => 'Dumping a not found message.',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Selected Installed Middleware Option
    |--------------------------------------------------------------------------
    | The selected option fo what happens when an installer instance has been
    | Default output is to `/resources/views/error/404.blade.php` if none.
    | The available middleware options include:
    | route, abort, dump, 404, default, ''
    |
    */
    'installedAlreadyAction' => 'url',

    /*
    |--------------------------------------------------------------------------
    | Updater Enabled
    |--------------------------------------------------------------------------
    | Can the application run the '/update' route with the migrations.
    | The default option is set to False if none is present.
    | Boolean value
    |
    */
    'updaterEnabled' => 'false',

];
