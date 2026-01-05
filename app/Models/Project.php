<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'img_pic',
        'link',
        'date',
    ];


    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function isExternal(): bool
    {
        return !is_null($this->external_link);
    }
}

