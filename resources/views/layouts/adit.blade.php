<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- this is favicon of website -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <!-- this is include style  -->
    <link rel="stylesheet" href="{{asset('css/home/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/form.css')}}">
    {{-- this is css for alert  --}}
    <link rel="stylesheet" href="{{asset('css/alert/app.css')}}">
    {{-- ----------Read CDN----------- --}}
    @yield('cdn')
    {{-- ------------------------  --}}
    @yield('style')
    <style>
        body{
            height: 100vh;
            background: var(--sg-bglight);
        }
        .web-form-body{
            max-width: 100%;
            border-radius: 0px;
            box-shadow: none;
        }
        .web-form-body .main{
            max-height: 100vh;
        }
        .web-form-body > .head > .icon-ra,.web-form-body > .head a .icon-ra{
            margin: auto 0.8rem ;
        }
        .web-form-body > .head > .icon-ra:hover{
            background: var(--sg-bgblack-01);
        }
        .web-form-body .form-head .profile-img{
            margin-left: 0rem;
        }
    </style>
    {{-- ------------------------  --}}
    <!-- this is fon awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- focuse on google font -> English font  -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700&amp;display=swap" rel="stylesheet">
    {{-- for user request to full screen for phone  --}}
    @if (!auth()->check())
        <script type="text/javascript" src="{{asset('js/app/reuqest_full_screen.js')}}"></script>
    @endif
</head>
<body>
    {{-- -----------Read content ----------------  --}}
    @yield('content')
    {{-- ----------------------------------------- --}}
    <script type="text/javascript" src="{{asset('js/function/responsive_form.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/function/taketh.js')}}"></script>
    {{-- this is for get day mounth and years  --}}
    <script type="text/javascript" src="{{asset('js/function/getdate.js')}}"></script>
    {{-- this is for alert  --}}
    <script type="text/javascript" src="{{asset('js/alert/alert.js')}}"></script>
    {{-- --------------Read script--------------  --}}
    @yield('script')
    {{-- ------------------------------  --}}
    <script type="text/javascript">
         // this is for scroll window
        document.addEventListener('DOMContentLoaded', () => {
            // Scroll the body to 50px from the top with smooth scrolling
            window.scrollTo({
                top: 500,
                behavior: 'smooth'
            });
        });
    </script>
    {{-- this is js for compress_image  --}}
    <script src="{{asset('js/app/compress_image.js')}}"></script>
    {{-- ----------------------- --}}
    <script type="text/javascript" src="{{asset('js/function/insert_image.js')}}"></script>
</body>
</html>
