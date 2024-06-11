<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function manageUsers()
    {
        $users=User::where('role',3)->get();
        return view('back.user.users',compact('users'));
    }
    public function manageOfficers(){
        $officers=User::where('role','!=',3)->get();
        return view('back.user.officers',compact('officers'));
    }

       /**
     * Display the specified resource.
     */
    public function setStatus(User $user)
    {
        if(($user->status)==0){
            $user->status=1;
        }else{
            $user->status=0;
        }
        $user->save();
        $msg='با موفقیت دخیره شد'; 
        return redirect(Route('admin.officer.index'))->with('success',$msg);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,User $user)
    {
        return view('back.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try{
            $user->update($request->all());
        }catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='کامنت مورد نظر با موقفیت ویرایش شد';
        return redirect(Route('admin.user.index'))->with('success',$msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try{
            User::destroy($request->ids);
        }catch(Exception $exception){
return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='کاربر مورد نظر با موقفیت حذف شد';
        return redirect(Route('admin.user.index'))->with('success',$msg);
    }
    public function changeLevel1(Request $request){
        User::where('id',$request->ids[0])->update(['role'=>1]);
        return redirect()->back();
    }
    public function changeLevel2(Request $request){
        User::where('id',$request->ids[0])->update(['role'=>2]);
        return redirect()->back();

    }
    public function changeLevel3(Request $request){
        User::where('id',$request->ids[0])->update(['role'=>3]);
        return redirect()->back();

    }
}
