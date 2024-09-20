@if(auth()->check() && auth()->user()->id == $user->id)
    <?php
        header("Location: " . route('home.user'));
        exit();
    ?>
@endif

@extends('layouts.home')

@section('title',' | '.$user->first_name.' '.$user->last_name)

@section('cdn')
    <link rel="stylesheet" href="{{asset('css/home/monk.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/monkuser.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/form.css')}}">
    {{-- this is css for alert  --}}
    <link rel="stylesheet" href="{{asset('css/alert/app.css')}}">
    <style>
        .web-foot{
            display: none;

        }
        body{
            min-height: 100vh
        }
    </style>
@endsection

@section('content')
    <main>
        <div class="con">
            <div class="monk-infor">
                <div class="monk-infor-body">
                    <!-- this is header  -->
                    <div class="monk-head">
                        <div class="user-cover">
                            <div class="box">
                                @if((optional($user->userinfor)->img_cover == null) && (optional($slide)->img == null))
                                    <img class="img-c" src="{{asset('images/photo_aside.jpg')}}"
                                    loading="lazy"
                                    srcset="
                                    {{asset('images/photo_aside.jpg')}}?width=100? 100w,
                                    {{asset('images/photo_aside.jpg')}}?width=200? 200w,
                                    {{asset('images/photo_aside.jpg')}}?width=400? 400w,
                                    {{asset('images/photo_aside.jpg')}}?width=800? 800w,
                                    {{asset('images/photo_aside.jpg')}}?width=1000? 1000w,
                                    {{asset('images/photo_aside.jpg')}}?width=1200? 1200w,
                                    "
                                    sizes="(max-width: 800px) 100vw, 50vw"
                                    decoding="async"
                                    fetchPriority = "high"
                                    alt="#"
                                    >
                                @elseif($user->userinfor->img_cover == "" && $slide->img !== "")
                                    <img class="img-c" src="{{asset('storage/images/'.$slide->img)}}"
                                    loading="lazy"
                                    srcset="
                                    {{asset('storage/images/'.$slide->img)}}?width=100? 100w,
                                    {{asset('storage/images/'.$slide->img)}}?width=200? 200w,
                                    {{asset('storage/images/'.$slide->img)}}?width=400? 400w,
                                    {{asset('storage/images/'.$slide->img)}}?width=800? 800w,
                                    {{asset('storage/images/'.$slide->img)}}?width=1000? 1000w,
                                    {{asset('storage/images/'.$slide->img)}}?width=1200? 1200w,
                                    "
                                    sizes="(max-width: 800px) 100vw, 50vw"
                                    decoding="async"
                                    fetchPriority = "high"
                                    alt="#">
                                @else
                                    <img class="img-c" src="{{asset('storage/images/'.$user->userinfor->img_cover)}}"
                                    loading="lazy"
                                    srcset="
                                    {{asset('storage/images/'.$user->userinfor->img_cover)}}?width=100? 100w,
                                    {{asset('storage/images/'.$user->userinfor->img_cover)}}?width=200? 200w,
                                    {{asset('storage/images/'.$user->userinfor->img_cover)}}?width=400? 400w,
                                    {{asset('storage/images/'.$user->userinfor->img_cover)}}?width=800? 800w,
                                    {{asset('storage/images/'.$user->userinfor->img_cover)}}?width=1000? 1000w,
                                    {{asset('storage/images/'.$user->userinfor->img_cover)}}?width=1200? 1200w,
                                    "
                                    sizes="(max-width: 800px) 100vw, 50vw"
                                    decoding="async"
                                    fetchPriority = "high"
                                    alt="#">
                                @endif
                            </div>
                        </div>
                        <div class="user-profile icon icon-ra over-h">
                            <div class="box">
                                @if($user->img_profile == "")
                                    <img class="img-c" src="{{asset('images/account.jpg')}}"
                                    loading="lazy"
                                    srcset="
                                    {{asset('images/account.jpg')}}?width=100? 100w,
                                    {{asset('images/account.jpg')}}?width=200? 200w,
                                    {{asset('images/account.jpg')}}?width=400? 400w,
                                    {{asset('images/account.jpg')}}?width=800? 800w,
                                    {{asset('images/account.jpg')}}?width=1000? 1000w,
                                    {{asset('images/account.jpg')}}?width=1200? 1200w,
                                    "
                                    sizes="(max-width: 800px) 100vw, 50vw"
                                    decoding="async"
                                    fetchPriority = "high"
                                    alt="#">
                                @else
                                    <img class="img-c" src="{{asset('storage/images/'.$user->img_profile)}}"
                                    loading="lazy"
                                    srcset="
                                    {{asset('storage/images/'.$user->img_profile)}}?width=100? 100w,
                                    {{asset('storage/images/'.$user->img_profile)}}?width=200? 200w,
                                    {{asset('storage/images/'.$user->img_profile)}}?width=400? 400w,
                                    {{asset('storage/images/'.$user->img_profile)}}?width=800? 800w,
                                    {{asset('storage/images/'.$user->img_profile)}}?width=1000? 1000w,
                                    {{asset('storage/images/'.$user->img_profile)}}?width=1200? 1200w,
                                    "
                                    sizes="(max-width: 800px) 100vw, 50vw"
                                    decoding="async"
                                    fetchPriority = "high"
                                    alt="{{$user->img_profile}}"
                                    >
                                @endif
                            </div>
                        </div>
                        <div class="text left-05 right-05">
                            <h2>{{$user->typeuser->title}} {{$user->first_name}} {{$user->last_name}}</h2>
                            <p>ឧបសប្បទា {{$user->typeuser->title}}ភាវៈ</p>
                            <blockquote>
                                <p>
                                    @if($user->userinfor->bio == "")
                                    ពិភពលោកនឹងស្រស់បំព្រង់ប្រសិនបើយើងរួមគ្នាធ្វើសេចក្ដីល្អ។
                                    <span class='icon icon-ra icon-sm text_icon_auto'>Auto</span>
                                    @else
                                        {{$user->userinfor->bio}}
                                    @endif
                                </p>
                            </blockquote>
                        </div>
                    </div>
                    <!-- this is content  -->
                    <div class="user-con">
                        <div class="user-infor">
                            <!-- this is intro  -->
                            <section class="infor-section" id="personal_intro">
                                <div class="head">
                                    <ul class="df-s">
                                        <li>
                                            <h2>ការណែនាំ</h2>
                                            <p>ព័ត៌មានរបស់ព្រះសង្ឃ</p>
                                        </li>
                                        <li></li>
                                    </ul>
                                </div>
                                <div class="box db-c">
                                    <ul>
                                        <li>
                                            <div class="icon icon-ra icon-ra-sm"><i class="fa-solid fa-dharmachakra"></i></div>
                                            <p>វត្តជលធារាសម្បត្តិហៅវត្តជប់</p>
                                        </li>
                                        <li>
                                            <div class="icon icon-ra icon-ra-sm"><i class="fa-solid fa-location-dot"></i></div>
                                            <p>
                                                @if($user->userinfor->village == "" || $user->userinfor->Commune == "" || $user->userinfor->district == ""|| $user->userinfor->province == "")
                                                សូមបញ្ចូលទីកន្លែងកំណើតរបស់អ្នក?
                                                @else
                                                    ភូមិ{{$user->userinfor->village}}ឃុំ{{$user->userinfor->Commune}}ស្រុក{{$user->userinfor->district}}ខេត្ត{{$user->userinfor->province}}
                                                @endif
                                            </p>
                                        </li>
                                        <li>
                                            <div class="icon icon-ra icon-ra-sm"><i class="fa-solid fa-phone"></i></div>
                                            <p>{{$user->tell == '' ? 'លេខទូរស័ព្ទមិនត្រូវបានបង្ហាញ!': $user->tell}}</p>
                                        </li>
                                        <li>
                                            <div class="icon icon-ra icon-ra-sm"><i class="fa-solid fa-briefcase"></i></div>
                                            <p>{{$user->userinfor->workin == '' ? 'មិនមានការពិពណ៌នាអំពីការងារ!': $user->userinfor->workin}}</p>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <!-- this is pesenal id show  -->
                            <section class="infor-section" id="personal_card" style="border-bottom: none;">
                                <div class="head">
                                    <ul class="df-s">
                                        <li>
                                            <h2>អត្តសញ្ញាណ</h2>
                                            <p>រូបភាពបញ្ជាក់ពីអត្តសញ្ញាណណាមួយ</p>
                                        </li>
                                        <li></li>
                                    </ul>
                                </div>
                                <div class="box db-c">
                                    <ul class="df-l scroll-x card_data_location">
                                        @if ($cards->isEmpty())
                                        <li class="df-c">
                                            <div class="df-c">
                                                <div class="img vis-h">
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
                                                <div class="icon icon-ra icon-sm icon-add"><i class="fa-regular fa-hourglass"></i></div>
                                            </div>
                                        </li>
                                        @endif

                                        @foreach ($cards as $item)
                                            <li class="data-location" data-id="/storage/images/{{$item->img}}">
                                                <div class="img">
                                                    <img src="{{asset('storage/images/'.$item->img)}}"
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
                                                <blockquote><p>{{$item->title}}</p></blockquote>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </section>
                            <!-- this is user photo -->
                            @if (!$photos->isEmpty())
                            <section class="infor-section infor-section-border" id="personal_photo">
                                <!-- this is show an other photo  -->
                                <div class="box db-c">
                                    <ul class="user_photo_item user_photo_data photo_data_location">
                                        @foreach ($photos as $item)
                                            <li>
                                                <div class="box box-content">
                                                    <!--this is for show image-->
                                                    <div class="img">
                                                        <img src="{{asset('storage/images/'.$item->img)}}"
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
                                                        alt="{{$item->img}}"
                                                        >
                                                    </div>
                                                    <!--this is for show user profile-->
                                                    <div class="user-profile-sm df-s">
                                                        <div class="user-data df-l">
                                                            <div class="profile icon icon-ra icon-sm">
                                                                <img class="img-c" src="{{asset('storage/images/'.$user->img_profile)}}"
                                                                loading="lazy"
                                                                srcset="
                                                                {{asset('storage/images/'.$user->img_profile)}}?width=100? 100w,
                                                                {{asset('storage/images/'.$user->img_profile)}}?width=200? 200w,
                                                                {{asset('storage/images/'.$user->img_profile)}}?width=400? 400w,
                                                                {{asset('storage/images/'.$user->img_profile)}}?width=800? 800w,
                                                                {{asset('storage/images/'.$user->img_profile)}}?width=1000? 1000w,
                                                                {{asset('storage/images/'.$user->img_profile)}}?width=1200? 1200w,
                                                                "
                                                                sizes="(max-width: 800px) 100vw, 50vw"
                                                                decoding="async"
                                                                fetchPriority = "high"
                                                                alt="{{$user->img_profile}}"
                                                                >
                                                            </div>
                                                            <div class="text">
                                                                <h2>{{$user->first_name}} {{$user->last_name}}</h2>
                                                            </div>
                                                        </div>
                                                        <div class="icon icon-sm icon-ra"><i class="fa-solid fa-ellipsis-vertical"></i></div>
                                                    </div>
                                                    <!--this is for date-->
                                                    <div class="text">
                                                        <blockquote class="db-c">
                                                            <p class="p-over">{{$item->title}}</p>
                                                        </blockquote>
                                                        <div class="item-date btn icon-ra">
                                                            @if($item->status == '1')
                                                            <i class="fa-solid fa-earth-europe"></i>
                                                            @else
                                                            <i class="fa-solid fa-lock"></i>
                                                            @endif
                                                            <span class="db-c">{{ dateKhmerNumber($item->created_at)}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="btn-close df-c">
                                                        <button class="df-c">
                                                            <span>បិទទម្រង់</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="bg-item"></div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </section>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="{{asset('js/function/getdate.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/function/taketh.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/function/insert_image.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/alert/alert.js')}}"></script>
    {{-- this is script for item user  --}}
    <script type="text/javascript" src="{{asset('js/function/click_photo_monk_item.js')}}"></script>
    {{-- this is for go to an other location  --}}
    <script type="text/javascript" src="{{asset('js/function/location.js')}}"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            location_go('.card_data_location',true);
            location_go('.photo_data_location',true);
        });
    </script>
@endsection
