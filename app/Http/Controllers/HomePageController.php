<?php

namespace App\Http\Controllers;

use App\Repositories\PackageRepository;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    private $packageRepository;

    public function __construct(PackageRepository $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    public function index()
    {
        $packages = $this->packageRepository->get([
            'order' => 'id DESC',
            'limit' => 4
        ]);

        return view('pages.frontend.home', [
            'packages' => $packages
        ]);
    }
}
