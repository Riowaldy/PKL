<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Task;
use App\Comment;

class PostCommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
    	//Comment::create([
    	//	'post_id' => $post->id,
    	//	'user_id' => auth()->id(),
    	//	'message' => $request->message,
    	//]);
    	$post->comments()->create(array_merge(
    		$request->only('message'),
    		['user_id' => auth('web')->id()]
    	));

    	return redirect()->back();
    }

    public function AdminStore(Request $request, Post $post)
    {
        //Comment::create([
        //  'post_id' => $post->id,
        //  'user_id' => auth()->id(),
        //  'message' => $request->message,
        //]);
        $post->comments()->create(array_merge(
            $request->only('message'),
            ['admin_id' => auth('admin')->id()]
        ));

        return redirect()->back();
    }

    public function MemberStore(Request $request, Post $post)
    {
        //Comment::create([
        //  'post_id' => $post->id,
        //  'user_id' => auth()->id(),
        //  'message' => $request->message,
        //]);
        $post->comments()->create(array_merge(
            $request->only('message'),
            ['member_id' => auth('member')->id()]
        ));

        return redirect()->back();
    }
}
