@extends('layouts.home')
@section('title', ' | ការកសាង')

@section('cdn')
    <!-- this is style for this page  -->
    <link rel="stylesheet" href="{{asset('css/home/build.css')}}">
@endsection
@section('content')
<main>
    <div class="con">
        <div class="con-box">
            <!-- play list one short video  -->
            <section class="web-section db-c bottom-1" id="short-v">
                <div class="web-section-body db-c">
                   <div class="noresult df-c">
                        <div class="box">
                            <div class="text">
                                <h2>មិនទាន់មានទិន្នន័យទេ!</h2>
                            </div>
                            <ul>
                                <li><a href="#" class="btn icon-ra">ទំព័រដើម</a></li>
                                <li><a href="#" class="btn icon-ra">ថ្មីៗអំពីវត្តយើង</a></li>
                                <li><a href="#" class="btn icon-ra">អានសៀវភៅ</a></li>
                                <li><a href="#" class="btn icon-ra">វីឌីអូខ្លី ការអប់រំ</a></li>
                                <li><a href="#" class="btn icon-ra">ពិធីបុណ្យនានា</a></li>
                                <li><a href="#" class="btn icon-ra">ចំនួនព្រះសង្ឃ</a></li>
                            </ul>
                        </div>
                   </div>
                </div>
            </section>
        </div>
    </div>
</main>
@endsection