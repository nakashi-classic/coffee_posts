<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile_content'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function coffee_posts()
    {
        return $this->hasMany(Coffee_post::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }

    public function follow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $userId;
    
        if ($exist || $its_me) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身かどうかの確認
        $its_me = $this->id == $userId;
    
        if ($exist && !$its_me) {
            // 既にフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    public function feed_coffee_posts()
    {
        $follow_user_ids = $this->followings()->pluck('users.id')->toArray();
        $follow_user_ids[] = $this->id;
        return Coffee_post::whereIn('user_id', $follow_user_ids);
    }
    
     public function favorites()
    {
        return $this->belongsToMany(Coffee_post::class, 'favorites', 'user_id', 'coffee_post_id')->withTimestamps();
    }
    
     public function favorite($coffee_postId)
    {
        // 既にお気に入りしているかの確認
        $exist = $this->is_favoriting($coffee_postId);
        
        if ($exist) {
            // 既にお気に入りしていれば何もしない
            return false;
        } else {
            // 未お気に入りであればお気に入りする
            $this->favorites()->attach($coffee_postId);
            return true;
        }
    }
    
    public function unfavorite($coffee_postId)
    {
        // 既にお気に入りしているかの確認
        $exist = $this->is_favoriting($coffee_postId);
    
        if ($exist) {
        // 既にお気に入りしていればお気に入りを外す
            $this->favorites()->detach($coffee_postId);
            return true;
        } else {
        // 未お気に入りであれば何もしない
            return false;
        }
    }
    
    public function is_favoriting($coffee_postId)
    {
        return $this->favorites()->where('coffee_post_id', $coffee_postId)->exists();
    }
}

