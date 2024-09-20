@extends('layouts.home')
@section('title',' | វីឌីអូ')

@section('cdn')
    <!-- this is style for this page  -->
    <link rel="stylesheet" href="{{asset('css/home/new.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/shortvideo.css')}}">
@endsection

@section('content')

    <main> 
        <div class="con">
            <div class="con-box">
                <!-- play list one short video  -->
                <section class="web-section db-c bottom-1" id="short-v">
                    <div class="web-section-body db-c">
                        <!-- this is header of section  -->
                        {{-- <div class="head top_and_bottom-1">
                            <div class="box df-s">
                                <div class="row-one df-l">
                                    <div class="icon icon-bg icon-ra"><i class="fa-solid fa-play"></i></div>
                                    <div class="text left-05">
                                        <h2>ការអប់រំផ្លូវចិត្ត</h2>
                                        <p>ស្វែងរកមាតិការអប់រំទីនេះ</p>
                                    </div>
                                </div>
                                <div class="row-tow">
                                    <a class="btn icon-ra btn-out"><input id="txt-videoshort1" type="text" placeholder="ស្វែងរកតាមរយៈឈ្មោះ"><label for="txt-videoshort1"><i class="fa-solid fa-magnifying-glass"></i></label></a>
                                </div>
                            </div>
                        </div> --}}
                        <!-- this is content  -->
                        <div class="short-v">
                            <div class="box">
                                <ul class="scroll-x video_data_location">
                                    @foreach ($videos as $item)
                                    <li class="data-location" data-id="{{$item->link == '' ? '#' : $item->link}}">
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
                                                    alt="{{$item->img}}">
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
                    </div>
                </section>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="{{asset('js/function/location.js')}}"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            location_go('.video_data_location');
        });
    </script>

@endsection