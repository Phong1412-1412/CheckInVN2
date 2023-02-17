<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FamousPlace;

class Province extends Model
{
    use HasFactory;

    protected $table ="province";
    protected $fillable = [
        'provinceName',
        'description',
        'image',
        'favoriteChecked'
    ];

    public function famousplace()
    {
        return $this->hasMany(FamousPlace::class, 'id_province', 'id');
    }
}
