@extends('main')

@section('content')
<!-- ====== Hero Section ====== -->
<header id="hero" class="hero d-flex align-items-center">
    <div class="container text-white">
        <!-- العنوان -->
        <h1 id="hero-title" class="fw-bold mb-3" data-aos="fade-up" data-aos-duration="1000">
            {{ $hero->title }}
        </h1>

        <!-- النص -->
        <p id="hero-text" class="mb-3" data-aos="fade-up" data-aos-duration="1200">
            {{ $hero->content }}
        </p>

        <!-- الأزرار -->
        <div data-aos="fade-up" data-aos-delay="400" data-aos-duration="1400">
            <a href="#" id="btn-start" class="btn btn-success btn-lg me-2">{{ __('home.btn_start') }}</a>
            <a href="#" id="btn-about" class="btn btn-outline-light btn-lg">{{ __('home.btn_about') }}</a>
        </div>
    </div>
</header>

<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<section class="about-section py-5" id="aboutus">
    <div class="container">
        <div class="row {{ App::getLocale() =='en'? 'flex-row-reverse':'' }} align-items-center">
            <!-- الصورة -->
            <div class="col-lg-6 col-md-12 text-center mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1200">
                <img src="{{asset('storage/'.$setting->about_us_image)}}" alt="About Image"
                    class="img-fluid rounded shadow">
            </div>

            <!-- النص -->
            <div class="col-lg-6 col-md-12" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                <h2 class="main-title mb-3">{{ __('home.about_title') }}</h2>
                <p class="about-text">
                    {{ $setting->about_us}}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- \\\\\\\\\\\\\\\\\\ -->

<section class="choose-us-section" id="whyus">
    <div class="choose-us-container">
        <div class="choose-us-content-wrapper">
            <!-- Content -->
            <div class="choose-us-text">
                <h2 class="choose-us-title">{{ __('home.choose_us_title') }}</h2>
                <div class="choose-us-features">


                    @foreach($whyus as $ws)
                    <div class="choose-us-card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                        <div class="choose-us-icon"><i class="{{ $ws->icon }}"></i></div>
                        <div class="choose-us-card-content">
                            <h4>{{$ws->title }}</h4>
                            <p>{{ $ws->content }}</p>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>

            <!-- Image -->
            <div class="choose-us-image">
                <img src="{{Storage::url($setting->why_us_image)}}" class="choose-us-main-image">
            </div>
        </div>
    </div>
</section>

<!-- سكشن الكروت -->
<section class="flip-cards-section">
    <div class="container">
        <h1 class="cards-title" data-aos="fade-up" data-aos-duration="1000">
            {{ __('home.cards_title') }}
        </h1>
        <div class="row g-4">

            <!-- كارت 1 -->

            @foreach ($programs as $p )
            <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="100">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- الوجه الأمامي -->
                        <div class="flip-card-front">
                            <img src="{{Storage::url($p->image)}}" class="card-img-top">
                            <div class="card-header text-center fw-bold">{{ $p->name }}</div>
                        </div>
                        <!-- الوجه الخلفي -->
                        <div class="flip-card-back">
                            <a href="{{ route('getprogram',$p->id)}}" class="details-btn">{{ __('home.details_btn')
                                }}</a>
                        </div>
                    </div>
                </div>
                <p class="card-summary mt-2">
                    {{ $p->description }}
                </p>
            </div>
            @endforeach


        </div>
    </div>
</section>

<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<section class="statistics-section">
    <div class="container-fluid h-100 d-flex flex-wrap align-items-center justify-content-between">

        <!-- Statistics Cards -->
        <div class="d-flex flex-wrap col-lg-8 col-md-12 gap-4">

            @foreach ($statistics as $stat)

            <div class="stat-card text-center flex-fill" data-aos="zoom-in" data-aos-duration="1000"
                data-aos-delay="100">
                <div class="stat-icon"><i class="{{ $stat->icon }}"></i></div>
                <div class="stat-number">{{ $stat->number }}</div>
                <div class="stat-description">{{ $stat->title }}</div>
            </div>
            @endforeach


        </div>

        <!-- Call to Action -->
        <div class="cta-section col-lg-4 col-md-12 text-center mt-4 mt-lg-0" data-aos="fade-left"
            data-aos-duration="1200" data-aos-delay="300">
            <h2 class="cta-title">{{ __('home.cta_title') }}</h2>
            <p class="cta-subtitle">{{ __('home.cta_subtitle') }}</p>
            <button class="btn cta-button" data-bs-toggle="modal" data-bs-target="#join-us">{{ __('home.cta_button')
                }}</button>
        </div>

    </div>
</section>

<div class="modal fade" id="join-us" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('home.modal_title') }}</h5>
            </div>
            <div class="modal-body">
                <form id="brandForm" action="{{ route('request.join.store') }}">
                    <!-- اسم العلامة التجارية -->
                    <div class="mb-3">
                        <label class="form-label">
                            {{ __('home.brand_name') }} <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" required name="brand_name">
                    </div>

                    <!-- رقم الهاتف -->
                    <div class="mb-3">
                        <label class="form-label">
                            {{ __('home.phone') }} <span class="text-danger">*</span>
                        </label>
                        <input type="tel" class="form-control" required pattern="[0-9]{8,15}"
                            placeholder="{{ __('home.phone_placeholder') }}" name="phone">
                    </div>

                    <!-- البريد الإلكتروني -->
                    <div class="mb-3">
                        <label class="form-label">
                            {{ __('home.email') }} <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" required name="email">
                    </div>

                    <!-- رابط الموقع -->
                    <div class="mb-3">
                        <label class="form-label">{{ __('home.website') }}</label>
                        <input type="url" class="form-control" placeholder="{{ __('home.website_placeholder') }}"
                            name="website_url">
                    </div>

                    <!-- ملاحظات -->
                    <div class="mb-3">
                        <label class="form-label">{{ __('home.notes') }}</label>
                        <textarea class="form-control" rows="3" name="note"></textarea>
                    </div>

                    <!-- زرار إرسال -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('home.cancel')
                            }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('home.send') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- \\\\\\\\\\\\\\\\ -->
<!-- \\\\\\\\\\\\\\\\ -->
<section class="contact-section position-relative overflow-hidden py-5" id="sponsors">
    <div class="container min-vh-100 d-flex align-items-center">
        <div class="row w-100 g-4">

            <!-- النصوص -->
            <div class="col-lg-8 d-flex flex-column justify-content-center text-center text-lg-center">
                <h1 class="display-3 fw-bold mb-4" data-aos="fade-up" data-aos-duration="1000">
                    {{ __('home.official_sponsors') }}
                </h1>

                <p class="lead mb-4 fs-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    {{ __('home.share_ideas') }}
                </p>

                <!-- Carousel -->
                <div id="sponsorsCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        {{-- @dd($sponsors) --}}
                        @foreach($sponsors->chunk(6) as $chunkIndex => $chunk)

                        <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                            <div class="d-flex justify-content-center align-items-center gap-4 flex-wrap">
                                @foreach($chunk as $sponsor)
                                <img src="{{ storage::url($sponsor['image']) }}" class="sponsor-logo"
                                    alt="{{ $sponsor['name'] }}">
                                @endforeach
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#sponsorsCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#sponsorsCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>

                <!-- زرار الانضمام -->
                <button class="btn btn-lg px-4 py-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#sponsorModal"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    {{ __('home.join_us') }}
                </button>
            </div>

            <!-- أيقونات يمين -->
            <div class="col-lg-4 d-none d-lg-flex justify-content-center align-items-center">
                <div class="lightbulb-container" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="400">
                    <div class="sponsor-icon"><i class="fas fa-handshake"></i></div>
                    <div class="sponsor-icon-small"><i class="fas fa-building"></i></div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<div class="modal fade" id="sponsorModal" tabindex="-1" aria-labelledby="sponsorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="sponsorModalLabel">{{ __('home.sponsor_registration') }}</h5>
            </div>

            <div class="modal-body">
                <form id="sponsorForm" action="{{ route('sponsors.store') }}">
                    <div class="mb-3">
                        <label for="companyName" class="form-label">{{ __('home.company_name') }}</label>
                        <input type="text" class="form-control" id="companyName" required name="company_name">
                    </div>
                    <div class="mb-3">
                        <label for="contactPerson" class="form-label">{{ __('home.contact_person') }}</label>
                        <input type="text" class="form-control" id="contactPerson" required name="contact_person">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('home.email') }}</label>
                        <input type="email" class="form-control" id="email" required name="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">{{ __('home.phone') }}</label>
                        <input type="tel" class="form-control" id="phone" required name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">{{ __('home.notes') }}</label>
                        <textarea class="form-control" id="message" rows="3" name="note"></textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('home.cancel')
                    }}</button>
                <button type="submit" class="btn btn-primary" form="sponsorForm">{{ __('home.send') }}</button>
            </div>

        </div>
    </div>
</div>
<!-- \\\\\\\\\\\\\\\\\\\\\ -->
</section>
@endsection


@push('scripts')
<script>
    const hero = document.getElementById('hero');
    
    // get images from Blade variable
    const images = [
   @if($hero->image1) "{{ Storage::url($hero->image1) }}", @endif
@if($hero->image2) "{{ Storage::url($hero->image2) }}", @endif
@if($hero->image3) "{{ Storage::url($hero->image3) }}", @endif
@if($hero->image4) "{{ Storage::url($hero->image4) }}", @endif
    ];

    let currentImage = 0;

    function changeBackground() {
        if(hero && images.length) {
            hero.style.backgroundImage = `url('${images[currentImage]}')`;
            hero.style.backgroundSize = "cover";      
            hero.style.backgroundPosition = "center"; 
            currentImage = (currentImage + 1) % images.length;
        }
    }

    // initial background
    changeBackground();
    
    // change every 5 seconds
    setInterval(changeBackground, 5000);
</script>
@endpush