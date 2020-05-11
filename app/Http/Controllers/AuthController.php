<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\ActModels\UserModel;


class AuthController extends Controller
{
    function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function index(Request $request)
    {
        // return login view
        return response()->view('login');
    }

    public function signIn(Request $request)
    {
        // check the request mehtod 
        if($request->isMethod('post')) {

            // Validate input data
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|max:255',
            ])->validate();

            // get user id and check it
            $userId = $request->input('user_id');
            $authResult = $this->userModel->authUser($userId);

            // return response due to auth result
            if($authResult['result'] == 'success') {
                
                // if user verified set session and redirect user
                session([ 
                    'user_id' => $authResult['data']['user_id'], 
                    'role' => $authResult['data']['role'],
                    'folder' => $authResult['data']['folder'] ,
                    'permissions' => [
                        'create_folder'  => $authResult['data']['create_folder'],
                        'rename' => $authResult['data']['rename'],
                        'delete' => $authResult['data']['delete'],
                        'move' => $authResult['data']['move']
                    ]
                ]);

                return redirect()->action('HomeController');

            } else if($authResult['result'] == 'failed') {
                return response()->view('login', ['message' => 'Failed to auth'], 400);
            }
        }
    }

    public function signOut(Request $request)
    {
        // flush session and redirect user to home
        $request->session()->flush();
        return redirect()->action('HomeController');
    }
}
