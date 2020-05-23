<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加
use App\Coffee_post;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    public function show($id)
    {
        $user = User::find($id);
        $coffee_posts = $user->feed_coffee_posts()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'coffee_posts' => $coffee_posts,
        ];

        $data += $this->counts($user);

        return view('users.show',$data);
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    public function profile($id)
    {
        $user = User::find($id);
        $coffee_posts = $user->coffee_posts()->orderBy('created_at', 'desc')->paginate(5);
        $followings = $user->followings()->paginate(10);
        $followers = $user->followers()->paginate(10);
        
        $data = [
            'user' => $user,
            'coffee_posts' => $coffee_posts,
        ];

        $data += $this->counts($user);
        return view('users.profile',$data);
    }
    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->paginate(5);

        $data = [
            'user' => $user,
            'favorites' => $favorites,
        ];

        $data += $this->counts($user);

        return view('users.favorites', $data);
    }
    public function profile_edit($id)
    {
        $user = User::find($id);
        $coffee_posts = $user->coffee_posts()->orderBy('created_at', 'desc')->paginate(5);
        $data = [
            'user' => $user,
            'coffee_posts' => $coffee_posts,
        ];
        return view('users.profile_edit',$data);
    }
    public function store(Request $request)
    {   
        $user = new User;
        $this->validate($request, [
            'profile_content' => 'required|max:191',
        ]);

        $request->user()->users()->create([
            'profile_content' => $request->profile_content,
        ]);

        return back();
    }
    public function update(Request $request, $id)
    {   
        $user = \App\User::find($id);
        $this->validate($request, [
            'profile_content' => 'required|max:191',
        ]);
        
        if (\Auth::id() === $user->user_id){
        $request->user()->users()->create([
            'profile_content' => $request->profile_content,
        ]);
        }
         return redirect("/");
    }
}
