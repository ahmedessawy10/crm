<!DOCTYPE html>
<html dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Title and Meta Tags -->
    <title>{{ __('site.title') }}</title>
    <meta property="og:title" content="{{ __('site.title') }}">
    <meta name="twitter:title" content="{{ __('site.title') }}">
    <meta name="description" content="{{ __('site.description') }}">
    <meta property="og:description" content="{{ __('site.description') }}">
    <meta name="twitter:description" content="{{ __('site.description') }}">
    <meta name="keywords" content="{{ __('site.keywords') }}">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="twitter:image:src" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta name="twitter:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="">
    <meta property="og:site_name" content="{{ $setting->app_name }} Foundation">
    <meta property="og:type" content="website">

    <link rel="shortcut icon" href="{{ $setting->logo }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Tajawal:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @if (!Route::is('getprogram'))
    <link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
    @endif


    <meta name="theme-color" content="#ffffff">

    @yield("style")
</head>

{{-- {{ dd($setting) }} --}}

<body class="">
    <!-- ====== Navbar ====== -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" id="nav-brand">
                <img src="{{Storage::url($setting->logo) }}"
                    style="height:50px; background-color:#0c5e40; border-radius:10%;">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('site.toggle_navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- <li class="nav-item" data-aos="zoom-in"><a class="nav-link" href="#">{{ __('site.paths') }}</a>
                    </li> --}}

                    <li class="nav-item dropdown" data-aos="zoom-in">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('site.programs') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @foreach ($programs as $program )
                            <a class="dropdown-item " href="{{ route('getprogram',$program->id)
                                }}">{{$program->name}}</a>

                            @endforeach
                            {{-- <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </li>
                    {{-- <li class="nav-item" data-aos="zoom-in"><a class="nav-link" href="#">{{ __('site.programs')
                            }}</a>
                    </li> --}}
                    <li class="nav-item" data-aos="zoom-in"><a class="nav-link" href="{{ route('home') }}#aboutus">
                            {{ __('site.about_us') }}
                        </a>
                    </li>
                    <li class="nav-item" data-aos="zoom-in"><a class="nav-link" href="{{ route('home') }}#whyus">
                            {{ __('site.why') ." ". $setting->app_name}}
                        </a>
                    </li>
                    <li class="nav-item" data-aos="zoom-in"><a class="nav-link" href="{{ route('home') }}#sponsors">{{
                            __('site.sponsors') }}</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item" style="{{(App::getlocale()=='en')
                            ? 'margin-right:0':"" }}">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        @if(App::getLocale() != $localeCode)
                        <a rel="alternate" class="nav-link" hreflang="{{ $localeCode }}" style="{{($localeCode=='en')
                            ? 'margin-left:0':"" }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                        @endif
                        @endforeach
                    </li>
                    <li class="nav-item"><a class="btn btn-success" href="#">{{ __('site.login') }}</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield("content")

    <!-- ====== Footer ====== -->
    <footer class="footer-section">
        <div class="container">
            <div class="row mb-4">
                <section class="col-lg-4 mb-4 mb-lg-0 social-contact" data-aos="fade-up">
                    <div class="social-icons mb-4">
                        <a href="{{ $setting->facebook_url }}" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $setting->youtube_url }}" class="social-icon"><i class="fab fa-youtube"></i></a>
                        <a href="{{ $setting->snapchat_url }}" class="social-icon"><i class="fab fa-snapchat"></i></a>
                        <a href="{{ $setting->snapchat_url }}" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $setting->snapchat_url }}" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                    </div>
                    <p class="contact-text">{{$setting->address}}</p>
                    <p class="contact-email">{{$setting->email}}</p>
                </section>

                <section class="col-lg-2 col-md-4 mb-4 mb-lg-0 text-lg-end">
                    <h5 class="footer-title">{{ __('site.contact_us') }}</h5>
                    <ul class="footer-links">
                        <li><a href="#">{{ __('site.have_question') }}</a></li>
                        <li><a href="#">{{ __('site.want_to_ask') }}</a></li>
                    </ul>
                    <button class="btn btn-outline-light btn-sm mt-3">{{ __('site.contact_button') }}</button>
                </section>

                <section class="col-lg-3 col-md-4 mb-4 mb-lg-0 text-lg-end">
                    <h5 class="footer-title">{{ __('site.our_communities') }}</h5>
                    <ul class="footer-links">
                        <li><a href="#">{{ __('site.youth_council') }}</a></li>
                        <li><a href="#">{{ __('site.saudi_leaders') }}</a></li>
                    </ul>
                </section>

                <section class="col-lg-3 col-md-4 mb-4 mb-lg-0 text-lg-end">
                    <h5 class="footer-title">{{ __('site.about_us') }}</h5>
                    <ul class="footer-links">
                        <li><a href="#">{{ __('site.about_hub') }}</a></li>
                        <li><a href="#">{{ __('site.about_foundation') }}</a></li>
                        <li><a href="#">{{ __('site.faq') }}</a></li>
                    </ul>
                </section>
            </div>

            <div class="footer-bottom row align-items-center">
                <div class="col-md-6 mb-2 mb-md-0 footer-policies">
                    <a href="#" class="policy-link">{{ __('site.privacy_policy') }}</a>
                    <a href="#" class="policy-link">{{ __('site.safe_use_policy') }}</a>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="copyright-text">
                        {{ __('site.copyright') }}
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap + Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="{{ asset('assets/script.js') }}"></script>


    @stack('scripts')

    <script>
        document.getElementById('brandForm').addEventListener('submit', function(e) {
            e.preventDefault();
        
            let formData = new FormData(this);

            fetch(this.action, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message);
                $('#join-us').modal('hide');
                modal.hide();
                this.reset();
            })
            .catch(err => console.error(err));
        });




        document.getElementById('sponsorForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        let formData = new FormData(this);
        
        fetch(this.action, {
        method: "POST",
        headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
        })
        .then(res => res.json())
        .then(data => {
        alert(data.message);
    //    var modalEl = document.getElementById('sponsorModal');
    //     var modal = bootstrap.Modal.getInstance(modalEl);
        $('#sponsorModal').modal('hide');
        
        // اعمل reset للفورم
        this.reset();
        })
        .catch(err => console.error(err));
        });
    </script>

</body>

</html>