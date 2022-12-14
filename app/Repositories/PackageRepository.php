<?php

namespace App\Repositories;

use App\Models\Package;

class PackageRepository
{
    private $model;

    public function __construct(Package $model)
    {
        $this->model = $model;
    }

    public function get($params = [])
    {
        $packages = $this->model
            ->when(!empty($params['search']['name']), function ($query) use ($params) {
                return $query->where('name', 'LIKE', '%' . $params['search']['name'] . '%');
            })
            ->when(!empty($params['order']), function ($query) use ($params) {
                return $query->orderByRaw($params['order']);
            });

        if (!empty($params['paginate'])) {
            return $packages->paginate($params['paginate']);
        }

        return $packages->get();
    }

    public function save(Package $package)
    {
        $package->save();

        return $package;
    }
}
