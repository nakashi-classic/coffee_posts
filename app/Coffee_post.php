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
    public function favorite_users()
    {
        return $this->belongsToMany(User::class,"favorites","coffee_post_id","user_id")->withTimestamps();
    }
}
