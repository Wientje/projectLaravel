<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Index(User $user)
    {
//        $user = User::all()->first;
//        if($user->role === 'admin'){
        if(1 === 1){
            $user = User::all();
            return view('Admin.index', [
                'users' => $user
            ]);
        }else{
            abort(403, 'Unauthorized');
        }
    }
}
