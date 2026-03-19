<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'thumbnail',
        'banner_image',
        'small_description',
        'full_description',
        'final_thoughts'
    ];

    public function steps()
    {
        return $this->hasMany(ServiceStep::class);
    }
}