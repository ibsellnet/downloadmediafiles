<?php namespace Ibsellnet\DownloadMediaFiles\Components;

use Cms\Classes\ComponentBase;
use Event;
use Input;
use Log;
use Session;
use Cms\Classes\Theme;
use File;

class DownloadMediaFilesComp extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'DownloadMediaFilesComp',
            'description' => 'List all folders and subfolders and files inside your media "downloads" main folder'
        ];
    }

    public function defineProperties()
    {
        return [
        ];
    }


    public function onRender(){
    }

    public function onRun(){

        $arrAllFiles     = File::allFiles( 'storage/app/media/downloads/' );

        $arrDirectoriesWithFiles = [];
        foreach ($arrAllFiles as $oneFile) {
            $sDirectoryList = $oneFile->getRelativePath();
            $sFileName = $oneFile->getFileName();
            $sFullPath = $oneFile->getPathName();

            $arrFoldersExploded = explode('/',$sDirectoryList);
            if($arrFoldersExploded[0]=='') $arrFoldersExploded[0]='rootibs';
            $arrFileDetails = [
                'sFileName' => $sFileName,
                'sFullPath' => $sFullPath
            ];

            if(isset($arrFoldersExploded[2])) {
                $arrDirectoriesWithFiles[$arrFoldersExploded[0]][$arrFoldersExploded[1]][$arrFoldersExploded[2]][] = $arrFileDetails;
            }else if(isset($arrFoldersExploded[1])) {
                $arrDirectoriesWithFiles[$arrFoldersExploded[0]][$arrFoldersExploded[1]][] = $arrFileDetails;
            }else if(isset($arrFoldersExploded[0])){
                $arrDirectoriesWithFiles[$arrFoldersExploded[0]][] = $arrFileDetails;
            }
        }

        $this->page['arrDirectoriesWithFiles'] = $arrDirectoriesWithFiles;

    }





}
