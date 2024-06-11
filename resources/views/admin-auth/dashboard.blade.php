@extends('admin-auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">داشبورد</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                    <div>
                        <a class="btn btn_success bg-success text-white" href="{{Route('admin.index')}}">رفتن به پنل مدیریت</a>
                        <a class="btn btn_success bg-primary text-white" href="{{Route('index')}}">رفتن به سایت</a>
                    </div> 
                    @else
                    <div class="alert alert-success">
                        شما لاگین شدید !
                    </div>      
                @endif                
            </div>
        </div>
    </div>    
</div>
    
@endsection