<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- this is favicon of website -->
    @if($item->text_file == '')
    <title>វត្តជលធារាសម្បត្តិ</title>
    @endif
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <!-- this is include style  -->
    <link rel="stylesheet" href="{{asset('css/home/main.css')}}">
    <!-- this is header style  -->
    <link rel="stylesheet" href="{{asset('css/admin/header.css')}}">
    <!-- this is style for this page  -->
    <link rel="stylesheet" href="{{asset('css/home/new.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/allbook.css')}}">
    <!-- this is fon awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        .web-header{
            border-bottom: 1px solid var(--sg-border-00);
        }
        .check-footer{
            position: fixed;
            background: var(--sg-bglight);
            margin: 0 auto;
            width: 100%;
            overflow: hidden;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            bottom: -100%;
            z-index: 10000000000000000000000;
            transition: all ease-in-out 0.3s;
        }
        .check-footer .data-bg{
            position: fixed;
            margin: 0 auto;
            width: 100%;
            height: 100vh;
            bottom: -100%;
            z-index: 0;
            transition: all ease-in-out 0.3s;
            background: #fffcfc36;
            top: 0;
            left: 0;
            backdrop-filter: blur(2px);
        }
        .check-footer-active{
            bottom: 0;
        }
        .check-footer-unactive{
            display: none;
        }
        .check-footer .check-footer-btnclose{
            position: absolute;
            right: 0.5rem;
            top: 0.5rem;
            z-index: 10000;
        }
        .check-footer .check-footer-btnclose button{
            width: 1.8rem;
            height: 1.8rem;
            border-radius: 1px;
            padding: 0rem;
            font-size: 1rem;
            background: var(--sg-bglight);
            border: 1px solid var(--sg-color-def);
            cursor: pointer;
        }
        .check-footer-body{
            height: max-content;
            max-height: 65vh;
            overflow: hidden;
            overflow-y: scroll;
            margin: 0 auto;
            position: relative;
            z-index: 1000;
            background: var(--sg-bglight);
        }
        .check-footer-body::-webkit-scrollbar{
            display: none;
        }
        .check-footer-body .check-content{
           width: 100%;
           margin: 0 auto;
        }
        .check-footer-body .check-footer-header{
            margin: 0.5rem;
            overflow: hidden;
            border-radius: 5px; 
            max-height: 250px;
        }
        .check-footer-body .check-content .text{
            margin: 0 0.5rem;
            margin-bottom: 0.5rem;
            font-family: var(--sg-fontBat);
        }
        .check-footer-body .check-content .text h2{
            font-family: var(--sg-fontBat);
            font-size: 1.2rem;
            color: #db9160;
        }
        .check-footer-body .check-content .text p{
            font-family: var(--sg-fontBat);
            font-size: 1rem;
        }
        /* .check-footer-body .web-section-body{
            max-width: 100%;
        } */
        .data-norest{
            width: 100%;
            height: 100vh;
            background: rgb(247,250,252);
        }
        .data-norest p{
            font-size: 1rem;
            font-family: var(--sg-fontBat);
            color: rgba(160, 174, 192,1)
        }
    </style>
</head>
<body>
    <header class="web-header db-c">
        {{-- head-body-check --}}
        <div class="head-body df-s">
            <!-- this is left header -->
            <div class="head-menu-left df-l">
                <a onclick="history.back()">
                    <div class="web-icon icon icon-ra text-be check-icon" style="--text-:'ត្រឡប់ក្រោយ';">
                        <img class="img-c" src="{{asset('images/logo wat new.jpg')}}" alt="">
                    </div>
                </a>
                <div class="web-icon-text check-text">
                    <h1>ជប់វារីស្ទូឌីយោ</h1>
                </div>
            </div>
            <!-- this is center menu header  -->
            <div class="head-menu-center db-c">
                <div class="head-menu-center-box db-c">
                    <ul class="df-c">
                        
                    </ul>
                </div>
            </div>
            <!-- this is right menu of header  -->
            <div class="head-menu-right">
                <div class="head-menu-right-box df-l">
                    <button class="support btn icon-ra icon-bg signs" onclick="location.href='https://web.facebook.com/profile.php?id=100081599561181'">
                        <h2 class="txt-bol">
                            <span><i class="fa-regular fa-chess-queen"></i> </span>
                            គាំទ្រយើង
                        </h2>
                    </button>
                </div>
            </div>
        </div>
    </header>
    @php
        if($item->text_file !== ''){
            $fileWithExtension = $item->text_file;
            $filePath = storage_path('app/public/file/' . $fileWithExtension);
            // Check if the file exists to avoid errors
            if (file_exists($filePath)) {
                // Read the file content
                $fileContent = file_get_contents($filePath);
            } else {
                $fileContent = 'File not found.';
            }
        }else{
            echo '
            <div class="data-norest df-c">
                <p>មិនមានលទ្ធផលដើម្បីបង្ហាញ</p>
            </div>';
            return;
        }
    @endphp

    {{-- Render the file content --}}
    <div class="file-content">
        {!! $fileContent !!}
    </div>
    
    {{-- Footer content --}}
    <div class="check-footer db-c">
        <div class="check-footer-btnclose">
            <button class="icon icon-ra btn" onclick="toggleClass('.check-footer','check-footer-unactive')"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="check-footer-body">
            <div class="check-content">
                <div class="check-footer-header">
                    <img class="img-c" src="{{asset('storage/images/'.$item->img)}}"
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
                <div class="text">
                    <h2>{{$item->title}}</h2>
                    <blockquote>
                        <p>{!! $item->descript !!}</p>
                    </blockquote>
                </div>
            </div>
            @if(!$articals->isEmpty())
             <!-- this is Articles of books  -->
             <section class="web-section db-c bottom-1" id="art-books">
                <div class="web-section-body db-c">
                    <!-- this is content  -->
                    <div class="art-books">
                        <div class="box">
                            <ul class="artical_data_location">
                                @foreach ($articals as $item)
                                    
                                <li class="data-location" data-id="{{route('home.checkArtical',$item->id)}}">
                                    <div class="box">
                                        <div class="head">
                                            <div class="row df-s">
                                                <div class="icon icon-ra icon-sm"><i class="fa-solid fa-arrow-up-right-from-square"></i></div>
                                                <div class="icon icon-ra icon-sm"><i class="fa-solid fa-xmark"></i></div>
                                            </div>
                                            <img class="img-c" src="{{asset('storage/images/'.$item->img)}}"
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
                                        <div class="text">
                                            <a><strong>អត្ថបទដោយ៖ {{$item->creator == '' ? 'មិនបង្ហាញមុខ':$item->creator}}</strong></a>
                                            <blockquote>
                                                <h2>{{$item->title==''? 'មិនមានចំណងជើង' : $item->title}}</h2>
                                                <p class="card-blog-desc">{{$item->descript == ''? 'មិនមានការពិពណ៌នានោះទេ។' :$item->descript}}</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            @endif
        </div>
        <div class="data-bg"></div>
    </div>
    <script type="text/javascript" src="{{asset('js/function/location.js')}}"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            location_go('.artical_data_location');
        });
    </script>
    <script type="text/javascript" src="{{asset('js/function/taketh.js')}}"></script>
    <script type="text/javascript">
        var checkfooter = document.querySelector('.check-footer');
        document.addEventListener("DOMContentLoaded", function() {
           checkfooter.classList.add('check-footer-active');
        });
    </script>
</body>
</html>
