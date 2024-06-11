@extends('back.index')
@section('content')
<div class="col-12 grid-margin stretch-card" style="height:100%">
<div class="row d-flex justify-content-end" style="margin-top:20px;padding:10px">
  <h4 class="card-title">صفحه ی مشاهده پیام کاربر</h4>
</div>
<div class="row d-flex justify-content-end" style="margin-top:20px">
<a href="{{Route('admin.message.index')}}" class="btn btn-primary" style="">بازگشت به صفحه قبل</a>
</div>

<div class="row bg-white border rounded" style="margin-top:20px">
<lablel class="bg bg-info">موضوع:</lablel>
  <p>{{$message->subject}}</p>
</div>
<div class="row bg-white border rounded" style="margin-top:20px">
<lablel class="bg bg-info">متن:</lablel>
  <text>{{$message->message}}</text>
</div>
  </div>
@endsection