<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'location', 'description',
        'featured_event', 'language', 'foods', 'departure_date',
        'duration', 'type', 'price'
    ];

    /** Relationship */
    public function images()
    {
        return $this->hasMany(PackageImage::class);
    }
}
