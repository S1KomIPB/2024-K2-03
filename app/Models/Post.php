<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['lab', 'jenjang', 'user'];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeSearchByTitle($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%');
    }

    public function scopeSearchByFirstName($query, $search)
    {
        return $query->orWhereHas('user', function ($query) use ($search) {
            $query->where('firstName', 'like', '%' . $search . '%');
        });
    }

    public function scopeSearchByLastName($query, $search)
    {
        return $query->orWhereHas('user', function ($query) use ($search) {
            $query->where('lastName', 'like', '%' . $search . '%');
        });
    }

    // Mutator to add the protocol to the URL before saving it to the database
    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = $this->addProtocolToUrl($value);
    }

    // Accessor to retrieve the URL with the protocol
    public function getUrlAttribute($value)
    {
        return $this->addProtocolToUrl($value);
    }

    // Helper function to add the protocol if it's missing
    private function addProtocolToUrl($url)
    {
        if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
            return 'http://' . $url;
        }
        return $url;
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function advisors()
    {
        return $this->belongsToMany(Advisor::class, 'advisor_post');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

