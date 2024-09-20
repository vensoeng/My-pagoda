@extends('layouts.home')

@section('title',' | ទីតាំងជំនួយ')

@section('cdn')
    <link rel="stylesheet" href="{{asset('css/home/help.css')}}">
@endsection

@section('content')
    <main>
        <div class="con">
            <div class="con-box">
            <section class="section-list">
                    <ul>
                        <a href="{{route('home.about')}}">
                            <li>
                                <div class="box">
                                    <div class="icon icon-ra"><i class="fa-solid fa-dharmachakra"></i></div>
                                    <h2>អំពើយើង</h2>
                                </div>
                            </li>
                        </a>
                        <a href="{{route('home.new')}}">
                            <li>
                                <div class="box">
                                    <div class="icon icon-ra"><i class="fa-solid fa-fire"></i></div>
                                    <h2>ថ្មីៗពីវត្ត</h2>
                                </div>
                            </li>
                        </a>
                        <a href="{{route('home.allbook')}}">
                            <li>
                                <div class="box">
                                    <div class="icon icon-ra"><i class="fa-solid fa-book"></i></div>
                                    <h2>អានសៀវភៅ</h2>
                                </div>
                            </li>
                        </a>
                        <a href="{{route('home.video')}}">
                            <li>
                                <div class="box">
                                    <div class="icon icon-ra"><i class="fa-solid fa-play"></i></div>
                                    <h2>វីឌីអូខ្លី ការអប់រំ</h2>
                                </div>
                            </li>
                        </a>
                    <a href="{{route('home.festival')}}">
                        <li>
                            <div class="box">
                                <div class="icon icon-ra"><i class="fa-solid fa-cake-candles"></i></div>
                                <h2>ពិធីបុណ្យនានា</h2>
                            </div>
                        </li>
                    </a>
                        <a href="{{route('home.monk')}}">
                            <li>
                                <div class="box">
                                    <div class="icon icon-ra"><i class="fa-solid fa-hands-praying"></i></div>
                                    <h2>ព្រះសង្ឃ</h2>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li>
                                <div class="box">
                                    <div class="icon icon-ra"><i class="fa-solid fa-envelope-open-text"></i></div>
                                    <h2>ផ្ញើសារ</h2>
                                </div>
                            </li>
                        </a>
                        <a href="">
                            <li>
                                <div class="box">
                                    <div class="icon icon-ra"><i class="fa-solid fa-building-columns"></i></div>
                                    <h2>ការកសាង</h2>
                                </div>
                            </li>
                        </a>
                    <a href="">
                        <li>
                            <div class="box">
                                <div class="icon icon-ra"><i class="fa-solid fa-square-poll-horizontal"></i></div>
                                <h2>ការអភិវឌ្ឍន៍</h2>
                            </div>
                        </li>
                    </a>
                    <a href="">
                        <li>
                            <div class="box">
                                <div class="icon icon-ra"><i class="fa-brands fa-medium"></i></div>
                                <h2>បណ្ដាញ់សង្គម</h2>
                            </div>
                        </li>
                    </a>
                    </ul>
            </section>
            </div>
        </div>
    </main>
@endsection