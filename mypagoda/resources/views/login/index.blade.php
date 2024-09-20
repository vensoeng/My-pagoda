<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ចូលគណនី</title>
    <!-- this icon for app  -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <!-- this is style of header  -->
    <link rel="stylesheet" href="{{asset('css/login/header.css')}}">
    <!-- this is style for this page  -->
    <link rel="stylesheet" href="{{asset('css/login/app.css')}}">
    <!-- this is focus on font-awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
    <main class="body-mian">
        <form action="{{route('home.login.auth')}}" method="POST">
            @csrf
            <section class="we-sign">
                <div class="we-sign-body">
                    <div class="we-sign-head">
                        <div class="form-profile">
                            <div class="profile-sm">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="form-profile-infor">
                                <h2>សូមស្វាគមន៍ការចូលគណនី</h2>
                            </div>
                        </div>
                    </div>
                    <div class="we-sign-list">
                        <div class="we-sign-item df-l @error('email') error value-true @enderror  @error('password') value-true @enderror " onclick="checkValue(this)">
                            <a class="icon-ra">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                            <label for="#" class="df-c" @error('email') style="--sg-color-spece: #e31305" @enderror>គណនីអ៊ីមែល</label>
                            <div class="we-in">
                                <input name="email" class="in-ra-sm txt-g" value="{{old('email')}}" type="text">
                            </div>
                            <div class="df-c icon-sign" onclick="fnText(this)"><i class="fa-solid fa-at"></i></div>
                        </div>
                        @error('email')
                            <p class="sms">{{ $message }}</p>
                        @enderror
                        <div class="we-sign-item df-l @error('password') error value-true @enderror " onclick="checkValue(this)">
                            <a class="icon-ra">
                                <i class="fa-solid fa-lock"></i>
                            </a>
                            <label for="#" class="df-c"  @error('password') style="--sg-color-spece: #e31305" @enderror >លេខសម្ងាត់</label>
                            <div class="we-in">
                                <input name="password" class="in-ra-sm txt-pw" type="password" value="{{old('password')}}">
                            </div>
                            <div class="df-c icon-sign" onclick="fnType(this)"><i class="fa-regular fa-eye-slash"></i></div>
                        </div>
                        @error('password')
                            <p class="sms">{{ $message }}</p>
                        @enderror
                        <div class="we-sign-item df-l dn productkey-blog" onclick="checkValue(this)">
                            <a class="icon-ra">
                                <i class="fa-solid fa-key"></i>
                            </a>
                            <label for="#" class="df-c">លេខ​កូ​ខ​ទំនិញ</label>
                            <div class="we-in">
                                <input name="#" class="in-ra-sm" type="text">
                            </div>
                        </div>
                        @error('erroruser')
                            <p class="sms">{{ $message }}</p>
                        @enderror
                        <div class="we-sign-item">
                            <input name="#" class="in-btn" type="submit" value="ចូលគណនី">
                            <div class="keylife df-c">
                                <a class="icon-ra" onclick="fnToggle('.productkey-blog','dn')"><i class="fa-solid fa-school"></i></a>
                            </div>
                            <div class="form-footer">
                                <p>មិនអាចចូលទៅកាន់គណនី?<a href="https://web.facebook.com/profile.php?id=100041547633244">ទីតាំងជំនួយ</a></p>
                            </div>
                        </div>
                    </div> 
                </div>
            </section>
        </form>
    </main>
    <script type="text/javascript" src="{{asset('js/login/login.js')}}"></script>
</body>
</html>