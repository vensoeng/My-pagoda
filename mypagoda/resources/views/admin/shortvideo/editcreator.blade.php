@extends('layouts.adit')

@section('title','កែប្រែទិន្នន័យសៀវភៅ ')

@section('content')
    <form action="{{route('admin.videocreator.update',$videocreator->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT');
        <div class="web-form web-form-active" id="artical-form">
            <div class="web-form-body">
                <!-- this is header  -->
                <div class="head df-s">
                    <div class="icon-ra icon-sm df-c" onclick="location.href='{{route('admin.video')}}'">
                        <i class="fa-solid fa-arrow-left-long"></i>
                    </div>
                    <a><span>កែប្រែទិន្នន័យអ្នកសំដែង</span></a>
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
                                        <select name="creator_status" id="#">
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
                                    <label for="#">ឈ្មោះអ្នកសំដែង</label>
                                    <div class="txt-title-box @error('creator_name') error @enderror">
                                        <input name="creator_name" type="text" placeholder="បញ្ចូលគោតនាមនិងនាមសំដែង" value="{{$videocreator->khmer_name}}">
                                    </div>
                                </div>
                                <!-- this is content photo  -->
                                <input type="file" id="creator_file_insert" name="creator_img" onchange="previewImage(event,this,'.creator_insert_photo')" hidden="true">
                                <div class="txt-photo df-c creator_insert_photo  @error('creator_img') error @enderror" onclick="document.querySelector('#creator_file_insert').click()">
                                    <div class="txt-photo-box txt-photo-box-active">
                                        <ul>
                                            <li class="icon-ra-sm"><i class="fa-solid fa-photo-film"></i></li>
                                            <li><h2>បញ្ចូលរូបភាពព្រះសង្ឃ</h2></li>
                                            <li><p>រូបភាព(៩០០​X៩០០px)</p></li>
                                        </ul>
                                        <img src="{{asset('storage/images/'.$videocreator->img)}}" alt="showImage">
                                    </div>
                                </div>
                                <!-- thi is number of book  -->
                                <div class="txt-title">
                                    <label for="#">ឈ្មោះជាអក្សរឡាតាំង</label>
                                    <div class="txt-title-box @error('creator_name_eng') error @enderror">
                                        <input name="creator_name_eng" type="text" placeholder="បញ្ចូលគោតនាមនិងនាមអក្សរឡាតាំង" value="{{$videocreator->english_name}}">
                                    </div>
                                </div>
                                <!-- thi is number of book  -->
                                <div class="txt-title">
                                    <label for="#">ប្រភេទអ្នកសំដែង</label>
                                    <div class="txt-title-box @error('creator_type') error @enderror">
                                        <input name="creator_type" type="text" placeholder="បញ្ចូលប្រភេទអ្នកសំដែង" value="{{$videocreator->creator_type}}">
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
                        <button class="btn icon-ra">រក្សាទុក</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script type="text/javascript">
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
