<?php namespace Ibsellnet\DownloadMediaFiles;

use System\Classes\PluginBase;
use Event;
use Log;
use Session;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'ibsellnet.downloadmediafiles::lang.plugin.name',
            'description' => 'ibsellnet.downloadmediafiles::lang.plugin.description',
            'author'      => 'Raluca Manea, Ibsell.NET',
            'icon'        => 'icon-file',
            'homepage'    => 'https://ibsell.net'
        ];
    }

    public function registerComponents()
    {
        return [
            'Ibsellnet\DownloadMediaFiles\Components\DownloadMediaFilesComp' => 'DownloadMediaFilesComp'
        ];
    }

    public function registerSettings()
    {
    }

    public function boot(){


    }
}
