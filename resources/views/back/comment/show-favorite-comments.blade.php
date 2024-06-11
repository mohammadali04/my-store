@extends('back.index')
@section('content')
@include('layouts.messages')
<div class="d-sm-flex justify-content-between align-items-start">
    <div>
        <h4 class="card-title card-title-dash">صفحه مدیریت محصولات</h4>
    </div>
    <a onclick="submitForm()" type="button" class="btn btn-danger btn-lg text-white mb-0 me-0">حذف</a>
</div>

<div class="table-responsive  mt-1">
    <table class="table select-table">
        <thead>
            <tr>
                </th>
                <th>کد</th>
                <th>نویسنده</th>
                <th>خلاصه نظر</th>
                <th>وضعیت</th>
                <th>ویرایش</th>
                <th>انتخاب</th>
            </tr>
        </thead>
        <tbody>
            <form action="{{Route('favorite.comment.destroy')}}" method="get">
                @csrf
                @foreach($comments as $comment)
                <tr>
                    <td>
                        {{$comment->id}}
                    </td>
                    <td>
                        {{$comment->name}}
                    </td>
                    <td>
                        @php echo mb_substr(strip_tags($comment->body),0,60).'...' @endphp
                    </td>
                    @switch($comment->status)
                    @case(1)
                    @php
                    $url=Route('admin.comment.status',$comment->id);
                    $status='<a href="'.$url.'" class="badge bg-success">فعال</a>';
                    @endphp
                    @break
                    @case(0)
                    @php
                    $url=Route('admin.comment.status',$comment->id);
                    $status='<a href="'.$url.'" class="badge bg-warning">غیر فعال</a>';
                    @endphp
                    @break
                    @endswitch
                    <td>
                        {!! $status !!}
                    </td>
                    <td><a href="{{Route('admin.comment.edit',$comment->id)}}">ویرایش</a></td>
                    <td>
                        <div class="form-check form-check-flat mt-0">
                            <label class="form-check-label">
                                <input type="checkbox" name="ids[]" value="{{$comment->id}}" aria-checked="false"
                                    class="form-check-input"><i class="input-helper"></i></label>
                        </div>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
<script>
function submitForm {
    var form = $('form');
    form.submit();
}
</script>

@endsection