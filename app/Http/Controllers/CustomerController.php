<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    function __construct(FileManageController $fileManage)
    {
        $this->fileManage = $fileManage;
    }

    public function __invoke(Request $request)
    {
        $customerFolder = '' . config('storage.customer') . '/' . session('folder');
        $data = $this->fileManage->getFolderInfo($customerFolder);

        // return view with file, folder data
        return view('panel.customer', [
            'customer_folder' => $customerFolder,
            'folders' => $data['folders'],
            'files' => $data['files']
        ]);
    }
}
