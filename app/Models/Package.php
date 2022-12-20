<?php

namespace App\Models;

use Carbon\Carbon;
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

    /** Acessor */
    public function getFormatDateAttribute()
    {
        return Carbon::parse($this->departure_date)->format('d F Y');
    }

    public function getFormatPriceAttribute()
    {
        return number_format($this->price, 0, ',', '.');
    }

    public function getPriceFormatNumberAttribute()
    {
        return round($this->price);
    }

    public function getFirstImageAttribute()
    {
        $image = $this->images()->first();

        if (!empty($image)) {
            return $image->file->show_file;
        } else {
            return url('frontend/images/Travel-1.jpg');
        }
    }
}
