<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DateTime;

class CommentController extends Controller
{
    public function all_comment()
    {
        $comments = Comment::orderBy('id','desc')->where('comment_parent_id',null)->get();
        $reply_comment = Comment::where('comment_parent_id','>',0)->get();
        return view('admin.Comment.all_comment',compact('comments','reply_comment'));
    }

    public function active_comment($id)
    {
        DB::table('tbl_comment')->where('id', $id)->update(['status' => 0]);

        toast('Hiển thị bình luận thành công!', 'success');
        return redirect('all-comment');
    }

    public function unactive_comment($id)
    {
        DB::table('tbl_comment')->where('id', $id)->update(['status' => 1]);

        toast('Ẩn bình luận thành công!', 'success');
        return redirect('all-comment');
    }

    public function reply_comment(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = new DateTime();
        $data                       = $request->all();
        $comment                    = new Comment();
        $comment->name              = 'ADMIN';
        $comment->comment           = $data['comment'];
        $comment->product_id        = $data['product_id'];
        $comment->comment_parent_id = $data['comment_id'];
        $comment->status            = 0;
        $comment->created_at    = $date;
        $comment->save();
    }

    public function delete_comment($id)
    {
        $cmt_status = Comment::where('id', $id)->value('status');
        if ($cmt_status == 0) {
            toast('Không thể xóa bình luận còn đang hiển thị', 'error');
            return redirect('all-comment');
        } else {
            DB::table('tbl_comment')->where('id', $id)->delete();
            toast('Xóa bình luận thành công!', 'success');
            return redirect('all-comment');
        }
    }
}
