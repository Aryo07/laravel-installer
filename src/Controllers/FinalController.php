<?php

namespace AryoKesuma\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use AryoKesuma\LaravelInstaller\Events\LaravelInstallerFinished;
use AryoKesuma\LaravelInstaller\Helpers\EnvironmentManager;
use AryoKesuma\LaravelInstaller\Helpers\FinalInstallManager;
use AryoKesuma\LaravelInstaller\Helpers\InstalledFileManager;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param  \AryoKesuma\LaravelInstaller\Helpers\InstalledFileManager  $fileManager
     * @param  \AryoKesuma\LaravelInstaller\Helpers\FinalInstallManager  $finalInstall
     * @param  \AryoKesuma\LaravelInstaller\Helpers\EnvironmentManager  $environment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent();

        event(new LaravelInstallerFinished);

        return view('vendor.installer.finished', compact('finalMessages', 'finalStatusMessage', 'finalEnvFile'));
    }
}
