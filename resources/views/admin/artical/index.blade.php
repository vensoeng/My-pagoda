@extends('layouts.admin')
@section('title','គ្រប់គ្រង់អត្តបទ')

@section('style')
    <style>
        #art-books table{
            min-width: max-content;
        }
        #art-books .web-section-body > .box{
            width: 100%;
            overflow: scroll;
            max-height: 80vh;
        }
        #art-books table tr:first-child{
            top: 0px;
        }
    </style>
@endsection

@section('form')
    <form action="{{route('admin.artical.store')}}" method="POST" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
        @csrf
        <div class="web-form
            @if($errors->has('status') || $errors->has('title') || $errors->has('img') || $errors->has('editor') || $errors->has('type') || $errors->has('text_file') || $errors->has('descript') )
            web-form-active
            @endif

        " id="artical-form">
            <div class="web-form-body">
                <!-- this is header  -->
                <div class="head df-s">
                    <a class="df-l">
                        <span class="icon icon-ra icon-ra-sm">
                            <img class="img-co" src="{{asset('images/favicon.png')}}" alt="">
                        </span>
                    </a>
                    <a><span>ទម្រង់បញ្ចូលអត្ថបទ</span></a>
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
                                    <div class="txt-title-box @error('title') error @enderror" value="{{old('title')}}">
                                        <input name="title" type="text" placeholder="បញ្ចូលចំណងជើងអត្ថបទ">
                                    </div>
                                </div>
                                {{-- this is description for artical  --}}
                                <div class="text-caption">
                                    <label for="#">ពិពណ៌នា</label>
                                    <div class="txt-caption-box @error('descript') error @enderror" data-replicated-value="null">
                                        <textarea name="descript" id="data-text" oninput="this.parentNode.dataset.replicatedValue = this.value" onblur="this.parentNode.dataset.replicatedValue = null" onclick="this.parentNode.dataset.replicatedValue = this.value" cols="30" rows="0" placeholder="សរសេរការពិពណ៌នារបស់អ្នក?">{{old('descript')}}</textarea>
                                    </div>
                                </div>
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
                                <!-- thi is number of book  -->
                                <div class="txt-title">
                                    <label for="#">អត្ថបទដោយ</label>
                                    <div class="txt-title-box @error('creator') error @enderror">
                                        <input type="text" name="creator" value="{{old('creator')}}" placeholder="បញ្ចូលឈ្មោះអ្នកសរសេរ">
                                    </div>
                                </div>
                                <div class="txt-title">
                                    <label for="#">បញ្ចូលឯកសារ</label>
                                    <div class="txt-title-box @error('file') error @enderror">
                                        <input type="file" name="text_file" class="text_file">
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
                        <button class="btn icon-ra">បង្ហោះអត្ថបទ</button>
                    </div>
                </div>
            </div>
            <div class="form-b" onclick="toggleClass('#artical-form')"></div>
        </div>
    </form>
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
                                        <a onclick="taketh_ID('#artical-form')" class="btn btn-ra btn-sm"><span>ធ្វើការបង្កើត</span><span><i class="fa-solid fa-plus"></i></span></a>
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
                                        <a href="{{ route('admin.book') }}" class="btn btn-ra btn-sm"><span>ទៅកាន់សៀវភៅ</span><span><i class="fa-solid fa-arrow-right"></i></span></a>
                                </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- this is actical  -->
            <section class="web-section db-c" id="art-books">
                <!-- this is content  -->
                <div class="web-section-body db-c">
                    <div class="box">
                        <table class="artical_data_location">
                            <tbody>
                                <tr>
                                    <th colspan="3">ចំណងជើង</th>
                                    <th>ពេលវេលា</th>
                                    <th>ស្ថានភាព</th>
                                    <th>អត្តបទដោយ</th>
                                    <th>ការកែប្រែ</th>
                                </tr>
                                @foreach ($articals as $artical)

                                    <tr>
                                        <td>
                                            <div class="box df-l">
                                                <div class="img data-location" data-id="{{route('home.checkArtical',$artical->id)}}">
                                                    <img src="{{asset('storage/images/'.$artical->img)}}" alt="">
                                                </div>
                                                <div class="text">
                                                    <p>{{$artical->title}}</p>
                                                    <h2><span>បង្ហោះដោយ៖ {{$artical->userpost->first_name}} {{$artical->userpost->last_name}}</span><span><i class="fa-solid fa-circle-check"></i></span></h2>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                        <form action="{{route('admin.artical.delete',$artical->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return alert_delete(event);" class="bg-n">
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
                                        <td>{{ dateKhmerNumber($artical->created_at) }}</td>
                                        <td>
                                            @if($artical->desript !== '')
                                            ពិពណ៌នា
                                            @else
                                            មិនពិពណ៌នា
                                            @endif
                                        </td>
                                        <td>{{$artical->creator == '' ? 'មិនដាក់ឈ្មោះ' : $artical->creator}}</td>
                                        <td><a href="{{route('admin.artical.edit',$artical->id)}}"><span>កែប្រែ</span><i class="fa-solid fa-pen-to-square"></i></a></td>
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

        @error('title')
            show_infor_alert("{{$message}}")
        @enderror
        @error('status')
            show_infor_alert("{{$message}}")
        @enderror
        @error('descript')
            show_infor_alert("{{$message}}")
        @enderror
        @error('creator')
            show_infor_alert("{{$message}}")
        @enderror
        @error('img')
            show_infor_alert("{{$message}}")
        @enderror
        @error('text_file')
            show_infor_alert("{{$message}}")
        @enderror
    </script>
    {{-- this is for location go  --}}
    <script type="text/javascript" src="{{asset('js/function/location.js')}}"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            location_go('.artical_data_location',true);
        });
    </script>
@endsection
