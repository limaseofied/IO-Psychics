<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoroscopeSign extends Model
{
    use HasFactory;

    protected $table = 'horoscope_signs';

    protected $primaryKey = 'sign_id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'image',
        'traits',
        'personality'
    ];


    public function daily()
    {
        return $this->hasMany(HoroscopeDaily::class,'sign_id');
    }
}