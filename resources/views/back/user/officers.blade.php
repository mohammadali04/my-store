@extends('back.index')
@section('content')
@include('layouts.messages')
<div class="d-sm-flex justify-content-between align-items-start">
    <div>
        <h4 class="card-title card-title-dash">صفحه مدیریت کارمندان</h4>
    </div>
    <select class="selectTag select" name="action">
        <option value="1">
            تغییر به مدیر
        </option>
        <option value="2">
            تغییر به کارمند
        </option>
        <option value="3">
            تغییر به کاربر عادی
        </option>
        <option value="4">
            حذف
        </option>
    </select>
    <div>
        <a onclick="submitFormMulti()" type="button" class="btn btn-primary btn-lg text-white mb-0 me-0"
            style="background:red">       اجرای عملیات
</a>
    </div>
</div>

<div class="table-responsive  mt-1">
    <table class="table select-table">
        <thead>
            <tr>
                </th>
                <th>کد</th>
                <th>نام</th>
                <th>ایمیل</th>
                <th>نقش</th>
                <th>وضعیت</th>
                <th>مدیریت</th>
            </tr>
        </thead>
        <tbody>
            <style>
            .badge {
                .user-status {
                    width: 40px !important;
                }
            }
            </style>
            <form action="" method="get">
                @csrf
                @foreach($officers as $officer)
                <tr>
                    <td>
                        {{$officer->id}}
                    </td>
                    <td>
                        {{$officer->name}}
                    </td>
                    <td>
                        {{$officer->email}}
                    </td>
                    @switch($officer->role)
                    @case(1)
                    @php
                    $role='مدیر';
                    @endphp
                    @break
                    @case(2)
                    @php
                    $role='کارمند'
                    @endphp
                    @break
                    @case(3)
                    @php
                    $role='کاربر عمومی'
                    @endphp
                    @break
                    @endswitch

                    @switch($officer->status)
                    @case(1)
                    @php
                    $url=Route('admin.user.status',$officer->id);
                    $status='<a href="'.$url.'" class="bg-success text-white rounded">فعال</a>';
                    @endphp
                    @break
                    @case(0)
                    @php
                    $url=Route('admin.user.status',$officer->id);
                    $status='<a href="'.$url.'" class="bg-warning text-white rounded">غیر فعال</a>';
                    @endphp
                    @break
                    @endswitch
                    <td>
                        {{$role}}
                    </td>
                    <td class="w-25">
                        {!! $status !!}
                    </td>
                    <td><a href="{{Route('admin.user.edit',$officer->id)}}">ویرایش</a></td>
                    <td>
                        <div class="form-check form-check-flat mt-0">
                            <label class="form-check-label">
                                <input type="checkbox" name="ids[]" value="{{$officer->id}}" aria-checked="false"
                                    class="form-check-input"><i class="input-helper"></i></label>
                        </div>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
<script>
function submitFormMulti() {

    var actionSelected = $('.selectTag option:selected').val();
    var action = '';
    if (actionSelected == 1) {
        action = '{{Route('admin.user.level1')}}';
    }
    if (actionSelected == 2) {
        action = '{{Route('admin.user.level2')}}';
    }
    if (actionSelected == 3) {
        action = '{{Route('admin.user.level3')}}';
    }
    if (actionSelected == 4) {
        action = '{{Route('admin.user.destroy')}}';
    }

    var form = $('form');
    form.attr('action', action);
    form.submit();

}
</script>

@endsection