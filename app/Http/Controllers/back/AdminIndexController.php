<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\Ability;
use App\Models\back\AdminInfo;
use Illuminate\Http\Request;
use App\Models\back\Social;
use Exception;

class AdminIndexController extends Controller
{
    public function index(){
        return view('back.content');
    }
    public function addInfo(){
        return view('admin-auth.add-info');
    }
    public function storeInfo(Request $request){
        $validation=$request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'img' => 'required'
        ]);
        try{
            AdminInfo::create(['user_id'=>auth()->user()->id,'name'=>$request->name,'img'=>$request->img,'address'=>$request->address,'phone'=>$request->phone]);
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getMessage());
        }
        $msg='اطلاعات مورد نظر با موفقیت ثبت شد';
        return redirect()->route('admin.index')->with('success',$msg);
    }
    public function editInfo(AdminInfo $admin_info){
        return view('admin-auth.edit-info',compact('admin_info'));
    }
    public function updateInfo(Request $request,AdminInfo $admin_info){
        $validation=$request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'img' => 'required'
        ]);
        try{
            $admin_info->update(['user_id'=>auth()->user()->id,'name'=>$request->name,'img'=>$request->img,'address'=>$request->address,'phone'=>$request->phone]);
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getMessage());
        }
        $msg='اطلاعات مورد نظر با موفقیت ویرایش شد';
        return redirect()->route('admin.index')->with('success',$msg);
    }
    public function showAbility(){
        $abilities=Ability::all();
        return view('back.ability.index',compact('abilities'));
    }
    public function createAbility(){
    return view('back.ability.create');

    }
    public function storeAbility(Request $request){
        $dataValidation=$request->validate([
            'title' => 'required',
            'icon' => 'required',
        ]);
        try{
            Ability::create($request->all());
        }catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت اضافه شد';
        return redirect()->route('admin.show.ability')->with('success',$msg);
    }
    public function editAbility(Ability $ability){
        return view('back.ability.edit',compact('ability'));
    }
    public function updateAbility(Request $request,Ability $ability){
        $dataValidation=$request->validate([
            'title' => 'required',
            'icon' => 'required',
        ]);
        try{
            $ability->update($request->all());
        }catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت ویرایش شد شد';
        return redirect()->route('admin.show.ability')->with('success',$msg);
    }
    public function destroyAbility(Request $request){
        Ability::destroy($request->ids);
        return redirect()->back();
    }
    public function showSocials(){
        $socials=Social::all();
        return view('back.social-networks.index',compact('socials'));
    }
    public function createSocials(){
        return view('back.social-networks.create');
    }
    public function storeSocials(Request $request){
        $dataValidation=$request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);
        try{
            Social::create($request->all());
        }catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت اضافه شد';
        return redirect()->route('admin.show.social')->with('success',$msg);
    }
    public function editSocials(Social $social){
        return view('back.social-networks.edit',compact('social'));
    }
    public function updateSocials(Request $request,Social $social){
        $dataValidation=$request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);
        try{
            $social->update($request->all());
        }catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت ویرایش شد شد';
        return redirect()->route('admin.show.social')->with('success',$msg);
    }
    public function destroySocials(Request $request){
        Social::destroy($request->ids);
        return redirect()->back();
    }

}
