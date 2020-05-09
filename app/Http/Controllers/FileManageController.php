<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\ActModels\UserModel;

class FileManageController extends Controller
{
    public function createFolder(Request $request)
    {
        // get parent folder
        $parent = $request->parent;

        // create folder on existing folder
        Storage::makeDirectory($parent . '/New Folder' . rand(10, 100));

        // get infos of folder, file of current directory
        $data = $this->getFolderInfo($parent);

        return response()->json($data, 200);
    }
    
    public function openFolder(Request $request)
    {
        // get target path
        $path = $request->query('path');

        // get infos of folder, file of targeted path
        $data = $this->getFolderInfo($path);

        return response()->json($data, 200);
    }

    public function uploadFile(Request $request)
    {
        // check if file uploaded
        if(!$request->hasFile('file'))
            return response()->json(['result' => false, 'message' => 'Please select a file']);

        $path = $request->path;
        $file = $request->file;

        // get validate result
        $validate = $this->fileValidator($file);

        // if file is invalid
        if(!$validate['result'])
            return response()->json(['result' => false, 'message' => $validate['message']]);

        $file->store($path);
        $data = $this->getFolderInfo($path);

        return response()->json(['result' => true, 'data' => $data], 200);
    }

    public function delete(Request $request)
    {
        $type = $request->type; // get what user want to delete (file or type)
        $path = $request->path; // get target path
        $currentPath = $request->currentPath; // get the path of client at the moment

        if($type == trim('file')) {
            // check if file exists
            $exists = Storage::disk('local')->exists($path);
            if(!$exists)
                return response()->json([
                    'result' => false, 
                    'message' => 'File does not exist !'
                ]);

            // if exists then delete file
            Storage::delete($path);
            $data = $this->getFolderInfo($currentPath);

            return response()->json([
                'result' => true,
                'data' => $data,
                'message' => 'File Deleted Successfully !'
            ]);
        } else if($type == trim('folder')) {
            // check if directory exists
            $exists = Storage::disk('local')->has($path);
            if(!$exists) 
                return response()->json([
                    'result' => false,
                    'message' => 'Folder does not exist !'
                ]);
            
            // if exists then delete folder
            Storage::deleteDirectory($path);
            $data = $this->getFolderInfo($currentPath);

            return response()->json([
                'result' => true,
                'data' => $data,
                'message' => 'Folder Deleted Successfully !'
            ]);
        }
    }

    public function rename(Request $request)
    {
        $original = $request->original;
        $modify = $request ->modify;

        // check if original file exists
        $exists = Storage::disk('local')->exists($original);
        if(!$exists)
            return response()->json([
                'result' => false,
                'message' => 'File does not exist !'
            ]);

        // check if new name submitted
        if(!$modify)
            return response()->json(['result' => false, 'message' => 'Input name please.']);

        $newName = dirname($original) . '/' . $modify;
        
        // check if new name already exits
        $exists = Storage::disk('local')->exists($newName);
        if(!!$exists)
            return response()->json([
                'result' => false,
                'message' => 'That name already exists. Please try another.'
            ]);

        Storage::move($original, $newName, true);

        return response()->json(['result' => true, 'message' => 'Modified successfully !'], 200);
    }

    public function move(Request $request)
    {
        $source = $request->source;
        $dest = $request->dest;
        $currentPath = $request->currentPath;

        // check if source exists
        $exists = Storage::disk('local')->exists($source);
        if(!$exists)
            return response()->json(['result' => false, 'message' => 'Source does not exists']);

        // check if dest exists
        $exists = Storage::disk('local')->exists($dest);
        if(!$exists)
            return response()->json(['result' => false, 'message' => 'Destination directory does not exists']);

        // make complete dest
        $dest = $dest . '/' . basename($source);
        
        // let check if same file exists
        $exists = Storage::disk('local')->exists($dest);
        if(!!$exists)
            return response()->json(['result' => false, 'message' => 'That file already exists']);

        Storage::move($source, $dest, true);

        $data = $this->getFolderInfo($currentPath);

        return response()->json(['result' => true, 'data' => $data ], 200);
    }

    public function download(Request $request)
    {
        return Storage::download($request->query('path'));
    }

    public function getFolderInfo($path)
    {
        // get folders and files of this folder
        $folders = Storage::directories($path);
        $files = Storage::files($path);

        // get folders' metadata
        for ($index=0; $index < count($folders); $index++) { 
            $folderInfos[$index]['file_count'] = count(Storage::files($folders[$index]));
            $folderInfos[$index]['name'] = basename($folders[$index]);
            $folderInfos[$index]['fullpath'] = $folders[$index];
        }

        // get files' metadata
        for ($index=0; $index < count($files); $index++) { 
            $fileInfos[$index]['size'] = $this->getExactFileSize(Storage::size($files[$index]));
            $fileInfos[$index]['name'] = basename($files[$index]);
            $fileInfos[$index]['fullpath'] = $files[$index];
        }

        return [
            'folders' => isset($folderInfos) ? $folderInfos : [],
            'files' => isset($fileInfos) ? $fileInfos : []
        ];
    }

    public function getExactFileSize($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    public function fileValidator($file) {
        $size = $file->getSize();
        $extension = $file->getClientOriginalExtension();

        $data['result'] = true;
        $data['message'] = '';

        // check if file size greater than 4M
        if($size > 4 * 1024 * 1024) {
            $data['result'] = false;
            $data['message'] = 'File lager than 4M.';
        }

        // check if file extension is not image
        if(!($extension != '' && in_array(strtolower($extension), array('jpg', 'jpeg', 'png', 'bmp', 'gif')))){
            $data['result'] = false;
            $data['message'] = $data['message'] . ' Please choose image file';
        }

        return $data;
    }
}
