@extends('admin-auth.layouts')

@section('content')
@include('layouts.messages')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">افزودن اطلاعات</div>
            <div class="card-body">
                <form action="{{ route('admin.store.info') }}" method="post">
                    @csrf
                    <div class="form-group">
                    <label for="addres">نام</label>
                    <input type="text" class="form-control" name="name" value="" class="form-control @error('name') is-invalid @enderror">
                </div>
                    <div class="form-group">
                    <label for="addres">آدرس</label>
                    <input type="text" class="form-control" name="address" value="" class="form-control @error('address') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="phone">تلفن</label>
                    <input type="text" class="form-control" name="phone" value="" class="form-control @error('phone') is-invalid @enderror">
                </div>
                    <div class="form-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="img" value="" class="form-control @error('img') is-invalid @enderror">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">
                <button class="btn btn-primary me-2" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection