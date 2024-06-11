@extends('back.index')
@section('content')
@include('layouts.messages')
<div class="row justify-content-around text-center">
    <div class="col-md-3 col-sm-12 bg-light shadow p-3 mb-5 rounded">
        <a href="{{Route('admin.show.ability')}}">
            <svg class="bg-info rounded-pill " xmlns="http://www.w3.org/2000/svg" width="100%" height="120" fill="white"
                class="bi bi-wrench-adjustable" viewBox="0 0 16 16">
                <path d="M16 4.5a4.5 4.5 0 0 1-1.703 3.526L13 5l2.959-1.11q.04.3.041.61" />
                <path
                    d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.5 4.5 0 0 0 11.5 9m-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376M3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
            </svg>
            <p>قابلیت ها</p>
            <h3 class="h3 h3-block">14</h3>
        </a>
    </div>
    <div class="col-md-3 col-sm-12 bg-light shadow p-3 mb-5 rounded text-center">
        <a href="{{Route('admin.show.social')}}">
            <svg class="bg-primary rounded-pill " xmlns="http://www.w3.org/2000/svg" width="100%" height="120px"
                fill="white" class="bi bi-linkedin" viewBox="0 0 16 16">
                <path
                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
            </svg>
            <p>شبکه های اجتماعی</p>
            <h3 class="h3 h3-block">14</h3>
        </a>
    </div>
    <div class="col-md-3 col-sm-12 bg-light shadow p-3 mb-5 rounded text-center">
        <svg class="bg-ligh rounded-pill " xmlns="http://www.w3.org/2000/svg" width="100%" height="120px"
            fill="currentColor" class="bi bi-substack" viewBox="0 0 16 16">
            <path d="M15 3.604H1v1.891h14v-1.89ZM1 7.208V16l7-3.926L15 16V7.208zM15 0H1v1.89h14z" />
        </svg>
        <p>وبلاگ</p>
        <h3 class="h3 h3-block">12</h3>
    </div>
</div>
<div class="row justify-content-around text-center">
    <div class="col-md-5 col-sm-12 bg-light shadow p-3 mb-5 rounded">
        <a href="{{Route('admin.message.index')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="120px" fill="white" class="bg-danger rounded-pill"
            class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
            <path
                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
        </svg>
        <p>پیام های کاربران</p>
        <h3 class="h3 h3-block">14</h3>
        </a>
    </div>
    <div class="col-md-3 col-sm-12 bg-light shadow p-3 mb-5 rounded text-center">
        <a href="{{Route('admin.connect.option')}}">
        <svg xmlns="http://www.w3.org/2000/svg" class="bg-success rounded-pill" width="100%" height="120px" fill="white"
            class="bi bi-pin-map" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8z" />
            <path fill-rule="evenodd"
                d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
        </svg>
        <p>روابط عمومی</p>
        <h3 class="h3 h3-block">14</h3>
        </a>
    </div>

</div>
<div class="row justify-content-around">
    <div class="col-md-3 col-sm-12 bg-light shadow p-3 mb-5 rounded">
        <svg class="bg-primary rounded-pill " xmlns="http://www.w3.org/2000/svg" width="100%" height="120px"
            fill="white" class="bi bi-badge-ad" viewBox="0 0 16 16">
            <path
                d="m3.7 11 .47-1.542h2.004L6.644 11h1.261L5.901 5.001H4.513L2.5 11zm1.503-4.852.734 2.426H4.416l.734-2.426zm4.759.128c-1.059 0-1.753.765-1.753 2.043v.695c0 1.279.685 2.043 1.74 2.043.677 0 1.222-.33 1.367-.804h.057V11h1.138V4.685h-1.16v2.36h-.053c-.18-.475-.68-.77-1.336-.77zm.387.923c.58 0 1.002.44 1.002 1.138v.602c0 .76-.396 1.2-.984 1.2-.598 0-.972-.449-.972-1.248v-.453c0-.795.37-1.24.954-1.24z" />
            <path
                d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z" />
        </svg>
        <p>تعداد تبلیغات من</p>
        <h3 class="h3 h3-block">14</h3>
    </div>
    <div class="col-md-3 col-sm-12 bg-light shadow p-3 mb-5 rounded">
        <svg class="bg-warning rounded-pill" xmlns="http://www.w3.org/2000/svg" width="100%" height="120px" fill="white"
            class="bi bi-bank" viewBox="0 0 16 16">
            <path
                d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72l-.25-1Z" />
        </svg>
        <p>امور مالی</p>
        <h3 class="h3 h3-block">14</h3>
    </div>
    <div class="col-md-3 col-sm-12 bg-light shadow p-3 mb-5 rounded">
        <svg class="bg-primary rounded-pill " xmlns="http://www.w3.org/2000/svg" width="100%" height="120px"
            fill="white" class="bi bi-cake2" viewBox="0 0 16 16">
            <path
                d="m3.494.013-.595.79A.747.747 0 0 0 3 1.814v2.683c-.149.034-.293.07-.432.107-.702.187-1.305.418-1.745.696C.408 5.56 0 5.954 0 6.5v7c0 .546.408.94.823 1.201.44.278 1.043.51 1.745.696C3.978 15.773 5.898 16 8 16c2.102 0 4.022-.227 5.432-.603.701-.187 1.305-.418 1.745-.696.415-.261.823-.655.823-1.201v-7c0-.546-.408-.94-.823-1.201-.44-.278-1.043-.51-1.745-.696A12.418 12.418 0 0 0 13 4.496v-2.69a.747.747 0 0 0 .092-1.004l-.598-.79-.595.792A.747.747 0 0 0 12 1.813V4.3a22.03 22.03 0 0 0-2-.23V1.806a.747.747 0 0 0 .092-1.004l-.598-.79-.595.792A.747.747 0 0 0 9 1.813v2.204a28.708 28.708 0 0 0-2 0V1.806A.747.747 0 0 0 7.092.802l-.598-.79-.595.792A.747.747 0 0 0 6 1.813V4.07c-.71.05-1.383.129-2 .23V1.806A.747.747 0 0 0 4.092.802l-.598-.79Zm-.668 5.556L3 5.524v.967c.311.074.646.141 1 .201V5.315a21.05 21.05 0 0 1 2-.242v1.855c.325.024.659.042 1 .054V5.018a27.685 27.685 0 0 1 2 0v1.964c.341-.012.675-.03 1-.054V5.073c.72.054 1.393.137 2 .242v1.377c.354-.06.689-.127 1-.201v-.967l.175.045c.655.175 1.15.374 1.469.575.344.217.356.35.356.356 0 .006-.012.139-.356.356-.319.2-.814.4-1.47.575C11.87 7.78 10.041 8 8 8c-2.04 0-3.87-.221-5.174-.569-.656-.175-1.151-.374-1.47-.575C1.012 6.639 1 6.506 1 6.5c0-.006.012-.139.356-.356.319-.2.814-.4 1.47-.575ZM15 7.806v1.027l-.68.907a.938.938 0 0 1-1.17.276 1.938 1.938 0 0 0-2.236.363l-.348.348a1 1 0 0 1-1.307.092l-.06-.044a2 2 0 0 0-2.399 0l-.06.044a1 1 0 0 1-1.306-.092l-.35-.35a1.935 1.935 0 0 0-2.233-.362.935.935 0 0 1-1.168-.277L1 8.82V7.806c.42.232.956.428 1.568.591C3.978 8.773 5.898 9 8 9c2.102 0 4.022-.227 5.432-.603.612-.163 1.149-.36 1.568-.591m0 2.679V13.5c0 .006-.012.139-.356.355-.319.202-.814.401-1.47.576C11.87 14.78 10.041 15 8 15c-2.04 0-3.87-.221-5.174-.569-.656-.175-1.151-.374-1.47-.575-.344-.217-.356-.35-.356-.356v-3.02a1.935 1.935 0 0 0 2.298.43.935.935 0 0 1 1.08.175l.348.349a2 2 0 0 0 2.615.185l.059-.044a1 1 0 0 1 1.2 0l.06.044a2 2 0 0 0 2.613-.185l.348-.348a.938.938 0 0 1 1.082-.175c.781.39 1.718.208 2.297-.426Z" />
        </svg>
        <p>جشنواره ها</p>
        <h3 class="h3 h3-block">12</h3>
    </div>
</div>
@endsection