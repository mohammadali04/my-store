<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\front\OurGoal;
use Exception;
use Illuminate\Http\Request;
use App\Models\back\ConnectUsOption;

class AdminAboutController extends Controller
{
    public function connectUsOptions(){
        $connect_us_options=ConnectUsOption::all();
        return view('back.connect-us.index',compact('connect_us_options'));
    }
    public function connectUsOptionCreate(){
        return view('back.connect-us.create');
    }
    public function connectUsOptionStore(Request $request){
        $dataValidation=$request->validate([
            'title'=>'required',
            'icon'=>'required',
            'value'=>'required',
        ]);
        try{
            ConnectUsOption::create($request->all());
        }catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت ثبت شد';
        return redirect()->route('admin.connect.option')->with('success',$msg);
    }
    public function connectUsOptionEdit(ConnectUsOption $connectUsOption){
        return view('back.connect-us.edit',compact('connectUsOption'));
    }
    public function connectUsOptionUpdate(Request $request,ConnectUsOption $connectUsOption){
        $dataValidation=$request->validate([
            'title'=>'required',
            'icon'=>'required',
            'value'=>'required',
        ]);
        try{
            $connectUsOption->update($request->all());
        }catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت ویرایش شد';
        return redirect()->route('admin.connect.option')->with('success',$msg);
    }
    public function connectUsOptionDestroy(Request $request){
        ConnectUsOption::destroy($request->ids);
        return redirect()->back();
    }
    public function showOurGoal(){
       $our_goal = OurGoal::find(1);
        return view('back.connect-us.show-our-goal',compact('our_goal'));
    }
    public function updateOurGoal(Request $request,OurGoal $ourGoal){
        $validationData=$request->validate([
            'top_description' => 'required',
            'right_description' => 'required',
            'left_description' => 'required',
            'img' => 'required',
        ]);
try{
    $ourGoal->update($request->all());
}catch(Exception $exception){
    return redirect()->back()->with('warning',$exception->getCode());
}
$msg='آیتم های مورد نظر با موفقیت ویرایش شد';
return redirect()->back()->with('success',$msg);
    }
}
