<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    /**
     * {#inheritDoc}
     */
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    /**
     * Get the user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
