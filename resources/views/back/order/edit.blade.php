@extends('back.index')
@section('content')
@include('layouts.messages')
<div class="card">
    <div class="card-body">
        @include('layouts.messages')
        <h4 class="card-title"> صفحه جزییات سفارش
        </h4>
        <p class="card-description">
            لطفا جزییات سفارش را با دقت بررسی کنید.
        </p>
        @php
        $created_at=$order->created_at;
        $pasted=time()-strtotime($created_at);
        $mohlat_pay=24*3600;
        @endphp
        <div class="container">
            <form class="forms-sample" action="{{Route('admin.order.update',$order->id)}}" method="POST">
                @csrf
                <div class="d-sm-flex justify-content-between align-items-start row">
                    <div>
                        <h4 class="card-title card-title-dash">جزییات سفارش کد:{{$order->id}}
                        </h4>
                        <a href="{{Route('admin.show.factor',$order->id)}}" class="btn btn-primary">مشاهده فاکتور</a>
                        @if($pasted>$mohlat_pay)
                        <p>این سفارش منقضی شده است.حداکثر مهلت پرداخت،برابر
                            {{'24'}}
                            ساعت می باشد</p>
                        @endif

                    </div>

                </div>
                <div class="table-responsive pt-3 row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                </th>
                                <th>نام محصول</th>
                                <th>تعداد</th>
                                <th>قیمت</th>
                                <th>تخفیف</th>
                            </tr>
                        </thead>
                        <tbody>

                            @csrf
                            @foreach($basket as $row)
                            <tr>
                                <td>
                                    {{$row->title}}
                                </td>
                                <td>
                                    {{$row->tedad}}
                                </td>
                                <td>
                                    {{$row->price*$row->tedad}}
                                </td>
                                <td>
                                    {{(($row->price*$row->discount)/100)*$row->tedad}}
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div clas="row">
                    <h4 class="card-title card-title-dash">وضعیت پرداخت:
                    </h4>

                    <select name="status">
                        @foreach($order_status as $row2)
                        <option value="{{$row2->id}}" @if($order->status == $row2->id){{'selected="selected"'}} @endif>
                            {{$row2->title}} </option>
                        @endforeach


                    </select>
                </div>
                <div class="row">
                    @if(($pasted<=$mohlat_pay) and $order->status==3)
                        <p>
                            <a class="btn_green" href="checkout/payonline/<?= $order['id'] ?>">
                                پرداخت آنلاین

                            </a>
                            <a class="btn_green" href="checkout/creditcard/<?= $order['id'] ?>">
                                پردخت با کارت
                            </a>

                        </p>
                        @endif
                </div>
                <div class="table-responsive pt-3 row">
                    <table class="table select-table">
                        <tr>
                            <td>نوع ارسال:</td>
                            <td>{{$order->post_title}}</td>
                        </tr>
                        <tr>
                            <td>شیوه پرداخت:</td>
                            <td>{{$order->pay_title}}</td>
                        </tr>
                        <tr>
                            <td>شماره کارت:</td>
                            <td>{{$order->pay_card}}</td>
                        </tr>
                        <tr>
                            <td>نام بانک:</td>
                            <td>{{$order->bank_name}}</td>
                        </tr>
                        <tr>
                            <td>شماره خرید:</td>
                            <td>{{$order->refrence_id}}</td>
                        </tr>
                        <tr>
                            <td>تاریخ پرداخت:</td>
                            <td>{{$order->created_at}}</td>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive  pt-3 row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                </th>
                                <th>نام گیرنده</th>
                                <th>آدرس</th>
                                <th>شهر</th>
                                <th>کد پستی</th>
                                <th>موبایل</th>
                                <th>تلفن ثابت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @csrf
                            <tr>
                                <td>
                                    {{$order->family}}
                                </td>
                                <td>
                                    <input type="text" name="address" value="{{$order->address}}">
                                </td>
                                <td>
                                    {{$order->city}}
                                </td>
                                <td>
                                    <input type="text" name="code_posti" value=" {{$order->code_posti}}">
                                </td>
                                <td>
                                    <input type="text" name="mobile" value="{{$order->mobile}}">
                                </td>
                                <td>
                                    <input type="text" name="tel" value="{{$order->tel}}">
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary me-2" type="submit">ذخیره اطلاعات</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection