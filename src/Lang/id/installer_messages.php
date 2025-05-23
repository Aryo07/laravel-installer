<?php

return [

    /*
     *
     * Terjemahan umum.
     *
     */
    'title' => 'Selamat Datang di Installer Aplikasi',
    'next' => 'Langkah Selanjutnya',
    'back' => 'Sebelumnya',
    'finish' => 'Pasang',
    'forms' => [
        'errorTitle' => 'Terjadi beberapa kesalahan berikut:',
    ],

    /*
     *
     * Terjemahan halaman utama.
     *
     */
    'welcome' => [
        'templateTitle' => 'Selamat Datang',
        'title' => 'Selamat Datang di Installer Aplikasi',
        'message' => 'Instalasi dan Pengaturan Mudah.',
        'next' => 'Cek Persyaratan',
    ],

    /*
     *
     * Terjemahan halaman persyaratan.
     *
     */
    'requirements' => [
        'templateTitle' => 'Langkah 1 | Persyaratan Server',
        'title' => 'Persyaratan Server',
        'next' => 'Cek Izin Folder',
    ],

    /*
     *
     * Terjemahan halaman izin folder.
     *
     */
    'permissions' => [
        'templateTitle' => 'Langkah 2 | Izin Folder',
        'title' => 'Izin Folder',
        'next' => 'Atur Lingkungan',
    ],

    /*
     *
     * Terjemahan halaman lingkungan.
     *
     */
    'environment' => [
        'menu' => [
            'templateTitle' => 'Langkah 3 | Pengaturan Lingkungan',
            'title' => 'Pengaturan Lingkungan',
            'desc' => 'Silakan pilih cara Anda ingin mengatur file <code>.env</code> aplikasi.',
            'wizard-button' => 'Pengaturan Form Wizard',
            'classic-button' => 'Editor Teks Klasik',
        ],
        'wizard' => [
            'templateTitle' => 'Langkah 3 | Pengaturan Lingkungan | Panduan Wizard',
            'title' => 'Panduan <code>.env</code> Wizard',
            'tabs' => [
                'environment' => 'Lingkungan',
                'database' => 'Database',
                'application' => 'Aplikasi',
            ],
            'form' => [
                'name_required' => 'Nama lingkungan wajib diisi.',
                'app_name_label' => 'Nama Aplikasi',
                'app_name_placeholder' => 'Nama Aplikasi',
                'app_environment_label' => 'Lingkungan Aplikasi',
                'app_environment_label_local' => 'Lokal',
                'app_environment_label_developement' => 'Pengembangan',
                'app_environment_label_testing' => 'Pengujian',
                'app_environment_label_production' => 'Produksi',
                'app_environment_label_other' => 'Lainnya',
                'app_environment_placeholder_other' => 'Masukkan lingkungan Anda...',
                'app_debug_label' => 'Debug Aplikasi',
                'app_debug_label_true' => 'Ya',
                'app_debug_label_false' => 'Tidak',
                'app_demo_label' => 'Demo Aplikasi',
                'app_demo_label_true' => 'Ya',
                'app_demo_label_false' => 'Tidak',
                'app_url_label' => 'URL Aplikasi',
                'app_url_placeholder' => 'URL Aplikasi',
                'db_connection_failed' => 'Tidak dapat terhubung ke database.',
                'db_connection_label' => 'Koneksi Database',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'Host Database',
                'db_host_placeholder' => 'Host Database',
                'db_port_label' => 'Port Database',
                'db_port_placeholder' => 'Port Database',
                'db_name_label' => 'Nama Database',
                'db_name_placeholder' => 'Nama Database',
                'db_username_label' => 'Username Database',
                'db_username_placeholder' => 'Username Database',
                'db_password_label' => 'Password Database',
                'db_password_placeholder' => 'Password Database',
                'app_timezone_label' => 'Zona Waktu Aplikasi',
                'app_timezone_label_utc' => 'UTC (Waktu Universal Terkoordinasi)',
                'app_timezone_label_wib' => 'Asia/Jakarta',
                'app_timezone_label_wita' => 'Asia/Makassar',
                'app_timezone_label_wit' => 'Asia/Jayapura',

                'env_tabs' => [
                    'more_info' => 'Info Lainnya',
                    'env_tabs_title' => 'Variabel Lingkungan Tambahan',
                    'locale_label' => 'Bahasa Aplikasi',
                    'locale_placeholder' => 'Bahasa Aplikasi',
                    'app_locale_id_label' => 'Bahasa Indonesia',
                    'app_locale_id_placeholder' => 'Bahasa Indonesia',
                    'app_locale_en_label' => 'Bahasa Inggris',
                    'app_locale_en_placeholder' => 'Bahasa Inggris',
                    'fallback_locale_label' => 'Fallback Bahasa',
                    'fallback_locale_placeholder' => 'Fallback Bahasa',
                    'app_fallback_locale_id_label' => 'Bahasa Indonesia',
                    'app_fallback_locale_id_placeholder' => 'Bahasa Indonesia',
                    'app_fallback_locale_en_label' => 'Bahasa Inggris',
                    'app_fallback_locale_en_placeholder' => 'Bahasa Inggris',
                    'faker_locale_label' => 'Bahasa Faker',
                    'faker_locale_placeholder' => 'Bahasa Faker',
                    'app_faker_locale_id_label' => 'Bahasa Indonesia',
                    'app_faker_locale_id_placeholder' => 'Bahasa Indonesia',
                    'app_faker_locale_en_label' => 'Bahasa Inggris',
                    'app_faker_locale_en_placeholder' => 'Bahasa Inggris',
                    'maintenance_driver_label' => 'Driver Maintenance',
                    'maintenance_driver_placeholder' => 'File',
                    'maintenance_store_label' => 'Penyimpanan Maintenance',
                    'maintenance_store_placeholder' => 'Database',
                    'maintenance_option_label' => 'Mode Maintenance',
                    'maintenance_option_placeholder' => 'Mode Maintenance',
                    'php_cli_server_workers_label' => 'PHP CLI Server Workers',
                    'php_cli_server_workers_placeholder' => 'PHP CLI Server Workers',
                    'bcrypt_rounds_label' => 'Bcrypt Rounds',
                    'bcrypt_rounds_placeholder' => 'Bcrypt Rounds',
                    'log_channel_label' => 'Channel Log',
                    'log_channel_placeholder' => 'Channel Log',
                    'log_stack_label' => 'Stack Log',
                    'log_stack_placeholder' => 'Stack Log',
                    'log_deprecations_channel_label' => 'Channel Log Deprecation',
                    'log_deprecations_channel_placeholder' => 'Channel Log Deprecation',
                    'log_level_label' => 'Level Log',
                    'log_level_placeholder' => 'Level Log',
                ],

                'app_tabs' => [
                    'more_info' => 'Info Lainnya',
                    'session_title' => 'Sesi',
                    'session_label' => 'Driver Sesi',
                    'session_placeholder' => 'Driver Sesi',
                    'session_lifetime_label' => 'Waktu Hidup Sesi',
                    'session_lifetime_placeholder' => 'Waktu Hidup Sesi',
                    'session_encrypt_label' => 'Enkripsi Sesi',
                    'session_encrypt_placeholder' => 'Enkripsi Sesi',
                    'session_path_label' => 'Path Sesi',
                    'session_path_placeholder' => 'Path Sesi',
                    'session_domain_label' => 'Domain Sesi',
                    'session_domain_placeholder' => 'Domain Sesi',

                    'broadcast_title' => 'Broadcast, Filesystem, Queue, Cache, Memcached, & Vite',
                    'broadcast_driver_label' => 'Driver Broadcast',
                    'broadcast_driver_placeholder' => 'Driver Broadcast',
                    'cache_driver_label' => 'Driver Cache',
                    'cache_driver_placeholder' => 'Driver Cache',
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
                    'mail_scheme_label' => 'Skema Email',
                    'mail_scheme_placeholder' => 'Skema Email',
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
                    'mail_from_address_label' => 'Alamat Pengirim',
                    'mail_from_address_placeholder' => 'Alamat Pengirim',
                    'mail_from_name_label' => 'Nama Pengirim',
                    'mail_from_name_placeholder' => 'Nama Pengirim',

                    'aws_title' => 'AWS',
                    'aws_access_key_id_label' => 'AWS Access Key Id',
                    'aws_access_key_id_placeholder' => 'AWS Access Key Id',
                    'aws_secret_access_key_label' => 'AWS Secret Access Key',
                    'aws_secret_access_key_placeholder' => 'AWS Secret Access Key',
                    'aws_default_region_label' => 'AWS Default Region',
                    'aws_default_region_placeholder' => 'AWS Default Region',
                    'aws_bucket_label' => 'AWS Bucket',
                    'aws_bucket_placeholder' => 'AWS Bucket',
                    'aws_use_path_style_endpoint_label' => 'AWS Gunakan Path Style Endpoint',
                    'aws_use_path_style_endpoint_placeholder' => 'AWS Gunakan Path Style Endpoint',

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
                    'pusher_app_cluster_label' => 'Cluster Pusher',
                    'pusher_app_cluster_placeholder' => 'Cluster Pusher',
                ],
                'buttons' => [
                    'setup_database' => 'Atur Database',
                    'setup_application' => 'Atur Aplikasi',
                    'install' => 'Pasang',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Langkah 3 | Pengaturan Lingkungan | Editor Klasik',
            'title' => 'Editor <code>.env</code> Klasik',
            'save' => 'Simpan .env',
            'back' => 'Gunakan Form Wizard',
            'install' => 'Simpan dan Pasang',
        ],
        'success' => 'Pengaturan file .env Anda telah disimpan.',
        'errors' => 'Tidak dapat menyimpan file .env, Silakan buat secara manual.',
    ],

    'install' => 'Pasang',

    /*
     *
     * Terjemahan log pemasangan.
     *
     */
    'installed' => [
        'success_log_message' => 'Installer Aplikasi berhasil DIPASANG pada tanggal: ',
    ],

    /*
     *
     * Terjemahan halaman akhir.
     *
     */
    'final' => [
        'title' => 'Instalasi Selesai',
        'templateTitle' => 'Instalasi Selesai',
        'finished' => 'Aplikasi berhasil dipasang.',
        'migration' => 'Output Konsol Migrasi & Seed:',
        'console' => 'Output Konsol Aplikasi:',
        'log' => 'Catatan Log Instalasi:',
        'env' => 'File .env Akhir:',
        'exit' => 'Klik di sini untuk keluar',
    ],

    /*
     *
     * Terjemahan khusus pembaruan
     *
     */
    'updater' => [
        /*
         *
         * Terjemahan umum.
         *
         */
        'title' => 'Updater Aplikasi',

        /*
         *
         * Halaman selamat datang untuk fitur update.
         *
         */
        'welcome' => [
            'title' => 'Selamat Datang di Updater Aplikasi',
            'message' => 'Selamat datang di panduan pembaruan.',
        ],

        /*
         *
         * Halaman ringkasan update.
         *
         */
        'overview' => [
            'title' => 'Ringkasan',
            'message' => 'Ada 1 pembaruan.|Ada :number pembaruan.',
            'install_updates' => 'Pasang Pembaruan',
        ],

        /*
         *
         * Halaman akhir update.
         *
         */
        'final' => [
            'title' => 'Selesai',
            'finished' => 'Database aplikasi berhasil diperbarui.',
            'exit' => 'Klik di sini untuk keluar',
        ],

        'log' => [
            'success_message' => 'Installer Aplikasi berhasil DIPERBARUI pada ',
        ],
    ],
];
