<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    public $timestamps = false; // no timestamps in table

    protected $fillable = [
        'name'
    ];
}