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
     // getでusers/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        //
    }
    // postでusers/にアクセスされた場合の「新規登録処理」
     public function store(Request $request)
    {   
        $profile_content = new User;
        $this->validate($request, [
            'profile_content' => 'required|max:191',
        ]);

        $request->user()->coffee_posts()->create([
            'profile_content' => $request->profile_content,
        ]);

        return back();
    }
    // getでusers/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        //
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
    // putまたはpatchでusers/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {   
        $profile_content = User::find($id);
        
        if (\Auth::id() === $profile_content->user_id){
        $profile_content = new User;
        $profile_content->prpfile_content = $request->profile_content;
        $profile_content->save();
        }
         return redirect("/");
    }
    public function destroy($id)
    {
        $profile_content = \App\User::find($id);

        if (\Auth::id() === $profile_content->user_id) {
            $profile_content->delete();
            return back();
        }

        return back();
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
        $profile_content = User::find($id);
        $user = User::find($id);
        $data = [
            'user' => $user,
            'profile_content' => $profile_content,
        ];
        return view('users.profile_edit',$data);
    }
}
