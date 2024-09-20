@extends('layouts.home')

@section('title',' | អំពីវត្ត')

@section('cdn')
    <!-- this is style for this page  -->
    <link rel="stylesheet" href="{{asset('css/home/about.css')}}">
@endsection

@section('content')
    <main>
        <div class="con">
            <div class="con-box">
                <!-- this is user infor  -->
                <section class="user">
                    <div class="body">
                        <div class="user-infor">
                            <div class="user-profile icon icon-ra">
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
                                alt="img-hero">
                            </div>
                            <div class="text">
                                <h2>វត្តជលធារាសម្បត្តិ</h2>
                                <p>ព្រះពុទ្ទសាសនា</p>
                                <p>watchob@gmail.com</p>
                            </div>
                        </div>
                        <div class="user-team">
                            <ul class="df-c">
                                <li>
                                    <h2>{{englishToKhmer($manmonk)}}</h2>
                                    <P>ភិក្ខុ</P>
                                </li>
                                <li>
                                    <h2>{{englishToKhmer($sonmonk)}}</h2>
                                    <P>សាមណេរ</P>
                                </li>
                                <li>
                                    <h2>{{englishToKhmer(($manmonk + $sonmonk))}}</h2>
                                    <P>សរុប</P>
                                </li>
                            </ul>
                        </div>
                        <blockquote class="user-bio">
                            <p>បេសកកម្មរបស់យើងគឺដើម្បីបម្រើជាពន្លឺបំភ្លឺ ណែនាំអ្នកស្វែងរកក្នុងដំណើរឆ្ពោះទៅរកការយល់ដឹង និងបញ្ចូលការបង្រៀនដ៏ជ្រាលជ្រៅរបស់ព្រះពុទ្ធសាសនានៅក្នុងពិភពសម័យទំនើប។</p>
                        </blockquote>
                    </div>
                </section>
                <!-- this is user galery  -->
                <!-- <section class="user-pict">
                    <nav class="menu df-s">
                        <a>រូបភាព</a>
                        <a href="" class="btn icon-ra">ផ្ញើសារ</a>
                    </nav>
                    <div class="user-pict-con">
                        <ul>
                            <li>
                                <img src="../../../assets/images/study-monk3.jpg" alt="">
                            </li>
                            <li>
                                <img src="../../../assets/images/study-monk3.jpg" alt="">
                            </li>
                            <li>
                                <img src="../../../assets/images/study-monk3.jpg" alt="">
                            </li>
                            <li>
                                <img src="../../../assets/images/study-monk3.jpg" alt="">
                            </li>
                            <li>
                                <img src="../../../assets/images/study-monk3.jpg" alt="">
                            </li>
                        </ul>
                    </div>
                </section> -->
            </div>
        </div>
    </main>
@endsection