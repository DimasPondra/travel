<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $customers = $this->userRepository->get([
            'search' => [
                'name' => $request->name,
                'role' => User::ROLE_USER
            ],
            'order' => 'name ASC',
            'paginate' => 10
        ]);

        return view('pages.admin.customers.index', [
            'customers' => $customers
        ]);
    }
}
