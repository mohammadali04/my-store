<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\back\ClientMessages;

class ClientMessageController extends Controller
{
    public function index()
    {
        $messages=ClientMessages::all();
        return view('back.client-messages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientMessages $message)
    {
        return view('back.client-messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientMessages $message)
    {
        return view('back.client-messages.edit',compact('message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientMessages $message)
    {
        $validationData=$request->validate([
            'body'=>'required',
        ]);
        try{
            $message->body=$request->body;
            $message->save();
        }
        catch(Exception $exception){
            dd($exception->getMessage());
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم مورد نظر با موفقیت ویرایش شد';
        return redirect(Route('admin.message.index'))->with('success',$msg);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try{
            ClientMessages::destroy($request->ids);
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت حذف شد';
        return redirect()->back()->with('success',$msg);
    }
}
