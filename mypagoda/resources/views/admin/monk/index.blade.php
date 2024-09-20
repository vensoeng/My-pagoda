@extends('layouts.admin')

@section('title','គ្រប់គ្រង់ព្រះសង្ឃ')

@section('cdn')
    <link rel="stylesheet" href="{{asset('css/admin/shortvideo.css')}}">
@endsection

@section('form')
    <form action="{{route('admin.monk.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="web-form 

        @if($errors->has('status') || $errors->has('first_name') || $errors->has('last_name') || $errors->has('type') || $errors->has('rol') || $errors->has('tell') || $errors->has('email') || $errors->has('password') || $errors->has('img'))
            web-form-active
        @endif" 

        id="book-form">
            <div class="web-form-body">
                <!-- this is header  -->
                <div class="head df-s">
                    <a class="df-l">
                        <span class="icon icon-ra icon-ra-sm">
                            <img class="img-co" src="{{asset('images/favicon.png')}}" alt="">
                        </span>
                    </a>
                    <a><span>ទម្រង់បញ្ចូលព្រះសង្ឃ</span></a>
                    <div class="icon-ra icon-sm df-c" onclick="document.querySelector('#book-form').classList.toggle('web-form-active')">
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
                                    <div class="profile-img df-c icon icon-ra icon-ra-sm">
                                        <img class="img-c" src="{{asset('storage/images/'.$admin->img_profile)}}" alt="">
                                    </div>
                                    <div class="profile-name left-05">
                                        <h2>{{$admin->first_name}} {{$admin->last_name}}</h2>
                                        <p class="taget_date">ថ្ងៃទី២ ខែកុម្ភះ ឆ្នាំ២៥៦៦</p>
                                    </div>
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
                                    <label for="#">គោតនាម</label>
                                    <div class="txt-title-box @error('first_name') error @enderror">
                                        <input type="text" name="first_name" placeholder="បញ្ចូលគោតនាមសង្ឃ" value="{{old('first_name')}}">
                                    </div>
                                </div>
                                <!-- thi is title  -->
                                <div class="txt-title">
                                    <label for="#">នាមខ្លួន</label>
                                    <div class="txt-title-box @error('last_name') error @enderror">
                                        <input type="text" name="last_name" placeholder="បញ្ចូលនាមខ្លួនសង្ឃ" value="{{old('last_name')}}">
                                    </div>
                                </div>
                                <!-- this is seclect  -->
                                <div class="txt-select">
                                    <ul>
                                        <li>
                                            <label for="#">ឧបសប្បទា</label>
                                            <div class="txt-select-list-con df-c @error('type') error @enderror">
                                                <select name="type" id="#">
                                                    @foreach($types as $type)
                                                        <option value="{{$type->id}}">{{$type->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- this is content photo  -->
                                <input type="file" id="txt_photo" name="img" onchange="previewImage(event,this,'.soeng_monk_image_insert')" hidden="true">
                                <div class="txt-photo df-c @error('img') error @enderror" onclick="document.querySelector('#txt_photo').click()">
                                    <div class="txt-photo-box soeng_monk_image_insert" style="background: {{old('txt_color')}};">
                                        <ul>
                                            <li class="icon-ra-sm"><i class="fa-solid fa-photo-film"></i></li>
                                            <li><h2>បញ្ចូលរូបភាពព្រះសង្ឃ</h2></li>
                                            <li><p>រូបភាព(៩០០​X៩០០px)</p></li>
                                        </ul>
                                        <img src="" alt="showImage">
                                    </div>
                                </div>
                                <!-- this is for select color  -->
                                <div class="txt-range">
                                    <div class="box">
                                        <!-- this Is input for get sand color  -->
                                        <input type="text" class="txt_color" value="{{old('txt_color')}}" name="profile_bg" hidden>
                                        <div hidden><input type="color" id="txt_custom_color" value="#e94a4a"></div>
                                        <ul class="ul_choose_color">
                                            <li class="df-l"><a style="background: #e94a4a;" data-color="#e94a4a" href="#" class="icon icon-ra icon-ra-sm"></a></li>
                                            <li class="df-l"><a style="background: #d7ad31;" data-color="#d7ad31" href="#" class="icon icon-ra icon-ra-sm"></a></li>
                                            <li class="df-l"><a style="background: #F9AC60;" data-color="#F9AC60" href="#" class="icon icon-ra icon-ra-sm"></a></li>
                                            <li class="df-l"><a style="background: #917e61;" data-color="#917e61" href="#" class="icon icon-ra icon-ra-sm"></a></li>
                                            <li class="df-l"><a style="background: #7c1d17;" data-color="#7c1d17" href="#" class="icon icon-ra icon-ra-sm"></a></li>
                                            <li class="df-l"><a style="background: #ee7a2c;" data-color="#ee7a2c" href="#" class="icon icon-ra icon-ra-sm"></a></li>
                                            <li class="df-l"><a style="background: #992f2f;" data-color="#992f2f" href="#" class="icon icon-ra icon-ra-sm"></a></li>
                                            <li class="df-l"><a style="background: #dd4e34;" data-color="#dd4e34" href="#" class="icon icon-ra icon-ra-sm"></a></li>
                                            <li class="df-l"><a style="background: #ff7e46;" data-color="#ff7e46" href="#" class="icon icon-ra icon-ra-sm"></a></li>
                                            <li class="df-l">
                                                <a href="#" class="icon icon-ra icon-ra-sm custom_color">
                                                    <label for="txt_custom_color" class="df-c"><i class="fa-solid fa-plus"></i></label>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- thi is number of tell  -->
                                <div class="txt-title">
                                    <label for="#">លេខទូរស័ព្ទ</label>
                                    <div class="txt-title-box @error('tell') error @enderror">
                                        <input type="text" name="tell" placeholder="បញ្ចូលលេខទូរស័ព្ទ" value="{{old('tell')}}" >
                                    </div>
                                </div>
                                <!-- thi is email of monk  -->
                                <div class="txt-title">
                                    <label for="#">អ៊ីមែល</label>
                                    <div class="txt-title-box @error('email') error @enderror">
                                        <input type="text" name="email" placeholder="បញ្ចូលអ៊ីមែលព្រះសង្ឃ" value="{{old('email')}}">
                                    </div>
                                </div>
                                <!-- thi is password of monk -->
                                <div class="txt-title">
                                    <label for="#">លេខសម្ងាត់</label>
                                    <div class="txt-title-box @error('password') error @enderror">
                                        <input type="password" name="password" placeholder="បញ្ចូលលេខសម្ងាត់" value="{{old('password')}}">
                                    </div>
                                </div>
                                <!-- this is seclect  -->
                                <div class="txt-select @error('rol') error @enderror">
                                    <ul>
                                        <li>
                                            <label for="#">ការងារ</label>
                                            <div class="txt-select-list-con df-c">
                                                <select name="rol" id="#">
                                                    @foreach($rols as $rol)
                                                        <option value="{{$rol->id}}">{{$rol->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- this is seclect  -->
                                <div class="txt-select @error('rol') error @enderror">
                                    <ul>
                                        <li>
                                            <label for="#">មុខតំណែង</label>
                                            <div class="txt-select-list-con df-c">
                                                <select name="position" id="#">
                                                    <option value="">ជ្រើសរើស</option>
                                                    @foreach($positions as $position)
                                                    <option value="{{$position->id}}">{{ $position->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
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
                        <button type="submit" class="btn icon-ra">បង្ហោះព្រះសង្ឃ</button>
                    </div>
                </div>
            </div>
            <div class="form-b" onclick="document.querySelector('#book-form').classList.toggle('web-form-active')"></div>
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
                                    <div class="icon icon-ra icon-sm"><i class="fa-solid fa-hands-praying"></i></div>
                                    <p>ភិក្ខុភាវៈ</p>
                                </div>
                                <div class="text">
                                    <h2 class="change_text">
                                        @if(isset($manmonk))
                                            {{$manmonk}}
                                        @endif
                                    </h2>
                                <div class="box df-l">
                                        <a onclick="document.querySelector('#book-form').classList.toggle('web-form-active')" class="btn btn-ra btn-sm"><span>ធ្វើការបង្កើត</span><span><i class="fa-solid fa-plus"></i></span></a>
                                </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <div class="row df-l">
                                    <div class="icon icon-ra icon-sm"><i class="fa-solid fa-hands-praying"></i></div>
                                    <p>សាមណេរភាវៈ​</p>
                                </div>
                                <div class="text">
                                    <h2 class="change_text">
                                        @if(isset($sonmonk))
                                            {{$sonmonk}}
                                        @endif
                                    </h2>
                                <div class="box df-l">
                                        <a href="#" class="btn btn-ra btn-sm"><span>ធ្វើការបង្កើត</span><span><i class="fa-solid fa-plus"></i></span></a>
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
                                    <th colspan="2">គោតនាមនិងនាមខ្លួន</th>
                                    <th>មុខតំណែង</th>
                                    <th>អ៊ីមែល</th>
                                    <th>លេខទូរស័ព្ទ</th>
                                    <th>តួនាទី</th>
                                    <th>ស្ថានភាព</th>
                                    <th>ការកែប្រែ</th>
                                </tr>

                                @foreach($monks as $monk)
                                <tr>
                                    <td>
                                        <div class="box df-l">
                                            <div class="img" style="background: {{$monk->profile_bg}};">
                                                <img class="img-c" src="{{asset('storage/images/'.$monk->img_profile)}}" alt="">
                                            </div>
                                            <div class="text">
                                                <p>{{$monk->first_name}} {{$monk->last_name}}</p>
                                                <h2><span>ឧបសប្បទា៖ {{$monk->typeuser->title}}</span></h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-ra icon-ra-sm btn-status">
                                            <span><i class="fa-solid fa-ellipsis-vertical"></i></span>
                                        </button>
                                    </td>
                                    <td>{{$monk->positionuser->title}}</td>
                                    <td>{{$monk->email}}</td>
                                    <td>{{$monk->tell}}</td>
                                    <td>{{$monk->roleuser->title}}</td>
                                    <td>{{$monk->status == '1' ? 'សាធារណៈ' : 'ឯកជន'}}</td>
                                    <td><a href="{{route('admin.monk.edit',$monk->id)}}"><span>កែប្រែ</span><i class="fa-solid fa-pen-to-square"></i></a></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- this is footer  -->
                    <div class="tb-foot dn">
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
    {{-- this is for insert image from user to show in form  --}}
    <script type="text/javascript">
        // ============================this is for add image and show image==============>
        var boxShowImg = document.querySelector('.web-form-body .main .txt-photo-box');
        var boxImg = document.querySelector('.web-form-body .main .txt-photo-box img');
        // ================this is for set background color for monk======================>
        var txtCustemColor = document.querySelector('#txt_custom_color');
        var txtColor = document.querySelector('.txt_color');
        var ulChooseColor = document.querySelectorAll('.ul_choose_color a');
        var listCustemColor = document.querySelector('.custom_color');
        txtCustemColor.addEventListener('input', function(){
            txtColor.value = txtCustemColor.value;
            boxShowImg.style.backgroundColor = txtCustemColor.value;
        });
        ulChooseColor.forEach(e => {
            e.addEventListener('click',function(){
                boxShowImg.style.backgroundColor = this.getAttribute('data-color');
            })
        });
    </script>
    {{-- this is alert when user insert data or update or delete  --}}
    <script type="text/javascript" src="{{asset('js/alert/alert.js')}}"></script>
    <script type="text/javascript">
        @if(session()->has('success'))
            New.alert({
                status: "success",
                title: "welcome",
                content: "{{ session()->get('success') }}",
                confirmbtn: false,
            });
        @endif

        @error('status')
            show_infor_alert("{{$message}}")
        @enderror

        @error('first_name')
            show_infor_alert("{{$message}}")
        @enderror

        @error('last_name')
            show_infor_alert("{{$message}}")
        @enderror

        @error('type')
            show_infor_alert("{{$message}}")
        @enderror

        @error('rol')
            show_infor_alert("{{$message}}")
        @enderror
        
        @error('position')
            show_infor_alert("{{$message}}")
        @enderror
        
        @error('tell')
            show_infor_alert("{{$message}}")
        @enderror

        @error('email')
            show_infor_alert("{{$message}}")
        @enderror

        @error('password')
            show_infor_alert("{{$message}}")
        @enderror

        @error('img')
            show_infor_alert("{{$message}}")
        @enderror
        // show_success_alert();
    </script>
@endsection