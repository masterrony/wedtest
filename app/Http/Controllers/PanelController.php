<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\FileManageController;

class PanelController extends Controller
{
    public function index(Request $request)
    {
        $fileManageController = new FIleManageController;

        // check user role and get folders and files of user folder
        if(session('role') === trim('admin')) 
            $data = $fileManageController->getFolderFileInfo('admin');
        else if(session('role') === trim('customer'))
            $data = $fileManageController->getFolderFileInfo('admin');

        // return view with file, folder data
        return view('panel.main', [
            'user' => ['role' => session('role'), 'folder' => session('folder')],
            'folders' => $data['folders'],
            'files' => $data['files']
        ]);
    }
}
