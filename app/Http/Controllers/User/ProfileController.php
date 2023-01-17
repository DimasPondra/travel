<?php

namespace App\Http\Controllers\User;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\PhotoProfileUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function photoUpdate(PhotoProfileUpdateRequest $request)
    {
        try {
            DB::beginTransaction();

            $file = FileHelper::store($request->file('file'), 'avatars');

            $profile = Profile::where('user_id', auth()->id())->first();
            $profile->update(['file_id' => $file->id]);

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

    public function changePassword(ChangePasswordRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = auth()->user();

            if (!Hash::check($request->password, $user->password)) {
                return back()->withErrors([
                    'auth' => 'Password did not match.'
                ]);
            }

            $this->userRepository->save($user->fill([
                'password' => bcrypt($request->new_password)
            ]));

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('dashboard.profile')->with([
            'auth' => 'Password successfully updated.'
        ]);
    }
}
