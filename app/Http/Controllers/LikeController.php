<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => ['required', 'integer'],
            'post_id' => ['required', 'integer'],
        ]);


        $like = new Like;

        $like->user_id = $request->user_id;
        $like->post_id = $request->post_id;
        $like->save();
        Post::find($request->post_id)->increment('likes');

        return json_encode($like);
    }

    public function destroy(Request $request)
    {

        $request->validate([
            'user_id' => ['required', 'integer'],
            'post_id' => ['required', 'integer'],
        ]);

        $deleted = Like::where('user_id', $request->user_id)->where('post_id', $request->post_id)->delete();
        Post::find($request->post_id)->decrement('likes');

        return json_encode($deleted);
    }
}
