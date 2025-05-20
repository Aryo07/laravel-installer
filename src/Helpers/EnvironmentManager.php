<?php

namespace AryoKesuma\LaravelInstaller\Helpers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnvironmentManager
{
    /**
     * @var string
     */
    private $envPath;

    /**
     * @var string
     */
    private $envExamplePath;

    /**
     * Set the .env and .env.example paths.
     */
    public function __construct()
    {
        $this->envPath = base_path('.env');
        $this->envExamplePath = base_path('.env.example');
    }

    /**
     * Get the content of the .env file.
     *
     * @return string
     */
    public function getEnvContent()
    {
        if (!file_exists($this->envPath)) {
            if (file_exists($this->envExamplePath)) {
                copy($this->envExamplePath, $this->envPath);
            } else {
                touch($this->envPath);
            }
        }

        return file_get_contents($this->envPath);
    }

    /**
     * Get the the .env file path.
     *
     * @return string
     */
    public function getEnvPath()
    {
        return $this->envPath;
    }

    /**
     * Get the the .env.example file path.
     *
     * @return string
     */
    public function getEnvExamplePath()
    {
        return $this->envExamplePath;
    }

    /**
     * Save the edited content to the .env file.
     *
     * @param  Request  $input
     * @return bool
     */
    public function saveFileClassic(Request $input)
    {
        try {
            file_put_contents($this->envPath, $input->get('envConfig'));
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * Save the form content to the .env file.
     *
     * @param  Request  $request
     * @return bool
     */
    public function saveFileWizard(Request $request)
    {
        // Tentukan mana yang aktif dan mana yang dikomentari
        $maintenanceOption = $request->input('app_maintenance_option', 'driver');
        $maintenanceDriver = $request->input('app_maintenance_driver', 'file');
        $maintenanceStore = $request->input('app_maintenance_store', 'database');

        if ($maintenanceOption === 'driver') {
            $maintenanceDriverLine = 'APP_MAINTENANCE_DRIVER=' . $maintenanceDriver;
            $maintenanceStoreLine = '# APP_MAINTENANCE_STORE=' . $maintenanceStore;
        } else {
            $maintenanceDriverLine = '# APP_MAINTENANCE_DRIVER=' . $maintenanceDriver;
            $maintenanceStoreLine = 'APP_MAINTENANCE_STORE=' . $maintenanceStore;
        }

        $envFileData =
            // 'APP_NAME=\'' . $request->app_name . "'\n" .
            'APP_NAME=' . $request->app_name . "\n" .
            'APP_ENV=' . $request->environment . "\n" .
            'APP_KEY=' . 'base64:' . base64_encode(Str::random(32)) . "\n" .
            'APP_DEBUG=' . $request->app_debug . "\n" .
            'APP_TIMEZONE=' . $request->app_timezone . "\n" .
            'APP_URL=' . $request->app_url . "\n" .
            'APP_DEMO=' . $request->app_demo . "\n\n" .

            'APP_LOCALE=' . $request->app_locale . "\n" .
            'APP_FALLBACK_LOCALE=' . $request->app_fallback_locale . "\n" .
            'APP_FAKER_LOCALE=' . $request->app_faker_locale . "\n\n" .

            $maintenanceDriverLine . "\n" .
            $maintenanceStoreLine . "\n\n" .

            'BCRYPT_ROUNDS=' . $request->bcrypt_rounds . "\n\n" .

            'LOG_CHANNEL=' . $request->log_channel . "\n" .
            'LOG_STACK=' . $request->log_stack . "\n" .
            'LOG_DEPRECATIONS_CHANNEL=' . $request->log_deprecations_channel . "\n" .
            'LOG_LEVEL=' . $request->log_level . "\n\n" .

            'DB_CONNECTION=' . $request->database_connection . "\n" .
            'DB_HOST=' . $request->database_hostname . "\n" .
            'DB_PORT=' . $request->database_port . "\n" .
            'DB_DATABASE=' . $request->database_name . "\n" .
            'DB_USERNAME=' . $request->database_username . "\n" .
            'DB_PASSWORD=' . $request->database_password . "\n\n" .

            'SESSION_DRIVER=' . $request->session_driver . "\n" .
            'SESSION_LIFETIME=' . $request->session_lifetime . "\n" .
            'SESSION_ENCRYPT=' . $request->session_encrypt . "\n" .
            'SESSION_PATH=' . $request->session_path . "\n" .
            'SESSION_DOMAIN=' . $request->session_domain . "\n\n" .

            'BROADCAST_CONNECTION=' . $request->broadcast_connection . "\n" .
            'FILESYSTEM_DISK=' . $request->filesystem_disk . "\n" .
            'QUEUE_CONNECTION=' . $request->queue_connection . "\n\n" .

            'CACHE_STORE=' . $request->cache_store . "\n" .
            'CACHE_PREFIX=' . $request->cache_prefix . "\n\n" .

            'MEMCACHED_HOST=' . $request->memcached_host . "\n\n" .

            'REDIS_CLIENT=' . $request->redis_client . "\n" .
            'REDIS_HOST=' . $request->redis_hostname . "\n" .
            'REDIS_PASSWORD=' . $request->redis_password . "\n" .
            'REDIS_PORT=' . $request->redis_port . "\n\n" .

            'MAIL_MAILER=' . $request->mail_mailer . "\n" .
            'MAIL_HOST=' . $request->mail_host . "\n" .
            'MAIL_PORT=' . $request->mail_port . "\n" .
            'MAIL_USERNAME=' . $request->mail_username . "\n" .
            'MAIL_PASSWORD=' . $request->mail_password . "\n" .
            'MAIL_ENCRYPTION=' . $request->mail_encryption . "\n" .
            'MAIL_FROM_ADDRESS=' . $request->mail_from_address . "\n" .
            'MAIL_FROM_NAME=' . $request->mail_from_name . "\n\n" .

            'AWS_ACCESS_KEY_ID=' . $request->aws_access_key_id . "\n" .
            'AWS_SECRET_ACCESS_KEY=' . $request->aws_secret_access_key . "\n" .
            'AWS_DEFAULT_REGION=' . $request->aws_default_region . "\n" .
            'AWS_BUCKET=' . $request->aws_bucket . "\n" .
            'AWS_USE_PATH_STYLE_ENDPOINT=' . $request->aws_use_path_style_endpoint . "\n\n" .

            'VITE_APP_NAME=' . $request->vite_app_name . "\n\n" .

            'PUSHER_APP_ID=' . $request->pusher_app_id . "\n" .
            'PUSHER_APP_KEY=' . $request->pusher_app_key . "\n" .
            'PUSHER_APP_SECRET=' . $request->pusher_app_secret . "\n" .
            'PUSHER_HOST' . '=' . $request->pusher_host . "\n" .
            'PUSHER_PORT' . '=' . $request->pusher_port . "\n" .
            'PUSHER_SCHEME' . '=' . $request->pusher_scheme . "\n" .
            'PUSHER_APP_CLUSTER' . '=' . $request->pusher_app_cluster;

        try {
            file_put_contents($this->envPath, $envFileData);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}
