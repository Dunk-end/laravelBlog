<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    @include('blocks.header')
    <section>
        <div class="wrap">
            @include('blocks.messages')
            <div class="section__wraper">
                @yield('content')
            </div>
        </div>
    </section>
    @include('blocks.footer')

    <script>
        $('input').change(function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    selectedImage = e.target.result;
                    $('img').attr('src', selectedImage);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
    <script src="https://static.jsbin.com/js/render/edit.js?4.1.8"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-1656750-34', 'auto');
        ga('require', 'linkid', 'linkid.js');
        ga('require', 'displayfeatures');
        ga('send', 'pageview');

    </script>
</body>
</html>
