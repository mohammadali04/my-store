@extends('back.index')
@section('content')
<div class="card">
    <style>
    .form-group {
        margin: 20px 0;
    }
    </style>
    <div class="card-body">
        <h class="card-title" style="margin:20px 0">فرم ثبت شبکه ی احتماعی</h>
        <p class="card-description" style="margin:20px 0">
            اطلاعات خود را وارد کنید
        </p>
        <form action="{{Route('admin.store.social')}}" method="POST">
            @csrf
            <!-- <div class="form-group">
                    <label for="exampleTextarea1">آیکن</label>
                    <textarea id="" type="text" class="form-control" name="icon" style="height:200px"></textarea>
                </div> -->
            <div class="form-group">
                <label for="exampleTextarea1">نام</label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">لینک</label>
                <input type="text" class="form-control" name="link" value="{{old('link')}}">
            </div>
            <button type="submit" class="btn btn-primary me-2">ارسال</button>
            <button class="btn btn-light">Cancel</button>
        </form>
    </div>
</div>
@endsection