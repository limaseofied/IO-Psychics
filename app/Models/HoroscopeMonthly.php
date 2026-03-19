<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoroscopeMonthly extends Model
{
    protected $table = 'horoscope_monthly';

    protected $fillable = [
        'sign_id',
        'month',
        'year',
        'prediction'
    ];

     // Relationship to sign
    public function sign()
    {
        return $this->belongsTo(HoroscopeSign::class, 'sign_id', 'sign_id');
    }
    
}