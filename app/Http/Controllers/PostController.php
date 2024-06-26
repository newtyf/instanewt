<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rules\File;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with("user")->with("like")
            ->leftJoin('follows', function ($join) {
                $join->on('posts.user_id', '=', 'follows.following_id')->where('follows.follower_id', '=', Auth::user()->id);
            })
            ->where('posts.user_id', '=', Auth::user()->id)
            ->orWhereNotNull('follows.follower_id')
            ->select('posts.*')
            ->orderBy('created_at', 'desc')->paginate(3);

        foreach ($posts as $key => $post) {
            $post->liked_by_user = false;
            if ($post->like->contains('user_id', Auth::user()->id)) {
                $post->liked_by_user = true;
            }
        }

        foreach ($posts as $key => $post) {
            unset($post->like);
        }

        return json_encode($posts);
    }

    public function store(Request $request)
    {
        $request->validate([
            'upload' => ['required', 'file', File::image()->min(1)->max(5 * 1024)],
            'description' => ['required', 'string', 'nullable'],
        ]);


        $post = new Post;
        $user = Auth::user();

        if ($request->hasFile('upload')) {
            $archivo = $request->file('upload');
            $fileName = $user->username . "-" . time() . "." . $archivo->extension();
            Storage::disk("public")->putFileAs("posts/" . $user->username, $archivo, $fileName);
            $host = URL::to('/');
        }

        $post->photoUrl = $host . Storage::url("posts/$user->username/" . $fileName);
        $post->description = strip_tags($request->description);
        $post->user_id = $user->id;
        $post->save();
        return to_route("feed");
    }
}
