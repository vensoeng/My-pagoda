@extends('layouts.home')
{{-- this Is for read the title  --}}
@section('title','')
{{-- this is for read CDN  --}}
@section('cdn')
    <!-- this is style for this page  -->
    <link rel="stylesheet" href="{{asset('css/home/home.css')}}">
    <!-- this is style of swiper  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endsection
{{-- this is for read content  --}}
@section('content')
    <main class="web-main">
        <div class="con">
            <div class="con-box">
                <!-- this is header  -->
                <div class="con-head db-c bottom-05">
                    <!-- <div class="con-head-i">
                        <button class="icon icon-sm icon-ra icon-bg"><i class="fa-solid fa-xmark"></i></button>
                    </div> -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($slides as $item)
                                <div class="swiper-slide">
                                    <img class="db-c" src="{{asset('storage/images/'.$item->img)}}"
                                    loading="lazy"
                                    srcset="
                                    {{asset('storage/images/'.$item->img)}}?width=100? 100w, 
                                    {{asset('storage/images/'.$item->img)}}?width=200? 200w, 
                                    {{asset('storage/images/'.$item->img)}}?width=400? 400w, 
                                    {{asset('storage/images/'.$item->img)}}?width=800? 800w, 
                                    {{asset('storage/images/'.$item->img)}}?width=1000? 1000w, 
                                    {{asset('storage/images/'.$item->img)}}?width=1200? 1200w, 
                                    "
                                    sizes="(max-width: 800px) 100vw, 50vw" 
                                    decoding="async"
                                    fetchPriority = "high"
                                    alt="{{$item->img}}">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <!-- this is new section  -->
                <section class="web-section db-c bottom-05" id="new">
                    <div class="web-section-body db-c">
                        <!-- this is header of section  -->
                        <div class="head top_and_bottom-1">
                            <div class="box df-s">
                                <div class="row-one df-l">
                                    <div class="icon icon-bg icon-ra"><i class="fa-solid fa-fire"></i></div>
                                    <div class="text left-05">
                                        <h2>ព័ត៌មានថ្មីៗអំពីវត្តយើង</h2>
                                        <p>ស្វែងរកព័ត៌មានថ្មីដែលអ្នកចូលចិត្តទីនេះ</p>
                                    </div>
                                </div>
                                <div class="row-tow">
                                    <a href="{{route('home.allartical')}}" class="btn icon-ra btn-out">មើលបន្ថែម</a>
                                </div>
                            </div>
                        </div>
                        <!-- this is content of section  -->
                        <div class="new df-s">
                            <!-- this is one  -->
                            <div class="row-one">
                                <div class="box">
                                    <div class="my-img">
                                        <img class="img img-co" src="{{asset('images/img-hero.png')}}"
                                        loading="lazy"
                                        srcset="
                                        {{asset('images/img-hero.png')}}?width=100? 100w, 
                                        {{asset('images/img-hero.png')}}?width=200? 200w, 
                                        {{asset('images/img-hero.png')}}?width=400? 400w, 
                                        {{asset('images/img-hero.png')}}?width=800? 800w, 
                                        {{asset('images/img-hero.png')}}?width=1000? 1000w, 
                                        {{asset('images/img-hero.png')}}?width=1200? 1200w, 
                                        "
                                        sizes="(max-width: 800px) 100vw, 50vw" 
                                        decoding="async"
                                        fetchPriority = "high" alt="{{asset('images/img-hero.png')}}">
                                    </div>
                                    <div class="text">
                                        <div class="box">
                                            <h2>
                                                ថ្ងៃនេះគឺជាថ្ងៃល្អនិងវេលារីករាយដ៏អស្ចារ្យ<br>
                                                ពីវត្តជប់វារី
                                            </h2>
                                            <ul class="df-c top-05">
                                                <li><a href="https://web.facebook.com/profile.php?id=100081599561181" class="btn icon-ra">ផ្ញើសារមកកាន់ខ្ញុំ</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- this is row2  -->
                            <div class="row-tow">
                                <div class="box scroll-x">
                                    <ul class="artical_data_location">
                                        @foreach ($articals as $item)
                                        <li class="data-location" data-id="{{route('home.checkArtical',$item->id)}}">
                                            <div class="box">
                                                <div class="my-img">
                                                    <img class="db-c img" src="{{asset('storage/images/'.$item->img)}}"
                                                    loading="lazy"
                                                    srcset="
                                                    {{asset('storage/images/'.$item->img)}}?width=100? 100w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=200? 200w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=400? 400w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=800? 800w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=1000? 1000w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=1200? 1200w, 
                                                    "
                                                    sizes="(max-width: 800px) 100vw, 50vw" 
                                                    decoding="async"
                                                    fetchPriority = "high"
                                                    alt="{{$item->img}}">
                                                </div>
                                                <div class="text">
                                                    <div class="box">
                                                        <h2>{{$item->title}}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- this is my introduction web section -->
                <section class="web-section db-c top_and_bottom-1" id="intro">
                    <div class="web-section-body db-c">
                    <div class="intro db-c over-h">
                            <div class="con-head-i">
                                <button onclick="toggleClass('#intro','dn')" class="icon icon-sm icon-ra icon-bg cursor-p"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="box db-c">
                                <ul class="df-c">
                                    <li>
                                        <div class="head df-c">
                                            <div class="icon icon-ra"><i class="fa-solid fa-clapperboard"></i></div>
                                        </div>
                                        <h2>Video Creator</h2>
                                        <p>មុខងាមាតិការអប់រំ</p>
                                    </li>
                                    <li>
                                        <div class="head df-c">
                                            <div class="icon icon-ra"><i class="fa-solid fa-users"></i></div>
                                        </div>
                                        <h2>User Team</h2>
                                        <p>ចំនួនព្រះសង្ឃជាក់លាក់</p>
                                    </li>
                                    <li>
                                        <div class="head df-c">
                                            <div class="icon icon-ra"><i class="fa-brands fa-envira"></i></div>
                                        </div>
                                        <h2>Our Gallery</h2>
                                        <p>មុខងាកម្រងរូបភាព</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="bg"><p>Pagoda Sevicer</p></div>
                    </div>
                    </div>
                </section>
                <!-- this is section for our learder  -->
                <section class="web-section db-c bottom-1" id="leader">
                    <div class="web-section-body db-c">
                        <!-- this is header of section  -->
                        <div class="head top_and_bottom-1">
                            <div class="box df-s">
                                <div class="row-one df-l">
                                    <div class="icon icon-bg icon-ra"><i class="fa-solid fa-dharmachakra"></i></div>
                                    <div class="text left-05">
                                        <h2>រចនាសម្ព័ន្ធក្នុងវត្តយើង</h2>
                                        <p>ព្រះសង្ឃដែលមានតួនាទីដឹកនាំវត្តទីនេះ</p>
                                    </div>
                                </div>
                                <div class="row-tow">
                                    <a href="{{route('home.monk')}}" class="btn icon-ra btn-out">មើលបន្ថែម</a>
                                </div>
                            </div>
                        </div>
                        <!-- this is content of this section  -->
                        <div class="leader db-c">
                            <div class="box db-c">
                                <ul class="df-l scroll-x ourleader-location">
                                    <!-- leader 1  -->
                                    @foreach ($manmonks as $item)
                                    <li class="data-location" data-id="{{route('home.monkuser',$item->id)}}">
                                        <div class="head df-s top_and_bottom-05">
                                            <div class="row-one left-05">
                                                <h2>១២កក្កដា២០២៥</h2>
                                            </div>
                                            <div class="row-tow right-05">
                                                <h2>៧:៣០ព្រឹក</h2>
                                            </div>
                                        </div>
                                        <blockquote class="db-c left_and_right-05">
                                            <p>
                                                @if($item->userinfor->bio == "")
                                                អ្នកក៏ដូចជាមនុស្សផ្សេងទៀត នៅក្នុងសកលលោកទាំងមូល សមនឹងទទួល​បាន​សេចក្តី​ស្រឡាញ់ និងការស្រលាញ់​ចំពោះខ្លួនឯងនិងអ្នកដទៃ។
                                                <span class='icon icon-ra icon-sm text_icon_auto'>ស្វ័.ប</span>
                                                @else
                                                    {{$item->userinfor->bio}}
                                                @endif
                                            </p>
                                        </blockquote>
                                        <div class="user-in db-c">
                                            <div class="profile-img df-c">
                                                <div class="profile icon">
                                                    <img class="db-c img-c" src="{{asset('storage/images/'.$item->img_profile)}}"
                                                    loading="lazy"
                                                    srcset="
                                                    {{asset('storage/images/'.$item->img_profile)}}?width=100? 100w, 
                                                    {{asset('storage/images/'.$item->img_profile)}}?width=200? 200w, 
                                                    {{asset('storage/images/'.$item->img_profile)}}?width=400? 400w, 
                                                    {{asset('storage/images/'.$item->img_profile)}}?width=800? 800w, 
                                                    {{asset('storage/images/'.$item->img_profile)}}?width=1000? 1000w, 
                                                    {{asset('storage/images/'.$item->img_profile)}}?width=1200? 1200w, 
                                                    "
                                                    sizes="(max-width: 800px) 100vw, 50vw" 
                                                    decoding="async"
                                                    fetchPriority = "high"
                                                    alt="{{$item->img_profile}}">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h2>ព្រះនាម ~ {{$item->first_name}} {{$item->last_name}}</h2>
                                                <p>{{$item->positionuser->title}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- this is section show Our social media -->
                <section class="web-section db-c bottom-1" id="media">
                    <div class="web-section-body db-c">
                        <div class="media">
                            <!-- <div class="text"><h2 class="df-l left-1 top-05"><p class="txt-sm">Sponsored.</p> Suggested for you</h2></div> -->
                            <div class="con-head-i">
                                <button onclick="toggleClass('#media','dn')" class="icon icon-sm icon-ra icon-bg cursor-p"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="head">
                                <h2>ប្រព័ន្ធ​ផ្សព្វផ្សាយ​សង្គម</h2><p>ជ្រើសរើសប្រព័ន្ធ​ផ្សព្វផ្សាយ​សង្គមរបស់យើងដែលពេញនិយមបំផុតនៅក្នុងពេលនេះ។</p>
                            </div>
                            <div class="box db-c oursocial-data-location">
                                <ul class="df-c">
                                    <li class="data-location" data-id="https://web.facebook.com/profile.php?id=100081599561181">
                                        <div class="icon icon-ra icon-sm facebook-i">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </div>
                                        <div class="text"><h2>Facebook.com</h2></div>
                                    </li>
                                    <li data-id="">
                                        <div class="icon icon-ra icon-sm youtube-i">
                                            <i class="fa-brands fa-youtube"></i>
                                        </div>
                                        <div class="text"><h2>Youtube.com</h2></div>
                                    </li>
                                </ul>
                                <ul class="df-c">
                                    <li data-id="">
                                        <div class="icon icon-ra icon-sm website-i">
                                            <i class="fa-solid fa-globe"></i>
                                        </div>
                                        <div class="text"><h2>Website.com</h2></div>
                                    </li>
                                    <li data-id="https://t.me/uAuPocNDY5xiZDhl">
                                        <div class="icon icon-ra icon-sm telegram-i">
                                            <i class="fa-brands fa-telegram"></i>
                                        </div>
                                        <div class="text"><h2>Telegram.me</h2></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="bg"><p>Pagoda media.</p></div>
                        </div>
                    </div>
                </section>
                <!-- this is section show about Our Monk  -->
                @if(!$sonmonks->isEmpty())
                <section class="web-section db-c bottom-1" id="monk">
                    <div class="web-section-body db-c">
                        <!-- this is header of section  -->
                        <div class="head top_and_bottom-1">
                            <div class="box df-s">
                                <div class="row-one df-l">
                                    <div class="icon icon-bg icon-ra"><i class="fa-solid fa-hands-praying"></i></div>
                                    <div class="text left-05">
                                        <h2>ភិក្ខុនិងសាមណេរវត្តយើង</h2>
                                        <p>ពិនិត្យមើលនូវបញ្ជីព្រះសង្ឃក្នុងវត្តទីនេះ</p>
                                    </div>
                                </div>
                                <div class="row-tow">
                                    <a href="{{route('home.monk')}}" class="btn icon-ra btn-out">មើលបន្ថែម</a>
                                </div>
                            </div>
                        </div>
                        <div class="monk">
                            <div class="box">
                                <ul class="scroll-x">
                                    @foreach ($sonmonks as $item)
                                        
                                    <li>
                                        <div class="box">
                                            <div class="user-in">
                                                <div class="box df-l">
                                                    <div class="profile-img">
                                                        <div class="profile icon icon-ra">
                                                            <img class="db-c img-c" src="{{asset('storage/images/'.$item->img_profile)}}"
                                                            loading="lazy"
                                                            srcset="
                                                            {{asset('storage/images/'.$item->img_profile)}}?width=100? 100w, 
                                                            {{asset('storage/images/'.$item->img_profile)}}?width=200? 200w, 
                                                            {{asset('storage/images/'.$item->img_profile)}}?width=400? 400w, 
                                                            {{asset('storage/images/'.$item->img_profile)}}?width=800? 800w, 
                                                            {{asset('storage/images/'.$item->img_profile)}}?width=1000? 1000w, 
                                                            {{asset('storage/images/'.$item->img_profile)}}?width=1200? 1200w, 
                                                            "
                                                            sizes="(max-width: 800px) 100vw, 50vw" 
                                                            decoding="async"
                                                            fetchPriority = "high"
                                                            alt="{{$item->img_profile}}">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h2>ព្រះនាម ~ {{$item->first_name}} {{$item->last_name}}</h2>
                                                        <strong>{{$item->typeuser->title}} .{{$item->positionuser->title}} .</strong>
                                                    </div>
                                                </div>
                                                <blockquote class="db-c">
                                                    <p>
                                                        @if($item->userinfor->bio == "")
                                                        ពិភពលោកនឹងស្រស់បំព្រង់ប្រសិនបើយើងរួមគ្នាធ្វើសេចក្ដីល្អ។
                                                        <span class='icon icon-ra icon-sm text_icon_auto'>ស្វ័.ប</span>
                                                        @else
                                                            {{$item->userinfor->bio}}
                                                        @endif
                                                    </p>
                                                </blockquote>
                                            </div>
                                            <div class="df-c">
                                                <a href="{{route('home.monkuser',$item->id)}}" class="btn icon-ra icon-bg">ព័តមានលំអិត</a>
                                            </div>
                                        </div>
                                    </li>

                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="foot top-05 db-c">
                            <div class="box df-c">
                                <a href="{{route('home.monk')}}" class="btn btn-out icon-ra">មើលបញ្ជីព្រះសង្ឃបន្ថែម <span class="left-05"><i class="fa-solid fa-chevron-down"></i></span></a>
                            </div>
                        </div>
                    </div>
                </section>
                @endif
                <!-- this is section for show suggession day -->
                <section class="web-section db-c bottom-1" id="sug-day">
                    <div class="web-section-body db-c">
                        <div class="sug-day">
                            <div class="con-head-i">
                                <button class="icon icon-sm icon-ra icon-bg cursor-p"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="box df-l">
                                <div class="row-one">
                                    <ul>
                                        <li class="logo df-l">
                                            <div class="icon icon-ra"><img class="img-co right-05" src="images/favicon.png" alt=""></div>
                                            <div class="text"><h2>វត្តជលធារាសម្បត្តិ</h2></div>
                                        </li>
                                        <li class="buote top_and_bottom-1">
                                            <blockquote>
                                                <h2>ពិធីបុណ្យចូលឆ្នាំថ្មី ប្រពៃណីជាតិ-មហាសង្រ្កាន្ត</h2>
                                                <h3>ថ្ងៃសៅរ៍​៥កើតខែចេត្រ ឆ្នាំរោង ឆស័ក ព.ស២៥៦៧</h3>
                                            </blockquote>
                                        </li>
                                        <li class="button"><a href="#" class="btn btn-out icon-ra">មើលបន្ថែម</a></li>
                                    </ul>
                                </div>
                                <div class="row-tow">
                                    <div class="box">
                                        <img class="img" src="{{asset('images/img-hero.png')}}"
                                        loading="lazy"
                                        srcset="
                                        {{asset('images/img-hero.png')}}?width=100? 100w, 
                                        {{asset('images/img-hero.png')}}?width=200? 200w, 
                                        {{asset('images/img-hero.png')}}?width=400? 400w, 
                                        {{asset('images/img-hero.png')}}?width=800? 800w, 
                                        {{asset('images/img-hero.png')}}?width=1000? 1000w, 
                                        {{asset('images/img-hero.png')}}?width=1200? 1200w, 
                                        "
                                        sizes="(max-width: 800px) 100vw, 50vw" 
                                        decoding="async"
                                        fetchPriority = "high"
                                        alt="image-hero">
                                    </div>
                                </div>
                                <div class="bg"><p>Festivals day.</p></div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- this is content for show Festival -->
                <section class="web-section db-c bottom-1" id="fest">
                    <div class="web-section-body db-c">
                        <!-- this is header of section  -->
                        <div class="head top_and_bottom-1">
                            <div class="box df-s">
                                <div class="row-one df-l">
                                    <div class="icon icon-bg icon-ra"><i class="fa-solid fa-cake-candles"></i></div>
                                    <div class="text left-05">
                                        <h2>ពីធីបុណ្យនានានៅក្នុងវត្តយើង</h2>
                                        <p>ស្វែងរកព្រិត្តិការណ៍បុណ្យនានាក្នុងវត្តទីនេះ</p>
                                    </div>
                                </div>
                                <div class="row-tow">
                                    <a href="{{route('home.festival')}}" class="btn icon-ra btn-out">មើលបន្ថែម</a>
                                </div>
                            </div>
                        </div>
                        <!-- this is content  -->
                        <div class="fest">
                            <div class="box">
                                <ul class="df-l scroll-x festival-data-location">
                                    @foreach ($festivals as $item)
                                    <li>
                                        <div class="head df-l top-05 left-05 bottom-05">
                                            <div class="profile over-h icon icon-ra icon-sm">
                                                <img src="{{asset('images/favicon.png')}}"
                                                loading="lazy"
                                                srcset="
                                                {{asset('images/favicon.png')}}?width=100? 100w, 
                                                {{asset('images/favicon.png')}}?width=200? 200w, 
                                                {{asset('images/favicon.png')}}?width=400? 400w, 
                                                {{asset('images/favicon.png')}}?width=800? 800w, 
                                                {{asset('images/favicon.png')}}?width=1000? 1000w, 
                                                {{asset('images/favicon.png')}}?width=1200? 1200w, 
                                                "
                                                sizes="(max-width: 800px) 100vw, 50vw" 
                                                decoding="async"
                                                fetchPriority = "high"
                                                alt="faveicon">
                                            </div>
                                            <div class="text">
                                                <h2 class="text-bol">វត្ត ជលធារាសម្បត្តិ .ជប់វារី,ខេត្ត ប.ជ </h2>
                                                <p>{{dateKhmerNumber($item->created_at->format('Y-m-d'))}}.<i class="fa-solid fa-globe"></i></p>
                                            </div>
                                        </div>
                                        <blockquote class="db-c left_and_right-05">
                                            <p>{{$item->title}}</p>
                                        </blockquote>
                                        <div class="box db-c top-05 data-location" data-id="{{$item->link}}">
                                            <div class="list">
                                                <img class="vis-h" src="{{asset('storage/images/'.$item->img)}}"
                                                loading="lazy"
                                                srcset="
                                                {{asset('storage/images/'.$item->img)}}?width=100? 100w, 
                                                {{asset('storage/images/'.$item->img)}}?width=200? 200w, 
                                                {{asset('storage/images/'.$item->img)}}?width=400? 400w, 
                                                {{asset('storage/images/'.$item->img)}}?width=800? 800w, 
                                                {{asset('storage/images/'.$item->img)}}?width=1000? 1000w, 
                                                {{asset('storage/images/'.$item->img)}}?width=1200? 1200w, 
                                                "
                                                sizes="(max-width: 800px) 100vw, 50vw" 
                                                decoding="async"
                                                fetchPriority = "high"
                                                alt="{{$item->img}}">
                                                <div class="img-child">
                                                    <img class="db-c img" src="{{asset('storage/images/'.$item->img)}}"
                                                    loading="lazy"
                                                    srcset="
                                                    {{asset('storage/images/'.$item->img)}}?width=100? 100w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=200? 200w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=400? 400w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=800? 800w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=1000? 1000w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=1200? 1200w, 
                                                    "
                                                    sizes="(max-width: 800px) 100vw, 50vw" 
                                                    decoding="async"
                                                    fetchPriority = "high"
                                                    alt="{{$item->img}}">
                                                </div>
                                            </div>
                                            <div class="bg"><p>{{$item->length_photo}}</p></div>
                                        </div>
                                    </li>  
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- this is footer  -->
                        <div class="foot top-05 db-c">
                            <div class="box df-c">
                                <a href="{{route('home.festival')}}" class="btn btn-out icon-ra">មើលបញ្ជីបុណ្យនានាន្ថែម <span class="left-05"><i class="fa-solid fa-chevron-down"></i></span></a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- tis is sectionfor show about short video  -->
                <section class="web-section db-c bottom-1" id="short-v">
                    <div class="web-section-body db-c">
                        <!-- this is header of section  -->
                        <div class="head top_and_bottom-1">
                            <div class="box df-s">
                                <div class="row-one df-l">
                                    <div class="icon icon-bg icon-ra"><i class="fa-solid fa-play"></i></div>
                                    <div class="text left-05">
                                        <h2>មាតិការអប់រំក្នុងវត្តយើង</h2>
                                        <p>ស្វែងរកមាតិការអប់រំក្នុងវត្តទីនេះ</p>
                                    </div>
                                </div>
                                <div class="row-tow">
                                    <a href="{{route('home.video')}}" class="btn icon-ra btn-out">មើលបន្ថែម</a>
                                </div>
                            </div>
                        </div>
                        <!-- this is content  -->
                        <div class="short-v">
                            <div class="box">
                                <ul class="scroll-x video-data-location">
                                    @foreach ($videos as $item)
                                    <li class="data-location" data-id="{{$item->link}}">
                                        <div class="head df-s">
                                            <div class="profile">
                                                <div class="icon icon-ra over-h">
                                                    <img class="db-c img-c" src="{{asset('storage/images/'.$item->img)}}"
                                                    loading="lazy"
                                                    srcset="
                                                    {{asset('storage/images/'.$item->img)}}?width=100? 100w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=200? 200w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=400? 400w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=800? 800w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=1000? 1000w, 
                                                    {{asset('storage/images/'.$item->img)}}?width=1200? 1200w, 
                                                    "
                                                    sizes="(max-width: 800px) 100vw, 50vw" 
                                                    decoding="async"
                                                    fetchPriority = "high"
                                                    alt="{{$item->userCreator->img}}">
                                                </div>
                                            </div>
                                            <div class="btn icon-ra-sm icon-bg right-05"><p>TV</p></div>
                                        </div>
                                        <div class="tum-v box">
                                            <div class="video">
                                                <img class="db-c img" src="{{asset('storage/images/'.$item->img)}}"
                                                loading="lazy"
                                                srcset="
                                                {{asset('storage/images/'.$item->img)}}?width=100? 100w, 
                                                {{asset('storage/images/'.$item->img)}}?width=200? 200w, 
                                                {{asset('storage/images/'.$item->img)}}?width=400? 400w, 
                                                {{asset('storage/images/'.$item->img)}}?width=800? 800w, 
                                                {{asset('storage/images/'.$item->img)}}?width=1000? 1000w, 
                                                {{asset('storage/images/'.$item->img)}}?width=1200? 1200w, 
                                                "
                                                sizes="(max-width: 800px) 100vw, 50vw" 
                                                decoding="async"
                                                fetchPriority = "high"
                                                alt="{{$item->img}}">
                                            </div>
                                        </div>
                                        <div class="subtitle df-s">
                                            <div class="text">
                                                <marquee behavior="200" direction="x"><h2>{{$item->title}}</h2></marquee>
                                            </div>
                                            <div class="btn btn-sm icon-bg icon-ra-sm right-05"><p>{{substr($item->userCreator->english_name, 0, 3)}}</p></div>
                                        </div>
                                        <div class="bg df-c">
                                            <div class="box"><div class="icon icon-ra"><i class="fa-regular fa-circle-play"></i></div></div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- this is footer  -->
                        <div class="foot top-05 db-c">
                            <div class="box df-c">
                                <a href="{{route('home.video')}}" class="btn btn-out icon-ra">មើលបញ្ជីវីដេអូបន្ថែម <span class="left-05"><i class="fa-solid fa-chevron-down"></i></span></a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- this section show about Theory  -->
                <section class="web-section db-c bottom-1" id="theory">
                    <div class="web-section-body db-c">
                        <div class="theory df-c">
                            <div class="con-head-i">
                                <button onclick="toggleClass('#theory','dn')" class="icon icon-sm icon-ra icon-bg cursor-p"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="box">
                                <div class="head">
                                    <div class="profile icon icon-ra" style="--sg-color-text:var(--sg-bgblack)">
                                        <img class="img img-c" src="{{asset('images/img-hero.png')}}"
                                        loading="lazy"
                                        srcset="
                                    {{asset('images/img-hero.png')}}?width=100? 100w, 
                                    {{asset('images/img-hero.png')}}?width=200? 200w, 
                                    {{asset('images/img-hero.png')}}?width=400? 400w, 
                                    {{asset('images/img-hero.png')}}?width=800? 800w, 
                                    {{asset('images/img-hero.png')}}?width=1000? 1000w, 
                                    {{asset('images/img-hero.png')}}?width=1200? 1200w, 
                                        "
                                        sizes="(max-width: 800px) 100vw, 50vw" 
                                        decoding="async"
                                        fetchPriority = "high"
                                        alt="image-hero" loading="lazy">
                                    </div>
                                </div>
                                <blockquote class="db-c">
                                    <p>អ្នកក៏ដូចជាមនុស្សផ្សេងទៀត នៅក្នុងសកលលោកទាំងមូល សមនឹងទទួល​បាន​សេចក្តី​ស្រឡាញ់ និងការស្រលាញ់​ចំពោះខ្លួនឯងនិងអ្នកដទៃ។ តែបើគេមិនស្រលាញ់​ ក៏​ត្រូវ​ស្រលាញ់​ខ្លួនឯង​ ជា​ជាង​បោះបង់​ចោល​ដែរ។</p>
                                </blockquote>
                                <div class="text df-c">
                                    <div class="icon icon-ra icon-ra-sm"><i class="fa-solid fa-quote-left"></i></div>
                                </div>
                                <div class="text">
                                    <h2>ព្រះពុទ្ធ</h2>
                                    <p>kampucheathmey</p>
                                </div>
                            </div>
                            <div class="bg"><p>Pagoda Theorys</p></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 50,
            effect: "fade",
            pagination: {
                el: ".swiper-pagination",
            },
            autoplay: {
            delay: 2000,
            disableOnInteraction: false,
            },
        });
    </script>
    {{-- this is for alert to user  --}}
    <script type="text/javascript" src="{{asset('js/alert/alert.js')}}"></script>
    {{-- this is for go to an other location  --}}
    <script type="text/javascript" src="{{asset('js/function/location.js')}}"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            location_go('.artical_data_location');
            location_go('.ourleader-location');
            location_go('.oursocial-data-location');
            location_go('.festival-data-location');
            location_go('.video-data-location');
        });
    </script>
    <!---this is toggle class------------->
    <script type="text/javascript" src="{{asset('js/function/taketh.js')}}"></script>
@endsection