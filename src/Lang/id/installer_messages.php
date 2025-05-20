<?php

return [

    /*
     *
     * Shared translations.
     *
     */
    'title' => 'Laravel Installer',
    'next' => 'Selanjutnya',
    'back' => 'Kembali',
    'finish' => 'Pasang',
    'forms' => [
        'errorTitle' => 'Terjadi galat sebagai berikut:',
    ],

    /*
     *
     * Home page translations.
     *
     */
    'welcome' => [
        'templateTitle' => 'Selamat Datang',
        'title'   => 'Laravel Installer',
        'message' => 'Instalasi Mudah dan Persiapan Aplikasi',
        'next'    => 'Cek Kebutuhan',
    ],

    /*
     *
     * Requirements page translations.
     *
     */
    'requirements' => [
        'templateTitle' => 'Langkah 1 | Kebutuhan Server',
        'title' => 'Kebutuhan Server',
        'next'    => 'Cek Hak Akses',
    ],

    /*
     *
     * Permissions page translations.
     *
     */
    'permissions' => [
        'templateTitle' => 'Langkah 2 | Hak Akses',
        'title' => 'Hak Akses',
        'next' => 'Konfigurasi Lingkungan',
    ],

    /*
     *
     * Environment page translations.
     *
     */
    'environment' => [
        'menu' => [
            'templateTitle' => 'Langkah 3 | Penyetelan Lingkungan',
            'title' => 'Penyetelan Lingkungan',
            'desc' => 'Silahkan pilih bagaimana Anda akan mengkofigurasi berkas <code>.env</code> aplikasi.',
            'wizard-button' => 'Form Penyetelan Wizard',
            'classic-button' => 'Classic Text Editor',
        ],
        'wizard' => [
            'templateTitle' => 'Langkah 3 | Penyetelan Lingkungan | Wizard Terpandu',
            'title' => 'Wizard <code>.env</code> Terpandu',
            'tabs' => [
                'environment' => 'Lingkungan',
                'database' => 'Basis Data',
                'application' => 'Aplikasi',
            ],
            'form' => [
                'name_required' => 'Lingkungan aplikasi harus ditetapkan',
                'app_name_label' => 'Nama Aplikasi',
                'app_name_placeholder' => 'Nama Aplikasi',
                'app_environment_label' => 'Lingkungan Aplikasi',
                'app_environment_label_local' => 'Lokal',
                'app_environment_label_developement' => 'Pengembangan',
                'app_environment_label_testing' => 'Pengujian',
                'app_environment_label_production' => 'Produksi',
                'app_environment_label_other' => 'Lainnya',
                'app_environment_placeholder_other' => 'Masukan lingkungan...',
                'app_debug_label' => 'Debug Aplikasi',
                'app_debug_label_true' => 'Iya',
                'app_debug_label_false' => 'Tidak',
                'app_demo_label' => 'Demo Aplikasi',
                'app_demo_label_true' => 'Iya',
                'app_demo_label_false' => 'Tidak',
                'app_url_label' => 'URL Aplikasi',
                'app_url_placeholder' => 'URL Aplikasi',
                'db_connection_label' => 'Koneksi Basis Data',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'Host Basis Data',
                'db_host_placeholder' => 'Host Basis Data',
                'db_port_label' => 'Port Basis Data',
                'db_port_placeholder' => 'Port Basis Data',
                'db_name_label' => 'Nama Basis Data',
                'db_name_placeholder' => 'Nama Basis Data',
                'db_username_label' => 'Pengguna Basis Data',
                'db_username_placeholder' => 'Pengguna Basis Data',
                'db_password_label' => 'Kata Sandi Basis Data',
                'db_password_placeholder' => 'Kata Sandi Basis Data',
                'app_timezone_label' => 'Zona Waktu Aplikasi',
                'app_timezone_label_utc' => 'UTC (Zona Waktu Universal Terkoordinasi)',
                'app_timezone_label_wib' => 'Asia/Jakarta',
                'app_timezone_label_wita' => 'Asia/Makassar',
                'app_timezone_label_wit' => 'Asia/Jayapura',

                'env_tabs' => [
                    'more_info' => 'Informasi Lainnya',
                    'env_tabs_title' => 'Variabel Lingkungan Tambahan',
                    'locale_label' => 'Bahasa Aplikasi',
                    'locale_placeholder' => 'Bahasa Aplikasi',
                    'app_locale_id_label' => 'Bahasa Indonesia',
                    'app_locale_id_placeholder' => 'Bahasa Indonesia',
                    'app_locale_en_label' => 'Bahasa Inggris',
                    'app_locale_en_placeholder' => 'Bahasa Inggris',
                    'fallback_locale_label' => 'Bahasa Aplikasi',
                    'fallback_locale_placeholder' => 'Bahasa Aplikasi',
                    'app_fallback_locale_id_label' => 'Bahasa Indonesia',
                    'app_fallback_locale_id_placeholder' => 'Bahasa Indonesia',
                    'app_fallback_locale_en_label' => 'Bahasa Inggris',
                    'app_fallback_locale_en_placeholder' => 'Bahasa Inggris',
                    'faker_locale_label' => 'Bahasa Faker Aplikasi',
                    'faker_locale_placeholder' => 'Bahasa Faker Aplikasi',
                    'app_faker_locale_id_label' => 'Bahasa Indonesia',
                    'app_faker_locale_id_placeholder' => 'Bahasa Indonesia',
                    'app_faker_locale_en_label' => 'Bahasa Inggris',
                    'app_faker_locale_en_placeholder' => 'Bahasa Inggris',
                    'maintenance_driver_label' => 'Driver Mode Pemeliharaan',
                    'maintenance_driver_placeholder' => 'File',
                    'maintenance_store_label' => 'Penyimpanan Mode Pemeliharaan',
                    'maintenance_store_placeholder' => 'Basis Data',
                    'maintenance_option_label' => 'Mode Pemeliharaan Aplikasi',
                    'maintenance_option_placeholder' => 'Mode Pemeliharaan Aplikasi',
                    'bcrypt_rounds_label' => 'Jumlah Putaran Bcrypt',
                    'bcrypt_rounds_placeholder' => 'Jumlah Putaran Bcrypt',
                    'log_channel_label' => 'Saluran Log',
                    'log_channel_placeholder' => 'Saluran Log',
                    'log_stack_label' => 'Stack Log',
                    'log_stack_placeholder' => 'Stack Log',
                    'log_deprecations_channel_label' => 'Saluran Log Depresiasi',
                    'log_deprecations_channel_placeholder' => 'Saluran Log Depresiasi',
                    'log_level_label' => 'Tingkat Log',
                    'log_level_placeholder' => 'Tingkat Log',
                ],

                'app_tabs' => [
                    'more_info' => 'Info Lainnya',
                    'session_title' => 'Sesi',
                    'session_label' => 'Driver Sesi',
                    'session_placeholder' => 'Driver Sesi',
                    'session_lifetime_label' => 'Waktu Aktif Sesi',
                    'session_lifetime_placeholder' => 'Waktu Aktif Sesi',
                    'session_encrypt_label' => 'Enkripsi Sesi',
                    'session_encrypt_placeholder' => 'Enkripsi Sesi',
                    'session_path_label' => 'Path Sesi',
                    'session_path_placeholder' => 'Path Sesi',
                    'session_domain_label' => 'Domain Sesi',
                    'session_domain_placeholder' => 'Domain Sesi',

                    'broadcast_title' => 'Broadcast, Filesystem, Queue, Cache, Memcached, & Vite',
                    'broadcast_connection_label' => 'Koneksi Broadcast',
                    'broadcast_connection_placeholder' => 'Koneksi Broadcast',
                    'filesystem_disk_label' => 'Disk Filesystem',
                    'filesystem_disk_placeholder' => 'Disk Filesystem',
                    'queue_connection_label' => 'Koneksi Queue',
                    'queue_connection_placeholder' => 'Koneksi Queue',
                    'cache_store_label' => 'Penyimpanan Cache',
                    'cache_store_placeholder' => 'Penyimpanan Cache',
                    'cache_prefix_label' => 'Prefix Cache',
                    'cache_prefix_placeholder' => 'Prefix Cache',
                    'memcached_host_label' => 'Host Memcached',
                    'memcached_host_placeholder' => 'Host Memcached',
                    'vite_app_name_label' => 'Nama Aplikasi Vite',
                    'vite_app_name_placeholder' => 'Nama Aplikasi Vite',

                    'redis_title' => 'Redis',
                    'redis_client_label' => 'Client Redis',
                    'redis_client_placeholder' => 'Client Redis',
                    'redis_host_label' => 'Host Redis',
                    'redis_host_placeholder' => 'Host Redis',
                    'redis_password_label' => 'Password Redis',
                    'redis_password_placeholder' => 'Password Redis',
                    'redis_port_label' => 'Port Redis',
                    'redis_port_placeholder' => 'Port Redis',

                    'mail_title' => 'Email',
                    'mail_mailer_label' => 'Mailer Email',
                    'mail_mailer_placeholder' => 'Mailer Email',
                    'mail_host_label' => 'Host Email',
                    'mail_host_placeholder' => 'Host Email',
                    'mail_port_label' => 'Port Email',
                    'mail_port_placeholder' => 'Port Email',
                    'mail_username_label' => 'Username Email',
                    'mail_username_placeholder' => 'Username Email',
                    'mail_password_label' => 'Password Email',
                    'mail_password_placeholder' => 'Password Email',
                    'mail_encryption_label' => 'Enkripsi Email',
                    'mail_encryption_placeholder' => 'Enkripsi Email',
                    'mail_from_address_label' => 'Alamat Pengirim Email',
                    'mail_from_address_placeholder' => 'Alamat Pengirim Email',
                    'mail_from_name_label' => 'Nama Pengirim Email',
                    'mail_from_name_placeholder' => 'Nama Pengirim Email',

                    'aws_title' => 'AWS',
                    'aws_access_key_id_label' => 'AWS Access Key Id',
                    'aws_access_key_id_placeholder' => 'AWS Access Key Id',
                    'aws_secret_access_key_label' => 'AWS Secret Access Key',
                    'aws_secret_access_key_placeholder' => 'AWS Secret Access Key',
                    'aws_default_region_label' => 'Wilayah Default AWS',
                    'aws_default_region_placeholder' => 'Wilayah Default AWS',
                    'aws_bucket_label' => 'Bucket AWS',
                    'aws_bucket_placeholder' => 'Bucket AWS',
                    'aws_use_path_style_endpoint_label' => 'Gunakan Path Style Endpoint AWS',
                    'aws_use_path_style_endpoint_placeholder' => 'Gunakan Path Style Endpoint AWS',

                    'pusher_title' => 'Pusher',
                    'pusher_app_id_label' => 'Pusher App Id',
                    'pusher_app_id_placeholder' => 'Pusher App Id',
                    'pusher_app_key_label' => 'Pusher App Key',
                    'pusher_app_key_placeholder' => 'Pusher App Key',
                    'pusher_app_secret_label' => 'Pusher App Secret',
                    'pusher_app_secret_placeholder' => 'Pusher App Secret',
                    'pusher_host_label' => 'Host Pusher',
                    'pusher_host_placeholder' => 'Host Pusher',
                    'pusher_port_label' => 'Port Pusher',
                    'pusher_port_placeholder' => 'Port Pusher',
                    'pusher_scheme_label' => 'Skema Pusher',
                    'pusher_scheme_placeholder' => 'Skema Pusher',
                    'pusher_app_cluster_label' => 'Cluster Aplikasi Pusher',
                    'pusher_app_cluster_placeholder' => 'Cluster Aplikasi Pusher',
                ],
                'buttons' => [
                    'setup_database' => 'Setel Basis Data',
                    'setup_application' => 'Setel Aplikasi',
                    'install' => 'Pasang',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Langkah 3 | Penyetelan Lingkungan | Classic Editor',
            'title' => 'Classic Environment Editor',
            'save' => 'Simpan .env',
            'back' => 'Gunakan Form Wizard',
            'install' => 'Simpan dan Pasang',
        ],
        'success' => 'Berkas penyetelan .env Anda telah disimpan.',
        'errors' => 'Tidak bisa menyimpan berkas .env. Silahkan buat secara manual.',
    ],

    'install' => 'Pasang',

    /*
     *
     * Installed Log translations.
     *
     */
    'installed' => [
        'success_log_message' => 'Laravel Installer berhasil DIPASANG pada tanggal: ',
    ],

    /*
     *
     * Final page translations.
     *
     */
    'final' => [
        'title' => 'Instalasi Selesai',
        'templateTitle' => 'Instalasi Selesai',
        'finished' => 'Aplikasi telah berhasil dipasang.',
        'migration' => 'Keluaran Migration & Seed Console:',
        'console' => 'Keluaran Application Console:',
        'log' => 'Entri Log Aplikasi:',
        'env' => 'Hasil akhir berkas .env:',
        'exit' => 'Klik disini untuk keluar',
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
        'title' => 'Laravel Updater',

        /*
         *
         * Welcome page translations for update feature.
         *
         */
        'welcome' => [
            'title'   => 'Selamat Datang di App Updater',
            'message' => 'Selamat Datang di update wizard.',
        ],

        /*
         *
         * Welcome page translations for update feature.
         *
         */
        'overview' => [
            'title'   => 'Tinjauan',
            'message' => 'Ada 1 pembaruan.|Ada :number pembaruan.',
            'install_updates' => 'Pasang Pembaruan',
        ],

        /*
         *
         * Final page translations.
         *
         */
        'final' => [
            'title' => 'Selesai',
            'finished' => 'Basis Data Aplikasi telah berhasil diperbarui.',
            'exit' => 'Klik disini untuk keluar',
        ],

        'log' => [
            'success_message' => 'Laravel Installer berhasil DIPERBARUI pada ',
        ],
    ],
];
