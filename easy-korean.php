<?php 
include('connect.php');
$major = 'korea';

$DB = new Database();

$query ="SELECT count(*) as user_count FROM ko_user_datas";
$user_count = $DB->read($query);
$user_count = $user_count[0]['user_count'];

$query = "SELECT count(*) as lesson_count FROM lessons WHERE major = '$major'";
$lesson_count = $DB->read($query);
$lesson_count = $lesson_count[0]['lesson_count'];

$query = "SELECT count(*) as course_count FROM courses WHERE major = '$major'";
$course_count = $DB->read($query);
$course_count = $course_count[0]['course_count'];

$query = "
    SELECT 
    ratings.review,
    learners.learner_name,
    learners.learner_image,
    learners.region
    FROM `ratings`
    JOIN learners ON
    learners.learner_phone = ratings.user_id
    JOIN courses ON 
    courses.course_id = ratings.course_id
    WHERE star = 5 
    AND review != '' 
    AND LENGTH(review) > 30
    AND courses.major = '$major'
    ORDER BY ratings.id DESC;
";
$reviews = $DB->read($query);

?>


<!DOCTYPE html>
<html lang="my">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Korean</title>
    <link rel="icon" type="image/png" href="assets/seal.png">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Myanmar:wght@400;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary-color: #FFA010;
            --primary-light: #FFB340;
            --primary-dark: #E69000;
            --primary-very-light: #FFF5E6;
            --secondary-color: #2c5aa0;
            --accent-color: #e31e25;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }

        body {
            font-family: 'Noto Sans Myanmar', sans-serif;
            line-height: 1.6;
            color: #333;
            scroll-behavior: smooth;
        }

        .section-padding {
            padding: 80px 0;
        }

        .bg-light-custom {
            background-color: var(--primary-very-light);
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,213.3C672,192,768,128,864,128C960,128,1056,192,1152,197.3C1248,203,1344,149,1392,122.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: bottom;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .app-mockup {
            max-width: 300px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .pricing-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .pricing-card:hover {
            transform: translateY(-10px);
        }

        .pricing-card.popular {
            border: 2px solid var(--primary-color);
            position: relative;
        }

        .popular-badge {
            position: absolute;
            top: -15px;
            right: 20px;
            background: var(--primary-color);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .btn-primary-custom {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 160, 16, 0.3);
        }

        .btn-outline-custom {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .testimonial-card {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: none;
            transition: transform 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
        }

        .testimonial-img {
            width: 70px;
            height: 70px;
            display: block;
            margin: 0 auto 15px;
            border-radius: 50%;
            object-fit: cover;
            -o-object-fit: cover; /* legacy Opera */
            overflow: hidden;
        }

        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 50px 0 20px;
        }

        .social-icon {
            font-size: 1.5rem;
            margin: 0 10px;
            color: white;
            transition: color 0.3s ease;
        }

        .social-icon:hover {
            color: var(--primary-color);
        }

        .section-title {
            position: relative;
            margin-bottom: 50px;
            font-weight: 700;
        }

        .section-title::after {
            content: "";
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        .nav-link {
            font-weight: 600;
            color: var(--dark-color);
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .highlight {
            color: var(--primary-color);
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .video-label {
            background: var(--primary-color);
            color: white;
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .feature-box {
            background: white;
            border-radius: 10px;
            padding: 30px 20px;
            height: 100%;
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary-color);
        }

        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 160, 16, 0.15);
        }

        .download-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .stats-label {
            font-size: 1rem;
            color: var(--dark-color);
            font-weight: 600;
        }

        .stats-section {
            background-color: var(--primary-very-light);
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 100px 0 60px;
                text-align: center;
            }

            .section-padding {
                padding: 60px 0;
            }

            .app-mockup {
                max-width: 250px;
                margin-top: 30px;
            }
        }
        /* Fade-in on scroll helpers */
        .pre-fade {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 700ms ease-out, transform 700ms ease-out;
            will-change: opacity, transform;
        }

        .pre-fade.in-view {
            opacity: 1;
            transform: translateY(0);
        }

        /* Owl Carousel tweaks */
        /* tighten item padding so items don't push outside the section */
        .owl-carousel .item {
             
        }

        .owl-carousel .testimonial-card {
            margin: 0 10px;
        }

        /* center nav dots color */
        .owl-dots {
            text-align: center;
            margin-top: 20px;
        }

    /* Custom layout for testimonials */
    .testimonials-wrapper { position: relative; padding: 0 24px; box-sizing: border-box; }

    /* hide any transformed overflow to avoid visual bleeding */
    .testimonials-wrapper .owl-stage-outer { overflow: hidden; }

        /* testimonial nav buttons removed — no extra padding required */
        .testimonials-wrapper .owl-carousel { padding: 0; box-sizing: border-box; }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span class="highlight">Easy</span>Korean
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#download">Download</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="display-4 fw-bold mb-4">ကိုရီးယားစကားကို လွယ်ကူစွာ သင်ယူလိုက်ပါ</h1>
                    <p class="lead mb-4">မြန်မာပြည်ရဲ့ အကောင်းဆုံး ကိုရီးယားစာသင်ကြားရေး Application</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#download" class="btn btn-light btn-lg px-4 py-2 fw-bold">အခမဲ့ စမ်းသုံးကြည့်ပါ</a>
                        <a href="#testimonials" class="btn btn-outline-light btn-lg px-4 py-2">အသုံးပြုသူများ၏
                            ထင်မြင်ချက်များ</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="app-mockup">
                        <img src="assets/photo_1.jpg"
                            alt="Easy Korean App" class="img-fluid rounded shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 stats-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-4">
                    <div class="stats-number"><?= $user_count ?></div>
                    <div class="stats-label">အသုံးပြုသူများ</div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stats-number"><?= $lesson_count ?></div>
                    <div class="stats-label">သင်ခန်းစာများ</div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stats-number"><?= $course_count  ?></div>
                    <div class="stats-label">သင်တန်းများ</div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stats-number">24/7</div>
                    <div class="stats-label">သင်ယူနိုင်ခြင်း</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Problem & Solution Section -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2 class="section-title">ကိုရီးယားစာသင်ရတာ ခက်ခဲလွန်းတယ်လား?</h2>
                    <p class="mb-4">ကိုရီးယားဘာသာစကားသင်ယူရာတွင် အောက်ပါအခက်အခဲများရှိပါသည် -
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-times-circle text-danger me-2"></i> သင်ခန်းစာများက
                            မြန်မာလူငယ်များအတွက် မသင့်လျော်ခြင်း</li>
                        <li class="mb-3"><i class="fas fa-times-circle text-danger me-2"></i> စျေးသက်သက်သာသာဖြင့် Advance Level အထိရောက်အောင် သင်ကြားနိုင်မှုမရှိခြင်း</li>
                        <li class="mb-3"><i class="fas fa-times-circle text-danger me-2"></i> မိမိနေထိုင်ရာမြို့/ရွာ/ဒေသများတွင် သင်တန်းကောင်းများမရှိခြင်း</li>
                        <li class="mb-3"><i class="fas fa-times-circle text-danger me-2"></i> သင်တန်းကျောင်းသို့နေစဉ်သွားတက်ရန် အချိန်မပေးနိုင်ခြင်း</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title">Easy Korean ဖြေရှင်းပေးမည်</h2>
                    <p class="mb-4">Easy Korean သည် မြန်မာလူငယ်များအတွက် အထူးပြုလုပ်ထားသော
                        ကိုရီးယားဘာသာစကားသင်ယူရေး application ဖြစ်ပါသည်။</p>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>သင်ကြားမည့်ပုံစံ</strong> 
                        - ကြည်လင်ပြတ်သားပြီး အရည်အသွေးကောင်းမွန်သော Video သင်ခန်းစာများဖြင့် Easy Korean Application တွင်ဝင်ရောက်လေ့လာနိုင်ခြင်း</li>
                        <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>ဘာတွေသင်ကြားပေးမှာလဲ </strong> - 
                        Basic မှာစ၍ Level 4 အထိကို နာမည်ကြီး Yonsei Textbook အတိုင်း သင်ကြားပေးခြင်းနှင့် Topik 1 စာမေးပွဲအတွက် လေ့လာသင်ကြားနိုင်ခြင်း
                        </li>
                        <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>ဘယ်သူတွေလေ့လာသင့်လဲ </strong> - 
                        အပြင်သင်တန်းတက်ရောက်ရန် အချိန်မပေးနိုင်သူများ၊ ကိုရီးယားနိုင်ငံတွင် အလုပ်သွားရန် စီစဉ်နေသူများ၊ ငွေကြေးသက်သာစွာဖြင့် ကိုရီးယားစာကို အဆင့်မြှင့်တင်လိုသူများ
                        </li>
                        <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> <strong>အင်တာနက်မလိုဘဲ
                                သင်ယူနိုင်ခြင်း</strong> - သင်ခန်းစာများအား Offline Download ဆွဲနိုင်သည့်အတွက် အင်တာနက်မရှိသည့်အခါများတွင်လည်း ‌လေ့လာနိုင်ခြင်း</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="section-padding bg-light-custom">
        <div class="container">
            <h2 class="text-center section-title">ကျွန်ုပ်တို့၏ ထူးခြားအားသာချက်များ</h2>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="feature-box text-center">
                        <div class="feature-icon">
                            <i class="fas fa-language"></i>
                        </div>
                        <h4>မြန်မာလို ရှင်းလင်းချက်များ</h4>
                        <p>
                            လွယ်ကူရှင်းလင်းသော မြန်မာဘာသာဖြင့် ကိုရီးယားစကားကို သင်ယူနိုင်ပါသည်။ ခက်ခဲသော သဒ္ဒါများကို
                            မြန်မာလိုရှင်းပြထားသည်။
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="feature-box text-center">
                        <div class="feature-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4>Yonsei သင်ရိုးညွှန်းတမ်း</h4>
                        <p>
                            နာမည်ကြီး Yonsei တက္ကသိုလ်၏ ကိုရီးယားဘာသာစကား သင်ရိုးညွှန်းတမ်းအတိုင်း သင်ကြားပေးသည်။
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="feature-box text-center">
                        <div class="feature-icon">
                            <i class="fas fa-volume-up"></i>
                        </div>
                        <h4>မြန်မာအသံထွက်</h4>
                        <p>ကိုရီးယားစကားလုံးများ၏ မှန်ကန်သောအသံထွက်ကို မြန်မာလို ဖတ်နည်းဖြင့် သင်ယူနိုင်ပါသည်။</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="feature-box text-center">
                        <div class="feature-icon">
                            <i class="fas fa-gamepad"></i>
                        </div>
                        <h4>ဂိမ်းများနှင့် သင်ယူခြင်း</h4>
                        <p>စိတ်ဝင်စားဖွယ် ဂိမ်းများနှင့် စကားလုံးများကို လွယ်ကူစွာ မှတ်မိနိုင်အောင် ပြုလုပ်ထားသည်။</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="feature-box text-center">
                        <div class="feature-icon">
                            <i class="fas fa-globe-asia"></i>
                        </div>
                        <h4>ယဉ်ကျေးမှုများကို သိရှိခြင်း</h4>
                        <p>
                            ကိုရီးယားယဉ်ကျေးမှုများကို နားလည်ခြင်းဖြင့် ဘာသာစကားကို ပိုမိုနက်ရှိုင်းစွာ သိရှိနိုင်သည်။
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="feature-box text-center">
                        <div class="feature-icon">
                            <i class="fas fa-wifi"></i>
                        </div>
                        <h4>အင်တာနက်မလိုဘဲ သင်ယူနိုင်ခြင်း</h4>
                        <p>အင်တာနက်မရှိလျှင်လည်း သင်ခန်းစာများကို ဒေါင်းလုဒ်လုပ်ပြီး သင်ယူနိုင်ပါသည်။</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- App Showcase Section -->
    <section class="section-padding">
        <div class="container">
            <h2 class="text-center section-title">Easy Korean Application</h2>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="row g-4">
                        <div class="col-6">
                            <img src="https://via.placeholder.com/250x500/f8f9fa/FFA010?text=Lesson+Screen"
                                alt="Lesson Screen" class="img-fluid rounded shadow">
                        </div>
                        <div class="col-6">
                            <img src="https://via.placeholder.com/250x500/f8f9fa/FFA010?text=Vocabulary"
                                alt="Vocabulary Screen" class="img-fluid rounded shadow mt-5">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-4">လွယ်ကူသော အင်တာဖေ့စ်ဖြင့် သင်ယူပါ</h3>
                    <p class="mb-4">Easy Korean application သည် မြန်မာလူငယ်များအတွက် အထူးဒီဇိုင်းပြုလုပ်ထားသော
                        လွယ်ကူရှင်းလင်းသည့် အင်တာဖေ့စ်ဖြင့် ပြုလုပ်ထားသည်။</p>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-check text-primary me-2"></i> ရှုပ်ထွေးမှုမရှိသော ဒီဇိုင်း
                        </li>
                        <li class="mb-3"><i class="fas fa-check text-primary me-2"></i> မြန်မာဘာသာဖြင့် လမ်းညွှန်မှုများ
                        </li>
                        <li class="mb-3"><i class="fas fa-check text-primary me-2"></i> စကားလုံးများကို အသံဖြင့်
                            နားထောင်နိုင်ခြင်း</li>
                        <li class="mb-3"><i class="fas fa-check text-primary me-2"></i> သင်တန်းတိုင်းအတွက်
                            လေ့ကျင့်ခန်းများ</li>
                        <li class="mb-3"><i class="fas fa-check text-primary me-2"></i> တိုးတက်မှုကို ခြေရာခံနိုင်ခြင်း
                        </li>
                    </ul>
                    <div class="mt-4">
                        <a href="#download" class="btn btn-primary-custom me-3">ဒေါင်းလုဒ်ရယူရန်</a>
                        <a href="#testimonials" class="btn btn-outline-custom">အသုံးပြုသူများ၏ ထင်မြင်ချက်များ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="section-padding bg-light-custom">
        <div class="container">
            <h2 class="text-center section-title">Package Plan</h2>
            <p class="text-center mb-5">Basic course နှင့် Additional သင်ခန်းစာပေါင်းများစွာကို အခမဲ့ စတင်သင်ယူနိင်ပါသည်</p>

            <div class="row justify-content-center">
                <!-- Free Plan -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card pricing-card h-100">
                        <div class="card-body text-center p-4">
                            <h4 class="card-title">Free Plan</h4>
                            <div class="price mb-4">
                                <span class="h2">0 MMK</span>
                                 
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Basic Course 
                                </li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i>
                                    Vocabulary Course
                                </li>

                                <li class="mb-3">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Songs With Lyrics 
                                </li>

                                <li class="mb-3">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Vocabulary Game
                                </li>

                                <li class="mb-3">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Korean Blog, Hanja, Number and Time
                                </li>

                                <li class="mb-3">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Conversation, Words On Topics, Phrase
                                </li>

                                <li class="mb-3">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Tips And Slangs, Useful Words
                                </li>

                                <li class="mb-3">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Learning With K-drama
                                </li>

                                <li class="mb-3">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Drama Lyrics and Other Contents
                                </li>

                            </ul>
                            <a href="#download" class="btn btn-outline-custom w-100">အခမဲ့ စတင်ရန်</a>
                        </div>
                    </div>
                </div>

                <!-- Free Plan -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card pricing-card h-100">
                        <div class="card-body text-center p-4">
                            <h4 class="card-title">Silver Plan</h4>
                            <div class="price mb-4">
                                <span class="h2">30,000 mmk</span>
                                <span class="text-muted">/ lifetime</span>
                            </div>
                            <p class="text-muted">50,000 mmk သက်သာမည်</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3">
                                    <i class="fas fa-check text-success me-2"></i>
                                    All assets in Free Plan
                                </li>

                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 1 Course
                                </li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 2 Course
                                </li>

                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 3 Course Part 1
                                </li>

                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 3 Course Part 2
                                </li>

                                <li class="mb-3"><i class="fas fa-times me-2"></i></i>
                                        Level 4 Course Part 1
                                </li>

                                <li class="mb-3"><i class="fas fa-times me-2"></i></i>
                                        Level 4 Course Part 2
                                </li>
                                <li class="mb-3"><i class="fas fa-times me-2"></i></i>
                                        Topik 1 Course
                                </li>
                            </ul>
                            <a href="#download" class="btn btn-outline-custom w-100">အခမဲ့ စတင်ရန်</a>
                        </div>
                    </div>
                </div>

                <!-- Free Plan -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card pricing-card h-100">
                        <div class="card-body text-center p-4">
                            <h4 class="card-title">Gold Plan</h4>
                            <div class="price mb-4">
                                <span class="h2">40,000 mmk</span>
                                <span class="text-muted">/ lifetime</span>
                            </div>
                            <p class="text-muted">80,000 mmk သက်သာမည်</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3">
                                    <i class="fas fa-check text-success me-2"></i>
                                    All assets in Free Plan
                                </li>

                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 1 Course
                                </li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 2 Course
                                </li>

                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 3 Course Part 1
                                </li>

                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 3 Course Part 2
                                </li>

                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 4 Course Part 1
                                </li>

                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 4 Course Part 2
                                </li>
                                <li class="mb-3"><i class="fas fa-times me-2"></i></i>
                                        Topik 1 Course
                                </li>
                            </ul>
                            <a href="#download" class="btn btn-outline-custom w-100">အခမဲ့ စတင်ရန်</a>
                        </div>
                    </div>
                </div>
                 

                <!-- Pro Plan -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card pricing-card popular h-100">
                        <div class="popular-badge">အကြံပြုထားသည်</div>
                        <div class="card-body text-center p-4">
                            <h4 class="card-title">Diamond Plan</h4>
                            <div class="price mb-4">
                                <span class="h2">50,000 MMK</span>
                                <span class="text-muted">/ lifetime</span>
                            </div>
                            <p class="text-muted">85,000 MMK သက်သာမည်</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3">
                                    <i class="fas fa-check text-success me-2"></i>
                                    All assets in Free Plan
                                </li>

                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 1 Course
                                </li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 2 Course
                                </li>

                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 3 Course Part 1
                                </li>

                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 3 Course Part 2
                                </li>

                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 4 Course Part 1
                                </li>

                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Level 4 Course Part 2
                                </li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i></i>
                                        Topik 1 Course
                                </li>
                            </ul>
                            <a href="#download" class="btn btn-primary-custom w-100">Premium ကိုရယူရန်</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="section-padding">
        <div class="container">
            <h2 class="text-center section-title">အသုံးပြုသူများ၏ မှတ်ချက်များ</h2>

            <!-- Influencer Video Review -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="text-center mb-4">
                        <span class="video-label"><i class="fas fa-star me-2"></i> Nari's Honest Review</span>
                        <h3>Easy Korean Application အား အသုံးပြုသူများ၏ မှတ်ချက်များ</h3>
                    </div>
                    <div class="video-container">
                        <div style="padding:56.25% 0 0 0;position:relative;">
                            <iframe
                                src="https://player.vimeo.com/video/836210202?h=5036ec7717&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                                frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                                style="position:absolute;top:0;left:0;width:100%;height:100%;border-radius:10px;"
                                title="Easy English Honest Review"></iframe>
                        </div>
                        <script src="https://player.vimeo.com/api/player.js"></script>
                    </div>
                </div>
            </div>

            <!-- Written Testimonials (Owl Carousel) -->
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-wrapper">
                        <div class="owl-carousel owl-theme" id="testimonials-carousel">
                        <?php if(empty($reviews)): ?>
                        <div class="item">
                            <div class="card testimonial-card h-100">
                                <div class="card-body text-center p-4">
                                    <img src="https://via.placeholder.com/70" alt="User"
                                        class="testimonial-img">
                                    <h5 class="card-title">No testimonials yet</h5>
                                    <p class="text-muted">Be the first to leave a review</p>
                                    <div class="mb-3">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </div>
                                    <p class="card-text">"No reviews available at the moment."</p>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                        <?php foreach($reviews as $review):?>
                        <div class="item">
                            <div class="card testimonial-card h-100">
                                <div class="card-body text-center p-4">
                                    <img style="width:70px; height:70px;" src="<?= $review['learner_image']?>" alt="User"
                                        class="testimonial-img">
                                    <h5 class="card-title"><?= $review['learner_name']?></h5>
                                    <p class="text-muted"><?= $review['region']?></p>
                                    <div class="mb-3">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </div>
                                    <p class="card-text">"<?= $review['review']?>"</p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="section-padding download-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h2 class="mb-3">ယခုပဲ Easy Korean ကို စတင်သင်ယူလိုက်ပါ</h2>
                    <p class="lead mb-4">မြန်မာလူငယ်ထောင်ပေါင်းများစွာ ယခုပင် Easy Korean ဖြင့် ကိုရီးယားစကားကို
                        သင်ယူနေပါပြီ</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#" class="btn btn-light btn-lg px-4 py-2 fw-bold">
                            <i class="fab fa-google-play me-2"></i> Google Play
                        </a>
                        <a href="#" class="btn btn-light btn-lg px-4 py-2 fw-bold">
                            <i class="fab fa-apple me-2"></i> App Store
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="app-mockup">
                        <img src="https://via.placeholder.com/250x500/ffffff/FFA010?text=Easy Korean"
                            alt="Easy Korean App" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h4 class="mb-4">Easy Korean</h4>
                    <p>မြန်မာလူငယ်များအတွက် အထူးပြုလုပ်ထားသော ကိုရီးယားဘာသာစကားသင်ယူရေး application ဖြစ်ပါသည်။</p>
                    <div class="mt-4">
                        <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-telegram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h5 class="mb-4">Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#home" class="text-white text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="#features" class="text-white text-decoration-none">Features</a>
                        </li>
                        <li class="mb-2"><a href="#pricing" class="text-white text-decoration-none">Pricing</a></li>
                        <li class="mb-2"><a href="#testimonials"
                                class="text-white text-decoration-none">Testimonials</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="mb-4">Contact</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> support@Easy Korean.com</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> 09 123 456 789</li>
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> ရန်ကုန်မြို့၊ မြန်မာနိုင်ငံ</li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="mb-4">သတင်းလွှာစာရင်း</h5>
                    <p>အခမဲ့သင်ခန်းစာများနှင့် update များကို ရယူရန် သင့်အီးမေးလ်ကို ထည့်သွင်းပါ</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="သင့်အီးမေးလ်">
                        <button class="btn btn-primary-custom" type="button">စာရင်းသွင်းရန်</button>
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2023 Easy Korean. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="https://www.calamuseducation.com/calamus/privacy.php" class="text-white text-decoration-none me-3">Privacy Policy</a>
                    <a href="https://www.calamuseducation.com/calamus/term.php" class="text-white text-decoration-none">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

 
        <!-- jQuery (required by Owl Carousel) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>console.log('DEBUG: jQuery script tag present (easy-korean)');</script>
        <!-- Owl Carousel JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script>console.log('DEBUG: Owl script tag present (easy-korean)');</script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    (function(){
        'use strict';
        var info = function(){ if (window.console && console.info) console.info.apply(console, arguments); };

        // small helper to wait for a condition with timeout
        function waitFor(conditionFn, timeoutMs, intervalMs){
            timeoutMs = timeoutMs || 4000; intervalMs = intervalMs || 150;
            return new Promise(function(resolve, reject){
                var start = Date.now();
                (function poll(){
                    try { if (conditionFn()) return resolve(); } catch(e){}
                    if (Date.now() - start > timeoutMs) return reject(new Error('timeout'));
                    setTimeout(poll, intervalMs);
                })();
            });
        }

        jQuery(function(){ // on DOM ready
            info('testimonials: DOM ready — initializing');

            waitFor(function(){ return typeof jQuery !== 'undefined' && typeof jQuery.fn.owlCarousel === 'function'; }, 5000, 200)
            .then(function(){
                var $tc = jQuery('#testimonials-carousel');
                if (!$tc.length) { info('testimonials: carousel element not found'); return; }

                if (!$tc.hasClass('owl-initialized')){
                    $tc.owlCarousel({
                        loop: true,
                        margin: 10,
                        nav: false,
                        dots: true,
                        autoplay: true,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: true,
                        responsive: { 0: { items:1 }, 768: { items:2 } }
                    });
                    info('testimonials: owl initialized');
                } else {
                    info('testimonials: owl already initialized');
                }



                // expose for debugging
                window.testimonialsCarousel = $tc;

                // IntersectionObserver refresh when section appears
                try {
                    var target = document.getElementById('testimonials');
                    if (target && 'IntersectionObserver' in window) {
                        var obs = new IntersectionObserver(function(entries){
                            entries.forEach(function(entry){ if (entry.isIntersecting) { $tc.trigger('refresh.owl.carousel'); obs.disconnect(); } });
                        }, { threshold: 0.05 });
                        obs.observe(target);
                    }
                } catch(e){ info('testimonials: observer error', e); }

                // debounced resize refresh
                var resizeTimer = 0;
                window.addEventListener('resize', function(){
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(function(){
                        if ($tc && $tc.length) { $tc.trigger('refresh.owl.carousel'); }
                    }, 120);
                });
            })
            .catch(function(){ info('testimonials: owl carousel plugin not available or timed out'); });
        });
    })();
    </script>
    <script>
        // Fade-in on scroll using IntersectionObserver
        (function() {
            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -10% 0px',
                threshold: 0.15
            };

            const onIntersect = (entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                        obs.unobserve(entry.target);
                    }
                });
            };

            const observer = new IntersectionObserver(onIntersect, observerOptions);

            // Select sections and any element explicitly marked for fade-in
            const fadeTargets = document.querySelectorAll('section, .fade-in-on-scroll');
            fadeTargets.forEach(el => {
                // don't re-add if already in DOM with in-view
                if (!el.classList.contains('in-view')) {
                    el.classList.add('pre-fade');
                    observer.observe(el);
                }
            });
        })();
    </script>
</body>

</html>