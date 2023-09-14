<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\UserPermission;
use App\Models\User;

class UserController extends Controller {
    
    public function index() {
        
        $user = session()->get('user_id');
        
        if ( empty( $user) ) {
            return redirect('/user/login');
        } else {

            $permissions = session()->get('permissions');
            $check_permissions = UserPermission::check_permissions(["edit"], array_column($permissions, 'auth_name'));

            $users = User::all()->toArray();

            return view("index", [
                "users" => $users,
                "check_permissions" => $check_permissions,
            ]);

        }

    }

    public function edit(Request $request) {

        $user = session()->get('user_id');
        $permissions = session()->get('permissions');

        $check_permissions = UserPermission::check_permissions(["edit"], array_column($permissions, 'auth_name'));
        
        if ( $check_permissions["edit"] == 0 ) {
            return view("auth_fail", []);
        }

        $get_params = $request->only([
            "id",
        ]);

        $user = User::whereRaw('id = ?', [ $get_params['id'] ])->get()->toArray();

        return view("edit", [
            "user" => $user,
        ]);

    }

    public function edit_action(Request $request) {

        $post_params = $request->only([
            "name",
            "id",
        ]);

        User::where([
            "id" => $post_params["id"],
        ])->update([
            "name" => $post_params["name"],
        ]);
        
        return redirect('/user');

    }
    
    public function login() {
        return view("login", []);
    }

    public function login_action(Request $request) {

        $post_params = $request->only([
            "email", 
            "password",
        ]);

        $attempt = Auth::attempt([
            'email' => $post_params['email'],
            'password' => $post_params['password']
        ]);

        if ( $attempt ) {

            $users = User::whereRaw('email = ?', [ $post_params['email'] ])->get()->toArray();
            $user_id = $users[0]["id"];

            $permissions = UserPermission::whereRaw('user_id = ?', [ $user_id ])->get()->toArray();
            
            session([
                'user_id' => $user_id,
                'permissions' => $permissions,
            ]);

            return redirect('/user/');

        }

    }

    public function logout() {
        session()->flush();
        return redirect('/user');
    }

}
