<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'location'
    ];

    /** Acessor */
    public function getLocationFileAttribute()
    {
        return 'file/' . $this->location . '/' . $this->name;
    }

    public function getShowFileAttribute()
    {
        return Storage::url($this->location_file);
    }
}
