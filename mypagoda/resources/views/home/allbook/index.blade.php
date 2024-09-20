@extends('layouts.home')

@section('title',' | សៀវភៅទាំងអស់')

@section('cdn')
    <!-- this is style for this page  -->
    <link rel="stylesheet" href="{{asset('css/home/new.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/allbook.css')}}">
@endsection

@section('content')
    <main>
        <div class="con">
            <div class="con-box">
                <!-- this is book suggesstion for user  -->
                <section class="web-section db-c" id="new-books">
                    <div class="web-section-body db-c">
                        <!-- this is contetn  -->
                        <div class="new-books">
                            <div class="box">
                                <ul class="book_data_location">
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
                                                    alt="{{$item->img}}"
                                                >
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
                    </div>
                </section>
            </div>
        </div>
    </main>
    <!-- this is footer of website  -->
    <script type="text/javascript" src="{{asset('js/function/location.js')}}"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            location_go('.book_data_location');
        });
    </script>
@endsection