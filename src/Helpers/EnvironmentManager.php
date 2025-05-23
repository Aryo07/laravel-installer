<?php

namespace AryoKesuma\LaravelInstaller\Helpers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Foundation\Application;

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
     * Get installed Laravel major version (9, 10, 11, 12, etc).
     *
     * @return int
     */
    public function getLaravelMajorVersion()
    {
        // Try to get from Application::VERSION
        if (defined('\Illuminate\Foundation\Application::VERSION')) {
            $version = Application::VERSION;
        } else {
            // Fallback: read from composer.lock
            $composerLock = base_path('composer.lock');
            if (file_exists($composerLock)) {
                $lock = json_decode(file_get_contents($composerLock), true);
                foreach ($lock['packages'] ?? [] as $package) {
                    if ($package['name'] === 'laravel/framework') {
                        $version = $package['version'];
                        break;
                    }
                }
            }
        }
        // Only extract the major version number
        if (isset($version)) {
            if (preg_match('/^(\d+)/', $version, $matches)) {
                return (int) $matches[1];
            }
        }
        // Default fallback
        return 12;
    }

    /**
     * Save the form content to the .env file.
     *
     * @param  Request  $request
     * @return bool
     */
    public function saveFileWizard(Request $request)
    {
        $version = $request->input('laravel_version', '12');

        // Define helper functions for version checks
        $is = fn($v) => $version == $v;
        $in = fn($arr) => in_array($version, $arr);

        // Determine which option is active and which is commented out
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

        // Create the .env file content
        $envFileData = '';
        $envFileData .= "APP_NAME={$request->app_name}\n";
        $envFileData .= "APP_ENV={$request->environment}\n";
        $envFileData .= "APP_KEY=base64:" . base64_encode(Str::random(32)) . "\n";
        $envFileData .= "APP_DEBUG={$request->app_debug}\n";
        if ($is('11')) {
            $envFileData .= "APP_TIMEZONE={$request->app_timezone}\n";
        }
        $envFileData .= "APP_URL={$request->app_url}\n\n";

        $envFileData .= "APP_DEMO={$request->app_demo}\n\n";

        if ($in(['11', '12'])) {
            $envFileData .= "APP_LOCALE={$request->app_locale}\n";
            $envFileData .= "APP_FALLBACK_LOCALE={$request->app_fallback_locale}\n";
            $envFileData .= "APP_FAKER_LOCALE={$request->app_faker_locale}\n\n";
            $envFileData .= $maintenanceDriverLine . "\n";
            $envFileData .= $maintenanceStoreLine . "\n\n";
        }

        if ($is('12')) {
            $envFileData .= "PHP_CLI_SERVER_WORKERS={$request->php_cli_server_workers}\n\n";
        }

        if ($in(['11', '12'])) {
            $envFileData .= "BCRYPT_ROUNDS={$request->bcrypt_rounds}\n\n";
        }

        $envFileData .= "LOG_CHANNEL={$request->log_channel}\n";
        if ($in(['11', '12'])) {
            $envFileData .= "LOG_STACK={$request->log_stack}\n";
        }
        $envFileData .= "LOG_DEPRECATIONS_CHANNEL={$request->log_deprecations_channel}\n";
        $envFileData .= "LOG_LEVEL={$request->log_level}\n\n";

        $envFileData .= "DB_CONNECTION={$request->database_connection}\n";
        $envFileData .= "DB_HOST={$request->database_hostname}\n";
        $envFileData .= "DB_PORT={$request->database_port}\n";
        $envFileData .= "DB_DATABASE={$request->database_name}\n";
        $envFileData .= "DB_USERNAME={$request->database_username}\n";
        $envFileData .= "DB_PASSWORD={$request->database_password}\n\n";

        $envFileData .= "SESSION_DRIVER={$request->session_driver}\n";
        $envFileData .= "SESSION_LIFETIME={$request->session_lifetime}\n";
        if ($in(['11', '12'])) {
            $envFileData .= "SESSION_ENCRYPT={$request->session_encrypt}\n";
            $envFileData .= "SESSION_PATH={$request->session_path}\n";
            $envFileData .= "SESSION_DOMAIN={$request->session_domain}\n\n";
        }

        if ($in(['9', '10'])) {
            $envFileData .= "BROADCAST_DRIVER={$request->broadcast_driver}\n";
        }
        if ($in(['11', '12'])) {
            $envFileData .= "BROADCAST_CONNECTION={$request->broadcast_connection}\n";
        }
        $envFileData .= "FILESYSTEM_DISK={$request->filesystem_disk}\n";
        $envFileData .= "QUEUE_CONNECTION={$request->queue_connection}\n\n";

        if ($in(['9', '10'])) {
            $envFileData .= "CACHE_DRIVER={$request->cache_driver}\n\n";
        }

        if ($in(['11', '12'])) {
            $envFileData .= "CACHE_STORE={$request->cache_store}\n";
            $envFileData .= "CACHE_PREFIX={$request->cache_prefix}\n\n";
        }

        $envFileData .= "MEMCACHED_HOST={$request->memcached_host}\n\n";

        if ($in(['11', '12'])) {
            $envFileData .= "REDIS_CLIENT={$request->redis_client}\n";
        }
        $envFileData .= "REDIS_HOST={$request->redis_host}\n";
        $envFileData .= "REDIS_PASSWORD={$request->redis_password}\n";
        $envFileData .= "REDIS_PORT={$request->redis_port}\n\n";

        $envFileData .= "MAIL_MAILER={$request->mail_mailer}\n";
        if ($is('12')) {
            $envFileData .= "MAIL_SCHEME={$request->mail_scheme}\n";
        }
        $envFileData .= "MAIL_HOST={$request->mail_host}\n";
        $envFileData .= "MAIL_PORT={$request->mail_port}\n";
        $envFileData .= "MAIL_USERNAME={$request->mail_username}\n";
        $envFileData .= "MAIL_PASSWORD={$request->mail_password}\n";
        if ($in(['9', '10', '11'])) {
            $envFileData .= "MAIL_ENCRYPTION={$request->mail_encryption}\n";
        }
        $envFileData .= "MAIL_FROM_ADDRESS=\"{$request->mail_from_address}\"\n";
        $envFileData .= "MAIL_FROM_NAME=\"\${APP_NAME}\"\n\n";

        $envFileData .= "AWS_ACCESS_KEY_ID={$request->aws_access_key_id}\n";
        $envFileData .= "AWS_SECRET_ACCESS_KEY={$request->aws_secret_access_key}\n";
        $envFileData .= "AWS_DEFAULT_REGION={$request->aws_default_region}\n";
        $envFileData .= "AWS_BUCKET={$request->aws_bucket}\n";
        $envFileData .= "AWS_USE_PATH_STYLE_ENDPOINT={$request->aws_use_path_style_endpoint}\n\n";

        if ($in(['9', '10'])) {
            $envFileData .= "PUSHER_APP_ID={$request->pusher_app_id}\n";
            $envFileData .= "PUSHER_APP_KEY={$request->pusher_app_key}\n";
            $envFileData .= "PUSHER_APP_SECRET={$request->pusher_app_secret}\n";
        }
        if ($is('10')) {
            $envFileData .= "PUSHER_HOST={$request->pusher_host}\n";
            $envFileData .= "PUSHER_PORT={$request->pusher_port}\n";
            $envFileData .= "PUSHER_SCHEME={$request->pusher_scheme}\n";
        }
        if ($in(['9', '10'])) {
            $envFileData .= "PUSHER_APP_CLUSTER={$request->pusher_app_cluster}\n\n";
        }
        if ($is('10')) {
            $envFileData .= "VITE_PUSHER_APP_KEY=\"\${PUSHER_APP_KEY}\"\n";
            $envFileData .= "VITE_PUSHER_HOST=\"\${PUSHER_HOST}\"\n";
            $envFileData .= "VITE_PUSHER_PORT=\"\${PUSHER_PORT}\"\n";
            $envFileData .= "VITE_PUSHER_SCHEME=\"\${PUSHER_SCHEME}\"\n";
            $envFileData .= "VITE_PUSHER_APP_CLUSTER=\"\${PUSHER_APP_CLUSTER}\"\n\n";
        }
        if ($in(['11', '12'])) {
            $envFileData .= "VITE_APP_NAME=\"\${APP_NAME}\"\n\n";
        }
        if ($is('9')) {
            $envFileData .= "MIX_PUSHER_APP_KEY=\"\${PUSHER_APP_KEY}\"\n";
            $envFileData .= "MIX_PUSHER_APP_CLUSTER=\"\${PUSHER_APP_CLUSTER}\"\n\n";
        }

        try {
            file_put_contents($this->envPath, $envFileData);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}
