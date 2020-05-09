<?php

namespace App\Models\ActModels;

use Illuminate\Database\Eloquent\Model;

use App\Models\ORMs\User;

class UserModel extends Model
{
    public function authUser($userId) {
      // check if user exists
      $user = User::where('user_id', $userId)->first();

      if(!!$user) 
        return ['result' => 'success', 'data' => $user];
      else
        return ['result' => 'failed', 'data' => null];
    }
}
