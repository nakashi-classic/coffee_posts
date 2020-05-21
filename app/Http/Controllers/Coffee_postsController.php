<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Coffee_postsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $coffee_posts = $user->feed_coffee_posts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'coffee_posts' => $coffee_posts,
            ];
        }
        
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'coffee_name' => 'required|max:191',
            'purchase_store' => 'required|max:191',
            'roast' => 'required|max:191',
            'brew' => 'required|max:191',
            'score' => 'required|max:10',
            'comment'=>"required|max:191",
        ]);

        $request->user()->coffee_posts()->create([
            'coffee_name' => $request->coffee_name,
            'purchase_store' => $request->purchase_store,
            'roast' => $request->roast,
            'brew' => $request->brew,
            'score' => $request->score,
            'comment'=>$request->comment,
        ]);

        return back();
    }
        
    public function destroy($id)
    {
        $coffee_post = \App\Coffee_post::find($id);

        if (\Auth::id() === $coffee_post->user_id) {
            $coffee_post->delete();
        }

        return back();
    }
    
    public function coffee_posts()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $coffee_posts = $user->feed_coffee_posts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'coffee_posts' => $coffee_posts,
            ];
        }
        
        return view('users.coffee_posts', $data);
    }
}
