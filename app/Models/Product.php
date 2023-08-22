<?php

namespace App\Models;

// use Illuminate\Contracts\AuthController\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'descrips',
        'description',
        'price',
        'price_status',
        'url_seo',
        'view_count'
    ];

    public function partys_Relationship()
    {
        return $this->hasMany(PartyRelationship::class, 'child_id','id');
    }

    public function images()
    {
        return $this->hasMany(Image_related::class, 'related_id','id');
    }

    public function relatedImages()
    {
        return $this->hasMany(Image_related::class, 'related_id', 'id')->where('entity', 'product');
    }
    public function partyRelationship()
    {
        return $this->hasMany(PartyRelationship::class, 'child_id');

    }
    public function party()
    {
        return $this->belongsTo(Party::class, 'party_id');
    }

    public function child()
    {
        return $this->belongsTo(Party::class, 'child_id');
    }
    public function partyRelationships()
    {
        return $this->hasMany(PartyRelationship::class, 'entity_child', 'id')
            ->where('child_type', 'product');
    }

    // Phương thức kiểm tra xem sản phẩm có liên kết với một loại và thực thể cụ thể không
    public function hasParty($partyType, $partyId)
    {
        return $this->partyRelationships()
            ->where('party_type', $partyType)
            ->where('party_id', $partyId)
            ->exists();
    }
    public function parties()
    {
        return $this->hasMany(Party::class, 'id', 'party_id')
            ->whereIn('type', ['category', 'category_child', 'brand', 'wattage']);
    }

}
