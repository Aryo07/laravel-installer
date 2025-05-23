<?php

return [

    /*
     *
     * Shared translations.
     *
     */
    'title' => 'Welcome to The Application Installer',
    'next' => 'Next Step',
    'back' => 'Previous',
    'finish' => 'Install',
    'forms' => [
        'errorTitle' => 'The Following errors occurred:',
    ],

    /*
     *
     * Home page translations.
     *
     */
    'welcome' => [
        'templateTitle' => 'Welcome',
        'title'   => 'Welcome to The Application Installer',
        'message' => 'Easy Installation and Setup Wizard.',
        'next'    => 'Check Requirements',
    ],

    /*
     *
     * Requirements page translations.
     *
     */
    'requirements' => [
        'templateTitle' => 'Step 1 | Server Requirements',
        'title' => 'Server Requirements',
        'next'    => 'Check Permissions',
    ],

    /*
     *
     * Permissions page translations.
     *
     */
    'permissions' => [
        'templateTitle' => 'Step 2 | Permissions',
        'title' => 'Permissions',
        'next' => 'Configure Environment',
    ],

    /*
     *
     * Environment page translations.
     *
     */
    'environment' => [
        'menu' => [
            'templateTitle' => 'Step 3 | Environment Settings',
            'title' => 'Environment Settings',
            'desc' => 'Please select how you want to configure the apps <code>.env</code> file.',
            'wizard-button' => 'Form Wizard Setup',
            'classic-button' => 'Classic Text Editor',
        ],
        'wizard' => [
            'templateTitle' => 'Step 3 | Environment Settings | Guided Wizard',
            'title' => 'Guided <code>.env</code> Wizard',
            'tabs' => [
                'environment' => 'Environment',
                'database' => 'Database',
                'application' => 'Application',
            ],
            'form' => [
                'name_required' => 'An environment name is required.',
                'app_name_label' => 'App Name',
                'app_name_placeholder' => 'App Name',
                'app_environment_label' => 'App Environment',
                'app_environment_label_local' => 'Local',
                'app_environment_label_developement' => 'Development',
                'app_environment_label_testing' => 'Testing',
                'app_environment_label_production' => 'Production',
                'app_environment_label_other' => 'Other',
                'app_environment_placeholder_other' => 'Enter your environment...',
                'app_debug_label' => 'App Debug',
                'app_debug_label_true' => 'True',
                'app_debug_label_false' => 'False',
                'app_demo_label' => 'App Demo',
                'app_demo_label_true' => 'True',
                'app_demo_label_false' => 'False',
                'app_url_label' => 'App Url',
                'app_url_placeholder' => 'App Url',
                'db_connection_failed' => 'Could not connect to the database.',
                'db_connection_label' => 'Database Connection',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'Database Host',
                'db_host_placeholder' => 'Database Host',
                'db_port_label' => 'Database Port',
                'db_port_placeholder' => 'Database Port',
                'db_name_label' => 'Database Name',
                'db_name_placeholder' => 'Database Name',
                'db_username_label' => 'Database User Name',
                'db_username_placeholder' => 'Database User Name',
                'db_password_label' => 'Database Password',
                'db_password_placeholder' => 'Database Password',
                'app_timezone_label' => 'App Timezone',
                'app_timezone_label_utc' => 'UTC (Coordinated Universal Time Zone)',
                'app_timezone_label_wib' => 'Asia/Jakarta',
                'app_timezone_label_wita' => 'Asia/Makassar',
                'app_timezone_label_wit' => 'Asia/Jayapura',

                'env_tabs' => [
                    'more_info' => 'More Info',
                    'env_tabs_title' => 'Environment Extra Variables',
                    'locale_label' => 'App Locale',
                    'locale_placeholder' => 'App Locale',
                    'app_locale_id_label' => 'Indonesian Locale',
                    'app_locale_id_placeholder' => 'Indonesian Locale',
                    'app_locale_en_label' => 'English Locale',
                    'app_locale_en_placeholder' => 'English Locale',
                    'fallback_locale_label' => 'App Fallback Locale',
                    'fallback_locale_placeholder' => 'App Fallback Locale',
                    'app_fallback_locale_id_label' => 'Indonesian Locale',
                    'app_fallback_locale_id_placeholder' => 'Indonesian Locale',
                    'app_fallback_locale_en_label' => 'English Locale',
                    'app_fallback_locale_en_placeholder' => 'English Locale',
                    'faker_locale_label' => 'App Faker Locale',
                    'faker_locale_placeholder' => 'App Faker Locale',
                    'app_faker_locale_id_label' => 'Indonesian Locale',
                    'app_faker_locale_id_placeholder' => 'Indonesian Locale',
                    'app_faker_locale_en_label' => 'English Locale',
                    'app_faker_locale_en_placeholder' => 'English Locale',
                    'maintenance_driver_label' => 'App Maintenance Driver',
                    'maintenance_driver_placeholder' => 'File',
                    'maintenance_store_label' => 'App Maintenance Store',
                    'maintenance_store_placeholder' => 'Database',
                    'maintenance_option_label' => 'App Maintenance Mode',
                    'maintenance_option_placeholder' => 'App Maintenance Mode',
                    'php_cli_server_workers_label' => 'PHP CLI Server Workers',
                    'php_cli_server_workers_placeholder' => 'PHP CLI Server Workers',
                    'bcrypt_rounds_label' => 'Bcrypt Rounds',
                    'bcrypt_rounds_placeholder' => 'Bcrypt Rounds',
                    'log_channel_label' => 'Log Channel',
                    'log_channel_placeholder' => 'Log Channel',
                    'log_stack_label' => 'Log Stack',
                    'log_stack_placeholder' => 'Log Stack',
                    'log_deprecations_channel_label' => 'Log Deprecations Channel',
                    'log_deprecations_channel_placeholder' => 'Log Deprecations Channel',
                    'log_level_label' => 'Log Level',
                    'log_level_placeholder' => 'Log Level',
                ],

                'app_tabs' => [
                    'more_info' => 'More Info',
                    'session_title' => 'Session',
                    'session_label' => 'Session Driver',
                    'session_placeholder' => 'Session Driver',
                    'session_lifetime_label' => 'Session Lifetime',
                    'session_lifetime_placeholder' => 'Session Lifetime',
                    'session_encrypt_label' => 'Session Encrypt',
                    'session_encrypt_placeholder' => 'Session Encrypt',
                    'session_path_label' => 'Session Path',
                    'session_path_placeholder' => 'Session Path',
                    'session_domain_label' => 'Session Domain',
                    'session_domain_placeholder' => 'Session Domain',

                    'broadcast_title' => 'Broadcast, Filesystem, Queue, Cache, Memcached, & Vite',
                    'broadcast_driver_label' => 'Broadcast Driver',
                    'broadcast_driver_placeholder' => 'Broadcast Driver',
                    'cache_driver_label' => 'Cache Driver',
                    'cache_driver_placeholder' => 'Cache Driver',
                    'broadcast_connection_label' => 'Broadcast Connection',
                    'broadcast_connection_placeholder' => 'Broadcast Connection',
                    'filesystem_disk_label' => 'Filesystem Disk',
                    'filesystem_disk_placeholder' => 'Filesystem Disk',
                    'queue_connection_label' => 'Queue Connection',
                    'queue_connection_placeholder' => 'Queue Connection',
                    'cache_store_label' => 'Cache Store',
                    'cache_store_placeholder' => 'Cache Store',
                    'cache_prefix_label' => 'Cache Prefix',
                    'cache_prefix_placeholder' => 'Cache Prefix',
                    'memcached_host_label' => 'Memcached Host',
                    'memcached_host_placeholder' => 'Memcached Host',
                    'vite_app_name_label' => 'Vite App Name',
                    'vite_app_name_placeholder' => 'Vite App Name',

                    'redis_title' => 'Redis',
                    'redis_client_label' => 'Redis Client',
                    'redis_client_placeholder' => 'Redis Client',
                    'redis_host_label' => 'Redis Host',
                    'redis_host_placeholder' => 'Redis Host',
                    'redis_password_label' => 'Redis Password',
                    'redis_password_placeholder' => 'Redis Password',
                    'redis_port_label' => 'Redis Port',
                    'redis_port_placeholder' => 'Redis Port',

                    'mail_title' => 'Mail',
                    'mail_mailer_label' => 'Mail Mailer',
                    'mail_mailer_placeholder' => 'Mail Mailer',
                    'mail_host_label' => 'Mail Host',
                    'mail_host_placeholder' => 'Mail Host',
                    'mail_port_label' => 'Mail Port',
                    'mail_port_placeholder' => 'Mail Port',
                    'mail_username_label' => 'Mail Username',
                    'mail_username_placeholder' => 'Mail Username',
                    'mail_password_label' => 'Mail Password',
                    'mail_password_placeholder' => 'Mail Password',
                    'mail_encryption_label' => 'Mail Encryption',
                    'mail_encryption_placeholder' => 'Mail Encryption',
                    'mail_from_address_label' => 'Mail From Address',
                    'mail_from_address_placeholder' => 'Mail From Address',
                    'mail_from_name_label' => 'Mail From Name',
                    'mail_from_name_placeholder' => 'Mail From Name',

                    'aws_title' => 'AWS',
                    'aws_access_key_id_label' => 'AWS Access Key Id',
                    'aws_access_key_id_placeholder' => 'AWS Access Key Id',
                    'aws_secret_access_key_label' => 'AWS Secret Access Key',
                    'aws_secret_access_key_placeholder' => 'AWS Secret Access Key',
                    'aws_default_region_label' => 'AWS Default Region',
                    'aws_default_region_placeholder' => 'AWS Default Region',
                    'aws_bucket_label' => 'AWS Bucket',
                    'aws_bucket_placeholder' => 'AWS Bucket',
                    'aws_use_path_style_endpoint_label' => 'AWS Use Path Style Endpoint',
                    'aws_use_path_style_endpoint_placeholder' => 'AWS Use Path Style Endpoint',

                    'pusher_title' => 'Pusher',
                    'pusher_app_id_label' => 'Pusher App Id',
                    'pusher_app_id_placeholder' => 'Pusher App Id',
                    'pusher_app_key_label' => 'Pusher App Key',
                    'pusher_app_key_placeholder' => 'Pusher App Key',
                    'pusher_app_secret_label' => 'Pusher App Secret',
                    'pusher_app_secret_placeholder' => 'Pusher App Secret',
                    'pusher_host_label' => 'Pusher Host',
                    'pusher_host_placeholder' => 'Pusher Host',
                    'pusher_port_label' => 'Pusher Port',
                    'pusher_port_placeholder' => 'Pusher Port',
                    'pusher_scheme_label' => 'Pusher Scheme',
                    'pusher_scheme_placeholder' => 'Pusher Scheme',
                    'pusher_app_cluster_label' => 'Pusher App Cluster',
                    'pusher_app_cluster_placeholder' => 'Pusher App Cluster',
                ],
                'buttons' => [
                    'setup_database' => 'Setup Database',
                    'setup_application' => 'Setup Application',
                    'install' => 'Install',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Step 3 | Environment Settings | Classic Editor',
            'title' => 'Classic Environment Editor',
            'save' => 'Save .env',
            'back' => 'Use Form Wizard',
            'install' => 'Save and Install',
        ],
        'success' => 'Your .env file settings have been saved.',
        'errors' => 'Unable to save the .env file, Please create it manually.',
    ],

    'install' => 'Install',

    /*
     *
     * Installed Log translations.
     *
     */
    'installed' => [
        'success_log_message' => 'Application Installer successfully INSTALLED on date: ',
    ],

    /*
     *
     * Final page translations.
     *
     */
    'final' => [
        'title' => 'Installation Finished',
        'templateTitle' => 'Installation Finished',
        'finished' => 'Application has been successfully installed.',
        'migration' => 'Migration & Seed Console Output:',
        'console' => 'Application Console Output:',
        'log' => 'Installation Log Entry:',
        'env' => 'Final .env File:',
        'exit' => 'Click here to exit',
    ],

    /*
     *
     * Update specific translations
     *
     */
    'updater' => [
        /*
         *
         * Shared translations.
         *
         */
        'title' => 'Application Updater',

        /*
         *
         * Welcome page translations for update feature.
         *
         */
        'welcome' => [
            'title'   => 'Welcome To The Application Updater',
            'message' => 'Welcome to the update wizard.',
        ],

        /*
         *
         * Welcome page translations for update feature.
         *
         */
        'overview' => [
            'title'   => 'Overview',
            'message' => 'There is 1 update.|There are :number updates.',
            'install_updates' => 'Install Updates',
        ],

        /*
         *
         * Final page translations.
         *
         */
        'final' => [
            'title' => 'Finished',
            'finished' => 'Application\'s database has been successfully updated.',
            'exit' => 'Click here to exit',
        ],

        'log' => [
            'success_message' => 'Application Installer successfully UPDATED on ',
        ],
    ],
];
