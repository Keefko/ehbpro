<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') / ehbpro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ secure_asset('style.css') }}">
    <script src="{{ secure_asset('js/ebh.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script type="text/javascript" src="{{asset('vendor/harimayco-menu/scripts.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/harimayco-menu/scripts2.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/harimayco-menu/menu.js')}}"></script>
    <script>
        var menus = {
            "oneThemeLocationNoMenus" : "",
            "moveUp" : "Posun hore",
            "moveDown" : "Posun dole",
            "moveToTop" : "Posun navrh",
            "moveUnder" : "Posun na spodok %s",
            "moveOutFrom" : "Out from under  %s",
            "under" : "Under %s",
            "outFrom" : "Out from %s",
            "menuFocus" : "%1$s. Položka menu %2$d  %3$d.",
            "subMenuFocus" : "%1$s. Podmenu %2$d  %3$s."
        };
        var arraydata = [];
        var addcustommenur= '{{ route("haddcustommenu") }}';
        var updateitemr= '{{ route("hupdateitem")}}';
        var generatemenucontrolr= '{{ route("hgeneratemenucontrol") }}';
        var deleteitemmenur= '{{ route("hdeleteitemmenu") }}';
        var deletemenugr= '{{ route("hdeletemenug") }}';
        var createnewmenur= '{{ route("hcreatenewmenu") }}';
        var csrftoken="{{ csrf_token() }}";
        var menuwr = "{{ url()->current() }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            }
        });
    </script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.description",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <script>
        $(document).ready(function(){
            $(".hamburger").click(function () {
               $('.wrapper').toggleClass("toggle");
            });

            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
</head>

@yield('content')

<script>
    AOS.init({
        duration: 1000,
    });
</script>



</html>
