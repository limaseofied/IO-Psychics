<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoroscopeDaily extends Model
{
    protected $table = 'horoscope_daily';

    protected $fillable = [
        'sign_id',
        'horoscope_date',
        'personal_life',
        'profession',
        'health',
        'emotions',
        'travel',
        'luck'
    ];

    // Relationship to sign
    public function sign()
    {
        return $this->belongsTo(HoroscopeSign::class, 'sign_id', 'sign_id');
    }
}