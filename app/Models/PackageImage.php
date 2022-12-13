<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id', 'file_id'
    ];

    /** Relationship */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
