@extends('layouts.admin')

@section('title','គ្រប់គ្រង់ទម្រង់គេហទំព័រ')

@section('cdn')
<link rel="stylesheet" href="{{asset('css/admin/customization.css')}}">
@endsection

@section('form')
    <form action="{{route('admin.customization.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="web-form
            @error('img')
                web-form-active
            @enderror
        " id="artical-form">
            <div class="web-form-body">
                <!-- this is header  -->
                <div class="head df-s">
                    <a class="df-l">
                        <span class="icon icon-ra icon-ra-sm">
                            <img class="img-co" src="{{asset('images/favicon.png')}}" alt="">
                        </span>
                    </a>
                    <a><span>ទម្រង់បញ្ចូលស្លាយ</span></a>
                    <div class="icon-ra icon-sm df-c" onclick="toggleClass('#artical-form')">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <!-- this is content  -->
                <div class="con db-c">
                    <div class="con-body db-c">
                        <!-- header  -->
                        <div class="form-head">
                            <ul class="df-s">
                                <li class="profile-user df-l">
                                    @if (auth()->check())
                                        <div class="profile-img df-c icon icon-ra icon-ra-sm">
                                            <img class="img-c" src="{{asset('storage/images/'.auth()->user()->img_profile)}}" alt="">
                                        </div>
                                        <div class="profile-name left-05">
                                            <h2>{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h2>
                                            <p class="taget_date">ថ្ងៃទី២ ខែកុម្ភះ ឆ្នាំ២៥៦៦</p>
                                        </div>
                                    @else
                                        <div class="profile-img df-c icon icon-ra icon-ra-sm">
                                            <img class="img-c" src="{{asset('images/account.jpg')}}" alt="user profle">
                                        </div>
                                        <div class="profile-name left-05">
                                            <h2>មិនមានគណនី</h2>
                                            <p class="taget_date">ថ្ងៃទី២ ខែកុម្ភះ ឆ្នាំ២៥៦៦</p>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <!-- this is content  -->
                        <div class="main scroll-y">
                            <div class="box bottom-05">
                                <!-- this is content photo  -->
                                <input type="file" id="txt_photo" name="img" onchange="previewImage(event,this,'.soeng_artical')" hidden="true">
                                <div class="txt-photo df-c @error('img') error @enderror" onclick="document.querySelector('#txt_photo').click()">
                                    <div class="txt-photo-box soeng_artical">
                                        <ul>
                                            <li class="icon-ra-sm"><i class="fa-solid fa-photo-film"></i></li>
                                            <li><h2>បញ្ចូលរូបភាពព្រះសង្ឃ</h2></li>
                                            <li><p>រូបភាព(៩០០​X៩០០px)</p></li>
                                        </ul>
                                        <img src="" alt="showImage">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- this is footer  -->
                        <div class="foot">
                            <div class="foot-body df-s">
                                <h2>ជ្រើសរើសលខ្ខណៈបង្កើត</h2>
                                <ul class="df-c">
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'ព្រះសង្ឃ'">ព</li>
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'អត្តបទនិងសៀវភៅ'">អ</li>
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'វីឌីអូ'">វ</li>
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'បុណ្យនានា'">ប</li>
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'បន្ថែម'"><i class="fa-solid fa-ellipsis"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- this is footer form  -->
                <div class="submit-form">
                    <div class="box df-c">
                        <button class="btn icon-ra">បង្ហោះស្លាយ</button>
                    </div>
                </div>
            </div>
            <div class="form-b" onclick="toggleClass('#artical-form')"></div>
        </div>
    </form>
@endsection

@section('content')
    <div class="web-nav" hidden></div>
    {{-- this is content  --}}
    <div class="web-content">
        <div class="web-content-body">
            <!-- this is actical  -->
            <section class="web-section db-c" id="art-books">
                <!-- this is content  -->
                <div class="web-section-body db-c">
                    <div class="box" hidden></div>
                    <ul>
                        @foreach ( $slides as  $slide)
                        <li>
                            <div class="lsit_con">
                                <div class="img-slider">
                                    <img class="img-c" src="{{asset('storage/images/'.$slide->img)}}" alt="">
                                </div>
                            </div>
                            <div class="list_foot">
                                <div class="text df-s">
                                    <div class="row-one"></div>
                                    <div class="row-tow df-l">
                                        <form action="{{route('admin.customization.delete',$slide->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="bg-n">
                                                <a class="icon icon-ra icon-sm"><i class="fa-solid fa-trash"></i></a>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
    </div>
    <div class="icon_add">
        <div class="box">
            <button onclick="toggleClass('#artical-form')" class="icon icon-ra icon-sm"><i class="fa-solid fa-plus"></i></button>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        @if(session()->has('success'))
            New.alert({
                status: "success",
                title: "welcome",
                content: "{{ session()->get('success') }}",
                confirmbtn: false,
            });
        @endif

        @error('img')
            show_infor_alert("{{$message}}")
        @enderror


    </script>
@endsection
