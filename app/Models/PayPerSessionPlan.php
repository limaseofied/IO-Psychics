<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayPerSessionPlan extends Model
{
    protected $table = 'pay_per_session_plans';

    protected $fillable = [
        'duration_min',
        'price'
    ];

    public $timestamps = false;
}