<?php

namespace App\Models;

// use Illuminate\Contracts\AuthController\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Image extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'file_name',
        'level',
        'created_at'
    ];
    public function imageRelated()
    {
        return $this->hasMany(Image_related::class, 'img_id', 'id');
    }

    // Quan hệ nhiều-nhiều (Many-to-Many) với Model Product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'image_related', 'img_id', 'related_id')->where('entity', 'product');
    }
    public function post()
    {
        return $this->belongsToMany(Product::class, 'image_related', 'img_id', 'related_id')->where('entity', 'post');
    }

}
