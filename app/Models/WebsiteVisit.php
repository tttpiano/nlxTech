<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteVisit extends Model
{
    use HasFactory;
    protected $fillable = [
        'visit_date', // Thêm trường visit_date vào đây
        'count',      // Nếu có các trường khác, cũng thêm vào đây
        // ...
    ];

}
