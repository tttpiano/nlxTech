<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Post extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'author', 'title', 'description', 'content', 'meta_desc', 'meta_keyword', 'status', 'url_seo'
    ];

    public function partyRelationship()
    {
        return $this->hasMany(PartyRelationship::class, 'child_id','id');
    }

    public function images()
    {
        return $this->hasMany(Image_related::class, 'related_id','id');
    }


}
