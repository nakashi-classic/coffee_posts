<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function index()
   {
     $profiles = Profile::all();

     return view('profiles.index',[
       'profiles' => $profiles
     ]);
   }
   protected $fillable = ['profile', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
