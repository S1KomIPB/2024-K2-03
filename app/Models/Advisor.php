<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    use HasFactory;

    protected $fillable = ['firstName', 'lastName'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'advisor_post');
    }
}
