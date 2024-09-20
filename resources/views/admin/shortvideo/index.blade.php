@extends('layouts.admin')

@section('title','គ្រប់គ្រង់វីឌីអូ')

@section('cdn')
    <link rel="stylesheet" href="{{asset('css/admin/shortvideo.css')}}">
@endsection

@section('style')
    {{-- this is user list  --}}
    <link rel="stylesheet" href="{{asset('css/admin/user_list.css')}}">
@endsection

@section('form')
    <!-- this is form for Add video  -->
    <form action="{{route('admin.video.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="web-form

        @if($errors->has('status') || $errors->has('title')||$errors->has('img') ||$errors->has('creator_id') || $errors->has('link'))
            web-form-active
        @endif

        " id="video-form">
            <div class="web-form-body">
                <!-- this is header  -->
                <div class="head df-s">
                    <a class="df-l">
                        <span class="icon icon-ra icon-ra-sm">
                            <img class="img-co" src="{{asset('images/favicon.png')}}" alt="">
                        </span>
                    </a>
                    <a><span>ទម្រង់បង្កើតវីឌីអូ</span></a>
                    <div class="icon-ra icon-sm df-c" onclick="toggleClass('#video-form')">
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
                                    <div class="status df-c @error('status') error @enderror">
                                        <select name="status" id="#">
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
                                <div class="txt-title">
                                    <label for="#">ចំណងជើង</label>
                                    <div class="txt-title-box @error('title') error @enderror">
                                        <input type="text" placeholder="បញ្ចូលចំណងជើងវិឌីអូ" name="title" value="{{old('title')}}" class="vidoe-data-title">
                                    </div>
                                </div>
                                <!-- this is content photo  -->
                                <input type="file" id="txt_photo" name="img" onchange="previewImage(event,this,'.video_insert_photo',true,'.vidoe-data-title')" hidden="true">
                                <div class="txt-photo df-c video_insert_photo  @error('img') error @enderror" onclick="document.querySelector('#txt_photo').click()">
                                    <div class="txt-photo-box">
                                        <ul>
                                            <li class="icon-ra-sm"><i class="fa-solid fa-photo-film"></i></li>
                                            <li><h2>បញ្ចូលរូបភាពវីឌីអូ</h2></li>
                                            <li><p>រូបភាព(១៩២០X២៤០៦px)</p></li>
                                        </ul>
                                        <img src="" alt="showImage">
                                    </div>
                                </div>
                                <!-- thi is number of book  -->
                                <div class="txt-select">
                                    <ul>
                                        <li>
                                            <label for="#">សំដែងដោយ</label>
                                            <div class="txt-select-list-con df-c @error('creator_id') error @enderror">
                                                <select name="creator_id" id="#">
                                                    <option value="#">ជ្រើសរើស</option>
                                                    @foreach ($creators as $item)
                                                        <option value="{{$item->id}}">{{$item->khmer_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="txt-title">
                                    <label for="#">លិងវីឌីអូ</label>
                                    <div class="txt-title-box @error('link') error @enderror">
                                        <input type="text" name="link" placeholder="បញ្ចូលលិង" value="{{old('link')}}">
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
                        <button class="btn icon-ra">បង្ហោះវីឌីអូ</button>
                    </div>
                </div>
            </div>
            <div class="form-b" onclick="toggleClass('#video-form')"></div>
        </div>
    </form>
    {{-- this is form for create user creator  --}}
    <form action="{{route('admin.videocreator.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="web-form
        @if($errors->has('creator_status') || $errors->has('creator_name')|| $errors->has('creator_name_eng')|| $errors->has('creator_img')|| $errors->has('creator_type'))
         web-form-active
        @endif
        " id="creator-form">
            <div class="web-form-body">
                <!-- this is header  -->
                <div class="head df-s">
                    <a class="df-l">
                        <span class="icon icon-ra icon-ra-sm">
                            <img class="img-co" src="{{asset('images/favicon.png')}}" alt="">
                        </span>
                    </a>
                    <a><span>ទម្រង់បញ្ចូលអ្នកសំដែង</span></a>
                    <div class="icon-ra icon-sm df-c" onclick="toggleClass('#creator-form')">
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
                                    <div class="status df-c @error('creator_status') error @enderror">
                                        <select name="creator_status" id="#">
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
                                <div class="txt-title">
                                    <label for="#">ឈ្មោះអ្នកសំដែង</label>
                                    <div class="txt-title-box @error('creator_name') error @enderror">
                                        <input name="creator_name" type="text" placeholder="បញ្ចូលគោតនាមនិងនាមសំដែង">
                                    </div>
                                </div>
                                <!-- this is content photo  -->
                                <input type="file" id="creator_file_insert" name="creator_img" onchange="previewImage(event,this,'.creator_insert_photo')" hidden="true">
                                <div class="txt-photo df-c creator_insert_photo  @error('creator_img') error @enderror" onclick="document.querySelector('#creator_file_insert').click()">
                                    <div class="txt-photo-box">
                                        <ul>
                                            <li class="icon-ra-sm"><i class="fa-solid fa-photo-film"></i></li>
                                            <li><h2>បញ្ចូលរូបភាពព្រះសង្ឃ</h2></li>
                                            <li><p>រូបភាព(៩០០​X៩០០px)</p></li>
                                        </ul>
                                        <img src="" alt="showImage">
                                    </div>
                                </div>
                                <!-- thi is number of book  -->
                                <div class="txt-title">
                                    <label for="#">ឈ្មោះជាអក្សរឡាតាំង</label>
                                    <div class="txt-title-box @error('creator_name_eng') error @enderror">
                                        <input name="creator_name_eng" type="text" placeholder="បញ្ចូលគោតនាមនិងនាមអក្សរឡាតាំង">
                                    </div>
                                </div>
                                <!-- thi is number of book  -->
                                <div class="txt-title">
                                    <label for="#">ប្រភេទអ្នកសំដែង</label>
                                    <div class="txt-title-box @error('creator_type') error @enderror">
                                        <input name="creator_type" type="text" placeholder="បញ្ចូលប្រភេទអ្នកសំដែង">
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
                        <button class="btn icon-ra">បញ្ចូលអ្នកសំដែង</button>
                    </div>
                </div>
            </div>
            <div class="form-b" onclick="toggleClass('#creator-form')"></div>
        </div>
    </form>
@endsection

@section('content')
    <!-- this is content  -->
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
                                    <div class="icon icon-ra icon-sm"><i class="fa-solid fa-play"></i></div>
                                    <p>វីឌីអូមាន</p>
                                </div>
                                <div class="text">
                                    <h2>១០</h2>
                                   <div class="box df-l">
                                        <a onclick="taketh_ID('#video-form')" class="btn btn-ra btn-sm"><span>ធ្វើការបង្កើត</span><span><i class="fa-solid fa-plus"></i></span></a>
                                   </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <div class="row df-l">
                                    <div class="icon icon-ra icon-sm"><i class="fa-solid fa-circle-user"></i></div>
                                    <p>អ្នកសំដែង(creator)</p>
                                </div>
                                <div class="text">
                                    <h2>{{englishToKhmer($creator_num)}}</h2>
                                   <div class="box df-l">
                                        <a onclick="taketh_ID('#creator-form')" class="btn btn-ra btn-sm"><span>ធ្វើការបង្កើត</span><span><i class="fa-solid fa-plus"></i></span></a>
                                   </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- this is actical  -->
            <section class="web-section db-c short-video" id="art-books">
                <!-- this is content  -->
                <div class="web-section-body db-c">
                    <div class="box">
                        <table>
                            <tbody>
                                <tr>
                                    <th colspan="3">ចំណងជើង</th>
                                    <th>ពេលវេលា</th>
                                    <th>អ្នកបង្កើត</th>
                                    <th>លិងមាតិកា</th>
                                    <th>ស្ថានភាព</th>
                                    <th>ការកែប្រែ</th>
                                </tr>
                                @foreach ($videos as $video)

                                <tr>
                                    <td>
                                        <div class="box df-l">
                                            <div class="img">
                                                <img class="img-c" src="{{asset('storage/images/'.$video->img)}}" alt="">
                                            </div>
                                            <div class="text">
                                                <p>{{$video->title}}</p>
                                                <h2><span>វីឌីអូបង្ហោះដោយ៖ {{$video->userpost->first_name}} {{$video->userpost->last_name}}</span><span><i class="fa-solid fa-circle-check"></i></span></h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                       <form action="{{route('admin.video.delete',$video->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="bg-n" onclick="alert_delete(event)">
                                                <div class="btn btn-ra btn-delete"><span>លុបអត្ថបទ</span></div>
                                            </button>
                                       </form>
                                    </td>
                                    <td>
                                        <button class="btn btn-ra icon-ra-sm btn-status">
                                            <span><i class="fa-solid fa-ellipsis-vertical"></i></span>
                                            <ul>
                                                <li class="btn btn-ra btn-delete"><i class="fa-solid fa-pen-to-square"></i><span>ធ្វើការកែប្រែ</span></li>
                                                <li class="btn btn-ra btn-delete"><i class="fa-solid fa-trash"></i><span>លុបអត្ថបទ</span></li>
                                            </ul>
                                        </button>
                                    </td>
                                    <td>{{ dateKhmerNumber($video->created_at) }}</td>
                                    <td>{{$video->userCreator->khmer_name}}</td>
                                    <td>
                                        @if($video->link !== "")
                                        មាតិកា
                                        @else
                                        មិនមាន
                                        @endif
                                    </td>
                                    <td>
                                        {{$video->status == '1' ? 'សាធារណៈ' : 'ឯកជន'}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.video.edit',$video->id)}}">
                                            <span>កែប្រែ</span><i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- this is footer  -->
                    <div class="tb-foot df-c dn">
                        <div class="box df-c">
                            <button class="icon icon-ra icon-ra-sm over-h right-05"><i class="fa-solid fa-chevron-left"></i></button>
                            <ul class="df-c">
                                <li data-id="1" class="btn icon-ra-sm active"><span>០១</span></li>
                                <li data-id="1" class="btn icon-ra-sm"><span>០២</span></li>
                                <li data-id="1" class="btn icon-ra-sm"><span>០៣</span></li>
                                <li data-id="1" class="btn icon-ra-sm"><span>០៤</span></li>
                                <li data-id="1" class="btn icon-ra-sm"><span>០៥</span></li>
                            </ul>
                            <button class="icon icon-ra icon-ra-sm over-h left-05"><i class="fa-solid fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    {{-- this is user creator --}}
    <aside class="user_list">
        <div class="user_list-head db-c">
           <div class="box df-s">
                <h2>បង្ហាញអ្នកបង្កើតមាតិកា</h2>
                <button class="icon icon-ra icon-sm" onclick="toggleClass('.user_list','user_list-active')">
                    <i class="fa-solid fa-plus"></i>
                </button>
           </div>
        </div>
        <div class="user_list_content scroll-y">
            <div class="user_list_content-box">
                <table>
                    <tbody>
                        <tr>
                            <th>ចំណងជើង</th>
                            <th>កែប្រែ</th>
                            <th>លុបទិន្នន័យ</th>
                        </tr>

                        @foreach ($creators as $creator)
                        <tr>
                            <td>
                                <div class="box-user df-l">
                                    <div class="td-img icon profile icon-ra icon-sm">
                                        <img class="img-c" src="{{asset('storage/images/'.$creator->img)}}" alt="">
                                    </div>
                                    <div class="text">
                                        <h2>{{$creator->khmer_name}}</h2>
                                        <p>@ {{$creator->english_name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{route('admin.videocreator.edit',$creator->id)}}" class="box df-c icon icon-ra icon-s">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </div>
                            </td>
                            <td>
                                <form action="#" method="POST">
                                    <div class="box df-c icon icon-ra icon-s">
                                        <button type="submit" class="b-n"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="web-sider-noti-head df-l"></div>
    </aside>
@endsection

@section('script')
    <script type="text/javascript">
        @error('status')
            show_infor_alert("{{$message}}")
        @enderror
        @error('title')
            show_infor_alert("{{$message}}")
        @enderror
        @error('img')
            show_infor_alert("{{$message}}")
        @enderror
        @error('creator_id')
            show_infor_alert("{{$message}}")
        @enderror
        @error('link')
            show_infor_alert("{{$message}}")
        @enderror
        // this is success
        @if(session()->has('success'))
            New.alert({
                status: "success",
                title: "welcome",
                content: "{{ session()->get('success') }}",
                confirmbtn: false,
            });
        @endif

        // this is creator
        @error('creator_status')
            show_infor_alert("{{$message}}")
        @enderror
        @error('creator_name')
            show_infor_alert("{{$message}}")
        @enderror
        @error('creator_name_eng')
            show_infor_alert("{{$message}}")
        @enderror
        @error('creator_img')
            show_infor_alert("{{$message}}")
        @enderror
        @error('creator_img')
            show_infor_alert("{{$message}}")
        @enderror
    </script>
@endsection
