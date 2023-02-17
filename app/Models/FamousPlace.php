<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;

class FamousPlace extends Model
{
    use HasFactory;
    protected $table ="famousplace";
    protected $fillable = [
        'id_province',
        'name_famous',
        'address',
        'description',
        'image',
        'ischecked'
    ];

    public function province()
    {
        return $this->hasOne(Province::class, 'id', 'id_province')
            ->withDefault(['provinceName' => '']);
    }
}
