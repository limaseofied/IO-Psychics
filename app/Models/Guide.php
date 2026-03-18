<?php
namespace App\Models;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $table = 'guides';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'address',
        'experience',
        'rating',
        'guide_level',
        'price_per_min',
        'speciality_id',
        'tool_id',
        'skill_id',
        'reading_style_id',
        'status'
    ];

    protected $hidden = [
        'password'
    ];

     public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}