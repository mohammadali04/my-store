@extends('back.index')
@section('content')

@include('layouts.messages')
<div class="d-sm-flex justify-content-between align-items-start">
    <div>
        <h4 class="card-title card-title-dash">صفحه مدیریت شبکه های احتماعی</h4>
    </div>
    <div>
        <a href="{{Route('admin.create.ability')}}" type="button" class="btn btn-primary btn-lg text-white mb-0 me-0"><i
                class="mdi mdi-account-plus"></i>افزودن
            شبکه جدید</a>
        <a id="delete" onclick="submitForm()" type="button" class="btn btn-danger btn-lg text-white mb-0 me-0"><i
                class="mdi mdi-account-plus"></i>حذف</a>
    </div>
</div>

<div class="table-responsive  mt-1">
    <style>
    .item-img {
        width: 50px;
        height: 50px;
    }
    </style>
    <form action="{{Route('admin.destroy.ability')}}" method="get">
        <table class="table select-table">
            <thead>
                <tr>
                    </th>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>لینک</th>
                    <th>ویرایش</th>
                    <th>انتخاب</th>
                </tr>
            </thead>
            <tbody>
                @csrf
                @foreach($abilities as $ability)
                <tr>
                    <td>
                        {{$ability->id}}
                    </td>
                    <td>
                        {{$ability->title}}
                    </td>
                    <td>
                        {{$ability->link}}
                    </td>
                    <td><a href="{{Route('admin.edit.ability',$ability->id)}}">ویرایش</a>
                    </td>
                    <td>
                        <div class="form-check form-check-flat mt-0">
                            <label class="form-check-label">
                                <input type="checkbox" name="ids[]" value="{{$ability->id}}" aria-checked="false"
                                    class="form-check-input"><i class="input-helper"></i></label>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>
@endsection