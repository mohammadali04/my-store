<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\front\Baner;
use App\Models\front\Product;
use Illuminate\Http\Request;
use App\Models\front\ClientMessages;

class IndexController extends Controller
{
    public function index(){
        $baner=Baner::latest()->first();
        $specialList=Product::where('special',1)->get();
        $newestProducts=Product::orderBy('id','desc')->limit('6')->get();
        return view('front.content',compact('baner','specialList','newestProducts'));
    }
    public function aboutUs(){
        return view('front.about_us.index');
    }
    public function connectUs(){
        return view('front.connect_us.index');
    }
    public function addClientMessage(Request $request){
        $valiedation=$request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'subject'=>'required',
                'message'=>'required',
            ]
        );
        $clientMessage=new ClientMessages();
        Try{
            $clientMessage->create($request->all());
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        $msg='پیغام شما ارسال شد با تشکر فراوان';
        return redirect()->back()->with('success',$msg);
    }
}
