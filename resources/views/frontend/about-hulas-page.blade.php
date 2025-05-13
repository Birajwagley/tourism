@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Tourisman')
@section('content')

    <div class="min-h-screen">

        <!-- banner-section -->
        <section class="relative">
            <div class="mb-10">
                <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image"
                    alt="Banner Image" class="h-60 w-full object-cover" />
            </div>
            <div class="absolute w-full top-20">
                <div class="flex flex-col space-y-8 ml-10">
                    <h3 class="text-2xl md:text-4xl font-extrabold text-white">About Tourisman</h3>
                    <div class="flex space-x-5 items-center">
                        <a href="{{ route('homepage') }}" class="text-white font-bold">Home</a>
                        <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
                        <a href="{{ route('aboutHulasRemittance') }}" class="text-accent font-bold">About Hulas
                            Remittance</a>
                    </div>
                </div>
        </section>
        <!-- banner-section -->
        <div class="mx-6 md:mx-10 lg:mx-20 xl:mx-40 pb-20">

            <!-- About Tourisman -->
            <section class="flex flex-col md:flex-row md:justify-center md:items-center lg:flex-row gap-10">
                <div class="flex justify-center flex-1 flex-grow text-center">
                    <div class="flex-1 flex justify-center w-full">
                        @isset($aboutUs->image)
                            <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="About Us Image"
                                class="w-full max-w-md h-80 rounded-md object-cover bg-gray-100"
                                onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.webp') }}';" />
                        @endisset
                    </div>
                </div>

                @isset($aboutUs)
                    <div class="flex flex-2 flex-col space-y-6">
                        @isset($aboutUs->short_description_en)
                            <p class="text-xl lg:text-lg lg:max-w-4xl line-clamp-3">
                                "{{ $aboutUs->short_description_en }}"
                            </p>
                        @endisset
                        <p class="text-gray-600 text-base lg:text-lg text-justify line-clamp-11">
                            {{ $aboutUs->description_en ?? $aboutUs->description }}
                        </p>
                        <a href="{{ route('aboutHulasRemittance') }}"
                            class="text-center text-accent hover:opacity-85 text-md drop-shadow-sm cursor-pointer bg-black px-6 py-2 w-40 rounded-full font-bold">
                            Read more
                        </a>
                    </div>
                @endisset
            </section>


            <!----------Services Section---------->
            <section class="m-10 items-center">
                <section class="overflow-x-hidden">
                    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                        <div class="flex flex-col items-center">
                            <h1 class="font-bold text-accent uppercase text-base lg:text-lg tracking-wider">
                                Our Services
                            </h1>

                            <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                                Simple. Secure. Seamless.
                            </p>
                            <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
                                Fast, secure money transfers made easy with Tourisman and trusted partners like
                                Western Union.
                            </p>
                        </div>
                    </div>
                </section>
                <div class="relative flex items-center justify-center">
                    <button
                        class="absolute left-0 top-1/2 transform -translate-y-1/2 text-xl text-gray-600 bg-transparent border-none cursor-pointer z-10"
                        onclick="prevServicesSlider()">
                        ❮
                    </button>

                    <div class="overflow-hidden rounded-lg w-full">
                        <div class="flex flex-row gap-8 transition-transform duration-500 ease-in-out"
                            id="services-slider-content">
                            @isset($services)
                                @foreach ($services as $service)
                                    <div
                                        class="flex-none w-[280px] md:w-[300px] lg:w-[380px] max-h-[800px] bg-gray-200 rounded-lg shadow-lg p-4 gap-6 flex flex-col justify-between services-review-card">
                                        <div class="flex flex-col items-center">
                                            @if ($service->file)
                                                <img src="{{ asset('storage/' . $service->file) }}"
                                                    alt="{{ $service->name_en }}"
                                                    class="w-full h-[200px] rounded-lg object-cover" />
                                            @else
                                                <div
                                                    class="w-full h-[200px] rounded-lg bg-gray-200 flex items-center justify-center">
                                                    <i
                                                        class="{{ $service->icon ?? 'fa fa-briefcase' }} text-5xl text-gray-400"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <h3 class="text-lg font-bold text-center">{{ $service->name_en }}</h3>
                                        <p class="text-base md:text-lg text-black text-center line-clamp-3">
                                            {{ $service->description_en }}
                                        </p>
                                        <div class="flex justify-center">
                                            <a href="{{ $service->slug ? route('serviceDetail', $service->slug) : '#' }}"
                                                class="bg-black hover:opacity-85 text-accent px-4 py-2 tracking-wide rounded-full text-sm text-center font-semibold">Read
                                                more</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>

                    <button
                        class="absolute right-0 top-1/2 transform -translate-y-1/2 text-xl text-black bg-transparent border-none cursor-pointer z-10"
                        onclick="nextServicesSlider()">
                        ❯
                    </button>
                </div>
            </section>
            <!----------Services Section---------->

            <!-- Section breaker -->
            <div
                class="flex flex-col lg:flex-row bg-accent items-center justify-around gap-10 text-black rounded-lg mx-6 my-10 md:m-10 lg:mx-20 px-10 py-10">
                <div class="flex flex-col gap-6 text-center">
                    <h1 class="text-2xl lg:text-5xl font-extrabold tracking-wide"> Let's Get You Started
                    </h1>
                    <p class="line-clamp-2 text-lg lg:text-xl"> Whether you're sending money, becoming an agent, or just
                        exploring—Tourisman is here to help every step of the way.

                    </p>
                </div>
                <a href="{{ route('findAnAgent') }}"
                    class="px-6 py-4 bg-black text-accent rounded-full cursor-pointer text-center text-xl w-60 inline-block font-bold hover:opacity-85">Find
                    an
                    agent</a>
            </div>
            <!-- Section breaker -->
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        // Services slider functionality
        let servicesCurrentSlide = 0;
        const servicesSliderContent = document.getElementById('services-slider-content');
        const servicesCards = document.querySelectorAll('.services-review-card');
        const servicesCardWidth = servicesCards.length > 0 ? servicesCards[0].offsetWidth + 32 : 400; // width + gap
        const servicesMaxSlide = Math.max(0, servicesCards.length - 3); // Show 3 items at once on desktop

        function nextServicesSlider() {
            if (servicesCurrentSlide < servicesMaxSlide) {
                servicesCurrentSlide++;
                updateServicesSliderPosition();
            }
        }

        function prevServicesSlider() {
            if (servicesCurrentSlide > 0) {
                servicesCurrentSlide--;
                updateServicesSliderPosition();
            }
        }

        function updateServicesSliderPosition() {
            const position = -servicesCurrentSlide * servicesCardWidth;
            servicesSliderContent.style.transform = `translateX(${position}px)`;
        }

        // Initialize slider positions on page load
        window.addEventListener('load', function() {
            // Only initialize if elements exist
            if (servicesSliderContent && servicesCards.length > 0) {
                updateServicesSliderPosition();
            }
        });
    </script>

    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush
@push('scripts')
    <script>
        // Services slider functionality
        let servicesCurrentSlide = 0;
        const servicesSliderContent = document.getElementById('services-slider-content');
        const servicesCards = document.querySelectorAll('.services-review-card');
        const servicesCardWidth = servicesCards.length > 0 ? servicesCards[0].offsetWidth + 32 : 400; // width + gap
        const servicesMaxSlide = Math.max(0, servicesCards.length - 3); // Show 3 items at once on desktop

        function nextServicesSlider() {
            if (servicesCurrentSlide < servicesMaxSlide) {
                servicesCurrentSlide++;
                updateServicesSliderPosition();
            }
        }

        function prevServicesSlider() {
            if (servicesCurrentSlide > 0) {
                servicesCurrentSlide--;
                updateServicesSliderPosition();
            }
        }

        function updateServicesSliderPosition() {
            const position = -servicesCurrentSlide * servicesCardWidth;
            servicesSliderContent.style.transform = `translateX(${position}px)`;
        }

        // Initialize slider positions on page load
        window.addEventListener('load', function() {
            // Only initialize if elements exist
            if (servicesSliderContent && servicesCards.length > 0) {
                updateServicesSliderPosition();
            }
        });
    </script>

    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush
@push('scripts')
    <script>
        let servicesSliderIndex = 0;

        function nextServicesSlider() {
            const servicesSliderContent = document.getElementById(
                "services-slider-content"
            );
            const servicesSlides = document.querySelectorAll(
                ".services-review-card"
            );
            const totalSlides = servicesSlides.length;

            servicesSliderIndex = (servicesSliderIndex + 1) % totalSlides;
            const offset = -servicesSliderIndex * (servicesSlides[0].offsetWidth + 16);

            servicesSliderContent.style.transform = `translateX(${offset}px)`;
        }

        function prevServicesSlider() {
            const servicesSliderContent = document.getElementById(
                "services-slider-content"
            );
            const servicesSlides = document.querySelectorAll(
                ".services-review-card"
            );
            const totalSlides = servicesSlides.length;

            servicesSliderIndex =
                (servicesSliderIndex - 1 + totalSlides) % totalSlides;
            const offset = -servicesSliderIndex * (servicesSlides[0].offsetWidth + 16);

            servicesSliderContent.style.transform = `translateX(${offset}px)`;
        }
    </script>

    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush
@push('scripts')
    <script>
        // Services slider functionality
        let servicesCurrentSlide = 0;
        const servicesSliderContent = document.getElementById('services-slider-content');
        const servicesCards = document.querySelectorAll('.services-review-card');
        const servicesCardWidth = servicesCards.length > 0 ? servicesCards[0].offsetWidth + 32 : 400; // width + gap
        const servicesMaxSlide = Math.max(0, servicesCards.length - 3); // Show 3 items at once on desktop

        function nextServicesSlider() {
            if (servicesCurrentSlide < servicesMaxSlide) {
                servicesCurrentSlide++;
                updateServicesSliderPosition();
            }
        }

        function prevServicesSlider() {
            if (servicesCurrentSlide > 0) {
                servicesCurrentSlide--;
                updateServicesSliderPosition();
            }
        }

        function updateServicesSliderPosition() {
            const position = -servicesCurrentSlide * servicesCardWidth;
            servicesSliderContent.style.transform = `translateX(${position}px)`;
        }

        // Initialize slider positions on page load
        window.addEventListener('load', function() {
            // Only initialize if elements exist
            if (servicesSliderContent && servicesCards.length > 0) {
                updateServicesSliderPosition();
            }
        });
    </script>

    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush
