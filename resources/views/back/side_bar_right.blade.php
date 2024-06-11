<div style="overflow-y:scroll;height:551px" id="sidebar"
    class="rounded row col-xl-4 col-lg-4 col-md-3 col-sm-6 col-xs-12 pull-right bg-dark text-light">
    <div class="col-12 bg-success rounded align-items-center" style="padding:20px 0;margin-top: 5px;">
        <h5 style="text-align: center;">پنل مدیریت</h5>
    </div>
    <div class="col-12 d-flex flex-row">
        <div class="col-md-4 p-2">
            @if(auth()->user()->adminInfo()->first())
            <img src="{{auth()->user()->adminInfo()->first()->img}}" class="rounded-circle" alt=""
                style="width:100px ;height:100px">
            @endif
        </div>
        <div class="col-md-8 p-2 text-light d-flex align-items-center">
            @if(auth()->user()->adminInfo()->first())
            <h4 style="text-align: center">{{auth()->user()->adminInfo()->first()->name}}</h4>
            @else
            <h4 style="text-align: center">{{auth()->user()->name}}</h4>
            @endif
        </div>
    </div>
    <hr>
    <ul class="list-group bg-dark text-light">
        <style>
        .title-manager {
            padding: 10px 0;
        }
        </style>
        @if(auth()->user()->adminInfo()->first())
        <a class="title-manager" href="{{Route('admin.edit.info',auth()->user()->adminInfo()->first()->id)}}">
            <li class="list-group-item bg-dark text-light list-group-item-action d-flex justify-content-start">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                        class="bi bi-info-square-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    </svg>
                </div>
                <div class="col-9">ویرایش اطلاعات</div>
            </li>
        </a>
        @else
        <a class="title-manager" href="{{Route('admin.add.info')}}">
            <li class="list-group-item bg-dark text-light list-group-item-action d-flex justify-content-start">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                        class="bi bi-info-square-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    </svg>
                </div>
                <div class="col-9">تکمیل اطلاعات</div>
                <span class="badge badge-danger"
                    style="width: 25px;height: 19px;display: block;background: red;">0</span>
            </li>
        </a>
        @endif
        <a class="title-manager" href="{{Route('admin.dashboard.index')}}">
            <li class="list-group-item bg-dark text-light list-group-item-action d-flex justify-content-start">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white"
                        class="bi bi-card-checklist" viewBox="0 0 16 16">
                        <path
                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                        <path
                            d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0" />
                    </svg>
                </div>
                <div class="col-9">داشبورد</div>
            </li>
        </a>
        <a class="title-manager" href="{{Route('admin.category.index')}}">
            <li class="list-group-item bg-dark text-light list-group-item-action d-flex justify-content-start">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white"
                        class="bi bi-card-checklist" viewBox="0 0 16 16">
                        <path
                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                        <path
                            d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0" />
                    </svg>
                </div>
                <div class="col-9">دسته ها</div>
            </li>
        </a>
        <a class="title-manager" href="{{Route('admin.baner.index')}}">
            <li class="list-group-item bg-dark text-light d-flex justify-content-start">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-images"
                        viewBox="0 0 16 16">
                        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                        <path
                            d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z" />
                    </svg>
                </div>

                <div class="col-9">بنر</div>
            </li>
        </a>
        <a class="title-manager" href="{{Route('admin.product.index')}}">
            <li class="list-group-item bg-dark text-light d-flex justify-content-start">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-upc-scan"
                        viewBox="0 0 16 16">
                        <path
                            d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0z" />
                    </svg>
                </div>
                <div class="col-9">محصولات</div>
            </li>
        </a>
        <a class="title-manager" href="{{Route('admin.baner.index')}}">
            <li class="list-group-item bg-dark text-light d-flex justify-content-start">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-sliders"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z" />
                    </svg>
                </div>
                <div class="col-9">اسلایدر</div>
            </li>
        </a>
        <a class="title-manager" href="{{Route('admin.order.index')}}">
            <li class="list-group-item bg-dark text-light d-flex justify-content-start">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-list-ol"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5" />
                        <path
                            d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635z" />
                    </svg>
                </div>
                <div class="col-9">سفارشات</div>
            </li>
        </a>
        @if(auth()->user()->role==1)
        <a class="title-manager" href="{{Route('admin.officer.index')}}">
            <li class="list-group-item bg-dark text-light d-flex justify-content-start">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white"
                        class="bi bi-person-video3" viewBox="0 0 16 16">
                        <path
                            d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0m-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2" />
                        <path
                            d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783Q16 12.312 16 12V4a2 2 0 0 0-2-2z" />
                    </svg>
                </div>
                <div class="col-9">کارمندان</div>
            </li>
        </a>
        @endif
        <a class="title-manager" href="{{Route('admin.user.index')}}">
            <li class="list-group-item bg-dark text-light d-flex justify-content-start">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white"
                        class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                    </svg>
                </div>
                <div class="col-9">کاربران</div>
            </li>
        </a>
        <a class="title-manager" href="{{Route('admin.comment.index')}}">
            <li class="list-group-item bg-dark text-light d-flex justify-content-start">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white"
                        class="bi bi-chat-square-text-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                    </svg>
                </div>
                <div class="col-9">نظرات</div>
            </li>
        </a>
        <a class="title-manager" href="{{Route('favorite.comment.show')}}">
            <li class="list-group-item bg-dark text-light d-flex justify-content-start">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white"
                        class="bi bi-chat-square-text-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                    </svg>
                </div>
                <div class="col-9">نظرات برگزیده</div>
            </li>
        </a>
        <a class="title-manager" href="{{Route('admin.show.goal')}}">
            <li class="list-group-item bg-dark text-light d-flex justify-content-start">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white"
                        class="bi bi-chat-square-text-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                    </svg>
                </div>
                <div class="col-9">اهداف</div>
            </li>
        </a>
    </ul>
</div>