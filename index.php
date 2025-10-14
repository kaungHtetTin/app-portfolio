<?php

include("connect.php");

if(!isset($_GET['app'])) exit("Permission Denied");

$app = $_GET['app'];
if(!($app=='ee' || $app =='ek')) exit("Permission Denied");

if($app == 'ee'){
  $photos[] = 'ee_photo1.png';
  $photos[] = 'ee_photo_2.png';
  $photos[] = 'ee_photo_3.png';
  $photos[] = 'ee_photo_4.png';
  $photos[] = 'ee_photo_5.png';
  $photos[] = 'ee_photo_6.png';
  $photos[] = 'ee_photo_7.png';
  $photos[] = 'ee_photo_8.png';
  $major = 'english';
  $page_title = "Easy English";
  $app_link = "https://play.google.com/store/apps/details?id=com.qanda.learnroom";
  $seal = "ee_seal.png";
  $facebook_link = "https://www.facebook.com/easyenglishcalamus";
}else{
  $photos[] = 'ek_photo1.jpg';
  $major = 'korea';
  $page_title = "Easy Korean";
  $app_link = "https://play.google.com/store/apps/details?id=com.calamus.easykorean";
  $seal = "ek_seal.png";
  $facebook_link = "https://www.facebook.com/easykoreancalamus";
}

$DB = new Database();
$query = "SELECT * FROM courses WHERE major = '$major'";
$courses = $DB->read($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo $page_title ?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="assets/img/<?php echo $seal ?>">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MinimalFolio
  * Template URL: https://bootstrapmade.com/minimalfolio-bootstrap-portfolio-template/
  * Updated: Aug 05 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .lead ul li{
      margin:5px;
    }

    .plan_title{
      text-align:center;
      font-size: 16px;
      font-weight:bold;
    }

    .plan_price{
      text-align:center;
      margin-bottom: 10px;
      font-weight: bold;
      font-size: 14px;
    }

    .head{
      margin-top: 10px;
    }

    .card {
       font-family: Poppins Medium, sans-serif;
    }

    .card hr{
      margin-left: 20px;
      margin-right: 20px;
      color: #777;
    }

    .card strong{
      margin-left:20px;
      font-size:13px;
      color: #555;
    }

    .card ul{
      list-style-type: none;
      margin-left: -8px;
    }

    .card ul i{
      color: green;
    }

    .card ul li{
      padding:3px;
      font-size: 13px;
    }

  </style>

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center position-relative">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.webp" alt=""> -->
        <h1 class="sitename">
          <?php 
            if($app=='ee') echo "Easy English";
            else echo "Easy Korean";
          ?>
        </h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#resume">Resume</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center gx-5 gy-5">

          <div class="col-lg-7">
            <div class="intro" data-aos="fade-right" data-aos-delay="150">
              <div class="eyebrow d-inline-flex align-items-center gap-2 mb-3">
                <span class="dot"></span>
                <span class="text">For Higher Education of Myanmar</span>
              </div>

              <h1 class="display-heading mb-3">
                 <?php 
                  if($app=='ee') echo "Easy English - English For Myanmar";
                  else echo "Easy Korean - Korean For Myanmar";
                ?>
              </h1>

              <p class="lead mb-4">
                <?php 
                  if($app=='ee') echo "Easy English - English For Myanmar";
                  else echo "Easy Korean - Korean For Myanmar";
                ?> Application ကတော့ <?php 
                  if($app=='ee') echo "အင်္ဂလိပ်";
                  else echo "ကိုရီးယား";
                ?>
                ဘာသားစကားကို စျေးစျေးသက်သက်သာသာဖြင့် အင်တာနက်ရရှိရုံဖြင့် မည်သူမဆို လေ့လာနိုင်အောင် Calamus Education မှ
                ဖန်တီးရေးဆွဲထားခြင်း ဖြစ်ပါသည်။
                
              </p>

              <div class="cta-group d-flex flex-wrap align-items-center gap-3" data-aos="zoom-in" data-aos-delay="250">
                <a href="#portfolio" class="btn btn-ghost">
                  View Courses
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
                <a href="" class="link-underline">
                  Download From Google Play
                  <i class="bi bi-google-play ms-2"></i>
                </a>
              </div>

              <!-- <div class="meta mt-4 d-flex flex-wrap align-items-center gap-4" data-aos="fade-up" data-aos-delay="300">
                <div class="meta-item d-flex align-items-center gap-2">
                  <i class="bi bi-geo-alt"></i>
                  <span>Xueyaun Campus, Beihang University, Beijing, China</span>
                </div>
                <div class="meta-item d-flex align-items-center gap-2">
                  <i class="bi bi-circle"></i>
                  <span>Available for freelance</span>
                </div>
              </div> -->
            </div>
          </div>

          <div class="col-lg-5">
            <figure class="portrait-wrap position-relative" data-aos="fade-left" data-aos-delay="200">
              <img src="assets/img/<?php echo $photos[0] ?>" alt="Profile Portrait" class="img-fluid portrait-img">
              <figcaption class="visually-hidden"></figcaption>

              <div class="badge note" data-aos="zoom-in" data-aos-delay="300">
                <i class="bi bi-star"></i>
                <span>Developed By Calamus Education</span>
              </div>
            </figure>
          </div>

        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>Calamus Education for Higher Education of Myanmar</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Intro + Photo -->
        <div class="row align-items-center justify-content-between intro-wrap gy-5">
          <div class="col-lg-7" data-aos="fade-right" data-aos-delay="150">
            <div class="intro-content">
              <span class="eyebrow">Hello there</span>
              <h2 class="headline">
                <?php 
                  if($app=='ee') echo "Easy English - English For Myanmar";
                  else echo "Easy Korean - Korean For Myanmar";
                ?>
              </h2>
              <p class="lead">
                <ul>
                  <li>
                    ငွေသောင်းဂဏန်းလောက်သာ ပေးသွင်းရုံနဲ့ အထူး ထိရောက်တဲ့ သင်ခန်းစာပေါင်းများစွာ၊ Course ပေါင်းများစွာကို ရာသက်ပန်သင်ယူနိုင်ပါတယ်။ 
                  </li>
                  <li>
                    App ဖြစ်တာကြောင့် အချိန်များများပေးစရာမလိုတဲ့အပြင် အချိန်တိုင်း၊ နေရာတိုင်း၊ သင်အားတဲ့အချိန်တိုင်းမှာ App လေးကိုဖွင့်ကြည့်ပြီး သင်ခန်းစာတွေကို လေ့လာရုံပါပဲ။ 
                  </li>
                  <li>
                    Data နည်းနည်းနဲ့ Offline Download ဆွဲထားလိုလည်းရတာကြောင့် Online Class တွေတက်တဲ့အခါ အင်တာနက် အခက်အခဲကြောင့် စာလိုက်မမီသူတွေ၊ အချိန်မီသင်တန်းမတက်နိုင်လို အခက်အခဲဖြစ်ရသူတွေ အတွက်လည်း အဆင်ပြေစေပါလိမ့်မယ်။ 
                  </li>
                  <li>
                    သင်တန်းကြေးတစ်ခါသွင်းရုံနဲ့ ရာသက်ပန်သင်ယူနိုင်တာကြောင့် App ထဲမှာ ထပ်ထည့်ပေးနေတဲ့ Course တွေ၊ သင်ခန်းစာတွေ အားလုံးကိုလည်း အခမဲ့ သင်ယူနိုင်ဦးမှာဖြစ်ပါတယ်။ 
                  </li>
                  <li>
                    နေ့ရက်တစ်နေ့ချင်းစီအလိုက် စနစ်တကျစီစဥ်ပေးထားတဲ့ သင်ခန်းစာတွေကြောင့် ဘာပြီးရင် ဘာလေ့လာရမလဲဆိုတာ တန်းသိပြီး အင်္ဂလိပ်စာကို ကျွမ်းကျင်သွားစေပါလိမ့်မယ်။ 
                  </li>
                </ul>
              </p>
              <div class="cta-group">
                <a href="#portfolio" class="btn-ghost">
                  View Courses <i class="bi bi-arrow-down"></i>
                </a>
                <!-- <a href="#resume" class="link-underline">
                  Download Resume <i class="bi bi-download"></i>
                </a> -->
              </div>
            </div>
          </div>

          <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="250">
            <figure class="profile-figure text-center text-lg-end">
              <?php if($app=='ee'){ ?>
                  <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/843769832?h=5d0578e19a&amp;badge=0&amp;autopause=0&amp;quality_selector=1&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" style="position:absolute;top:0;left:0;width:100%;height:100%;border-radius:10px;" title="Easy English Honest Review"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
              <?php }else{?>
                 <div style="padding:56.25% 0 0 0;position:relative; border-radius:10px;"><iframe src="https://player.vimeo.com/video/836210202?h=5036ec7717&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%; border-radius:10px;" title="Easy Korean Honest Review"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
              <?php }?>
            </figure>
          </div>
        </div>
        <!-- End Intro + Photo -->

        <!-- Skills Grid -->
        <div class="skills-wrap">
          <div class="row g-4">
            <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="180">
              <div class="skill-item">
                <i class="bi bi-phone"></i>
                <h3>Mobile Learning</h3>
                <p>ဖုန်းတစ်လုံးတည်းရှိရုံဖြင့် ထိရောက်စွာလေ့လာနိုင်မည်</p>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="240">
              <div class="skill-item">
                <i class="bi bi-people"></i>
                <h3>Academic & Technical Support</h3>
                <p>မေးခွန်းများ မေးမြန်းရန်ရှိပါက application မှ တိုက်ရိုက်ဆက်သွယ်မေးမြန်းနိုင်မည်</p>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="300">
              <div class="skill-item">
                <i class="bi bi-award"></i>
                <h3>Sharable Certificates</h3>
                <p>Course တစ်ခုပြီးဆုံးပါက Certificate ထုတ်ယူရရှိနိုင်မည်</p>
              </div>
            </div>
          </div>
        </div>
        <!-- End Skills Grid -->

        <!-- Journey Timeline -->
        <div class="journey-wrap">
          <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="120">
              <article class="timeline-item">
                <span class="dot"></span>
                <time>2019</time>
                <h4>Calamus Education</h4>
                <p>Founded Calamus Education in 2019.</p>
              </article>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="180">
              <article class="timeline-item">
                <span class="dot"></span>
                <time>2019</time>
                <h4>Easy English</h4>
                <p>Easy English is our first mobile learning platform.</p>
              </article>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="240">
              <article class="timeline-item">
                <span class="dot"></span>
                <time>2021</time>
                <h4>Easy Korean</h4>
                <p>Easy Korean is our second mobile learning platform.</p>
              </article>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
              <article class="timeline-item">
                <span class="dot"></span>
                <time>2023</time>
                <h4>Calamus Education Website</h4>
                <p>You can also learn from calamus education website.</p>
              </article>
            </div>
          </div>
        </div>
        <!-- End Journey Timeline -->

        <!-- Quote -->
        <blockquote class="personal-quote" data-aos="fade-down" data-aos-delay="200">
          <p>“ Our Core Values”</p>
        </blockquote>
        <!-- End Quote -->

        <!-- Fun Facts -->
        <div class="facts-wrap">
          <div class="row g-3 justify-content-center">
            <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="120">
              <div class="fact-pill">
                <i class="bi bi-graph-up-arrow"></i>
                <span>Effortless</span>
              </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
              <div class="fact-pill">
                <i class="bi bi-brush"></i>
                <span>Good Quality</span>
              </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="200">
              <div class="fact-pill">
                <i class="bi bi-geo-alt"></i>
                <span>No geolocation constraints</span>
              </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="160">
              <div class="fact-pill">
                <i class="bi bi-currency-exchange"></i>
                <span>Cheap Price</span>
              </div>
            </div>
            
          </div>
        </div>
        <!-- End Fun Facts -->

      </div>

    </section><!-- /About Section -->

    <!-- Portfolio Section -->
    <section id="courses" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Courses</h2>
        <p></p>
      </div><!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="fitRows" data-sort="original-order">
          <div class="row gy-4 portfolio-grid isotope-container" data-aos="fade-up" data-aos-delay="200">

            <?php foreach($courses as $course){ ?>
              <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-web">
                <div class="portfolio-card">
                  <div class="image-container">
                    <img src="<?php echo $course['web_cover'] ?>" class="img-fluid" alt="Online Learning Platform" loading="lazy">
                    <div class="overlay">
                      <div class="overlay-content">
                        <a href="https://www.calamuseducation.com/calamus/course_detail.php?course_id=<?php echo $course['course_id'] ?>" class="details-link" title="View Project Details">
                          <i class="bi bi-arrow-right"></i>
                        </a>
                        <br>
                      </div>
                    </div>
                  </div>
                  <div class="content">
                    <h3><?php echo $course['title'] ?></h3>
                    <p><?php echo $course['fee'] ?> MMK</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
            <?php }?>
          </div><!-- End Portfolio Grid -->
         
        </div>

      </div>
    </section><!-- /Portfolio Section -->

    <?php if($major=='korea'){ ?>
    <!-- About Section -->
    <section id="vip-plan" class="about section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>VIP Package Plans</h2>
        <p>Calamus Education for Higher Education of Myanmar</p>
      </div><!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <!-- Skills Grid -->
        <div class="skills-wrap">
          <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="180">
              <div class="card">
                <div class="head" style="padding:7px; text-align:center; color:silver; font-size:40px;">
                  <i class="bi bi-trophy-fill"></i> 
                </div>
                <div class="body">
                  <div class="plan_title">Silver Plan</div>
                  <div class="plan_price">
                    30,000 <span>mmk </span>
                  </div>
                    <hr>
                  <strong>Available courses</strong>
                  <ul class="ul">
                    <li><i class="bi bi-check-circle"></i>  Korean Language Basic Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 1 Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 2 Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 3 Course Part I</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 3 Course Part II</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="180">
              <div class="card">
                <div class="head" style="padding:7px; text-align:center; color:gold; font-size:40px;">
                  <i class="bi bi-trophy-fill"></i> 
                </div>
                <div class="body">

                  <div class="plan_title" >Gold Plan</div>
                  <div class="plan_price">
                    40,000 <span>mmk </span>
                  </div>
                    <hr>
                  <strong>Available courses</strong>
                  <ul class="ul">
                    <li><i class="bi bi-check-circle"></i>  Korean Language Basic Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 1 Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 2 Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 3 Course Part I</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 3 Course Part II</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 4 Course Part I</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 4 Course Part II</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="180">
              <div class="card">

                <!-- <div class="head" style="background:#0096D1; padding:7px; text-align:center; color:white; font-weight:bold">
                  <i class="bi bi-trophy"></i> 
                </div> -->

                <div class="head" style="padding:7px; text-align:center; color:#0096D1; font-size:40px;">
                  <i class="bi bi-trophy-fill"></i> 
                </div>

                <div class="plan_title">Diamond Plan</div>
                  <div class="plan_price">
                    50,000 <span>mmk </span>
                  </div>

                  <hr>

                <div class="body">
                   <strong>Available courses</strong>
                  <ul class="ul" style="list_style_type: none">
                    <li><i class="bi bi-check-circle"></i>  Korean Language Basic Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 1 Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 2 Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 3 Course Part I</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 3 Course Part II</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 4 Course Part I</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 4 Course Part II</li>
                    <li><i class="bi bi-check-circle"></i>  Topic I Course</li>
                    <li><i class="bi bi-check-circle"></i>  အသစ်ထပ်မံဖွင့်လစ်မည့် Course အားလုံးI</li>
                  </ul>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- End Skills Grid -->
      </div>
    </section><!-- /About Section -->
    
    <?php }else { ?>
    <!-- About Section -->
    <section id="vip-plan" class="about section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>VIP Package Plans</h2>
        <p>Calamus Education for Higher Education of Myanmar</p>
      </div><!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <!-- Skills Grid -->
        <div class="skills-wrap">
          <div class="row g-4">
            <!-- <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="180">
              <div class="card">
                <div class="head" style="padding:7px; text-align:center; color:silver; font-size:40px;">
                  <i class="bi bi-trophy-fill"></i> 
                </div>
                <div class="body">
                  <div class="plan_title">Silver Plan</div>
                  <div class="plan_price">
                    30,000 <span>mmk </span>
                  </div>
                    <hr>
                  <strong>Available courses</strong>
                  <ul class="ul">
                    <li><i class="bi bi-check-circle"></i>  Korean Language Basic Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 1 Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 2 Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 3 Course Part I</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 3 Course Part II</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="180">
              <div class="card">
                <div class="head" style="padding:7px; text-align:center; color:gold; font-size:40px;">
                  <i class="bi bi-trophy-fill"></i> 
                </div>
                <div class="body">

                  <div class="plan_title" >Gold Plan</div>
                  <div class="plan_price">
                    40,000 <span>mmk </span>
                  </div>
                    <hr>
                  <strong>Available courses</strong>
                  <ul class="ul">
                    <li><i class="bi bi-check-circle"></i>  Korean Language Basic Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 1 Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 2 Course</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 3 Course Part I</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 3 Course Part II</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 4 Course Part I</li>
                    <li><i class="bi bi-check-circle"></i>  Korean Language Level 4 Course Part II</li>
                  </ul>
                </div>
              </div>
            </div> -->

            <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="180">
              <div class="card">

                <!-- <div class="head" style="background:#0096D1; padding:7px; text-align:center; color:white; font-weight:bold">
                  <i class="bi bi-trophy"></i> 
                </div> -->

                <div class="head" style="padding:7px; text-align:center; color:#0096D1; font-size:40px;">
                  <i class="bi bi-trophy-fill"></i> 
                </div>

                <div class="plan_title">Diamond Plan</div>
                  <div class="plan_price">
                    30,000 <span>mmk </span>
                  </div>

                  <hr>

                <div class="body">
                   <strong>Available courses</strong>
                  <ul class="ul" style="list_style_type: none">
                    <li><i class="bi bi-check-circle"></i>  English Language Basic Course</li>
                    <li><i class="bi bi-check-circle"></i>  English Language Elementary Course</li>
                    <li><i class="bi bi-check-circle"></i>  English Translation Course </li>
                    <li><i class="bi bi-check-circle"></i>  English Essential Speaking Course</li>
                    <li><i class="bi bi-check-circle"></i>  English Listening Course</li>
                    <li><i class="bi bi-check-circle"></i>  အသစ်ထပ်မံဖွင့်လစ်မည့် Course အားလုံးI</li>
                  </ul>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- End Skills Grid -->
      </div>
    </section><!-- /About Section -->

    <?php }?>
     <!-- About Section -->
    <section id="additional-lessons" class="about section light-background">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <!-- Quote -->
        <blockquote class="personal-quote" data-aos="fade-down" data-aos-delay="200">
          <p>Additional Free Lessons</p>
        </blockquote>
        <!-- End Quote -->

        <!-- Fun Facts -->
        <div class="facts-wrap">
          <div class="row g-3 justify-content-center">
             
            <?php if($app == 'ee'){ ?>
              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Basic Grammer Book</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Translation Book</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Sentence Construction Book</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Let's Learn English With VOA</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Words On Topics</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Proverb</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Tips and Slang</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Phrase</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Phonics For Kids</span>
                </div>
              </div>


              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Idioms</span>
                </div>
              </div>

            <?php }else { ?>
              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Learn Korean With K-drama</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Words On Topics</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Phrase</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Tips and Slang</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Useful Words</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Conversation</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Number and Time</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Korean Blog</span>
                </div>
              </div>

              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Hanja</span>
                </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Short Video</span>
                </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Drama Lyrics</span>
                </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Kid's Song</span>
                </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <div class="fact-pill">
                  <i class="bi bi-mortarboard"></i>
                  <span>Tongue Twisters</span>
                </div>
              </div>
            <?php }?>
             
          </div>
        </div>
        <!-- End Fun Facts -->

      </div>

    </section><!-- /About Section -->

    <section id="app_gallery" class="about section light-background">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <!-- Quote -->
        <blockquote class="personal-quote" data-aos="fade-down" data-aos-delay="200">
          <p>App Gallery</p>
        </blockquote>
        <!-- End Quote -->

        <!-- Fun Facts -->
        <div class="facts-wrap">
          <div class="row g-3 justify-content-center">
            <?php foreach($photos as $photo){ ?>
              <div class="col-6 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="240">
                <figure class="portrait-wrap position-relative" data-aos="fade-left" data-aos-delay="200">
                  <img src="assets/img/<?php echo $photo ?>" alt="Profile Portrait" class="img-fluid portrait-img" style= "border-radius:10px">
                  <figcaption class="visually-hidden"></figcaption>
                </figure>
              </div>
            <?php }?>
          </div>
        </div>
        <!-- End Fun Facts -->

      </div>

    </section><!-- /About Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-stretch">
          <div class="col-12" data-aos="fade-left" data-aos-delay="300">
            <div class="contact-sidebar">
              <div class="contact-header">
                <h3>Get in Touch</h3>
                <p></p>
              </div>

              <div class="row contact-methods">
                <div class="col-lg-6 col-md-6">
                  <div class="contact-method" data-aos="fade-in" data-aos-delay="350">
                    <div class="contact-icon">
                      <i class="bi bi-geo-alt"></i>
                    </div>
                    <div class="contact-details">
                      <span class="method-label">Address</span>
                      <p>Yangon, Myanmar.</p>
                      <br><br>
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-6 col-md-6">
                  <div class="contact-method" data-aos="fade-in" data-aos-delay="400">
                    <div class="contact-icon">
                      <i class="bi bi-envelope"></i>
                    </div>
                    <div class="contact-details">
                      <span class="method-label">Email</span>
                      <p>
                        calamuseducation@gmail.com <br> 
                        shweyamin3454691@gmail.com 
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <div class="contact-method" data-aos="fade-in" data-aos-delay="450">
                    <div class="contact-icon">
                      <i class="bi bi-telephone"></i>
                    </div>
                    <div class="contact-details">
                      <span class="method-label">Phone</span>
                      <p>17200489735(china), 09682537158(myanmar)</p>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <div class="contact-method" data-aos="fade-in" data-aos-delay="500">
                    <div class="contact-icon">
                      <i class="bi bi-clock"></i>
                    </div>
                    <div class="contact-details">
                      <span class="method-label">Hours</span>
                      <p>24/7</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="connect-section" data-aos="fade-up" data-aos-delay="550">
                <span class="connect-label">Connect with us</span>
                <div class="social-links">
                  <a href="https://www.youtube.com/@calamuseducationmyanmar5078" class="social-link">
                    <i class="bi bi-youtube"></i>
                  </a>
                  <a href="<?php echo $facebook_link ?>" class="social-link">
                    <i class="bi bi-facebook"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename"></strong> <span>All Rights Reserved</span></p>
      </div>
      <!-- <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-wechat"></i></a>
      </div> -->
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>