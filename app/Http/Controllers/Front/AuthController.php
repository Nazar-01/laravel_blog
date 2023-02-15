<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function registerForm()
    {
        return view('front.pages.register');
    }

    public function register(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        $posts = Post::paginate(5);

        return redirect()->route('loginForm');
    }

    public function loginForm()
    {
        return view('front.pages.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $result = Auth::attempt([
          'email' => $request->get('email'),
          'password' => $request->get('password'),
        ]);

        if (!$result) {
            return redirect()->back()->with('status', 'Неправильный логин или пароль');
        }

        return redirect()->route('home');        
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('loginForm');
    }

}
