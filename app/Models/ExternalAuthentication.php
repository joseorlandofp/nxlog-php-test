<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalAuthentication extends Model
{
    protected $table = 'external_authentications';
    protected $fillable = [
        'user_id',
        'origin',
        'external_id',
        'token',
        'refresh_token',
        'expires_in',
        'expires_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
