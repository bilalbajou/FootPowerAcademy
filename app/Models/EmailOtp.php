<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailOtp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'otp',
        'expires_at',
    ];

    protected $dates = [
        'expires_at',
    ];
}
