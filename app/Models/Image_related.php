<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Image_related extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'img_id',
        'related_id',
        'entity'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function image()
    {
        return $this->belongsTo(Image::class, 'img_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'related_id', 'id')->where('entity', 'product');
    }
    public function post()
    {
        return $this->belongsTo(Product::class, 'related_id', 'id')->where('entity', 'post');
    }


}
