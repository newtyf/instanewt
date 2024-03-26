<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rules\File;

class UserController extends Controller
{
    public function show(Request $request, $user)
    {
        $u = User::where('username', $user)->first();
        $p = Post::where('user_id', $u->id)->get();
        if (!$u) {
            return view('404');
        }
        return view('account.profile', ['user' => $u, 'posts' => $p]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'upload' => ['file', File::image()->min(256)->max(1024)],
            'name' => ['required', 'string',  'max:20'],
            'biography' => ['string', 'nullable'],
        ]);

        $user = Auth::user();

        if ($request->hasFile('upload')) {
            $archivo = $request->file('upload');
            $fileName = $user->username . "." . $archivo->extension();
            Storage::disk("public")->putFileAs("avatars", $archivo, $fileName);
            $host = URL::to('/');
            $user->photoUrl = $host . Storage::url("avatars/" . $fileName);
        }
        $user->name = $request->name;
        $user->biography = strip_tags($request->biography);

        $user->save();

        session()->flash("status","account edited successful");
        return to_route("account.edit");

    }
}
