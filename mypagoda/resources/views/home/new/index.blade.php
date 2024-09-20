@extends('layouts.home')

@section('title',' | ព័ត៌មានថ្មីៗអំពីយើង')

@section('cdn')
    <!-- this is style for this page  -->
    <link rel="stylesheet" href="{{asset('css/home/new.css')}}">
@endsection
@section('content')
    <main>
        <div class="con">
            <div class="con-box">
                <!-- this is new suggesstion for user -->
                <section class="web-section db-c" id="new-sugg">
                    <div class="web-section-body db-c">
                        <!-- this is header of section  -->
                        <div class="head top_and_bottom-1">
                            <div class="box df-s">
                                <div class="row-one df-l">
                                    <div class="icon icon-bg icon-ra"><i class="fa-solid fa-fire"></i></div>
                                    <div class="text left-05">
                                        <h2>ការណែនាំសម្រាប់អ្នក</h2>
                                        <p>ស្វែងរកព័ត៌មានថ្មីដែលអ្នកចូលចិត្តទីនេះ</p>
                                    </div>
                                </div>
                                <div class="row-tow">
                                    <a href="{{route('home.festival')}}" class="btn icon-ra btn-out">មើលបន្ថែម</a>
                                </div>
                            </div>
                        </div>
                        <!-- this is content  -->
                        <div class="new-sugg">
                            <div class="box scroll-x">
                                <ul class="scroll-x festival_data_location">
                                    @foreach ($festivals as $item)

                                    <li class="chop-data db-c">
                                        <div class="head data-location" data-id="{{$item->link}}">
                                            <div class="row df-s">
                                                <div class="icon icon-ra icon-sm"><i class="fa-solid fa-arrow-up-right-from-square"></i></div>
                                                <div class="icon icon-ra icon-sm"><i class="fa-solid fa-xmark"></i></div>
                                            </div>
                                            <div class="box">
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
                                        </div>
                                        <div class="user-in">
                                            <div class="box">
                                                <div class="profile icon icon-ra">
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
                                                    alt="#">
                                                </div>
                                                <blockquote class="db-c">
                                                    <h2>{{$item->title}}</h2>
                                                    <a href="#" class="df-l"><span>វត្តជលធារាសម្បត្តិ</span><i class="fa-solid fa-circle-check"></i></a>
                                                </blockquote>
                                            </div>
                                            <div class="text">
                                                <p>{{dateKhmerNumber($item->created_at)}}</p>
                                                <p>{{formatDateTime($item->created_at)}}</p>
                                            </div>
                                        </div>
                                    </li>

                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <!-- this is footer  -->
                        <div class="foot top-05 db-c">
                            <div class="box df-c">
                                <a href="{{route('home.festival')}}" class="btn btn-out icon-ra">មើលបញ្ជីបន្ថែម <span class="left-05"><i class="fa-solid fa-chevron-down"></i></span></a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- this is book for user  -->
                <section class="web-section db-c" id="new-books">
                    <div class="web-section-body db-c">
                        <div class="head top_and_bottom-1">
                            <div class="box df-s">
                                <div class="row-one df-l">
                                    <div class="icon icon-bg icon-ra"><i class="fa-solid fa-book"></i></div>
                                    <div class="text left-05">
                                        <h2>សៀវភៅដែលបានការណែនាំ</h2>
                                        <p>ស្វែងរកព័ត៌មានថ្មីដែលអ្នកចូលចិត្តទីនេះ</p>
                                    </div>
                                </div>
                                <div class="row-tow">
                                    <a href="{{route('home.allbook')}}" class="btn icon-ra btn-out">មើលបន្ថែម</a>
                                </div>
                            </div>
                        </div>
                        <!-- this is contetn  -->
                        <div class="new-books">
                            <div class="box">
                                <ul class="scroll-x book_data_location">
                                @foreach ($books as $item)

                                    <li class="chop-data books-data data-location" data-id="{{$item->link}}">
                                        <div class="box">
                                            <div class="head">
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
                                            <blockquote>
                                                <p><strong>អ្នកនិព័ន្ធ៖<a class="left-05 right-05" href="#">{{$item->editor=='' ? 'មិនបង្ហាញឈ្មោះ':$item->editor}}</a></strong></p>
                                                <h2>{{$item->title=='' ? 'មិនបង្ហាញឈ្មោះ':$item->title }}</h2>
                                                <div class="subtitle">
                                                    <p><strong>ប្រភេទ៖<span class="left-05 right-05">{{$item->type == '' ? 'ផ្សេងៗ':$item->type}}</span></strong></p>
                                                </div>
                                            </blockquote>
                                        </div>
                                    </li>

                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- this is footer  -->
                        <div class="foot top-05 db-c">
                            <div class="box df-c">
                                <a href="{{route('home.allbook')}}" class="btn btn-out icon-ra">មើលបញ្ជីបន្ថែម <span class="left-05"><i class="fa-solid fa-chevron-down"></i></span></a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- this is read for cambodia  -->
                <section class="web-section db-c bottom-1" id="sug-day">
                    <div class="web-section-body db-c">
                        <div class="sug-day">
                            <div class="con-head-i">
                                <button onclick="toggleClass('#sug-day','dn')" class="icon icon-sm icon-ra icon-bg cursor-p"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="box df-l">
                                <div class="row-one">
                                    <ul>
                                        <li class="buote top_and_bottom-1">
                                            <blockquote>
                                                <h2>អានសៀវភៅឥឡូវនេះដើម្បីកម្ពុជា</h2>
                                                <h3>អំណាន់ជាផ្នែកមួយដ៏សំខាន់នៅក្នុងជីវិតរបស់លោកអ្នក -ពីជប់វារី។</h3>
                                            </blockquote>
                                        </li>
                                        <li class="button"><a href="#" class="btn btn-out icon-ra">មើលបន្ថែម</a></li>
                                    </ul>
                                </div>
                                <div class="row-tow">
                                    <div class="box">
                                        <img src="{{asset('images/img-hero.png')}}"
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
                                        alt="img-hero">
                                    </div>
                                </div>
                                <div class="bg"><p>Festivals day.</p></div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- this is Articles -->
                <section class="web-section db-c bottom-1" id="art-books">
                    <div class="web-section-body db-c">
                        <!-- this is content  -->
                        <div class="art-books">
                            <div class="box scroll-x">
                                <ul class="scroll-x artical_data_location">
                                    @foreach ($articals as $item)

                                    <li class="data-location" data-id="{{route('home.checkArtical',$item->id)}}">
                                        <div class="box">
                                            <div class="head">
                                                <div class="row df-s">
                                                    <div class="icon icon-ra icon-sm"><i class="fa-solid fa-arrow-up-right-from-square"></i></div>
                                                    <div class="icon icon-ra icon-sm"><i class="fa-solid fa-xmark"></i></div>
                                                </div>
                                                <img class="img-c" src="{{asset('storage/images/'.$item->img)}}"
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
                                                    fetchPriority = "high">
                                            </div>
                                            <div class="text">
                                                <a><strong>អត្ថបទដោយ៖ {{$item->creator == '' ? 'មិនបង្ហាញមុខ':$item->creator}}</strong></a>
                                                <blockquote>
                                                    <h2>{{$item->title==''? 'មិនមានចំណងជើង' : $item->title}}</h2>
                                                    @php
                                                        $description = $item->descript == '' ? 'មិនមានការពិពណ៌នានោះទេ។' : $item->descript;
                                                    @endphp
                                                    <p class="card-blog-desc">{!! $description !!}</p>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- this is footer  -->
                        <div class="foot top-05 db-c">
                            <div class="box df-c">
                                <a href="{{route('home.allartical')}}" class="btn btn-out icon-ra">មើលបញ្ជីបន្ថែម <span class="left-05"><i class="fa-solid fa-chevron-down"></i></span></a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- show short video  -->
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
                                <ul class="scroll-x video_data_location">
                                    @foreach ($videos as $item)

                                    <li class="data-location" data-id="{{$item->link}}">
                                        <div class="head df-s">
                                            <div class="profile">
                                                <div class="icon icon-ra over-h">
                                                    <img class="img-c" src="{{asset('storage/images/'.$item->userCreator->img)}}"
                                                    loading="lazy"
                                                    srcset="
                                                    {{asset('storage/images/'.$item->userCreator->img)}}?width=100? 100w,
                                                    {{asset('storage/images/'.$item->userCreator->img)}}?width=200? 200w,
                                                    {{asset('storage/images/'.$item->userCreator->img)}}?width=400? 400w,
                                                    {{asset('storage/images/'.$item->userCreator->img)}}?width=800? 800w,
                                                    {{asset('storage/images/'.$item->userCreator->img)}}?width=1000? 1000w,
                                                    {{asset('storage/images/'.$item->userCreator->img)}}?width=1200? 1200w,
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
                                        </div>
                                        <div class="subtitle df-s">
                                            <div class="text">
                                                <h2>{{$item->title}}</h2>
                                            </div>
                                            <div class="btn btn-sm icon-bg icon-ra-sm right-05">
                                                <p>{{substr($item->userCreator->english_name, 0, 3)}}</p>
                                            </div>
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
                                <a href="{{route('home.video')}}" class="btn btn-out icon-ra">មើលបញ្ជីបន្ថែម <span class="left-05"><i class="fa-solid fa-chevron-down"></i></span></a>
                            </div>
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
            location_go('.festival_data_location');
            location_go('.book_data_location');
            location_go('.artical_data_location');
            location_go('.video_data_location');
        });
    </script>
    <!---this is toggle class------------->
    <script type="text/javascript" src="{{asset('js/function/taketh.js')}}"></script>
@endsection
