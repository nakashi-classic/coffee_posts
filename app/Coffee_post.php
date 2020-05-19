<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coffee_post extends Model
{
    protected $fillable = ['user_id','coffee_name','purchase_store','roast','brew','score','comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
