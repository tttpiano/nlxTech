<?php

namespace App\Models;

// use Illuminate\Contracts\AuthController\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class PartyRelationship extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'party_id',
        'child_id',
        'party_type',
        'child_type',
        'entity_child'
    ];
    public function Partys()
    {
        return $this->hasMany(Party::class);
    }

    public function party()
    {
        return $this->belongsTo(Party::class, 'party_id');
    }

    public function child()
    {
        return $this->belongsTo(Party::class, 'child_id');
    }
}
