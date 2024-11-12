<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        'ci',
        'name_client',
        'lastname_client',
        'email_client',
        'brand',
        'name',
        'solution',
        'cost',
        'status',
        'category_id',
    ];
}
