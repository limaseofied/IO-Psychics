<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin_master'; // 👈 your actual table name

    protected $primaryKey = 'id';

    public $timestamps = false; // 👈 because your table uses created_on / updated_on, not Laravel timestamps

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'status',
    ];

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    protected $hidden = [
        'password',
    ];
}
