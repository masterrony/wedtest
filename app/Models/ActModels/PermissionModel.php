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
}
