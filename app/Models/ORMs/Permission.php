<?php

namespace App\Models\Orms;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    // set table
    protected $table = 'permissions';

    // disable timestamp
    public $timestamps = false;
}