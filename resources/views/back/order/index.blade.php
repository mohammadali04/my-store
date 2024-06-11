@extends('back.index')
@section('content')
@include('layouts.messages')
<div class="d-sm-flex justify-content-between align-items-start">
    <div>
        <h4 class="card-title card-title-dash">صفحه مدیریت محصولات</h4>
    </div>
    <div>
        <select class="selectTagStatus select" name="action">
            @php
            $selected='';
            @endphp
            @foreach($order_status as $row)
            @if($row->id==1)
            <option selected value="{{$row->id}}">
                {{$row->title}} </option>
                @endif
            @endforeach
        </select>
        <a class="btn btn-primary" onclick="submitFormMulti()">اجرای عملیت</a>
    </div>
    <div>
        <a onclick="submitForm()" type="button" class="btn btn-primary btn-lg text-white mb-0 me-0"
            style="background:red"><i class="mdi mdi-account-plus"></i>حذف</a>
    </div>
</div>

<div class="table-responsive  mt-1">
    <table class="table select-table">
        <thead>
            <tr>
                </th>
                <th>کد</th>
                <th>تحویل گیرنده</th>
                <th>مبلغ</th>
                <th>استان</th>
                <th>شهر</th>
                <th>نوع پرداخت</th>
                <th>شماره خرید</th>
                <th>وضعیت سفارش</th>
                <th>ویرایش</th>
                <th>انتخاب</th>
            </tr>
        </thead>
        <tbody>
            <form action="{{Route('admin.product.destroy')}}" method="get">
                @csrf
                @foreach($orders as $order)
                <tr>
                    @php
                    $order_pay_type=$order->pay_type;
                    $pay_type='';
                    switch($order_pay_type){
                    case 1;
                    $pay_type='کارت به کارت';
                    break;
                    case 2;
                    $pay_type='درگاه زرین پال';
                    };
                    @endphp
                    <td>
                        {{$order->id}}
                    </td>
                    <td>
                        {{$order->family}}
                    </td>
                    <td>
                        {{$order->amount}}
                    </td>
                    <td>
                        {{$order->ostan}}
                    </td>
                    <td>
                        {{$order->city}}
                    </td>
                    <td>
                        {{$pay_type}}
                    </td>
                    <td>
                        {{$order->refrence_id}}
                    </td>
                    <td>
                        {{$order->status()->title}}
                    </td>
                    <td><a href="{{Route('admin.order.edit',$order->id)}}">ویرایش</a></td>
                    <td>
                        <div class="form-check form-check-flat mt-0">
                            <label class="form-check-label">
                                <input type="checkbox" name="ids[]" value="{{$order->id}}" aria-checked="false"
                                    class="form-check-input"><i class="input-helper"></i></label>
                        </div>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
<script>
    var actionSelectedValue = $('.selectTagStatus option:selected').val();
    var action = 'admin/order/change-status/'+actionSelectedValue;
function submitFormMulti() {
var form = $('form');
form.attr('action', action);
form.submit();

}
</script>
@endsection