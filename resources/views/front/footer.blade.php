<footer class="footer_part">
        <div class="footer_iner">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-8">
                        <div class="footer_menu">
                            <div class="footer_logo">
                                <a href="index.html"><img src="img/logo.png" alt="#"></a>
                            </div>
                            <div class="footer_menu_item">
                                <a href="index.html">صفحه اصلی</a>

                                <a href="product_list.html">محصولات</a>
                                <a href="#">صفحات</a>
                                <a href="blog.html">وبلاگ</a>
                                <a href="contact.html">تماس با ما</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @php
                        use  App\Models\front\Social;
$socials=Social::all();
                        @endphp
                        <div class="social_icon">
@foreach($socials as $social)
<a href="{{$social->link}}"><i class="fab fa-{{$social->title}}"></i></a>
@endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <div class="copyright_part">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="copyright_text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                            <p>فارسی و راست چین شده<i  aria-hidden="true"></i> توسط <a href="https://webrubik.com/" target="-blank">Webrubik.com </a>- غزاله نظام</p>
                            <div class="copyright_link"></div>
                                <a href="#">ضوابط و شرایط</a>
                                <a href="#">FAQ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>