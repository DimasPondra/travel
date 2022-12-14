<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PackageStoreRequest;
use App\Http\Requests\PackageUpdateRequest;
use App\Http\Requests\PackageUploadImageRequest;
use App\Models\Package;
use App\Models\PackageImage;
use App\Repositories\PackageRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    private $packageRepository;

    public function __construct(PackageRepository $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    public function index(Request $request)
    {
        $packages = $this->packageRepository->get([
            'search' => [
                'name' => $request->name
            ],
            'order' => 'name ASC',
            'paginate' => 10
        ]);

        return view('pages.admin.packages.index', [
            'packages' => $packages
        ]);
    }

    public function create()
    {
        return view('pages.admin.packages.create', [
            'package' => new Package()
        ]);
    }

    public function store(PackageStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $request->merge([
                'slug' => Str::slug($request->name)
            ]);

            $data = $request->only([
                'name', 'slug', 'location', 'description',
                'featured_event', 'language', 'foods', 'departure_date',
                'duration', 'type', 'price'
            ]);

            $package = new Package();
            $this->packageRepository->save($package->fill($data));

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.packages.show', $package)->with([
            'success' => 'Package successfully created.'
        ]);
    }

    public function show(Package $package)
    {
        return view('pages.admin.packages.show', [
            'package' => $package
        ]);
    }

    public function edit(Package $package)
    {
        return view('pages.admin.packages.edit', [
            'package' => $package
        ]);
    }

    public function update(PackageUpdateRequest $request, Package $package)
    {
        try {
            DB::beginTransaction();

            $request->merge([
                'slug' => Str::slug($request->name)
            ]);

            $data = $request->only([
                'name', 'slug', 'location', 'description',
                'featured_event', 'language', 'foods', 'departure_date',
                'duration', 'type', 'price'
            ]);

            $this->packageRepository->save($package->fill($data));

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.packages.show', $package)->with([
            'success' => 'Package successfully updated.'
        ]);
    }

    public function destroy(Package $package)
    {
        try {
            DB::beginTransaction();

            $data['name'] = $package['name'] . ' deleted_at ' . Carbon::now()->format('d-m-Y H:i:s');
            $data['slug'] = Str::slug($data['name']);
            $this->packageRepository->save($package->fill($data));

            $package->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.packages.index')->with([
            'success' => 'Package successfully deleted.'
        ]);
    }

    public function addImage(Package $package)
    {
        return view('pages.admin.packages.images.create', [
            'package' => $package
        ]);
    }

    public function uploadImage(PackageUploadImageRequest $request, Package $package)
    {
        try {
            DB::beginTransaction();

            $file = FileHelper::store($request->file('file'), 'packages');

            PackageImage::create([
                'file_id' => $file->id,
                'package_id' => $package->id
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.packages.show', $package)->with([
            'success' => 'Package image successfully created.'
        ]);
    }

    public function deleteImage(Package $package, PackageImage $image)
    {
        try {
            DB::beginTransaction();

            Storage::disk('public')->delete($image->file->location_file);
            $image->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.packages.show', $package)->with([
            'success' => 'Package image successfully deleted.'
        ]);
    }
}
