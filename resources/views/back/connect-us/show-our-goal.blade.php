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
        <form action="{{Route('admin.update.goal',$our_goal->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleTextarea1">توضیحات بالا</label>
                <textarea name="top_description" class="form-control">{{$our_goal->top_description}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">توضیحات سمت راست</label>
                <textarea name="left_description" class="form-control">{{$our_goal->left_description}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">توضیحات سمت چپ</label>
                <textarea name="right_description" class="form-control">{{$our_goal->right_description}}</textarea>
            </div>
            <div class="form-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="img" value="{{$our_goal->img}}">
                </div>
            <button type="submit" class="btn btn-primary me-2">ارسال</button>
            <button class="btn btn-light">Cancel</button>
        </form>
    </div>
</div>
@endsection