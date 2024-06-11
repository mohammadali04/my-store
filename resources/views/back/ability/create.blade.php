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
        <form action="{{Route('admin.store.ability')}}" method="POST">
            @csrf
            <!-- <div class="form-group">
                    <label for="exampleTextarea1">آیکن</label>
                    <textarea id="" type="text" class="form-control" name="icon" style="height:200px"></textarea>
                </div> -->
            <div class="form-group">
                <label for="exampleTextarea1">نام</label>
                <input name="title" class="form-control" value="{{old('title')}}">
            </div>
            <div class="form-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="icon" value="{{old('icon')}}" class="form-control @error('img') is-invalid @enderror">
                </div>
            <button type="submit" class="btn btn-primary me-2">ارسال</button>
            <button class="btn btn-light">Cancel</button>
        </form>
    </div>
</div>
@endsection