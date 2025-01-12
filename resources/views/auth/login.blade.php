@extends('front.index')
@section('content')
<div id="login">
    <h3 class="text-center text-white pt-5">صفحه ی ورود</h3>
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="text-danger text-center">
        {{$error='ایمیل یا پسورد وارد شده معتبر نیست.'}}
    </div>
    @endforeach
    @endif
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6" style="border:1px solid #6f42c1;border-radius:4px">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="{{Route('login')}}" method="post">
                        @csrf
                        <h3 class="text-center text-info">ورود</h3>
                        <div class="form-group">
                            <label for="email" class="text-info">نام کاربری:</label><br>
                            <input type="text" name="email" value="{{old('email')}}" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">گذرواژه</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="remember-me"
                                class="text-info"><span>{{ __('به خاطر بسپار') }}</span> <span><input id="remember-me"
                                        name="remember-me" type="checkbox"></span></label><br>
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="ورود">
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="{{Route('register')}}" class="text-info">ایجاد حساب جدید</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection