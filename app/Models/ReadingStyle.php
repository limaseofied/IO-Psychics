<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingStyle extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}