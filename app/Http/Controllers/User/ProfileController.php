<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('pages.user.profile', [
            'user' => auth()->user()
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = auth()->user();
            $userData = $request->only(['name', 'username', 'email']);
            $this->userRepository->save($user->fill($userData));

            $profile = Profile::where('user_id', $user->id)->first();
            $profile['nationality'] = $request->nationality;
            $profile->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('dashboard.profile')->with([
            'success' => 'Profile successfully updated.'
        ]);
    }
}
