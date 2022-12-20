<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function loginPage()
    {
        return view('pages.auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (
            !$user ||
            !Hash::check($request->password, $user->password)
        ) {
            return back()->withErrors([
                'auth' => 'Email or password did not match.'
            ]);
        }

        Auth::login($user, $remember = true);

        return redirect()->route('home-page');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login-page');
    }

    public function registerPage()
    {
        return view('pages.auth.register');
    }

    public function registerProcess(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

            $request->merge(['password' => bcrypt($request->password)]);

            $data = $request->only([
                'name', 'username', 'email', 'password'
            ]);

            $user = new User();
            $user = $this->userRepository->save($user->fill($data));

            Auth::login($user, $remember = true);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('home-page');
    }
}
