@extends('layouts.admin')
@section('title','ផ្ទាំងគ្រប់គ្រង')
    
@section('cdn')
    <!-- this is style for this page  -->
    <link rel="stylesheet" href="{{asset('css/admin/dashboad.css')}}">
@endsection

@section('content')
<div class="web-content">
    <div class="web-content-body">
        <!-- this is menu of this page  -->
        <nav class="web-nav">
            <div class="head df-l">
                <div class="box df-l">
                    <div class="icon icon-ra icon-sm txt-sm"><i class="fa-solid fa-circle"></i></div>
                   <h2>បញ្ជីនៃទិន្នន័យ</h2>
                </div>
            </div>
            <div class="box">
                <ul class="scroll-x">
                    <li>
                        <div class="box">
                            <div class="row df-l">
                                <div class="icon icon-ra icon-sm"><i class="fa-solid fa-quote-left"></i></div>
                                <p>អត្តបទមាន</p>
                            </div>
                            <div class="text">
                                <h2>{{englishToKhmer($artical_num)}}</h2>
                               <div class="box df-l">
                                    <a href="{{route('admin.artical')}}" class="btn btn-ra btn-sm"><span>ចូលទៅកាន់</span><span><i class="fa-solid fa-arrow-right-long"></i></span></a>
                               </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="row df-l">
                                <div class="icon icon-ra icon-sm"><i class="fa-solid fa-book"></i></div>
                                <p>សៀវភៅមាន</p>
                            </div>
                            <div class="text">
                                <h2>{{englishToKhmer($book_num)}}</h2>
                               <div class="box df-l">
                                    <a href="{{route('admin.book')}}" class="btn btn-ra btn-sm"><span>ចូលទៅកាន់</span><span><i class="fa-solid fa-arrow-right-long"></i></span></a>
                               </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="row df-l">
                                <div class="icon icon-ra icon-sm"><i class="fa-solid fa-play"></i></div>
                                <p>វីឌីអប់រំមាន</p>
                            </div>
                            <div class="text">
                                <h2>{{englishToKhmer($video_num)}}</h2>
                               <div class="box df-l">
                                    <a href="{{route('admin.video')}}" class="btn btn-ra btn-sm"><span>ចូលទៅកាន់</span><span><i class="fa-solid fa-arrow-right-long"></i></span></a>
                               </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="row df-l">
                                <div class="icon icon-ra icon-sm"><i class="fa-solid fa-cake-candles"></i></div>
                                <p>ពិធីបុណ្យមាន</p>
                            </div>
                            <div class="text">
                                <h2>{{englishToKhmer($festival_num)}}</h2>
                               <div class="box df-l">
                                    <a href="{{route('admin.festival')}}" class="btn btn-ra btn-sm"><span>ចូលទៅកាន់</span><span><i class="fa-solid fa-arrow-right-long"></i></span></a>
                               </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="row df-l">
                                <div class="icon icon-ra icon-sm"><i class="fa-solid fa-hands-praying"></i></div>
                                <p>ព្រះសង្ឃមាន</p>
                            </div>
                            <div class="text">
                                <h2>{{englishToKhmer($monk_num)}}</h2>
                               <div class="box df-l">
                                    <a href="{{route('admin.monk')}}" class="btn btn-ra btn-sm"><span>ចូលទៅកាន់</span><span><i class="fa-solid fa-arrow-right-long"></i></span></a>
                               </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="row df-l">
                                <div class="icon icon-ra icon-sm"><i class="fa-solid fa-user"></i></div>
                                <p>អ្នកប្រើប្រាសមាន</p>
                            </div>
                            <div class="text">
                                <h2>{{englishToKhmer($user_num)}}</h2>
                               <div class="box df-l">
                                    <a href="{{route('admin.monk')}}" class="btn btn-ra btn-sm"><span>ចូលទៅកាន់</span><span><i class="fa-solid fa-arrow-right-long"></i></span></a>
                               </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- this is monk -->
        <section class="web-section db-c" id="monk">
            <div class="web-section-body db-c">
                <div class="box" hidden></div>
                <div class="web-nav">
                    <!-- this head  -->
                    <div class="head df-l">
                        <div class="box df-l">
                            <div class="icon icon-ra icon-sm txt-sm"><i class="fa-solid fa-circle"></i></div>
                           <h2>បញ្ជីព្រះសង្ឃ</h2>
                        </div>
                    </div>
                    <!-- this content  -->
                    <div class="box">
                        <table>
                            <tbody>
                                <tr>
                                    <th>រូបថត</th>
                                    <th>នាមនិងគោតនាម</th>
                                    <th>ស្ថិតនៅជា</th>
                                    <th>ចុះឈ្មោះប្រើ</th>
                                    <th>លេខទូរស័ព្ទ</th>
                                    <th>ស្ថានភាព</th>
                                </tr>
                                @foreach ($monks as $item)
                                <tr>
                                    <td>
                                        <div class="img icon icon-ra icon-bg over-h" style="--sg-button-blue: {{$item->profile_bg}};">
                                            <img src="{{asset('storage/images/'.$item->img_profile)}}" alt="">
                                        </div>
                                    </td>
                                    <td>{{$item->first_name}} {{$item->last_name}}</td>
                                    <td>{{$item->typeuser->title}}</td>
                                    <td>{{dateKhmerNumber($item->created_at->format('Y-m-d'))}}</td>
                                    <td>{{$item->tell}}</td>
                                    <td>{{$item->status == '1' ? 'សាធារណៈ' : 'ឯកជនភាព'}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- this foot  -->
                    <div class="foot top-05 db-c">
                        <div class="box df-c">
                            <a href="{{route('admin.monk')}}" class="btn btn-out icon-ra">មើលបញ្ជីព្រះសង្ឃបន្ថែម <span class="left-05"><i class="fa-solid fa-chevron-down"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- this is actical  -->
        <section class="web-section db-c" id="art-books">
            <div class="web-section-body db-c">
                <div class="web-nav art-books">
                    <!-- this is head  -->
                    <div class="head df-l">
                        <div class="box df-l">
                            <div class="icon icon-ra icon-sm txt-sm"><i class="fa-solid fa-circle"></i></div>
                           <h2>បញ្ជីអត្ថបទថ្មី</h2>
                        </div>
                    </div>
                    <!-- this is content  -->
                    <div class="box">
                        <ul class="scroll-x">
                            @foreach ($articals as $item)
                            <li>
                                <div class="box">
                                    <div class="head">
                                        <div class="row df-s">
                                            <div class="icon icon-ra icon-sm"><i class="fa-solid fa-arrow-up-right-from-square"></i></div>
                                            <div class="icon icon-ra icon-sm"><i class="fa-solid fa-xmark"></i></div>
                                        </div>
                                        <img class="img-c" src="{{asset('storage/images/'.$item->img)}}" alt="">
                                    </div>
                                    <div class="text">
                                        <a><strong>អត្ថបទដោយ៖ {{$item->creator}}</strong></a>
                                        <blockquote>
                                            <h2>{{$item->title}}</h2>
                                            <p class="card-blog-desc">{{$item->descript}}</p>
                                        </blockquote>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                    <!-- this foot  -->
                    <div class="foot top-05 db-c">
                        <div class="box df-c">
                            <a href="{{route('admin.artical')}}" class="btn btn-out icon-ra">មើលបញ្ជីអត្ថបទបន្ថែម <span class="left-05"><i class="fa-solid fa-chevron-down"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
