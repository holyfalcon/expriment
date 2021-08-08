<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=['image_addr','text'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
