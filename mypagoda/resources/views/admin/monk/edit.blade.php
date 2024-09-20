@extends('layouts.adit')

@section('title','កែប្រែទិន្នន័យ | '.$monk->roleuser->title.''.$monk->first_name.''.$monk->last_name)

@section('style')

@endsection

@section('content')
    <form action="{{route('admin.monk.update',$monk->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="web-form web-form-active

        @if($errors->has('status') || $errors->has('first_name') || $errors->has('last_name') || $errors->has('type') || $errors->has('rol') || $errors->has('tell') || $errors->has('email') || $errors->has('password') || $errors->has('img'))
            web-form-active
        @endif"

        id="book-form">
            <div class="web-form-body">
                <!-- this is header  -->
                <div class="head df-s">
                    <div class="icon-ra icon-sm df-c" onclick="location.href='{{route('admin.monk')}}'">
                        <i class="fa-solid fa-arrow-left-long"></i>
                    </div>
                    <a><span>កែប្រែទិន្នន័យ{{$monk->first_name}} {{$monk->last_name}}</span></a>
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
                        <div class="main scroll-y" id="taget-height">
                            <div class="box bottom-05">
                                <!-- thi is title  -->
                                <div class="txt-title">
                                    <label for="#">គោតនាម</label>
                                    <div class="txt-title-box @error('first_name') error @enderror">
                                        <input type="text" name="first_name" placeholder="បញ្ចូលគោតនាមសង្ឃ" value="{{$monk->first_name}}">
                                    </div>
                                </div>
                                <!-- thi is title  -->
                                <div class="txt-title">
                                    <label for="#">នាមខ្លួន</label>
                                    <div class="txt-title-box @error('last_name') error @enderror">
                                        <input type="text" name="last_name" placeholder="បញ្ចូលនាមខ្លួនសង្ឃ" value="{{$monk->last_name}}">
                                    </div>
                                </div>
                                <!-- this is seclect  -->
                                <div class="txt-select">
                                    <ul>
                                        <li>
                                            <label for="#">ឧបសប្បទា</label>
                                            <div class="txt-select-list-con df-c @error('type') error @enderror">
                                                <select name="type" id="#">
                                                    <option value="{{$monk->type_id}}">{{$monk->typeuser->title}}</option>
                                                    @foreach($types as $type)
                                                        <option value="{{$type->id}}">{{$type->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- this is content photo  -->
                                <input type="file" id="txt_photo" name="img" onchange="previewImage(event,this,'.monk-insert_profile')" hidden="true">
                                <div class="txt-photo df-c @error('img') error @enderror" onclick="document.querySelector('#txt_photo').click()">
                                    <div class="txt-photo-box txt-photo-box-active monk-insert_profile" style="background: {{$monk->profile_bg}};">
                                        <ul>
                                            <li class="icon-ra-sm"><i class="fa-solid fa-photo-film"></i></li>
                                            <li><h2>បញ្ចូលរូបភាពព្រះសង្ឃ</h2></li>
                                            <li><p>រូបភាព(៩០០​X៩០០px)</p></li>
                                        </ul>
                                        <img src="{{ asset('storage/images/' . $monk->img_profile) }}" alt="showImage">
                                    </div>
                                </div>
                                <!-- this is for select color  -->
                                <div class="txt-range">
                                    <div class="box">
                                        <!-- this Is input for get sand color  -->
                                        <input type="text" class="txt_color" value="{{$monk->profile_bg}}" name="profile_bg" hidden>
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
                                <!-- thi is number of book  -->
                                <div class="txt-title">
                                    <label for="#">លេខទូរស័ព្ទ</label>
                                    <div class="txt-title-box @error('tell') error @enderror">
                                        <input type="text" name="tell" placeholder="បញ្ចូលលេខទូរស័ព្ទ" value="{{$monk->tell}}" >
                                    </div>
                                </div>
                                <!-- thi is rang of book  -->
                                <div class="txt-title">
                                    <label for="#">អ៊ីមែល</label>
                                    <div class="txt-title-box @error('email') error @enderror">
                                        <input type="text" name="email" placeholder="បញ្ចូលអ៊ីមែលព្រះសង្ឃ" value="{{$monk->email}}">
                                    </div>
                                </div>
                                <!-- thi is rang of book  -->
                                <div class="txt-title">
                                    <label for="#">លេខសម្ងាត់</label>
                                    <div class="txt-title-box @error('password') error @enderror">
                                        <input type="password" name="password" placeholder="បញ្ចូលលេខសម្ងាត់" value="{{$monk->password}}">
                                    </div>
                                </div>
                                <!-- this is seclect  -->
                                <div class="txt-select @error('rol') error @enderror">
                                    <ul>
                                        <li>
                                            <label for="#">ការងារ</label>
                                            <div class="txt-select-list-con df-c">
                                                <select name="rol" id="#">
                                                    <option value="{{$monk->role_id}}">{{$monk->roleuser->title}}</option>
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
                                                    <option value="{{$monk->position_id}}">{{$monk->positionuser->title}}</option>
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
                        <button type="submit" class="btn icon-ra">រក្សាទុក</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
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
    {{-- errro  --}}
    <script type="text/javascript">
        @error('status')
            New.alert({
                status: "info",
                title: "welcome",
                content: "{{$message}}",
                confirmbtn: false,
            });
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
