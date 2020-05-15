<?php

namespace App\Models\ActModels;

use Illuminate\Database\Eloquent\Model;

use App\Models\ORMs\User;

class UserModel extends Model
{
    public function getAll()
    {
        $users = User::all();

        return $users;
    }

    public function authUser($userId) {
      // take user with permission
      $user = User::join('permissions', 'users.role_id', '=', 'permissions.id')
                    ->select( 'users.*', 'permissions.*')
                    ->where('user_id', $userId)->first();

      if(!!$user) 
        return ['result' => 'success', 'data' => $user];
      else
        return ['result' => 'failed', 'data' => null];
    }
}
