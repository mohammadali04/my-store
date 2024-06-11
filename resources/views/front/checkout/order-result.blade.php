@extends('front.index');
@section('content')
<div class="container">
    <div class="cart_inner">
        <div class="col-9 text-success bg-light">
            <h4 class="text-success">{{$message}}</h4>
        </div>
        <div class="table-responsive col-9">
            <table class="table border rounded bg-info">
                <thead>
                    <td>نام</td>
                    <td>شهر</td>
                    <td>گدپستی</td>
                    <td>هزینه پست</td>
                    <td>مبلع کل</td>
                    <td>شماره خرید</td>
                    <td>نام بانک</td>
                    <td>آدرس</td>
                </thead>
                <tbody>
                    <td>{{$order->family}}</td>
                    <td>{{$order->city}}</td>
                    <td>{{$order->code_posti}}</td>
                    <td>{{$order->post_price}}</td>
                    <td>{{$order->amount}}</td>
                    <td>{{$order->refrence_id}}</td>
                    <td>{{$order->bank_name}}</td>
                    <td>{{$order->address}}</td>
                </tbody>
            </table>
            <a class="btn btn-success" href="{{Route('index')}}">بازگشت به صفحه اصلی</a>
        </div>
    </div>
</div>
@endsection