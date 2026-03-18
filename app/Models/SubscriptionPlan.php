<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $table = 'subscription_plans';

    protected $fillable = [
        'name',
        'duration_min',
        'guide_level',
        'price',
        'created_at'
    ];

    public $timestamps = false; // since no updated_at
}