@extends('layouts.home')
@section('title',' | '.$user->first_name.''.$user->last_name)

@section('cdn')
    <!-- this is style for this page  -->
    <link rel="stylesheet" href="{{asset('css/home/monk.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/monkuser.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/form.css')}}">
    {{-- this is css for alert  --}}
    <link rel="stylesheet" href="{{asset('css/alert/app.css')}}">
@endsection

@section('content')

    <form action="{{route('home.user.addcard')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="web-form
        @if($errors->has('card_title') || $errors->has('card_img'))
            web-form-active
        @endif
        " id="card-form">
            <div class="web-form-body">
                <!-- this is header  -->
                <div class="head df-s">
                    <a class="df-l">
                        <span class="icon icon-ra icon-ra-sm">
                            <img class="img-co" src="{{asset('images/favicon.png')}}" alt="">
                        </span>
                    </a>
                    <a><span>បង្កើតអត្តសញ្ញាណ</span></a>
                    <div class="icon-ra icon-sm df-c" onclick="toggleClass('#card-form');toggleClass('.body-form','body-form-active')">
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
                                <!-- thi is title  -->
                                <div class="txt-title">
                                    <label for="#">ចំណងជើង</label>
                                    <div class="txt-title-box @error('card_title') error @enderror">
                                        <input type="text" name="card_title" placeholder="ពិពណ៌នាអំពីរូបភាព" value="{{old('card_title')}}">
                                    </div>
                                </div>
                                <!-- this is content photo  -->
                                <input type="file" id="card_img" name="card_img" accept=".jpg,.jpeg,.png,.webp" onchange="previewImage(event,this,'.card_insert_photo')" hidden="true">
                                <div class="txt-photo df-c card_insert_photo  @error('img') error @enderror" onclick="document.querySelector('#card_img').click()">
                                    <div class="txt-photo-box">
                                        <ul>
                                            <li class="icon-ra-sm"><i class="fa-solid fa-photo-film"></i></li>
                                            <li><h2>បញ្ចូលរូបភាពវីឌីអូ</h2></li>
                                            <li><p>រូបភាព(១៩២០X២៤០៦px)</p></li>
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
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'អត្តសញ្ញាណ'" onclick="taketh_ID('#card-form')">អ</li>
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'រូបភាព'"  onclick="taketh_ID('#photo-form')">រ</li>
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'បន្ថែម'"><i class="fa-solid fa-ellipsis"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- this is footer form  -->
                <div class="submit-form">
                    <div class="box df-c">
                        <button class="btn icon-ra">បង្ហោះអត្តសញ្ញាណ</button>
                    </div>
                </div>
            </div>
            <div class="form-b" onclick="toggleClass('#card-form');toggleClass('.body-form','body-form-active')"></div>
        </div>
    </form>
    {{-- this is form for add other photo of user  --}}
    <form action="{{route('home.user.addphoto')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="web-form
        @if($errors->has('photo_title') || $errors->has('photo_img') || $errors->has('photo_status'))
            web-form-active
        @endif
        " id="photo-form">
            <div class="web-form-body">
                <!-- this is header  -->
                <div class="head df-s">
                    <a class="df-l">
                        <span class="icon icon-ra icon-ra-sm">
                            <img class="img-co" src="{{asset('images/favicon.png')}}" alt="#" loading="lazy">
                        </span>
                    </a>
                    <a><span>បង្កើតការបង្ហោះ</span></a>
                    <div class="icon-ra icon-sm df-c" onclick="toggleClass('#photo-form');toggleClass('.body-form','body-form-active')">
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
                                <li>
                                    <div class="status df-c @error('photo_status') error @enderror">
                                        <select name="photo_status" id="#">
                                            <option value="1">សាធារណៈ</option>
                                            <option value="0">ឯកជនភាព</option>
                                        </select>
                                    </div>
                                </li>
                        </ul>
                        </div>
                        <!-- this is content  -->
                        <div class="main scroll-y">
                            <div class="box bottom-05">
                                <!-- thi is title  -->
                                <div class="text-caption @error('photo_title') error @enderror">
                                    <label for="#">ចំណងជើង</label>
                                    <div class="txt-caption-box  @error('photo_title') error @enderror" data-replicated-value="null">
                                        <textarea name="photo_title" id="data-text" rows="2" oninput="this.parentNode.dataset.replicatedValue = this.value" onblur="this.parentNode.dataset.replicatedValue = null" onclick="this.parentNode.dataset.replicatedValue = this.value" placeholder="សរសេរការពិពណ៌នារបស់អ្នក?">{{old('photo_title')}}</textarea>
                                    </div>
                                </div>
                                <!-- this is content photo  -->
                                <input type="file" id="photo_img" name="photo_img[]" accept=".jpg,.jpeg,.png,.webp" multiple  onchange="previewImage(event,this,'.photo_insert_photo')" hidden="true">
                                <div class="txt-photo df-c photo_insert_photo  @error('photo_img') error @enderror" onclick="document.querySelector('#photo_img').click()">
                                    <div class="txt-photo-box">
                                        <ul>
                                            <li class="icon-ra-sm"><i class="fa-solid fa-photo-film"></i></li>
                                            <li><h2>បញ្ចូលរូប</h2></li>
                                            <li><p>រូបភាព(១២៨០X៧២០px)</p></li>
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
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'អត្តសញ្ញាណ'" onclick="taketh_ID('#card-form')">អ</li>
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'រូបភាព'"  onclick="taketh_ID('#photo-form')">រ</li>
                                    <li class="icon icon-ra-sm text-be" style="--text-: 'បន្ថែម'"><i class="fa-solid fa-ellipsis"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- this is footer form  -->
                <div class="submit-form">
                    <div class="box df-c">
                        <button class="btn icon-ra">បង្ហោះមាតិការ</button>
                    </div>
                </div>
            </div>
            <div class="form-b" onclick="toggleClass('#photo-form');toggleClass('.body-form','body-form-active')"></div>
        </div>
    </form>
    {{-- this is content  --}}
    <main>
        <div class="con">
            <div class="monk-infor">
                <div class="monk-infor-body">
                    <!-- this is header  -->
                    <div class="monk-head">
                        <div class="user-cover">
                            <div class="box">
                                @if($user->userinfor->img_cover == "" && $slide->img == "")
                                    <img class="img-c" src="{{asset('images/slider2.jpg')}}"
                                    loading="lazy"
                                    srcset="
                                    {{asset('images/slider2.jpg')}}?width=100? 100w,
                                    {{asset('images/slider2.jpg')}}?width=200? 200w,
                                    {{asset('images/slider2.jpg')}}?width=400? 400w,
                                    {{asset('images/slider2.jpg')}}?width=800? 800w,
                                    {{asset('images/slider2.jpg')}}?width=1000? 1000w,
                                    {{asset('images/slider2.jpg')}}?width=1200? 1200w,
                                    "
                                    sizes="(max-width: 800px) 100vw, 50vw"
                                    decoding="async"
                                    fetchPriority = "high"
                                    alt="#">
                                @elseif($user->userinfor->img_cover == "" && $slide->img !== "")
                                    <img class="img-c" src="{{asset('storage/images/'.$slide->img)}}"
                                    loading="lazy"
                                    srcset="
                                {{asset('storage/images/'.$slide->img)}}?width=100? 100w,
                                {{asset('storage/images/'.$slide->img)}}?width=200? 200w,
                                {{asset('storage/images/'.$slide->img)}}?width=400? 400w,
                                {{asset('storage/images/'.$slide->img)}}?width=800? 800w,
                                {{asset('storage/images/'.$slide->img)}}?width=1000? 1000w,
                                {{asset('storage/images/'.$slide->img)}}?width=1200? 1200w,
                                    "
                                    sizes="(max-width: 800px) 100vw, 50vw"
                                    decoding="async"
                                    fetchPriority = "high"
                                    alt="#">
                                @else
                                    <img class="img-c" src="{{asset('storage/images/'.$user->userinfor->img_cover)}}"
                                    loading="lazy"
                                    srcset="
                                    {{asset('storage/images/'.$user->userinfor->img_cover)}}?width=100? 100w,
                                    {{asset('storage/images/'.$user->userinfor->img_cover)}}?width=200? 200w,
                                    {{asset('storage/images/'.$user->userinfor->img_cover)}}?width=400? 400w,
                                    {{asset('storage/images/'.$user->userinfor->img_cover)}}?width=800? 800w,
                                    {{asset('storage/images/'.$user->userinfor->img_cover)}}?width=1000? 1000w,
                                    {{asset('storage/images/'.$user->userinfor->img_cover)}}?width=1200? 1200w,
                                    "
                                    sizes="(max-width: 800px) 100vw, 50vw"
                                    decoding="async"
                                    fetchPriority = "high"
                                    alt="#">
                                @endif
                                <div class="btn-edite-profile">
                                    <a href="{{route('home.user.edit',$user->id)}}" class="btn icon-ra">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span>កែប្រែប្រវត្តរូប</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="user-profile icon icon-ra over-h">
                            <div class="box">
                                @if($user->img_profile == "")
                                    <img class="img-c" src="{{asset('images/account.jpg')}}"
                                    loading="lazy"
                                    srcset="
                                    {{asset('images/account.jpg')}}?width=100? 100w,
                                    {{asset('images/account.jpg')}}?width=200? 200w,
                                    {{asset('images/account.jpg')}}?width=400? 400w,
                                    {{asset('images/account.jpg')}}?width=800? 800w,
                                    {{asset('images/account.jpg')}}?width=1000? 1000w,
                                    {{asset('images/account.jpg')}}?width=1200? 1200w,
                                    "
                                    sizes="(max-width: 800px) 100vw, 50vw"
                                    decoding="async"
                                    fetchPriority = "high"
                                    alt="#">
                                @else
                                    <img class="img-c" src="{{asset('storage/images/'.$user->img_profile)}}"
                                    loading="lazy"
                                    srcset="
                                    {{asset('storage/images/'.$user->img_profile)}}?width=100? 100w,
                                    {{asset('storage/images/'.$user->img_profile)}}?width=200? 200w,
                                    {{asset('storage/images/'.$user->img_profile)}}?width=400? 400w,
                                    {{asset('storage/images/'.$user->img_profile)}}?width=800? 800w,
                                    {{asset('storage/images/'.$user->img_profile)}}?width=1000? 1000w,
                                    {{asset('storage/images/'.$user->img_profile)}}?width=1200? 1200w,
                                    "
                                    sizes="(max-width: 800px) 100vw, 50vw"
                                    decoding="async"
                                    fetchPriority = "high"
                                    alt="#">
                                @endif
                            </div>
                        </div>
                        <div class="text left-05 right-05">
                            <h2>{{$user->typeuser->title}} {{$user->first_name}} {{$user->last_name}}</h2>
                            <p>ឧបសប្បទា {{$user->typeuser->title}}ភាវៈ</p>
                            <blockquote>
                                <p>
                                    @if($user->userinfor->bio == "")
                                    ពិភពលោកនឹងស្រស់បំព្រង់ប្រសិនបើយើងរួមគ្នាធ្វើសេចក្ដីល្អ។
                                    <span class='icon icon-ra icon-sm text_icon_auto'>Auto</span>
                                    @else
                                        {{$user->userinfor->bio}}
                                    @endif
                                </p>
                            </blockquote>
                        </div>
                    </div>
                    <!-- this is content  -->
                    <div class="user-con">
                        <div class="user-infor">
                            <!-- this is intro  -->
                            <section class="infor-section" id="personal_intro">
                                <div class="head">
                                    <ul class="df-s">
                                        <li>
                                            <h2>ការណែនាំ</h2>
                                            <p>ព័ត៌មានរបស់ព្រះសង្ឃ</p>
                                        </li>
                                        <li></li>
                                    </ul>
                                </div>
                                <div class="box db-c">
                                    <ul>
                                        <li>
                                            <div class="icon icon-ra icon-ra-sm"><i class="fa-solid fa-dharmachakra"></i></div>
                                            <p>វត្តជលធារាសម្បត្តិហៅវត្តជប់</p>
                                        </li>
                                        <li>
                                            <div class="icon icon-ra icon-ra-sm"><i class="fa-solid fa-location-dot"></i></div>
                                            <p>
                                                @if($user->userinfor->village == "" || $user->userinfor->Commune == "" || $user->userinfor->district == ""|| $user->userinfor->province == "")
                                                សូមបញ្ចូលទីកន្លែងកំណើតរបស់អ្នក?
                                                @else
                                                    ភូមិ{{$user->userinfor->village}}ឃុំ{{$user->userinfor->Commune}}ស្រុក{{$user->userinfor->district}}ខេត្ត{{$user->userinfor->province}}
                                                @endif
                                            </p>
                                        </li>
                                        <li>
                                            <div class="icon icon-ra icon-ra-sm"><i class="fa-solid fa-phone"></i></div>
                                            <p>{{$user->tell == '' ? 'សូមបញ្ចូលលេខទូរស័ព្ទរបស់អ្នក': $user->tell}}</p>
                                        </li>
                                        <li>
                                            <div class="icon icon-ra icon-ra-sm"><i class="fa-solid fa-briefcase"></i></div>
                                            <p>{{$user->userinfor->workin == '' ? 'សូមបញ្ចូលការងារដែលអ្នកកុំពុងស្ថិតនៅ?': $user->userinfor->workin}}</p>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <!-- this is pesenal id show  -->
                            <section class="infor-section" id="personal_card"  @if ($photos->isEmpty()) style="border-bottom: none;" @endif>
                                <div class="head">
                                    <ul class="df-s">
                                        <li>
                                            <h2>អត្តសញ្ញាណ</h2>
                                            <p>រូបភាពបញ្ជាក់ពីអត្តសញ្ញាណណាមួយ</p>
                                        </li>
                                        <li></li>
                                    </ul>
                                </div>
                                <div class="box db-c">
                                    <ul class="df-l scroll-x">
                                        <li onclick="taketh_ID('#card-form');toggleClass('.body-form','body-form-active')" class="df-c">
                                            <div class="df-c">
                                                <div class="img vis-h">
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
                                                    alt="#"
                                                    >
                                                </div>
                                                <div class="icon icon-ra icon-sm icon-add"><i class="fa-solid fa-plus"></i></div>
                                            </div>
                                        </li>
                                        @foreach ($cards as $item)
                                            <li>
                                                <div class="img">
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
                                                <form action="{{route('home.user.deletecard',$item->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                <button class="bg-n"><div class="icon icon-ra icon-sm icon-close"><i class="fa-solid fa-xmark"></i></div></button>
                                                </form>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </section>
                            @if ($photos->isEmpty())
                                <div class="foot top-05 db-c">
                                    <div class="box df-c">
                                        <a class="btn btn-out icon-ra cursor-p" onclick="taketh_ID('#photo-form');toggleClass('.body-form','body-form-active')"> បង្ហោះមាតិកា<span class="left-05"><i class="fa-solid fa-plus"></i></span></a>
                                    </div>
                                </div>
                            @else
                            <section class="infor-section infor-section-border" id="personal_photo">
                                <div class="head df-c">
                                    <ul class="df-s">
                                        <li>
                                            <h2>រូបភាពផ្សេងៗ</h2>
                                            <p>សកម្មភាពនានារបស់អ្នកដែលអ្នកគិតថាល្អ</p>
                                        </li>
                                        <li onclick="taketh_ID('#photo-form');toggleClass('.body-form','body-form-active')">
                                            <div class="btn btn-add-photo">
                                                <i class="fa-solid fa-images"></i>
                                                <h2>រូបភាព</h2>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- this is show an other photo  -->
                                <div class="box db-c">
                                    <ul class="user_photo_item user_photo_data">
                                        @foreach ($photos as $item)
                                            <li>
                                                <div class="box box-content">
                                                    <!--this is for show image-->
                                                    <div class="img">
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
                                                    <!--this is for show user profile-->
                                                    <div class="user-profile-sm df-s">
                                                        <div class="user-data df-l">
                                                            <div class="profile icon icon-ra icon-sm">
                                                                <img class="img-c" src="{{asset('storage/images/'.$user->img_profile)}}"
                                                                loading="lazy"
                                                                srcset="
                                                                {{asset('storage/images/'.$user->img_profile)}}?width=100? 100w,
                                                                {{asset('storage/images/'.$user->img_profile)}}?width=200? 200w,
                                                                {{asset('storage/images/'.$user->img_profile)}}?width=400? 400w,
                                                                {{asset('storage/images/'.$user->img_profile)}}?width=800? 800w,
                                                                {{asset('storage/images/'.$user->img_profile)}}?width=1000? 1000w,
                                                                {{asset('storage/images/'.$user->img_profile)}}?width=1200? 1200w,
                                                                "
                                                                sizes="(max-width: 800px) 100vw, 50vw"
                                                                decoding="async"
                                                                fetchPriority = "high"
                                                                alt="{{$user->img_profile}}"
                                                                >
                                                            </div>
                                                            <div class="text">
                                                                <h2>{{$user->first_name}} {{$user->last_name}}</h2>
                                                            </div>
                                                        </div>
                                                        <div class="icon icon-sm icon-ra"><i class="fa-solid fa-ellipsis-vertical"></i></div>
                                                    </div>
                                                    <!--this is for date-->
                                                    <div class="text">
                                                        <blockquote class="db-c">
                                                            <p class="p-over">{{$item->title}}</p>
                                                        </blockquote>
                                                        <div class="item-date btn icon-ra">
                                                            @if($item->status == '1')
                                                            <i class="fa-solid fa-earth-europe"></i>
                                                            @else
                                                            <i class="fa-solid fa-lock"></i>
                                                            @endif
                                                            <span class="db-c">{{ dateKhmerNumber($item->created_at)}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row df-s row-user-item">
                                                        <div class="text">
                                                            <p>ជ្រើសរើសលខ្ខណៈបង្កើត</p>
                                                        </div>
                                                        <div class="row-child df-r">
                                                            <form action="{{route('home.user.deletephoto',$item->id)}}" method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit" class="bg-n"  onclick="return alert_delete(event);">
                                                                    <div class="icon icon-ra icon-sm">
                                                                        <i class="fa-solid fa-trash-can"></i>
                                                                    </div>
                                                                </button>
                                                            </form>
                                                            <a href="{{route('home.user.editphoto',$item->id)}}">
                                                                <button type="submit" class="bg-n">
                                                                    <div class="icon icon-ra icon-sm">
                                                                        <i class="fa-solid fa-pen"></i>
                                                                    </div>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-close df-c">
                                                        <button class="df-c">
                                                            <span>បិទទម្រង់</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="bg-item"></div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </section>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="{{asset('js/function/getdate.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/function/taketh.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/alert/alert.js')}}"></script>
    {{-- this is script for error  --}}
    <script type="text/javascript">
        // this is error
        @error('card_title')
            show_infor_alert("{{$message}}")
        @enderror
        @error('card_img')
            show_infor_alert("{{$message}}")
        @enderror
        // this is error photo
        @error('photo_title')
            show_infor_alert("{{$message}}")
        @enderror
        @error('photo_img')
            show_infor_alert("{{$message}}")
        @enderror
        @error('photo_status')
            show_infor_alert("{{$message}}")
        @enderror
    </script>
    {{-- this is script for item user  --}}
    <script type="text/javascript" src="{{asset('js/function/click_photo_monk_item.js')}}"></script>
    <!-- this is js for compress_image  -->
    <script src="{{asset('js/app/compress_image.js')}}"></script>
    <!-- ----------------------- -->
    <script type="text/javascript" src="{{asset('js/function/insert_image.js')}}"></script>

@endsection
