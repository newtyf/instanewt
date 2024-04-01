<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'follower_id' => ['required', 'integer', 'different:following_id'],
            'following_id' => ['required', 'integer', 'different:follower_id'],
        ]);

        $follow = new Follow;
        $follow->follower_id = $request->follower_id;
        $follow->following_id = $request->following_id;

        User::find($request->follower_id)->increment('following');
        User::find($request->following_id)->increment('followers');
        $follow->save();

        return json_encode($follow);
    }

    public function destroy(Request $request)
    {

        $request->validate([
            'follower_id' => ['required', 'integer', 'different:following_id'],
            'following_id' => ['required', 'integer', 'different:follower_id'],
        ]);

        $deleted = Follow::where('follower_id', $request->follower_id)->where('following_id', $request->following_id)->delete();
        User::find($request->follower_id)->decrement('following');
        User::find($request->following_id)->decrement('followers');

        return json_encode($deleted);
    }
}
