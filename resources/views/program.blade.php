@extends("main")

@section("style")
<link rel="stylesheet" href="{{ asset('assets/style1.css') }}">
@endsection

@section("content")

{{-- Hero Section --}}
<section class="hero-section d-flex align-items-center" style="background: linear-gradient(rgba(9,71,52,0.6), rgba(9,71,52,0.6)), 
           url('{{ asset('storage/' . $program->background_image) }}') center / cover no-repeat;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0" data-aos="fade-left" data-aos-duration="1200"
                data-aos-easing="ease-in-out">
                <img src="{{ Storage::url($program->image) }}" alt="{{ $program->name }}" class="img-fluid hero-img">
            </div>

            <div class="col-lg-6 text-center text-lg-end text-white" data-aos="fade-right" data-aos-duration="1200"
                data-aos-easing="ease-in-out" data-aos-delay="200">
                <h1 class="fw-bold">{!! __('program.hero_title') !!}</h1>
                <p class="lead mt-3">{!! $program->description !!}</p>
            </div>

        </div>
    </div>
</section>

{{-- أهداف البرنامج --}}
<section class="goals-section py-5">
    <div class="container">
        <h2 class="text-center mb-5" data-aos="fade-down" data-aos-duration="1000">{{ __('program.goals_section') }}
        </h2>
        <div class="d-flex flex-wrap justify-content-center gap-4">
            @if($program->goals->count())
            @foreach($program->goals as $index => $goal)
            <div class="flip-card" data-aos="fade-right" data-aos-duration="800" data-aos-delay="{{ $index * 100 }}">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class="{{ $goal->icon }} fa-2x mb-3"></i>
                        <h4>{{ $goal->title }}</h4>
                    </div>
                    <div class="flip-card-back">
                        <p>{!! $goal->content ?? 'لا يوجد وصف' !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p class="text-center w-100" style="font-size: 1.2rem; color:#094734;">{{ __('program.no_goals') }}</p>
            @endif
        </div>
    </div>
</section>

{{-- الأنشطة اليومية --}}
<section class="course-carousel-section">
    <div class="container">
        <h2>{{ __('program.daily_program', ['count' => $program->dayActivity->count()]) }}</h2>
        @if($program->dayActivity->count())
        <div id="courseCarousel" class="carousel slide course-carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($program->dayActivity as $index => $activity)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="card">
                        <h3>{{ __("program.day") }} {{ $activity->number }}</h3>
                        <p>{{ $activity->content }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#courseCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#courseCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        @else
        <p class="text-center" style="color:white; font-size:1.2rem;">{{ __('program.no_activities') }}</p>
        @endif
    </div>
</section>

{{-- معرض الصور --}}
<section class="expanding-cards py-5">
    <div class="container">
        <div class="cards-wrapper d-flex">
            @if($program->images->count())
            @foreach($program->images as $img)
            <div class="card-item">
                <img src="{{ Storage::url($img->image) }}" alt="صورة البرنامج">
            </div>
            @endforeach
            @else
            <p class="text-center w-100" style="font-size:1.2rem; color:#094734;">{{ __('program.no_images') }}</p>
            @endif
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="faq-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">{{ __('program.faq_section') }}</h2>
        @if($program->fags->count())
        <div class="accordion" id="faqAccordion">
            @foreach($program->fags as $index => $fag)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $index }}">
                    <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                        aria-expanded="{{$index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                        {{ $fag->question }}
                    </button>
                </h2>
                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                    aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {{ $fag->answer }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center" style="font-size:1.2rem; color:#094734;">{{ __('program.no_faqs') }}</p>
        @endif
    </div>
</section>

@endsection

@section("script")
<script>
    AOS.init();
</script>
@endsection