<nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{Route('admin.index')}}">خانه</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('index')}}">صفحه اصلی وب سایت</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    ورود/خروج
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{Route('login')}}">ورود</a></li>
                                    <li><a class="dropdown-item" href="{{Route('admin.logout')}}">خروج</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="d-flex">
                            <h5>پنل مدیریت</h5>
                        </div>
                    </div>
                </div>
            </nav>