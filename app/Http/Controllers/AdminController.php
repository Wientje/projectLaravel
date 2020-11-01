<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Index(User $user)
    {
        $user = User::findOrFail(1);
        if($user->role === 'admin'){
            $user = User::all();
            return view('Admin.index', [
                'users' => $user
            ]);
        }else{
            abort(404, 'Unauthorized');
        }
    }
}
