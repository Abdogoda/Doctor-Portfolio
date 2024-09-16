<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>دكتور محمد الخولي | صدقة جارية</title>
    <link href="{{$global_settings['logo'] ? asset('storage/'.$global_settings['logo']) : asset('assets/frontend/img/logo/icon.png')}}" rel="shortcut icon" type="image">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/sadaka.min.css')}}" />
    {{-- <link rel="stylesheet" href="{{asset('assets/frontend/css/sadaka.css')}}" /> --}}
    <style>
        body {
            padding-top: 4rem;
        }

        @media (max-width: 778px) {
            body {
                padding-top: 2rem;
            }
        }

        @media (max-width: 500px) {
            body {
                padding-top: 1rem;
            }
        }
        .content p.name{
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <div class="overlay overlay1"></div>
    <div class="container hero">
        <div class="content">
            <h1>صدقة جارية</h1>
            <p class="name">عن :  الحاج/ مصطفي الخولي</p>
            <p>" اللهم اغفر له وارزقه الفردوس الأعلى واجعل قبره روضة من رياض الجنة "</p>
        </div>
        <a href="{{route('home')}}" class="btn">العودة الي الصفحة الرئيسية</a>
    </div>
    <section>
        <div class="container quote-container ayya-quote">
            <div class="wrapper">
                <div class="all-quote">
                    <h2 class="wrapper-head">أية اليوم</h2>
                    <div class="content">
                        <div class="quote-area">
                            <i class="fa fa-quote-right"></i>
                            <p class="quote"></p>
                            <i class="fa fa-quote-left"></i>
                        </div>
                        <p class="soura"></p>
                        <div class="buttons">
                            <div class="features">
                                <audio id="myAudio" src="" style="opacity: 0"></audio>
                                <ul>
                                    <li class="sound"><i class="fa fa-volume-up"></i></li>
                                    <li class="sound-off hide"><i class="fa fa-volume-xmark"></i></li>
                                    <li class="copy"><i class="fa fa-copy"></i></li>
                                    <li class="whatsapp"><i class="fab fa-whatsapp"></i></li>
                                </ul>
                                <button class="next-quote">أية جديدة</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container allah-names-container">
            <div class="wrapper">
                <h1 class="head">أسماء اللة الحسني</h1>
                <div class="box">
                    <div class="name"></div>
                    <div class="meaning"></div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container quote-container zekr-quote">
            <div class="wrapper">
                <div class="all-quote">
                    <h2 class="wrapper-head">ذكر اليوم</h2>
                    <div class="content">
                        <div class="quote-area">
                            <i class="fa fa-quote-right"></i>
                            <p class="quote"></p>
                            <i class="fa fa-quote-left"></i>
                        </div>
                        <div class="buttons">
                            <div class="features">
                                <ul>
                                    <li class="copy"><i class="fa fa-copy"></i></li>
                                    <li class="whatsapp"><i class="fab fa-whatsapp"></i></li>
                                </ul>
                                <button class="next-quote">ذكر جديد</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container azkar-con" id="azkarSection">
            <div class="wrapper">
                <div class="box">
                    <div class="number" data-zekr="سبحان الله">33</div>
                    <div class="zekr">سبحان الله</div>
                </div>
                <div class="box">
                    <div class="number" data-zekr="الحمد الله">33</div>
                    <div class="zekr">الحمد الله</div>
                </div>
                <div class="box">
                    <div class="number" data-zekr="الله اكبر">33</div>
                    <div class="zekr">الله اكبر</div>
                </div>
                <div class="box">
                    <div class="number" data-zekr="أستغفر الله">33</div>
                    <div class="zekr">أستغفر الله</div>
                </div>
            </div>
            <div class="reset">تصفير</div>
        </div>
    </section>

    <!-- Jquery Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="{{asset('assets/frontend/js/sadaka.min.js')}}"></script>
    {{-- <script src="{{asset('assets/frontend/js/sadaka.js')}}"></script> --}}
</body>

</html>