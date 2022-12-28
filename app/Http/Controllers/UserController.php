<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function main()
    {

        $userId = Auth::id();
        $user = User::where('id', $userId)->get();

        return view('user.main', [
            'user' => $user[0]
        ]);
    }

    public function changeUserInfo(Request $request)
    {
    
        DB::table('users')->where('id', Auth::id())->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone
        ]);

        return back()->withErrors(['message' => 'Değiştirme işlemi başarıı bir şekilde gerçekleşti']);

    }
}
