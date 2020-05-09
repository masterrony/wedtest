<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\FileManageController;

use App\Models\ORMs\Permission;

use App\Models\ActModels\PermissionModel;

class AdminController extends Controller
{
    function __construct(FileManageController $fileManage, PermissionModel $permissionModel)
    {
        $this->fileManage = $fileManage;
        $this->permissionModel = $permissionModel;
    }

    public function permissionManage(Request $request) {
        $permissions = $this->permissionModel->getAll();

        return view('panel.admin.permission', ['permissions' => $permissions]);
    }

    public function fileManage(Request $request)
    {
        // get folder name of admin
        $adminFolder = config('storage.admin'); 
        
        // get info of admin folder
        $data = $this->fileManage->getFolderInfo($adminFolder);
        
        // return view with file, folder data
        return view('panel.admin.file', [
            'admin_folder' => $adminFolder,
            'folders' => $data['folders'],
            'files' => $data['files']
        ]);
    }
}
