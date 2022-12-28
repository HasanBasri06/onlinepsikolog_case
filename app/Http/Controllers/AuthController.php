<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'password' => 'required',
                'confirmPassword' => 'required|required_with:password|same:password'
            ],
            [
                'required' => "Bu alan dolduruması zorunludur!",
                'email' => "Lütfen geçerli bir email adresi giriniz",
                'same' => 'Şifreler uyuşmuyor'
            ]
        );

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "password" => bcrypt($request->input('password'))
        ]);

        return back()->withErrors([
            'message' => 'Kullanıcı başarılı bir şekilde oluşturuldu'
        ]);

    }

    public function check(Request $request)
    {

        $attribute = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        if(Auth::attempt($attribute)){
            $request->session()->regenerate();
            return redirect()->intended(route('user_main'));
        }

        return back()->withErrors([
            'message' => 'Girilen değerlerde bir kullanıcıya ulaşılmadı'
        ])->onlyInput('email');

    }
}
