<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function postComment(Request $request){
        $user = Auth::user();

        Comment::create([
            'post_id'   =>  $request->post_id,
            'user_id'   =>  $user->id,
            'comment'   =>  $request->comment
        ]);

        $comment = Comment::where('post_id', $request->post_id)
                            ->where('user_id', $user->id)
                            ->orderBy('id', 'desc')
                            ->first();

        return response()->json([
            'error'         =>  false,
            'message'       =>  'Thêm comment thành công!',
            'data'          =>  $request->all(),
            'info'          =>  Auth::user(),
            'comment_id'    =>  $comment->id,
            'created_at'    =>  date('Y-m-d H:i:s', time())
        ]);
    }

    public function deleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();

        return response()->json([
            'error'         =>  false,
            'message'       =>  'Xoa comment thành công!'
        ]);
    }
}
