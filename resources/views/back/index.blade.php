<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('back2/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <script src="{{asset("back2/js/jquery-3.7.1.min.js")}}"></script>
    <script src="{{asset('back2/js/bootstrap.min.js')}}"></script>
</head>
<style>
@font-face {
    font-family: 'yekan';
    src: url('back2/fonts/yekan.ttf') format('truetype'),
        url('back2/fonts/yekan.eot?#iefix') format('embedded-opentype');
}

body a {
    cursor: pointer;
    text-decoration: none;
}
</style>

<body style="direction: rtl;">
    <div class="container">
        <div class="row bg-light" id="header">
            @include('back.header')
        </div>
        <div class="container">
            <div class="row" style="margin-top:20px">
                @include('back.side_bar_right')
                <div id="content" style="margin-right: 20px;overflow-y: scroll;height: 551px;padding-top:20px"
                    class="row col-xl-8 col-lg-8 col-md-9 col-sm-6 col-xs-12 pull-left shadow border bg-light">
                    <div class="container">
                    @yield('content')
                    </div>
                </div>
            </div>
        </div>
        @include('back.footer')
    </div>
</body>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js">
</script>
<script>
$(document).ready(function() {

    // Define function to open filemanager window
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix :
            '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager',
            'width=900,height=600');
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with filemanager',
            click: function() {

                lfm({
                    type: 'image',
                    prefix: '/laravel-filemanager'
                }, function(lfmItems, path) {
                    lfmItems.forEach(function(lfmItem) {
                        context.invoke('insertImage', lfmItem
                            .url);
                    });
                });

            }
        });
        return button.render();
    };

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('#summernote').summernote({
        height: 300,
        toolbar: [
            ['popovers', ['lfm']],
            ['style', ['style']],
            ['style', ['bold', 'italic', 'underline', 'strikethrough',
                'superscript', 'subscript', 'clear'
            ]],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video', 'hr', 'readmore']],
            ['genixcms', ['elfinder']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ],
        buttons: {
            lfm: LFMButton
        }
    });
});
$('#lfm').filemanager('image');




function submitForm(){
    $('form').submit();
  }
  var tag;
  function addComponent(keyword){
if(keyword=='option'){
tag='<div class="form-group"><label for="name">گزینه</label><textarea class="form-control" name="option[]"class="option-value form-control"></textarea></div>';
}
if(keyword=='question'){
tag='<div class="form-group"><label for="name">سوال</label><textarea class="form-control" name="question[]"class="option-value form-control"></textarea><label for="name">جواب</label><textarea class="form-control" name="answer[]"class="option-value form-control"></textarea></div>';
}
    $('#option-content #'+keyword+'-form').append(tag);
}
</script>
</html>