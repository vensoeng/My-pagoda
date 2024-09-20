@extends('layouts.adit')

@section('title','កែប្រែទិន្នន័យសៀវភៅ | '.$festival->title)

@section('content')
    <form action="{{route('admin.festival.update',$festival->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT');
        <div class="web-form web-form-active" id="artical-form">
            <div class="web-form-body">
                <!-- this is header  -->
                <div class="head df-s">
                    <div class="icon-ra icon-sm df-c" onclick="location.href='{{route('admin.festival')}}'">
                        <i class="fa-solid fa-arrow-left-long"></i>
                    </div>
                    <a><span>កែប្រែទិន្នន័យបុណ្យ</span></a>
                    <a class="df-l">
                        <span class="icon icon-ra icon-ra-sm">
                            <img class="img-co" src="{{asset('images/favicon.png')}}" alt="">
                        </span>
                    </a>
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
                        <div class="main scroll-y" id="taget-height">
                            <div class="box bottom-05">
                                <!-- thi is title  -->
                                <div class="txt-title">
                                    <label for="#">ចំណងជើង</label>
                                    <div class="txt-title-box @error('title') error @enderror">
                                        <input type="text" name="title" placeholder="បញ្ចូលគោតនាមសង្ឃ" value="{{$festival->title}}">
                                    </div>
                                </div>
                                <!-- this is content photo  -->
                                <input type="file" id="txt_photo" name="img" onchange="previewImage(event,this,'.festival_insert_photo')" hidden="true">
                                <div class="txt-photo df-c festival_insert_photo  @error('img') error @enderror" onclick="document.querySelector('#txt_photo').click()">
                                    <div class="txt-photo-box txt-photo-box-active">
                                        <ul>
                                            <li class="icon-ra-sm"><i class="fa-solid fa-photo-film"></i></li>
                                            <li><h2>បញ្ចូលរូបភាពវីឌីអូ</h2></li>
                                            <li><p>រូបភាព(១៩២០X២៤០៦px)</p></li>
                                        </ul>
                                        <img src="{{asset('storage/images/'.$festival->img)}}" alt="showImage">
                                    </div>
                                </div>
                                <!-- thi is number of book  -->
                                <div class="txt-title">
                                    <label for="#">ចំនួនរូបភាព</label>
                                    <div class="txt-title-box @error('length_photo') error @enderror">
                                        <input type="text" name="length_photo" placeholder="បញ្ចូលឈ្មោះអ្នកសរសេរ" value="{{$festival->length_photo}}">
                                    </div>
                                </div>
                                <div class="txt-title">
                                    <label for="#">លិងរូបភាព</label>
                                    <div class="txt-title-box @error('link') error @enderror">
                                        <input type="text" name="link" value="{{$festival->link}}" placeholder="បញ្ចូលលិង">
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
                        <button type="submit" class="btn icon-ra">រក្សាទុក</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script type="text/javascript">
        // this is error
        @error('status')
            show_infor_alert("{{$message}}")
        @enderror
        @error('title')
            show_infor_alert("{{$message}}")
        @enderror
        @error('img')
            show_infor_alert("{{$message}}")
        @enderror
        @error('length_photo')
            show_infor_alert("{{$message}}")
        @enderror
        @error('link')
            show_infor_alert("{{$message}}")
        @enderror
    </script>
@endsection
