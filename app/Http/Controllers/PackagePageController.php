<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Repositories\PackageRepository;
use Illuminate\Http\Request;

class PackagePageController extends Controller
{
    private $packageRepository;

    public function __construct(PackageRepository $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    public function index()
    {
        $packages = $this->packageRepository->get([
            'order' => 'name ASC',
            'paginate' => 10
        ]);

        return view('pages.frontend.packages.index', [
            'packages' => $packages
        ]);
    }

    public function show(Package $package)
    {
        return view('pages.frontend.packages.show', [
            'package' => $package
        ]);
    }
}
