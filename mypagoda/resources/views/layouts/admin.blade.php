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
    <!-- this is header style  -->
    <link rel="stylesheet" href="{{asset('css/admin/header.css')}}">
    <!-- this is other style for this page  -->
    <link rel="stylesheet" href="{{asset('css/admin/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/book.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/form.css')}}">
    {{-- Read link CDN  --}}
    @yield('cdn')
    {{-- ---------------------  --}}
    {{-- this is css for alert  --}}
    <link rel="stylesheet" href="{{asset('css/alert/app.css')}}">
    <!-- this is fon awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- focuse on google font -> English font  -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700&amp;display=swap" rel="stylesheet">
    {{-- Read style element   --}}
    @yield('style')
    {{-- -------------------  --}}
    {{-- for user request to full screen for phone  --}}
    @if (!auth()->check())
        <script type="text/javascript" src="{{asset('js/app/reuqest_full_screen.js')}}"></script>
    @endif
</head>
<body>
    {{-- this is header  --}}
    <header class="web-header db-c">
        <div class="head-body df-s">
            <!-- this is left header -->
            <div class="head-menu-left df-l">
                <div class="bar-i btn icon-ra icon-bg text-be" style="--text-:'បិទមីនូឆ្វេង';" onclick="document.querySelector('.web-sibar').classList.toggle('web-sibar-active');document.querySelector('.web-content').classList.toggle('web-content-active')"><i class="fa-solid fa-bars"></i></div>
                <a href="{{route('homepage')}}">
                    <div class="web-icon icon icon-ra text-be" style="--text-:'ទំព័រដើម';">
                        <img class="img-c" src="{{asset('images/logo wat new.jpg')}}"
                        loading="lazy"
                        srcset="
                        {{asset('images/logo wat new.jpg')}}?width=100? 100w,
                        {{asset('images/logo wat new.jpg')}}?width=200? 200w,
                        {{asset('images/logo wat new.jpg')}}?width=400? 400w,
                        {{asset('images/logo wat new.jpg')}}?width=800? 800w,
                        {{asset('images/logo wat new.jpg')}}?width=1000? 1000w,
                        {{asset('images/logo wat new.jpg')}}?width=1200? 1200w,
                        "
                        sizes="(max-width: 800px) 100vw, 50vw"
                        decoding="async"
                        fetchPriority = "high"
                        alt="favicon"
                        >
                    </div>
                </a>
                <div class="web-icon-text">
                    <h1>ជប់វារីស្ទូឌីយោ</h1>
                </div>
            </div>
            <!-- this is center menu header  -->
            <div class="head-menu-center db-c">
                <div class="head-menu-center-box db-c">
                    <ul class="df-c">

                    </ul>
                </div>
            </div>
            <!-- this is right menu of header  -->
            <div class="head-menu-right">
                <div class="head-menu-right-box df-l">
                    <a href="{{route('logout')}}">
                        <button class="signs btn icon-ra icon-bg">
                            <h2 class="txt-bol">ចេពីគណនី</h2>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </header>
    {{-- -------Read form--------- --}}
    @yield('form')
    {{-- this is content  --}}
    <main class="web-main db-c">
        <div class="web-main-body df-l">
            {{-- this is asider --}}
            <aside class="web-sibar">
                <!-- this is body  -->
                <div class="web-sibar-body">
                    <div class="head db-c">
                        <div class="box df-l left-1">
                            @if(auth()->check())
                                <div class="icon icon-ra icon-sm over-h">
                                    <img class="img-c" src="{{asset('storage/images/'.auth()->user()->img_profile)}}" alt="soeng">
                                </div>
                                <div class="text txt-sm left-05">
                                    <h2> {{auth()->user()->first_name}} {{auth()->user()->last_name}}</h2>
                                    <p>{{auth()->user()->email}}</p>
                                </div>
                            @else
                                <div class="icon icon-ra icon-sm over-h">
                                    <img class="img-c" src="{{asset('images/seong web profile.png')}}" alt="">
                                </div>
                                <div class="text txt-sm left-05">
                                    <h2>អ្នកគ្រប់គ្រង</h2>
                                    <p>example@gmial.com</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="web-sibar-con">
                        <ul class="scroll-y">
                            <li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                                <a href="{{route('admin.dashboard')}}" class="db-c">
                                    <div class="box df-l">
                                        <div class="icon icon-ra icon-sm"><p><i class="fa-solid fa-infinity"></i></p></div>
                                        <div class="text"><h2>ផ្ទាំងគ្រប់គ្រង់</h2></div>
                                    </div>
                                </a>
                            </li>
                            <li class="{{ Request::routeIs('admin.book') ? 'active' : '' }} {{ Request::routeIs('admin.artical') ? 'active' : '' }}">
                                <a href="{{route('admin.artical')}}" class="db-c">
                                    <div class="box df-l">
                                        <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-book"></i></p></div>
                                        <div class="text df-l"><h2>អត្ថបទ&សៀវភៅ</h2></div>
                                    </div>
                                </a>
                            </li>
                            <li class="{{ Request::routeIs('admin.video') ? 'active' : '' }}">
                                <a href="{{route('admin.video')}}" class="db-c">
                                    <div class="box df-l">
                                        <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-play"></i></p></div>
                                        <div class="text df-l"><h2>វីឌីអូខ្លី ការអប់រំ</h2></div>
                                    </div>
                                </a>
                            </li>
                            <li class="{{ Request::routeIs('admin.festival') ? 'active' : '' }}">
                                <a href="{{route('admin.festival')}}" class="db-c">
                                    <div class="box df-l">
                                        <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-cake-candles"></i></p></div>
                                        <div class="text df-l"><h2>ពិធីបុណ្យនានា</h2></div>
                                    </div>
                                </a>
                            </li>
                            <li class="{{ Request::routeIs('admin.customization') ? 'active' : '' }}">
                                <a href="{{route('admin.customization')}}" class="db-c">
                                    <div class="box df-l">
                                        <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-crop-simple"></i></p></div>
                                        <div class="text df-l"><h2>រចនាបទវេបសាយ</h2></div>
                                    </div>
                                </a>
                            </li>
                            <li class="unactive">
                                <a class="db-c">
                                    <div class="box df-l">
                                        <div class="text df-l"><h2 class="text-mian right-05">គ្រប់គ្រងទូទៅ</h2><i class="fa-solid fa-chevron-right"></i></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('home.about')}}" class="db-c">
                                    <div class="box df-l">
                                        <div class="icon icon-ra icon-sm"><p><i class="fa-solid fa-dharmachakra"></i></p></div>
                                        <div class="text"><h2>អំពើយើង</h2></div>
                                    </div>
                                </a>
                            </li>
                            <li class="{{ Request::routeIs('admin.monk') ? 'active' : '' }}">
                                <a href="{{route('admin.monk')}}" class="db-c">
                                    <div class="box df-l">
                                        <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-hands-praying"></i></p></div>
                                        <div class="text df-l"><h2>ចំនួនព្រះសង្ឃ</h2></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="https://web.facebook.com/profile.php?id=100081599561181" class="db-c">
                                    <div class="box df-l">
                                        <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-brands fa-medium"></i></p></div>
                                        <div class="text df-l"><h2>បណ្ដាញ់សង្គម</h2></div>
                                    </div>
                                </a>
                            </li>
                            <li class="unactive">
                                <a href="#" class="db-c">
                                    <div class="box df-l">
                                        <div class="text df-l"><h2 class="text-mian right-05">ផ្សេងៗទៀត</h2><i class="fa-solid fa-chevron-right"></i></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="db-c">
                                    <div class="box df-l">
                                        <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-flag"></i></p></div>
                                        <div class="text df-l"><h2>ប្ដូភាសារ</h2></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="https://web.facebook.com/profile.php?id=100081599561181" class="db-c">
                                    <div class="box df-l">
                                        <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-question"></i></p></div>
                                        <div class="text df-l"><h2>ទីតាំងជំនួយ</h2></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="web-sibar-foot">
                        <div class="box">
                            <div class="text">
                                <p>© រក្សាសិទ្ធិគ្រប់យ៉ាងដោយវត្តជប់វារី</p>
                                <p>@2024- version3.0.0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <script>
                var web_aside = document.querySelector('.web-sibar');
                // Function to recalculate heights
                function setSidebarHeight() {
                    var sceen_height = web_aside.offsetHeight;
                    var asidHeader = web_aside.querySelector('.web-sibar-body > .head').offsetHeight;
                    var asidFooter_height =  web_aside.querySelector('.web-sibar-foot').offsetHeight;
                    web_aside.querySelector('.web-sibar-body .scroll-y').style.height = (sceen_height - ( asidHeader + asidFooter_height + 77)) + "px";
                }
                // Set initial heights
                setSidebarHeight();
                // Listen for window resize
                window.addEventListener('resize', setSidebarHeight);
            </script>
            {{-- --------Read content  --}}
            @yield('content')
        </div>
    </main>
    <script type="text/javascript" src="{{asset('js/function/getdate.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/function/taketh.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/alert/alert.js')}}"></script>
    {{-- Read script  --}}
        @yield('script')
    {{-- ------------- --}}
    {{-- this is for responsive tabel  --}}
    <script type="text/javascript" src="{{asset('js/function/responsive_form_table.js')}}"></script>
    <!-- this is js for compress_image  -->
    <script src="{{asset('js/app/compress_image.js')}}"></script>
    <!-- ----------------------- -->
    <script type="text/javascript" src="{{asset('js/function/insert_image.js')}}"></script>
</body>
</html>
