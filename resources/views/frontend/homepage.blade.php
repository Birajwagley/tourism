@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Tourisman')
@push('styles')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .carousel {
            display: flex;
            width: 100%;
            /* Adjust according to your container's size */
            overflow: hidden;
            /* Hide the content that is off-screen */
        }

        .carousel-item {
            flex: 0 0 100%;
            /* Each item takes up 100% of the width */
            animation: carouselAnim 200s linear infinite;
            /* 60 seconds for a full loop, slow pace */
            transition: transform 0.5s ease;
        }

        .carousel-focus:hover {
            transition: all 0.8s;
            transform: scale(1.1);
        }

        .carousel-container {
            display: flex;
            animation: scrollOnce 30s linear infinite;
        }

        .carousel-container.reverse {
            animation: scrollBack 0s linear infinite;
        }


        .carousel:hover .carousel-container {
            animation-play-state: paused;
        }
    </style>
@endpush

@section('content')
    <div class="min-h-screen">
        <!-- Slider Section -->
        @isset($sliders)
            <section id="home-slider">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative min-h-[300px] h-[50vh] sm:h-[60vh] md:h-[70vh] lg:h-[80vh] overflow-hidden rounded-lg">
                        <!-- Item 1 -->
                        @foreach ($sliders as $key => $slider)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item="{{ $key === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $slider->image) }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="{{ $slider->title ?? 'Slider Image' }}" />

                                <!-- Text Overlay -->
                                <div
                                    class="absolute inset-0 flex flex-col space-y-1 md:space-y-3 items-left text-left bg-black/20 py-10 sm:py-20 md:py-40 px-20 md:pb-50 md:px-30">
                                    <h2 class="text-white text-base sm:text-xl md::text-3xl md:text-5xl font-bold"
                                        style="
                                                                                                                                                                                                                                                                                  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.01);
                                                                                                                                                                                                                                                                                  -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
                                                                                                                                                                                                                                                                                  ">
                                        {{ $slider->name_en }}
                                    </h2>
                                    <p class=" text-white text-base leading-4 sm:leading-6 sm:text-xl md:text-2xl max-w-3xl"
                                        style="
                                                                                                                                                                                                                                                                                      -webkit-text-stroke: 1px rgba(19, 18, 18, 0.096);
                                                                                                                                                                                                                                                                                  ">
                                        {{ $slider->short_description_en }}
                                    </p>
                                    <a href="{{ $slider->link ? $slider->link : '#' }}"
                                        class="px-3 sm:px-6 py-1 sm:py-2 bg-accent w-34 sm:w-40 text-center text-black border-2 rounded-full hover:opacity-85 font-semibold text-sm sm:text-lg">
                                        Know more </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        @isset($sliders)
                            @foreach ($sliders as $key => $slider)
                                <button type="button" class="w-3 h-3 rounded-full"
                                    aria-current="{{ $key === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"
                                    data-carousel-slide-to="{{ $key }}">
                                </button>
                            @endforeach
                        @endisset
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </section>
        @endisset

        <div class="flex flex-col gap-10 mx-6 md:m-10 lg:mx-20 xl:mx-40">

            <!-- --------About-us-section---------->
            <section class="overflow-x-hidden">
                <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                    <div class="flex flex-col items-center">
                        <h1 class="font-bold text-[#00BCD4] uppercase text-base lg:text-lg tracking-wider">
                            Our Introduction
                        </h1>
                        <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                            Welcome To Tourisman
                        </p>

                    </div>
                </div>
            </section>

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
        </div>

        <div class="bg-[#1a001a] min-h-[50vh] flex flex-col items-center justify-center p-8 space-y-12 overflow-x-hidden">

            <!-- Top Text Section -->
            <div class="text-center space-y-4">
                <h1 class="font-bold text-[#00bcd4] uppercase text-sm sm:text-base lg:text-lg tracking-widest">
                    Our Top Destination
                </h1>
                <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-white">
                    Welcome To Tourisman
                </p>
            </div>

            <!-- Cards Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 w-full max-w-7xl">
                <!-- Card 1 -->
                <div
                    class="group relative rounded-2xl overflow-hidden shadow-xl transition-transform duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer">
                    <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="Zurich"
                        class="w-full h-64 sm:h-72 md:h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute bottom-4 left-4 text-white text-2xl font-extrabold drop-shadow-lg">
                        Zurich
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="group relative rounded-2xl overflow-hidden shadow-xl transition-transform duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer">
                    <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="Geneva"
                        class="w-full h-64 sm:h-72 md:h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute bottom-4 left-4 text-white text-2xl font-extrabold drop-shadow-lg">
                        Geneva
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="group relative rounded-2xl overflow-hidden shadow-xl transition-transform duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer">
                    <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="Interlaken"
                        class="w-full h-64 sm:h-72 md:h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute bottom-4 left-4 text-white text-2xl font-extrabold drop-shadow-lg">
                        Interlaken
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-10 mx-6 md:m-10 lg:mx-20 xl:mx-40">
            <!----------Services-Section---------->

            <section class="m-10 items-center">
                <section class="overflow-x-hidden">
                    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                        <div class="flex flex-col items-center">
                            <h1 class="font-bold text-[#00BCD4] uppercase text-base lg:text-lg tracking-wider">
                                Our Services
                            </h1>

                            <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                                Simple. Secure. Seamless.
                            </p>
                            <p class="p-2 text-base lg:text-lg  text-center lg:max-w-4xl line-clamp-3">
                                Fast, secure money transfers made easy with Tourisman and trusted partners like
                                Western
                                Union.
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
                                    <p class="text-base md:text-md text-black text-center line-clamp-5">
                                        {{ $service->description_en }}
                                    </p>
                                    <div class="flex justify-center">
                                        <a href="{{ 'services/' . $service->slug }}"
                                            class="bg-black  px-4 py-2 tracking-wide rounded-full text-accent hover:opacity-85 text-center">Read
                                            more</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button
                        class="absolute right-0 top-1/2 transform -translate-y-1/2 text-xl text-black bg-transparent border-none cursor-pointer z-10"
                        onclick="nextServicesSlider()">
                        ❯
                    </button>
                </div>
            </section>
        </div>

        <div class="flex flex-col gap-10 mx-6 md:m-10 lg:mx-20 xl:mx-40">
            <!----------Become an agent Section---------->
            <section class="lg:mx-40 left-10 flex flex-col space-y-10 m-10">
                <div class="overflow-x-hidden">
                    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                        <div class="flex flex-col items-center">
                            <h1 class="font-bold text-[#00BCD4] uppercase text-base lg:text-lg tracking-wider">
                                Process to Reach Out
                            </h1>

                            <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                                Join Our Network of Trusted Agents
                            </p>
                            <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
                                Take the next step in your career by becoming an agent. Help us expand
                                our reach while enjoying flexible opportunities and competitive
                                rewards.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Equal height flex wrapper -->
                <div class="flex flex-col lg:flex-row justify-between items-stretch gap-10">
                    <!-- Left Column -->
                    <div class="flex justify-center items-center flex-1">
                        <ul class="relative border-l-2 border-dotted border-accent space-y-10">
                            @php
                                $steps = [
                                    [
                                        'title' => 'Select sender country',
                                        'desc' => 'from where you are receiving the remittance.',
                                    ],
                                    [
                                        'title' => 'Enter control number',
                                        'desc' => 'of 12 – 16 digits received from the sender.',
                                    ],
                                    ['title' => 'Enter amount', 'desc' => 'you are expecting from the sender.'],
                                    ['title' => 'Track your money', 'desc' => 'in real time, directly in the app.'],
                                    [
                                        'title' => 'Receive money and bonus',
                                        'desc' => 'straight in your IME account, along with other rewards.',
                                    ],
                                ];
                            @endphp

                            @foreach ($steps as $index => $step)
                                <li class="relative pl-6 space-x-4">
                                    <div
                                        class="absolute -left-[1.1rem] top-1 w-10 h-10  border-2 bg-accent text-black font-bold text-base rounded-full flex items-center justify-center z-10">
                                        {{ $index + 1 }}
                                    </div>
                                    <div class="mx-3">
                                        <h3 class="font-bold text-black mb-1">{{ $step['title'] }}</h3>
                                        <p class="text-[#737879] text-sm">{{ $step['desc'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Right Column -->
                    <div class="flex flex-1 flex-col justify-center items-center text-center">
                        <img src="{{ asset('assets/images/agent/agent.jpg') }}" alt="About Us Image"
                            class="w-full max-w-[600px] rounded-md object-contain xl:object-fit mb-6" />
                        <a href="{{ route('becomeAnAgent') }}"
                            class="px-6 py-2 bg-accent text-black border-2 rounded-full hover:opacity-85 font-bold tracking-wide text-base">
                            Apply to become an agent
                        </a>
                    </div>
                </div>
            </section>

        </div>

        <!-- Wrapper with full width background -->
        <section class="relative overflow-hidden min-h-[60vh] bg-cover bg-center"
            style="background-image: url('{{ asset('assets/images/background-image/world-map-dark.png') }}'); background-blend-mode: overlay;">

            <div
                class="relative z-10 max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 lg:grid-cols-12 place-content-center lg:place-items-center lg:gap-16">

                <!-- Left Side (Heading + Text + Button) -->
                <div class="mb-10 lg:mb-0 col-span-6">
                    <h1 class="sm:text-5xl text-3xl 2xl:text-6xl font-bold sm:leading-snug 2xl:leading-tight">
                        Bringing value <br />across different eminent personalities.
                    </h1>
                    <p class="mt-4 mb-7 text-text-[#1a001a] max-w-sm 2xl:text-lg 2xl:mt-4 2xl:mb-8">
                        Over 7 brands in all sizes use Tourisman to understand their business and customers better.
                    </p>
                    <a href="#"
                        class="px-6 py-2 bg-accent text-black border-2 rounded-full hover:opacity-85 font-bold tracking-wide text-base">
                        Read success stories
                    </a>
                </div>

                <!-- Right Side (Cards) -->
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-5 col-span-6">
                    <!-- Card 1 -->
                    <div
                        class="bg-white shadow-xl rounded-sm flex flex-col lg:items-center justify-between lg:flex-row gap-10 p-7">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 475.082 475.081" width="25px"
                                height="25px">
                                <g>
                                    <path
                                        d="M164.45 219.27h-63.954c-7.614 0-14.087-2.664-19.417-7.994-5.327-5.33-7.994-11.801-7.994-19.417v-9.132c0-20.177 7.139-37.401 21.416-51.678 14.276-14.272 31.503-21.411 51.678-21.411h18.271c4.948 0 9.229-1.809 12.847-5.424 3.616-3.617 5.424-7.898 5.424-12.847V54.819c0-4.948-1.809-9.233-5.424-12.85-3.617-3.612-7.898-5.424-12.847-5.424h-18.271c-19.797 0-38.684 3.858-56.673 11.563-17.987 7.71-33.545 18.132-46.68 31.267-13.134 13.129-23.553 28.688-31.262 46.677C3.855 144.039 0 162.931 0 182.726v200.991c0 15.235 5.327 28.171 15.986 38.834 10.66 10.657 23.606 15.985 38.832 15.985h109.639c15.225 0 28.167-5.328 38.828-15.985 10.657-10.663 15.987-23.599 15.987-38.834V274.088c0-15.232-5.33-28.168-15.994-38.832-10.664-10.656-23.611-15.986-38.836-15.986z" />
                                    <path
                                        d="M459.103 235.256c-10.656-10.656-23.599-15.986-38.828-15.986h-63.953c-7.61 0-14.089-2.664-19.41-7.994-5.332-5.33-7.994-11.801-7.994-19.417v-9.132c0-20.177 7.139-37.401 21.409-51.678 14.271-14.272 31.497-21.411 51.682-21.411h18.267c4.949 0 9.233-1.809 12.848-5.424 3.613-3.617 5.428-7.898 5.428-12.847V54.819c0-4.948-1.814-9.233-5.428-12.85-3.614-3.612-7.898-5.424-12.848-5.424h-18.267c-19.808 0-38.691 3.858-56.685 11.563-17.984 7.71-33.537 18.132-46.672 31.267-13.135 13.129-23.559 28.688-31.265 46.677-7.707 17.987-11.567 36.879-11.567 56.674v200.991c0 15.235 5.332 28.171 15.988 38.834 10.657 10.657 23.6 15.985 38.828 15.985h109.633c15.229 0 28.171-5.328 38.827-15.985 10.664-10.663 15.985-23.599 15.985-38.834V274.088c0-15.232-5.322-28.168-15.979-38.832z" />
                                </g>
                            </svg>
                            <p class="my-3 2xl:text-lg">
                                Scalability will never be an issue now for my brand!
                            </p>
                            <p class="text-gray-400">
                                <span class="text-gray-900 capitalize font-bold">Jane Doe</span> — ANI, CEO
                            </p>
                        </div>
                        <div class="relative shrink-0">
                            <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="Jane Doe" class="rounded-full w-24 h-24 object-cover 2xl:w-28 2xl:h-28">
                            <div
                                class="rounded-full w-24 h-24 2xl:w-28 2xl:h-28 bg-gradient-to-r from-[#deb2b280] to-[#deb2b280] absolute inset-0">
                            </div>
                        </div>
                    </div>
                    <!-- Card 1 -->
                    <div
                        class="bg-white shadow-[0_5px_30px_-15px_rgba(0,0,0,0.3)] rounded-sm flex flex-col lg:items-center justify-between lg:flex-row gap-10 p-7">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 475.082 475.081" width="25px"
                                height="25px">
                                <g>
                                    <path
                                        d="M164.45 219.27h-63.954c-7.614 0-14.087-2.664-19.417-7.994-5.327-5.33-7.994-11.801-7.994-19.417v-9.132c0-20.177 7.139-37.401 21.416-51.678 14.276-14.272 31.503-21.411 51.678-21.411h18.271c4.948 0 9.229-1.809 12.847-5.424 3.616-3.617 5.424-7.898 5.424-12.847V54.819c0-4.948-1.809-9.233-5.424-12.85-3.617-3.612-7.898-5.424-12.847-5.424h-18.271c-19.797 0-38.684 3.858-56.673 11.563-17.987 7.71-33.545 18.132-46.68 31.267-13.134 13.129-23.553 28.688-31.262 46.677C3.855 144.039 0 162.931 0 182.726v200.991c0 15.235 5.327 28.171 15.986 38.834 10.66 10.657 23.606 15.985 38.832 15.985h109.639c15.225 0 28.167-5.328 38.828-15.985 10.657-10.663 15.987-23.599 15.987-38.834V274.088c0-15.232-5.33-28.168-15.994-38.832-10.664-10.656-23.611-15.986-38.836-15.986z" />
                                    <path
                                        d="M459.103 235.256c-10.656-10.656-23.599-15.986-38.828-15.986h-63.953c-7.61 0-14.089-2.664-19.41-7.994-5.332-5.33-7.994-11.801-7.994-19.417v-9.132c0-20.177 7.139-37.401 21.409-51.678 14.271-14.272 31.497-21.411 51.682-21.411h18.267c4.949 0 9.233-1.809 12.848-5.424 3.613-3.617 5.428-7.898 5.428-12.847V54.819c0-4.948-1.814-9.233-5.428-12.85-3.614-3.612-7.898-5.424-12.848-5.424h-18.267c-19.808 0-38.691 3.858-56.685 11.563-17.984 7.71-33.537 18.132-46.672 31.267-13.135 13.129-23.559 28.688-31.265 46.677-7.707 17.987-11.567 36.879-11.567 56.674v200.991c0 15.235 5.332 28.171 15.988 38.834 10.657 10.657 23.6 15.985 38.828 15.985h109.633c15.229 0 28.171-5.328 38.827-15.985 10.664-10.663 15.985-23.599 15.985-38.834V274.088c0-15.232-5.322-28.168-15.979-38.832z" />
                                </g>
                            </svg>
                            <p class="my-3 2xl:text-lg">
                                Scalability will never be an issue now for my brand!
                            </p>
                            <p class="text-gray-400">
                                <span class="text-gray-900 capitalize font-bold">Jane Doe</span> — ANI, CEO
                            </p>
                        </div>
                        <div class="relative shrink-0">
                            <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="Jane Doe" class="rounded-full w-24 h-24 object-cover 2xl:w-28 2xl:h-28">
                            <div
                                class="rounded-full w-24 h-24 2xl:w-28 2xl:h-28 bg-gradient-to-r from-[#deb2b280] to-[#deb2b280] absolute inset-0">
                            </div>
                        </div>
                    </div>
                    <!-- Card 1 -->
                    <div
                        class="bg-white shadow-[0_5px_30px_-15px_rgba(0,0,0,0.3)] rounded-sm flex flex-col lg:items-center justify-between lg:flex-row gap-10 p-7">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 475.082 475.081" width="25px"
                                height="25px">
                                <g>
                                    <path
                                        d="M164.45 219.27h-63.954c-7.614 0-14.087-2.664-19.417-7.994-5.327-5.33-7.994-11.801-7.994-19.417v-9.132c0-20.177 7.139-37.401 21.416-51.678 14.276-14.272 31.503-21.411 51.678-21.411h18.271c4.948 0 9.229-1.809 12.847-5.424 3.616-3.617 5.424-7.898 5.424-12.847V54.819c0-4.948-1.809-9.233-5.424-12.85-3.617-3.612-7.898-5.424-12.847-5.424h-18.271c-19.797 0-38.684 3.858-56.673 11.563-17.987 7.71-33.545 18.132-46.68 31.267-13.134 13.129-23.553 28.688-31.262 46.677C3.855 144.039 0 162.931 0 182.726v200.991c0 15.235 5.327 28.171 15.986 38.834 10.66 10.657 23.606 15.985 38.832 15.985h109.639c15.225 0 28.167-5.328 38.828-15.985 10.657-10.663 15.987-23.599 15.987-38.834V274.088c0-15.232-5.33-28.168-15.994-38.832-10.664-10.656-23.611-15.986-38.836-15.986z" />
                                    <path
                                        d="M459.103 235.256c-10.656-10.656-23.599-15.986-38.828-15.986h-63.953c-7.61 0-14.089-2.664-19.41-7.994-5.332-5.33-7.994-11.801-7.994-19.417v-9.132c0-20.177 7.139-37.401 21.409-51.678 14.271-14.272 31.497-21.411 51.682-21.411h18.267c4.949 0 9.233-1.809 12.848-5.424 3.613-3.617 5.428-7.898 5.428-12.847V54.819c0-4.948-1.814-9.233-5.428-12.85-3.614-3.612-7.898-5.424-12.848-5.424h-18.267c-19.808 0-38.691 3.858-56.685 11.563-17.984 7.71-33.537 18.132-46.672 31.267-13.135 13.129-23.559 28.688-31.265 46.677-7.707 17.987-11.567 36.879-11.567 56.674v200.991c0 15.235 5.332 28.171 15.988 38.834 10.657 10.657 23.6 15.985 38.828 15.985h109.633c15.229 0 28.171-5.328 38.827-15.985 10.664-10.663 15.985-23.599 15.985-38.834V274.088c0-15.232-5.322-28.168-15.979-38.832z" />
                                </g>
                            </svg>
                            <p class="my-3 2xl:text-lg">
                                Scalability will never be an issue now for my brand!
                            </p>
                            <p class="text-gray-400">
                                <span class="text-gray-900 capitalize font-bold">Jane Doe</span> — ANI, CEO
                            </p>
                        </div>
                        <div class="relative shrink-0">
                            <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="Jane Doe" class="rounded-full w-24 h-24 object-cover 2xl:w-28 2xl:h-28">
                            <div
                                class="rounded-full w-24 h-24 2xl:w-28 2xl:h-28 bg-gradient-to-r from-[#deb2b280] to-[#deb2b280] absolute inset-0">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>



        <!----------Our Partners Section---------->
        <section class="my-10 z-30">
            <div class="overflow-x-hidden">
                <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
                    <div class="flex flex-col items-center">
                        <h1 class="font-bold text-[#00BCD4] uppercase text-base lg:text-lg tracking-wider">
                            Our partners & Supporters
                        </h1>

                        <p class="text-2xl text-black font-bold md:text-4xl text-center mt-3">
                            In Collaboration with Our Esteemed Partners and Supporters
                        </p>
                        <p class="p-2 text-base lg:text-lg text-center lg:max-w-4xl line-clamp-3">
                            We are proud to collaborate with trusted partners and supporters
                            who share our vision and strengthen our mission.
                        </p>
                    </div>
                </div>
            </div>

            <div class="w-full overflow-hidden relative">
                <!-- Fading sides -->
                <div class="w-full h-full absolute pointer-events-none">
                    <div class="w-1/4 h-full absolute z-20 left-0"
                        style="background: linear-gradient(to right, #fff8cc 0%, rgba(255, 255, 255, 0) 40%);">
                    </div>
                    <div class="w-1/4 h-full absolute z-20 right-0"
                        style="background: linear-gradient(to left, #fff8cc 0%, rgba(255, 255, 255, 0) 40%);">
                    </div>
                </div>

                <!-- Scrolling container -->
                @isset($partners)
                    <div class="carousel-container w-full" style="animation: scrollOnce 20s linear infinite;">
                        @foreach ($partners as $partner)
                            <div
                                class="carousel-focus flex !items-center justify-center flex-col relative mx-5 my-10 px-4 py-3 w-60">
                                <div class="flex items-center justify-center min-h-40 min-w-40">
                                    <img src="{{ asset('storage/' . $partner->image) }}"
                                        class="rounded-xl shadow-2xl object-contain" alt="Partners Icon" />
                                </div>
                                <h4 class="tracking-wide text-lg m-3">{{ $partner->name_en ?? $partner->name }}</h4>
                            </div>
                        @endforeach
                    </div>
                @endisset

            </div>
        </section>

        <div class="flex flex-col gap-10 mx-6 md:m-10 lg:mx-20 xl:mx-40 mb-10">
            <!-- --------Gallery and News Section-------- -->
            <div class="flex flex-col md:flex-row px-4 gap-10 ">
                <div class="flex-1 overflow-hidden">
                    <div class="flex flex-row justify-between m-3">
                        <h1
                            class="font-bold text-accent uppercase text-lg lg:text-2xl tracking-wider sm:text-left text-center">
                            Gallery
                        </h1>
                        <div class="flex justify-end">

                            <a href="{{ route('gallery') }}"
                                class="bg-black sm:w-full items-center text-accent px-6 py-2 rounded-full cursor-pointer hover:opacity-85 font-semibold">
                                Explore Gallery
                            </a>
                        </div>
                    </div>

                    <div style=" --swiper-navigation-color: #fff; --swiper-pagination-color: #fff; "
                        class="swiper mySwiper2 w-full h-1/2 aspect-[16/9] m-2">
                        @isset($galleries)
                            <div class="swiper-wrapper h-[800px] lg:h-[400px]">
                                @foreach ($galleries as $gallery)
                                    <div class="swiper-slide">
                                        <img src="{{ $gallery->featured_image ? asset('storage/' . $gallery->featured_image) : asset('assets/images/placeholder.jpg') }}"
                                            class="w-full h-full !object-cover" alt="{{ $gallery->title_en }}" />
                                    </div>
                                @endforeach

                            </div>
                        @endisset
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    @isset($galleries)
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($galleries as $index => $gallery)
                                    <div class="swiper-slide">
                                        <img src="{{ $gallery->featured_image ? asset('storage/' . $gallery->featured_image) : asset('assets/images/placeholder.jpg') }}"
                                            class="!w-full !h-[100px] !object-cover" alt="{{ $gallery->title_en }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endisset
                </div>

                <div class="flex-1 w-full h-full">
                    <div class="flex justify-end">
                        <a href="{{ route('newsAndEvents') }}"
                            class="bg-black items-center text-accent px-4 py-2 rounded-full cursor-pointer hover:opacity-85 font-semibold">
                            Explore News Articles
                        </a>
                    </div>
                    <div class="drop-shadow-xl shadow-gray-100 bg-white rounded-lg">
                        <!-- Heading for scroll -->
                        <div class="flex flex-row bg-white rounded m-3 p-3">
                            <!-- Explore part -->
                            <div class="mx-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20" fill="currentColor">
                                    <path d="M3 6h14M3 12h14M3 18h14" stroke="black" stroke-width="2"
                                        stroke-linecap="round" />
                                    <circle cx="20" cy="6" r="1.5" fill="black" />
                                    <circle cx="20" cy="12" r="1.5" fill="black" />
                                    <circle cx="20" cy="18" r="1.5" fill="black" />
                                </svg>
                            </div>
                            <h1 class="font-bold text-lg text-black">All News and Articles</h1>
                        </div>

                        <!-- Content inside the heading -->
                        @isset($newsAndEvents)
                            <div class="overflow-y-scroll h-[420px] m-3 sticky bg-white">
                                @foreach ($newsAndEvents as $news)
                                    <div
                                        class="flex flex-row gap-10 p-2 border-l-[#0D2938] border-l-[4px] my-2 shadow-sm h-25">
                                        <div class="h-auto w-30">
                                            <img src="{{ isset($news->image) ? asset('storage/' . $news->image) : asset('assets/images/placeholder.jpg') }}"
                                                alt="{{ $news->title_en ?? 'News Image' }}"
                                                class="h-full w-full rounded-lg object-cover" />
                                        </div>

                                        <div class="flex flex-col gap-3">
                                            <a href="{{ route('newsAndEventsDetailPage', $news->slug) }}"
                                                class="line-clamp-2 font-semibold hover:text-accent transition-colors duration-200 cursor-pointer">
                                                {{ $news->name_en ?? 'News Title' }}
                                            </a>
                                            <div class="flex space-x-2">
                                                <img src="{{ asset('assets/images/news-and-events/calender-svgrepo-com.png') }}"
                                                    class="w-4 h-4 object-contain" alt="date" />
                                                <p class="text-xs text-gray-500">
                                                    {{ isset($news->created_at) ? $news->created_at->format('jS F Y') : 'Date not available' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Section-->
        <div id="popup-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <!-- Overlay -->
            <div id="popup-background-overlay" class="fixed inset-0 bg-black opacity-80 z-40"></div>

            <div class="relative p-4 w-[80%] lg:w-[50%] max-h-full z-50">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm ">
                    <div class="p-3 md:p-4 space-y-4 relative">
                        <button type="button z-50"
                            class="absolute top-2 right-2 z-[999] text-black bg-transparent cursor-pointer hover:text-accent opacity-85 rounded-lg text-sm w-8 h-8 flex justify-center items-center"
                            id="close-modal">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>

                        <div class="swiper !h-[40vh] md:!h-[60vh] mx-auto w-[100%] popupSwiper rounded-lg">
                            <div class="swiper-wrapper">
                                @isset($popups)
                                    @foreach ($popups as $popup)
                                        <div class="swiper-slide">
                                            @isset($popup->link)
                                                <a href="{{ $popup->link }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $popup->image) }}"
                                                        alt="{{ $popup->name_en }}" class="w-full h-full object-contain" />
                                                </a>
                                            @endisset

                                        </div>
                                    @endforeach
                                @endisset
                            </div>

                            <!-- Swiper pagination dots -->
                            <div class="swiper-pagination"></div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>

    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

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

    <script>
        // Show modal on page load only if popups exist
        window.addEventListener("DOMContentLoaded", () => {
            @if (isset($popups) && count($popups) > 0)
                const modal = document.getElementById("popup-modal");
                modal.classList.remove("hidden");
                modal.classList.add("flex");
            @endif
        });

        // Close modal when clicking the close button
        document.getElemen tById("close-modal").addEventListener("click", () => {
            const modal = document.getElementById("popup-modal");
            modal.classList.remove("flex");
            modal.classList.add("hidden");
        });

        document.getElementById("popup-background-overlay").addEventListener("click", () => {
            const modal = document.getElementById("popup-modal");
            modal.classList.remove("flex");
            modal.classList.add("hidden");
        });


        // Close modal when on escape
        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape") {
                const modal = document.getElementById("popup-modal");
                if (!modal.classList.contains("hidden")) {
                    modal.classList.remove("flex");
                    modal.classList.add("hidden");
                }
            }
        });

        //modal swiper
        document.addEventListener("DOMContentLoaded", function() {
            const swiperContainer = document.querySelector(".popupSwiper");
            if (swiperContainer) {
                const swiper = new Swiper(".popupSwiper", {
                    loop: true,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                });

                // Explicitly start autoplay
                swiper.autoplay.start();
            }
        });
    </script>
@endpush
