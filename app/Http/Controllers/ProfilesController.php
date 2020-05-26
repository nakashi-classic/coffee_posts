<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfilesController extends Controller
{
    public function create()
    {   
        $user = \Auth::user();
        $profile = new Profile;
        return view('profiles.create', [
            "profile" => $profile,
            'user' => $user,
        ]);
    }
    public function store(Request $request)
    {   
        $profile = new Profile;
        $this->validate($request, [
            'profile' => 'required|max:191',
        ]);

        $request->user()->profiles()->create([
            'profile' => $request->profile,
        ]);

        return redirect("/");
    }
    public function edit($id)
    {
        $profile = new Profile;

        return view('profiles.edit', [
            'profile' => $profile,
        ]);
    }
    // 「更新処理」
    public function update(Request $request, $id)
    {   
        $profile = Profile::find($id);
        $profile->content=$request->content;
        $profile->save();
        
        return redirect("/");
    }
    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();

        return redirect('/');
    }
}
