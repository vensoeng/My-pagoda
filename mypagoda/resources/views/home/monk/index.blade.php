@extends('layouts.home')

@section('title',' | បញ្ជីព្រះសឹង្ឃ')

@section('cdn')
    <!-- this is style for this page  -->
    <link rel="stylesheet" href="{{asset('css/home/monk.css')}}">
@endsection

@section('content')
    <main>
        <div class="con">
            <!-- this is content for show all mank  -->
            <div class="con-box db-c">
                <!-- this section for store pearen monk  -->
                <section class="web-section db-c" id="monk-main">
                    <div class="web-section-body db-c">
                        <!-- this content  -->
                        <div class="monk">
                            <div class="box">
                                <ul class="monk_data_location">
                                    @foreach ($monks as $item)

                                    <li>
                                        <div class="box">
                                            <div class="head" style="background: #e94a4a;">
                                                <div class="row df-s">
                                                    <a href="{{route('home.monkuser',$item->id)}}"><div class="icon icon-ra icon-sm"><i class="fa-solid fa-arrow-up-right-from-square"></i></div></a>
                                                    <a href="{{asset('storage/images/'.$item->img_profile)}}" download><div class="icon icon-ra icon-sm"><i class="fa-regular fa-copy"></i></div></a>
                                                </div>
                                                <div class="box data-location" data-id="{{route('home.monkuser',$item->id)}}">
                                                    <img class="db-c img-c lazyload" src="{{asset('storage/images/'.$item->img_profile)}}"
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
                                            <a href="{{route('home.monkuser',$item->id)}}">
                                                <div class="user-in">
                                                    <div class="box df-l">
                                                        <div class="profile icon icon-ra icon-sm">
                                                            <img class="db-c img-c lazyload" src="{{asset('storage/images/'.$item->img_profile)}}"
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
                                                        <div class="text"><h2>{{$item->first_name}} {{$item->last_name}}</h2></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- this section show about Theory  -->
                <section class="web-section db-c bottom-1" id="theory">
                    <div class="web-section-body db-c">
                        <div class="theory df-c">
                            <div class="con-head-i">
                                <button class="icon icon-sm icon-ra icon-bg"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="box">
                                <div class="head">
                                    <div class="profile icon icon-ra" style="--sg-color-text:var(--sg-bgblack)">
                                        <img class="img-c" src="{{asset('images/img-hero.png')}}"
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
                                        alt="#"
                                        >
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
    {{-- this is for go to an other location  --}}
    <script type="text/javascript" src="{{asset('js/function/location.js')}}"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            location_go('.monk_data_location');
        });
    </script>
@endsection
