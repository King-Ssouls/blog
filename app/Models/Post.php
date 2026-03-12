<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'duration',
        'author_id'
    ];


    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
