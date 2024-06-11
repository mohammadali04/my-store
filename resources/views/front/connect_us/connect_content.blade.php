<section class="contact-section section_padding">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
            <div style="height: 480px;" id="map"></div>
            <script>
            function initMap() {
                var uluru = {
                    lat: -25.363,
                    lng: 131.044
                };
                var grayStyles = [{
                        featureType: "all",
                        stylers: [{
                                saturation: -90
                            },
                            {
                                lightness: 50
                            }
                        ]
                    },
                    {
                        elementType: 'labels.text.fill',
                        stylers: [{
                            color: '#ccdee9'
                        }]
                    }
                ];
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: -31.197,
                        lng: 150.744
                    },
                    zoom: 9,
                    styles: grayStyles,
                    scrollwheel: false
                });
            }
            </script>
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&amp;callback=initMap">
            </script>

        </div>


        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">با ما در تماس باشید</h2>
                @include('layouts.messages')
            </div>
            <div class="col-lg-8">
                <form novalidate="novalidate" id="message-form" method="post" action="{{Route('add.client.message')}}"
                    class="form-contact contact_form">
                    @csrf
                    <div dir="rtl" class="row">
                        <div class="col-12">
                            <div dir="rtl" class="form-group">

                                <textarea placeholder="پیام خود را وارد کنید"
                                    onblur="this.placeholder = 'Enter Message'" onfocus="this.placeholder = ''" rows="9"
                                    cols="30" id="message" name="message" class="form-control w-100"></textarea>
                            </div>
                        </div>
                        @auth
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="name" type="text" placeholder="نام "
                                    onblur="this.placeholder = 'Enter your name'" onfocus="this.placeholder = ''"
                                    id="name" value="{{auth()->user()->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="email" placeholder="ایمیل"
                                    onblur="this.placeholder = 'Enter email address'" onfocus="this.placeholder = ''"
                                    id="email" name="email" value="{{auth()->user()->email}}" class="form-control">
                            </div>
                        </div>
                        @else
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="name" type="text" placeholder="نام "
                                    onblur="this.placeholder = 'Enter your name'" onfocus="this.placeholder = ''"
                                    id="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="email" placeholder="ایمیل"
                                    onblur="this.placeholder = 'Enter email address'" onfocus="this.placeholder = ''"
                                    id="email" name="email" class="form-control">
                            </div>
                        </div>
                        @endauth
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" placeholder="موضوع" onblur="this.placeholder = 'Enter Subject'"
                                    onfocus="this.placeholder = ''" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="form-group mt-3">
                    <button class="btn btn-primary" onclick="submitForm()">ارسال پیام</button>
                </div>
            </div>
            <script>
            function submitForm() {
                $('#message-form').submit();
            }
            </script>
            @php
            use App\Models\front\ConnectUsOption;
            $options=ConnectUsOption::all();
            @endphp
            <div class="col-lg-4">
                @foreach($options as $option)
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-{{$option->icon}}"></i></span>
                    <div class="media-body">
                        <h3>{{$option->value}}</h3>
                        <p>{{$option->title}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>