@extends('layouts.adit')

@section('title','ប្រវត្តរូបរបស់អ្នក')

@section('content')
    <form action="{{route('home.user.update',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="web-form web-form-active" id="book-form">
            <div class="web-form-body">
                <!-- this is header  -->
                <div class="head df-s">
                    <div class="icon-ra icon-sm df-c" onclick="location.href='{{route('home.user')}}'">
                        <i class="fa-solid fa-arrow-left-long"></i>
                    </div>
                    <a><span>ប្រវត្តរូបរបស់អ្នក</span></a>
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
                                    <div class="status df-c">
                                        <select name="status" id="#" disabled>
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
                                    <label for="#">បញ្ចូលការងាររបស់អ្នក</label>
                                    <div class="txt-title-box @error('workin') error @enderror">
                                        <input type="text" name="workin" placeholder="អាត្មាភាពជាសមណៈសិស្សវត្តជប់?" value="{{$user->userinfor->workin}}">
                                    </div>
                                </div>
                                <div class="text-caption">
                                    <label for="#">ពិពណ៌នាអំពីខ្លួនអ្នក</label>
                                    <div class="txt-caption-box  @error('bio') error @enderror" data-replicated-value="null">
                                        <textarea name="bio" placeholder="ពិភពលោកនឹងស្រស់បំព្រង់ប្រសិនបើយើងរួមគ្នាធ្វើសេចក្ដីល្អ?" id="data-text" oninput="this.parentNode.dataset.replicatedValue = this.value" onblur="this.parentNode.dataset.replicatedValue = null" onclick="this.parentNode.dataset.replicatedValue = this.value" cols="30" rows="5">{{$user->userinfor->bio}}</textarea>
                                    </div>
                                </div>
                                <!-- this is content photo  -->
                                <input type="file" id="txt_photo" name="img_cover" onchange="previewImage(event,this,'.monk-insert_profile')" hidden="true">
                                <div class="txt-photo df-c @error('img_cover') error @enderror" onclick="document.querySelector('#txt_photo').click()">
                                    <div class="txt-photo-box txt-photo-box-active monk-insert_profile" style="background: {{$user->profile_bg}};">
                                        <ul>
                                            <li class="icon-ra-sm"><i class="fa-solid fa-photo-film"></i></li>
                                            <li><h2>បញ្ចូលរូបភាពផ្ទៃក្រោយ</h2></li>
                                            <li><p>រូបភាព(១៤៥៧​X៦៤០px)</p></li>
                                        </ul>
                                        @if( $user->userinfor->img_cover == "")
                                        <img src="{{ asset('storage/images/'.$slide->img) }}" alt="showImage">
                                        @else
                                        <img src="{{ asset('storage/images/' . $user->userinfor->img_cover) }}" alt="showImage">
                                        @endif
                                    </div>
                                </div>
                                <!-- thi is number of book  -->
                                <div class="txt-title">
                                    <label for="#">លេខទូរស័ព្ទ</label>
                                    <div class="txt-title-box @error('tell') error @enderror">
                                        <input type="text" name="tell" placeholder="បញ្ចូលលេខទូរស័ព្ទ" value="{{$user->tell}}" >
                                    </div>
                                </div>
                                <!-- thi is rang of book  -->
                                <div class="txt-title">
                                    <label for="#">អ៊ីមែល</label>
                                    <div class="txt-title-box @error('email') error @enderror">
                                        <input type="text" name="email" placeholder="បញ្ចូលអ៊ីមែលព្រះសង្ឃ" value="{{$user->email}}">
                                    </div>
                                </div>
                                <!-- thi is rang of book  -->
                                <div class="txt-title">
                                    <label for="#">លេខសម្ងាត់</label>
                                    <div class="txt-title-box @error('password') error @enderror">
                                        <input type="password" name="password" placeholder="បញ្ចូលលេខសម្ងាត់" value="">
                                    </div>
                                </div>
                                <div class="txt-title">
                                    <label for="#">ភូមិកំណើត</label>
                                    <div class="txt-title-box @error('village') error @enderror">
                                        <input type="text" name="village" placeholder="បញ្ចូលលេខសម្ងាត់" value="{{$user->userinfor->village}}">
                                    </div>
                                </div>
                                <div class="txt-title">
                                    <label for="#">ឃុំកំណើត</label>
                                    <div class="txt-title-box @error('Commune') error @enderror">
                                        <input type="text" name="Commune" placeholder="បញ្ចូលលេខសម្ងាត់" value="{{$user->userinfor->Commune}}">
                                    </div>
                                </div>
                                <div class="txt-title">
                                    <label for="#">ស្រុកកំណើត</label>
                                    <div class="txt-title-box @error('district') error @enderror">
                                        <input type="text" name="district" placeholder="បញ្ចូលលេខសម្ងាត់" value="{{$user->userinfor->district}}">
                                    </div>
                                </div>
                                <div class="txt-title">
                                    <label for="#">ខេត្តកំណើត</label>
                                    <div class="txt-title-box @error('province') error @enderror">
                                        <input type="text" name="province" placeholder="បញ្ចូលលេខសម្ងាត់" value="{{$user->userinfor->province}}">
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
        document.addEventListener('DOMContentLoaded', () => {
            // Scroll the body to 50px from the top with smooth scrolling
            window.scrollTo({
            top: 100,
            behavior: 'smooth'
            });
        });
        // this is error
        @error('workin')
            show_infor_alert("{{$message}}")
        @enderror
        @error('bio')
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
        @error('village')
            show_infor_alert("{{$message}}")
        @enderror
        @error('Commune')
            show_infor_alert("{{$message}}")
        @enderror
        @error('district')
            show_infor_alert("{{$message}}")
        @enderror
        @error('province')
            show_infor_alert("{{$message}}")
        @enderror
        @error('img_cover')
            show_infor_alert("{{$message}}")
        @enderror
        // show_success_alert();
    </script>
@endsection
