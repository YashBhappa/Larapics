<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['title', 'file', 'dimension', 'user_id', 'slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function uploadDate()
    {
        return $this->created_at->diffForHumans();
    }

    public static function makeDirectory()
    {
        $subfolder = 'images/' . date('Y/m/d');
        Storage::makeDirectory($subfolder);
        return $subfolder;
    }

    public static function getDimension($image)
    {
        [$width, $height] = getimagesize(Storage::path($image));
        return $width . 'x' .  $height;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function fileUrl()
    {
        return Storage::url($this->file);
    }

    public function permalink()
    {
        return route('images.show', $this->slug ? $this->slug : '#');
    }


    public function getSlug()
    {
        $slug = str($this->title)->slug();
        $numSlugsFound = static::where('slug', 'regexp', "^" . $slug . "(-[0-9])?")->count();
        if ($numSlugsFound > 0) {
            return $slug . "-" . $numSlugsFound + 1;
        }
        return $slug;
    }

    protected static function booted()
    {
        static::creating(function ($image) {
            if ($image->title) {
                $image->slug = $image->getSlug();
                $image->is_published = true;
            }
        });

        static::updating(function ($image) {
            if ($image->title && !$image->slug) {
                $image->slug = $image->getSlug();
                $image->is_published = true;
            }
        });
    }
}
