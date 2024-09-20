@extends('layouts.home')

@section('title','| អត្ថបទ')

@section('cdn')
    <!-- this is style for this page  -->
    <link rel="stylesheet" href="{{asset('css/home/new.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/allbook.css')}}">
@endsection

@section('content')
    <main>
        <div class="con">
            <div class="con-box">
                <!-- this is Articles of books  -->
                <section class="web-section db-c bottom-1" id="art-books">
                    <div class="web-section-body db-c">
                        <!-- this is content  -->
                        <div class="art-books">
                            <div class="box">
                                <ul class="artical_data_location">
                                    @foreach ($articals as $item)
                                        
                                    <li class="data-location" data-id="{{route('home.checkArtical',$item->id)}}">
                                        <div class="box">
                                            <div class="head">
                                                <div class="row df-s">
                                                    <div class="icon icon-ra icon-sm"><i class="fa-solid fa-arrow-up-right-from-square"></i></div>
                                                    <div class="icon icon-ra icon-sm"><i class="fa-solid fa-xmark"></i></div>
                                                </div>
                                                <img class="img-c" src="{{asset('storage/images/'.$item->img)}}" 
                                                srcset="{{asset('storage/images/'.$item->img)}} 400w, 
                                                {{asset('storage/images/'.$item->img)}} 800w, 
                                                {{asset('storage/images/'.$item->img)}} 1200w" 
                                                sizes="(max-width: 600px) 400px, 
                                                    (max-width: 1200px) 800px, 
                                                    1200px" 
                                                alt="{{$item->img}}"
                                                loading="lazy">
                                            </div>
                                            <div class="text">
                                                <a><strong>អត្ថបទដោយ៖ {{$item->creator == '' ? 'មិនបង្ហាញមុខ':$item->creator}}</strong></a>
                                                <blockquote>
                                                    <h2>{{$item->title==''? 'មិនមានចំណងជើង' : $item->title}}</h2>
                                                    <p class="card-blog-desc">{{$item->descript == ''? 'មិនមានការពិពណ៌នានោះទេ។' :$item->descript}}</p>
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
                                <a class="btn btn-out icon-ra">បានអស់ទិន្នន័យហើយ</a>
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
            location_go('.artical_data_location');
        });
    </script>
@endsection