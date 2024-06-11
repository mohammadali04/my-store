<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\FavoriteComment;
use Exception;
use Illuminate\Http\Request;
use App\Models\back\Comment;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments=Comment::all();
        return view('back.comment.index',compact('comments'));
    }

       /**
     * Display the specified resource.
     */
    public function setStatus(Comment $comment)
    {
        if(($comment->status)==0){
            $comment->status=1;
        }else{
            $comment->status=0;
        }
        $comment->save();
        $msg='با موفقیت دخیره شد'; 
        return redirect(Route('admin.comment.index'))->with('success',$msg);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,Comment $comment)
    {
        return view('back.comment.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        try{
            $comment->update($request->all());
        }catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='کامنت مورد نظر با موقفیت ویرایش شد';
        return redirect(Route('admin.comment.index'))->with('success',$msg);
    }
    public function addTfavoriteComments(Request $request){
        try{
            foreach($request->ids as $id){
                FavoriteComment::create(['comment_id'=>$id]);
            }
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت ثبت شد';
        return redirect()->back()->with('success',$msg);
    }
    public function showFavoriteComments(){
        $comment_ids=FavoriteComment::all();
        $comments=[];
        foreach($comment_ids as $id){
            $comment=$id->FavoriteComment()->first();
            array_push($comments,$comment);
        }
        return view('back.comment.show-favorite-comments',compact('comments'));
    }
    public function destroyFavoriteComments(Request $request){
        foreach($request->ids as $id){
        FavoriteComment::where('comment_id',$id)->delete();
    }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try{
            Comment::destroy($request->ids);
        }catch(Exception $exception){
return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='محصول مورد نظر با موقفیت حذف شد';
        return redirect(Route('admin.comment.index'))->with('success',$msg);
    }
}
