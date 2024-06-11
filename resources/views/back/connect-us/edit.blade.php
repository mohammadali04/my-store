@extends('back.index')
@section('content')
    <div class="card">
        <style>
        .form-group {
            margin: 20px 0;
        }
        </style>
        <div class="card-body">
            <h class="card-title" style="margin:20px 0">فرم ویرایش گزینه های ارتباطی</h>
            <p class="card-description" style="margin:20px 0">
                اطلاعات خود را وارد کنید
            </p>
            <form action="{{Route('admin.connect.update',$connectUsOption->id)}}" method="POST">
                @csrf
                <div class="form-group">
                <label for="exampleTextarea1">نام</label>
                <input type="text" name="title" class="form-control" value="{{$connectUsOption->title}}">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">آیکن</label>
                <input type="text" class="form-control" name="icon" value="{{$connectUsOption->icon}}">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">مقدار</label>
                <input type="text" class="form-control" name="value" value="{{$connectUsOption->value}}">
                <button type="submit" class="btn btn-primary me-2">ارسال</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
@endsection