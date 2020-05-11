<?php

namespace App\Models\ActModels;

use Illuminate\Database\Eloquent\Model;

use App\Models\ORMs\Permission;

class PermissionModel extends Model
{
    public function getAll()
    {
        $permissons = Permission::all();

        return $permissons;
    }

    public function modify($data)
    {
        // change targeted permission
        $affected = Permission::where('id', $data['id'])->update([$data['permission'] => $data['value']]);
        
        return $affected > 0 ? true : false;
    }
}
