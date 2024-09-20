<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>វត្តជលធារាសម្បត្តិ@yield('title')</title>
    <!-- this is favicon of website -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <!-- this is main style form link  -->
    <link rel="stylesheet" href="{{asset('css/home/main.css')}}">
    <!-- this is header style  -->
    <link rel="stylesheet" href="{{asset('css/home/header.css')}}">
    <!-- this is sibar of webpage  -->
    <link rel="stylesheet" href="{{asset('css/home/sibar.css')}}">
    {{-- this is style for loading page  --}}
    <link rel="stylesheet" href="{{asset('css/home/laoding_page.css')}}">
    {{-- for cdn link css,favicon,script  --}}
    @yield('cdn')
    {{-- --------------------- --}}
    <!-- this is fon awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- focuse on google font -> English font  -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700&amp;display=swap" rel="stylesheet">
    {{-- for user request to full screen for phone  --}}
    @if (!auth()->check())
        <script type="text/javascript" src="{{asset('js/app/reuqest_full_screen.js')}}"></script>
    @endif
</head>
<body class="over-h">
    {{-- -------------------this is page laoding-------------------  --}}
    <div class="load-page loading-screen" id="load-page">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    {{-- -----------------------------laod--------------------------  --}}
    <header class="web-header db-c">
        <div class="head-body df-s">
            <!-- this is left header -->
            <div class="head-menu-left df-l">
                <a href="{{route('homepage')}}">
                    <div class="web-icon icon icon-ra cursor-p">
                        <img class="img-c" src="{{asset('images/favicon.png')}}"
                        width="50"
                        height="50"
                        loading="lazy"
                        srcset="
                        {{asset('images/favicon.png')}}?width=100? 100w,
                        {{asset('images/favicon.png')}}?width=200? 200w,
                        {{asset('images/favicon.png')}}?width=400? 400w,
                        {{asset('images/favicon.png')}}?width=800? 800w,
                        {{asset('images/favicon.png')}}?width=1000? 1000w,
                        {{asset('images/favicon.png')}}?width=1200? 1200w,
                        "
                        sizes="(max-width: 100px) 100vw, 50vw"
                        decoding="async"
                        fetchPriority = "high"
                        alt="favicon">
                    </div>
                </a>
                <a href="{{route('homepage')}}">
                    <div class="web-icon-text cursor-p">
                        <h1>វត្តជលធារាសម្បត្តិ</h1>
                    </div>
                </a>
            </div>
            <!-- this is center menu header  -->
            <div class="head-menu-center db-c">
                <div class="head-menu-center-box db-c">
                    <ul class="df-c">
                        <li class="{{ Request::routeIs('home.new') ? 'active-link' : '' }}"><a href="{{route('home.new')}}"><span class="btn-font">ថ្មីៗនេះ</span></a></li>
                        <li class="{{ Request::routeIs('home.monk') ? 'active-link' : '' }}"><a href="{{route('home.monk')}}"><span class="btn-font">ព្រះសង្ឃ</span></a></li>
                        <li class="{{ Request::routeIs('home.festival') ? 'active-link' : '' }}"><a href="{{route('home.festival')}}"><span class="btn-font">ពីធីបុណ្យ</span></a></li>
                        <li class="{{ Request::routeIs('home.video') ? 'active-link' : '' }}"><a href="{{route('home.video')}}"><span class="btn-font">វីឌីអូខ្លីៗ</span></a></li>
                        <li class="{{ Request::routeIs('home.build') ? 'active-link' : '' }}"><a href="{{route('home.build')}}"><span class="btn-font">ការកសាង</span></a></li>
                        <li class="{{ Request::routeIs('home.development') ? 'active-link' : '' }}"><a href="{{route('home.development')}}"><span class="btn-font">ការអភិវឌ្ឍន៍</span></a></li>
                        <li class="{{ Request::routeIs('home.aspect') ? 'active-link' : '' }}"><a href="{{route('home.aspect')}}"><span class="btn-font">ទិដ្ឋភាពវត្ត</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- this is right menu of header  -->
            <div class="head-menu-right">
                <div class="head-menu-right-box df-l">
                    @if(auth()->check())
                        @if(auth()->user()->role_id == '1')
                        <li>
                            <a href="{{route('admin.dashboard')}}">
                                <div class="bar-i btn icon-ra icon-bg" style="background: blanchedalmond;">
                                    <i class="fa-solid fa-infinity" style="color: var(--sg-button-blueHover);"></i>
                                </div>
                            </a>
                        </li>
                        @endif
                    @endif
                    @if(auth()->check())
                        <a href="{{route('home.user')}}">
                            <div class="icon icon-ra profile icon-sm user-check over-h" style="--sg-bglight:{{auth()->user()->profile_bg}} ">
                                <img src="{{ asset('storage/images/' . auth()->user()->img_profile) }}" class="img-c" alt="">
                            </div>
                        </a>
                    @else
                        <a href="{{ route('home.login') }}">
                            <div class="signs btn icon-ra icon-bg cursor-p">
                                <h2 class="txt-bol">ចូលគណនី</h2>
                            </div>
                        </a>
                    @endif
                    <div class="bar-i btn icon-ra icon-bg" onclick="document.querySelector('.web-sibar').classList.toggle('web-sibar-active'); document.body.classList.toggle('over-h')"><i class="fa-solid fa-bars"></i></div>
                </div>
            </div>
        </div>
    </header>
    {{-- tbis is tab bar  --}}
    <section class="web-tabbar">
        <div class="tabbar-body">
            <ul class="df-s">
                <a href="{{route('homepage')}}" class="df-c">
                    <li class="df-c {{ Request::routeIs('homepage') ? 'active' : '' }}">
                        <div class="box">
                            <div class="icon">
                                <i class="fa-solid fa-house"></i>
                            </div>
                            <div class="icon-text">
                                <p>ទំព័រដើម</p>
                            </div>
                        </div>
                    </li>
                </a>
               <a href="{{route('home.new')}}" class="df-c">
                <li class="df-c {{ Request::routeIs('home.new') ? 'active' : '' }}">
                    <div class="box">
                        <div class="icon">
                            <i class="fa-solid fa-fire"></i>
                        </div>
                        <div class="icon-text">
                            <p>ថ្មីៗវត្ត</p>
                        </div>
                    </div>
                </li>
               </a>
               <a href="{{route('home.monk')}}" class="df-c">
                <li class="df-c {{ Request::routeIs('home.monk') ? 'active' : '' }}">
                    <div class="box">
                        <div class="icon">
                            <i class="fa-solid fa-hands-praying"></i>
                        </div>
                        <div class="icon-text">
                            <p>ព្រះសង្ឃ</p>
                        </div>
                    </div>
                </li>
               </a>
                <a href="{{route('home.allbook')}}" class="df-c">
                    <li class="df-c {{ Request::routeIs('home.allbook') ? 'active' : '' }}">
                        <div class="box">
                            <div class="icon">
                                <i class="fa-solid fa-book"></i>
                            </div>
                            <div class="icon-text">
                                <p>សៀវភៅ</p>
                            </div>
                        </div>
                    </li>
                </a>
                @if(!auth()->check())
                    <a href="{{route('home.about')}}" class="df-c">
                        <li class="df-c  {{ Request::routeIs('home.about') ? 'active' : '' }}">
                            <div class="box">
                                <div class="icon">
                                    <i class="fa-solid fa-dharmachakra"></i>
                                </div>
                                <div class="icon-text">
                                    <p>អំពីវត្ត</p>
                                </div>
                            </div>
                        </li>
                    </a>
                @else
                    <a href="{{route('home.user')}}">
                        <li class="df-c  {{ Request::routeIs('home.user') ? 'active' : '' }}">
                            <div class="box">
                                <div class="icon icon-ra profile icon-sm" style="--sg-bglight:{{auth()->user()->profile_bg}} ">
                                    <img src="{{ asset('storage/images/' . auth()->user()->img_profile) }}" class="img-c"
                                    loading="lazy"
                                    srcset="
                                    {{ asset('storage/images/' . auth()->user()->img_profile) }}?width=100? 100w,
                                    {{ asset('storage/images/' . auth()->user()->img_profile) }}?width=200? 200w,
                                    {{ asset('storage/images/' . auth()->user()->img_profile) }}?width=400? 400w,
                                    {{ asset('storage/images/' . auth()->user()->img_profile) }}?width=800? 800w,
                                    {{ asset('storage/images/' . auth()->user()->img_profile) }}?width=1000? 1000w,
                                    {{ asset('storage/images/' . auth()->user()->img_profile) }}?width=1200? 1200w,
                                    "
                                    sizes="(max-width: 800px) 100vw, 50vw"
                                    decoding="async"
                                    fetchPriority = "high" alt="user-profile">
                                </div>
                                <div class="icon-text">
                                    <p>គណនី</p>
                                </div>
                            </div>
                        </li>
                    </a>
                @endif
            </ul>
        </div>
    </section>
    {{-- this is for fix header  --}}
    <script >
        document.addEventListener('DOMContentLoaded', function () {
        let lastScrollTop = 0;
        const header = document.querySelector('.web-header');

        window.addEventListener('scroll', function () {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                if (scrollTop > lastScrollTop) {
                    header.classList.add('web-header-remove');
                } else {
                    // User is scrolling up, show the header
                    header.classList.remove('web-header-remove');
                }

                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
            });
        });
    </script>
    {{-- --------------for read the content from other page----------------- --}}
    @yield('content')
    {{-- --------------------------------------- --}}
    <footer class="web-foot">
        <div class="web-foot-body df-c">
            <div class="box">
                <div class="head df-c">
                    <div class="profile icon icon-ra">
                        <img class="img-co" src="{{asset('images/favicon.png')}}"
                        loading="lazy"
                        srcset="
                        {{asset('images/favicon.png')}}?width=100? 100w,
                        {{asset('images/favicon.png')}}?width=200? 200w,
                        {{asset('images/favicon.png')}}?width=400? 400w,
                        {{asset('images/favicon.png')}}?width=800? 800w,
                        {{asset('images/favicon.png')}}?width=1000? 1000w,
                        {{asset('images/favicon.png')}}?width=1200? 1200w,
                        "
                        sizes="(max-width: 200px) 100vw, 50vw"
                        decoding="async"
                        fetchPriority = "high"
                        alt="faveicon">
                    </div>
                    <div class="text">
                        <h2>វត្តជលធារាសម្បត្តិ</h2>
                    </div>
                </div>
                <blockquote class="df-c top_and_bottom-1">
                    <p>© រក្សាសិទ្ធិគ្រប់យ៉ាងដោយ<a href="#">វត្តជលធារាសម្បត្តិ</a></p>
                </blockquote>
                <ul class="df-c">
                    <li class="bnt icon-ra-sm icon"><i class="fa-brands fa-facebook-f"></i></li>
                    <li class="bnt icon-ra-sm icon"><i class="fa-brands fa-youtube"></i></li>
                    <li class="bnt icon-ra-sm icon"><i class="fa-solid fa-globe"></i></li>
                    <li class="bnt icon-ra-sm icon"><i class="fa-brands fa-telegram"></i></li>
                </ul>
            </div>
        </div>
    </footer>
    {{-- <!-- this is sibar of website  --> --}}
    <aside class="web-sibar">
        <!-- this is body  -->
        <div class="web-sibar-body">
            <div class="head db-c">
                <div class="box df-c">
                    <img class="img-c" src="{{asset('images/photo_aside.jpg')}}"
                    srcset="{{asset('images/photo_aside.jpg')}} 400w,
                    {{asset('images/photo_aside.jpg')}} 800w,
                    {{asset('images/photo_aside.jpg')}} 1200w"

                    sizes="(max-width: 600px) 400px,
                        (max-width: 1200px) 800px,
                        1000px"
                    alt="slider">
                </div>
            </div>
            <div class="web-sibar-con">
                <ul class="scroll-y">
                    <li>
                        <a href="{{route('homepage')}}" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm">
                                    <p class="txt-bol">
                                        <i class="fa-solid fa-house"></i>
                                    </p>
                                </div>
                                <div class="text"><h2>ទំព័រដើម</h2></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('home.about')}}" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-dharmachakra"></i></p></div>
                                <div class="text"><h2>អំពើយើង</h2></div>
                            </div>
                        </a>
                    </li>
                    @if(auth()->check())
                    @if(auth()->user()->role == '1')
                    <li>
                        <a href="{{route('admin.customization')}}" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-infinity"></i></p></div>
                                <div class="text"><h2>គ្រប់គ្រង</h2></div>
                            </div>
                        </a>
                    </li>
                    @endif
                    @endif
                    <li>
                        <a href="{{route('home.user')}}" class="db-c ff">
                            <div class="box df-l">
                                <div class="text df-l"><h2 class="text-mian right-05">គណនីរបស់អ្នក</h2><i class="fa-solid fa-chevron-right"></i></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('home.new')}}" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-fire"></i></p></div>
                                <div class="text df-l"><h2>ថ្មីៗអំពីវត្ត</h2></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('home.allbook')}}" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-book"></i></p></div>
                                <div class="text df-l"><h2>អានសៀវភៅ</h2></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('home.allartical')}}" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-feather"></i></p></div>
                                <div class="text df-l"><h2>អានអត្ថបទ</h2></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('home.video')}}" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-play"></i></p></div>
                                <div class="text df-l"><h2>វីឌីអូអប់រំ</h2></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('home.festival')}}" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-cake-candles"></i></p></div>
                                <div class="text df-l"><h2>ពិធីបុណ្យ</h2></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('home.about')}}" class="db-c">
                            <div class="box df-l">
                                <div class="text df-l"><h2 class="text-mian right-05">ពីវត្តផ្ទាល់</h2><i class="fa-solid fa-chevron-right"></i></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('home.monk')}}" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-hands-praying"></i></p></div>
                                <div class="text df-l"><h2>ព្រះសង្ឃ</h2></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('home.build')}}" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-building-columns"></i></p></div>
                                <div class="text df-l"><h2>ការកសាង</h2></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('home.development')}}" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-square-poll-horizontal"></i></p></div>
                                <div class="text df-l"><h2>ការអភិវឌ្ឍន៍</h2></div>
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
                    <li>
                        <a class="db-c">
                            <div class="box df-l">
                                <div class="text df-l"><h2 class="text-mian right-05">ផ្សេងៗទៀត</h2><i class="fa-solid fa-chevron-right"></i></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="https://web.facebook.com/profile.php?id=100081599561181" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-envelope-open-text"></i></p></div>
                                <div class="text"><h2>ផ្ញើសារ</h2></div>
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
                        <a href="{{route('home.help')}}" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-question"></i></p></div>
                                <div class="text df-l"><h2>ទីតាំងជំនួយ</h2></div>
                            </div>
                        </a>
                    </li>
                    @if(auth()->check())
                    <li>
                        <a href="{{route('logout')}}" class="db-c">
                            <div class="box df-l">
                                <div class="icon icon-ra icon-sm"><p class="txt-bol"><i class="fa-solid fa-right-from-bracket"></i></p></div>
                                <div class="text df-l"><h2>ចេញពីគណនី</h2></div>
                            </div>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- this is bacground of sibar  -->
        <div class="bg" onclick="document.querySelector('.web-sibar').classList.toggle('web-sibar-active');document.body.classList.toggle('over-h')"></div>
        <script>
            var web_aside = document.querySelector('.web-sibar');
            // Function to recalculate heights
            function setSidebarHeight() {
                var bgElement = web_aside.querySelector('.bg');
                var sceen_height = bgElement.offsetHeight;
                var asidHeader = web_aside.querySelector('.web-sibar-body > .head').offsetHeight;
                web_aside.querySelector('.web-sibar-body ul').style.height = (sceen_height - asidHeader) + "px";
            }
            // Set initial heights
            setSidebarHeight();
            // Listen for window resize
            window.addEventListener('resize', setSidebarHeight);
        </script>
    </aside>
    {{-- for user laoding page --}}
    <script type="text/javascript" src="{{asset('js/app/loading_page.js')}}"></script>
</body>
</html>
