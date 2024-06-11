@extends('front.index')
@section('content')
@php
use App\Models\front\OurGoal;
$our_goal=OurGoal::find(1);
            @endphp
@include('front.about_us.about_us_title')
@include('front.about_us.our_goal')
@include('front.about_us.description')
@include('front.about_us.client_review')
@include('front.about_us.subscribe_part')
@endsection