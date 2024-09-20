@extends('layouts.home')

@section('title',' | ពិធីបុណ្យនានា')

@section('cdn')
    <!-- this is style for this page  -->
    <link rel="stylesheet" href="{{asset('css/home/festival.css')}}">
@endsection

@section('content')
    <main>
        <div class="con">
            <div class="con-box">
                <!-- play list one short video  -->
                <section class="web-section db-c bottom" id="fest">
                    <div class="web-section-body db-c">
                        <div class="fest">
                            <div class="box">
                                <ul class="df-l scroll-x festival_data_location">
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
                    </div>
                </section>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="{{asset('js/function/location.js')}}"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            location_go('.festival_data_location');
        });
    </script>
@endsection
