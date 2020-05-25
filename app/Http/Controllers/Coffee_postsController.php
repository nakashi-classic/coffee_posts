<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coffee_post;

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
        $coffee_post = new Coffee_post;
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
            return redirect("/");
        }

        return back();
    }
    
    public function edit($id)
    {
        $coffee_post = Coffee_post::find($id);
        
        if (\Auth::id() === $coffee_post->user_id) {
        return view('coffee_posts.edit', ['coffee_post' => $coffee_post,]);
        }
        return redirect("/");
    }
    
    public function update(Request $request, $id)
    {   
        $coffee_post = \App\Coffee_post::find($id);
        $this->validate($request, [
            'coffee_name' => 'required|max:191',
            'purchase_store' => 'required|max:191',
            'roast' => 'required|max:191',
            'brew' => 'required|max:191',
            'score' => 'required|max:10',
            'comment'=>"required|max:191",
        ]);
        
        if (\Auth::id() === $coffee_post->user_id){
        $request->user()->coffee_posts()->create([
            'coffee_name' => $request->coffee_name,
            'purchase_store' => $request->purchase_store,
            'roast' => $request->roast,
            'brew' => $request->brew,
            'score' => $request->score,
            'comment'=>$request->comment,
        ]);
        }
         return redirect("/");
    }
    public function show($id)
    {
        $coffee_post = \App\Coffee_post::find($id);
        $user = \Auth::user();
        
        $data = [
                'user' => $user,
                'coffee_post' => $coffee_post,
            ];
        return view('coffee_posts.show',$data);
    }
    public function post($id)
    {
        $user = User::find($id);
        return view('coffee_posts.post',['user' => $user,]);
    }
}
