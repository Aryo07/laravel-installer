<?php

namespace AryoKesuma\LaravelInstaller\Helpers;

class InstalledFileManager
{
    /**
     * Create installed file.
     *
     * @return int
     */
    public function create()
    {
        $installedLogFile = storage_path('installed');

        $timezone = config('app.timezone');
        if ($timezone === 'Asia/Jakarta') {
            $dateStamp = now()->setTimezone($timezone)->format('d/m/Y H:i:s') . ' WIB';
        } elseif ($timezone === 'Asia/Makassar') {
            $dateStamp = now()->setTimezone($timezone)->format('d/m/Y H:i:s') . ' WITA';
        } elseif ($timezone === 'Asia/Jayapura') {
            $dateStamp = now()->setTimezone($timezone)->format('d/m/Y H:i:s') . ' WIT';
        } else {
            $dateStamp = now()->setTimezone($timezone)->format('d/m/Y h:i:s A');
        }

        if (!file_exists($installedLogFile)) {
            $message = __('installer_messages.installed.success_log_message') . $dateStamp . "\n";

            file_put_contents($installedLogFile, $message);
        } else {
            $message = __('installer_messages.updater.log.success_message') . $dateStamp;

            file_put_contents($installedLogFile, $message . PHP_EOL, FILE_APPEND | LOCK_EX);
        }

        return $message;
    }

    /**
     * Update installed file.
     *
     * @return int
     */
    public function update()
    {
        return $this->create();
    }
}
