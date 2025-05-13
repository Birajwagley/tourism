@php
    use Illuminate\Support\Str;
@endphp
<footer>
    <div class="bg-[#0D2937] text-white text-sm mx-10">
        <div class="flex flex-col space-y-4">
            <!-- logo and desc -->
            <div class="w-full flex flex-col space-y-2 lg:space-y-0 lg:flex-row lg:justify-between ">
                <div class="flex justify-center lg:justify-left">
                    <a class="text-3xl text-white font-bold" href="{{ route('homepage') }}">
                        <img src="{{ asset('assets/images/logo/white-logo.png') }}" class="w-48" alt="Logo" />
                    </a>
                </div>
                <!-- social media icons -->
                <div class="flex justify-center lg:justify-left space-x-3 items-center">
                    <div
                        class="social group flex justify-center items-center w-10 h-10 lg:w-16 lg:h-16 rounded-full hover:cursor-pointer">
                        @isset($settings->facebook)
                            <a rel="noopener noreferrer" href="{{ $settings->facebook }}">
                                <img id="fb-white"
                                    src="{{ asset('assets/images/social-media-icons/facebook-svgrepo-com.png') }}"
                                    class="w-6" alt="Facebook Icon" />
                            </a>
                        @endisset
                    </div>
                    <div
                        class="social group flex justify-center items-center w-10 h-10 lg:w-16 lg:h-16 rounded-full hover:cursor-pointer">
                        @isset($settings->linkedin)
                            <a rel="noopener noreferrer" href="{{ $settings->linkedin }}">
                                <img id="fb-white"
                                    src="{{ asset('assets/images/social-media-icons/linkedin-svgrepo-com.png') }}"
                                    class="w-4 h-4" alt="LinkedIn Icon" />
                            </a>
                        @endisset
                    </div>
                    <div
                        class="social group flex justify-center items-center w-10 h-10 lg:w-16 lg:h-16 rounded-full hover:cursor-pointer">
                        @isset($settings->twitter)
                            <a rel="noopener noreferrer" href="{{ $settings->twitter }}">
                                <img id="fb-white" src="{{ asset('assets/images/social-media-icons/x-icon.jpg') }}"
                                    class="w-6" alt="X Icon" />
                            </a>
                        @endisset
                    </div>
                </div>
            </div>
            <!-- description -->
            <div class="flex flex-col md:flex-row justify-left md:justify-center gap-6">
                <div class="flex flex-1 flex-col lg:flex-row justify-around gap-6 lg:mx-0">
                    <div class=" pr-0 lg:pr-8 flex flex-col text-center items-center space-y-5 flex-1">
                        <p class="text-center md:text-left">
                            A Principal Agent of Western Union in Nepal.</p>

                        @isset($aboutUs->description_en)
                            <p class="text-center md:text-left">
                                {{ Str::words($aboutUs->description_en, 50, '...') }}
                            </p>
                        @endisset
                    </div>

                    <!-- contact details-->
                    <div class="text-[#ffffffcc] flex flex-col space-y-5 lg:justify-left flex-1 lg:px-6 justify-center">
                        <div class="flex flex-row gap-6 space-x-5 justify-left">
                            <img src="{{ asset('assets/images/footer/location.png') }}" class="w-6 h-6"
                                alt="Location Icon" />
                            <div class="flex flex-col space-y-1 justify-left text-left">
                                @isset($settings->address_en)
                                    <p>

                                        <b>Address:</b> <br />

                                        {{ $settings->address_en }}

                                    </p>
                                @endisset

                                <!-- <p>Kathmandu, Nepal</p> -->
                            </div>
                        </div>
                        <div class="flex flex-row gap-6 space-x-5 justify-left">
                            <img src="{{ asset('assets/images/footer/phone-call.png') }}" class="w-6 h-6"
                                alt="Phone call" />
                            <div class="flex flex-col space-y-1 justify-left text-left">
                                @isset($settings->phone_number_en)
                                    <p>
                                        <b>Phone no:</b> <br />

                                        {{ $settings->phone_number_en }}

                                    </p>
                                @endisset
                                <!-- <p>
                                    Toll Free Number: <br />
                                    16600 111222 <br />(For NTC Users Only)
                                </p> -->
                            </div>
                        </div>
                        <div class="flex flex-row gap-6 space-x-5 justify-left">
                            <img src="{{ asset('assets/images/footer/mail.png') }}" class="w-6 h-6 "
                                alt="Email Icon" />
                            <div class="flex flex-col space-y-1 justify-left text-left">
                                @isset($settings->email)
                                    <p><b> Email:</b> </p>
                                    <p>
                                        @isset($settings->email)
                                            {{ $settings->email }}
                                        @endisset
                                        @isset($settings->agent_notify_email)
                                            {{ $settings->agent_notify_email }}
                                        @endisset
                                    </p>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>

                <!-- links -->
                <div
                    class=" flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 text-center md:text-left items-center gap-10 mx-auto lg:mx-3 ">

                    <div class="text-[#ffffffcc] flex flex-col space-y-2">
                        <h4 class=" text-accent font-bold text-left">Quick Links</h4>
                        @forelse($footerQuickLinks['quickLinks'] as $quickLink)
                            @if ($quickLink->external_link)
                                <a href="{{ $quickLink->external_link }}" target="_blank"
                                    class="hover:underline text-left">{{ $quickLink->name_en }}</a>
                            @endif
                        @empty
                            <a href="{{ route('homepage') }}" class="hover:underline text-left">Home</a>
                            <a href="{{ route('aboutHulasRemittance') }}" class="hover:underline text-left">About
                                Tourisman</a>
                            <a href="{{ route('contactUs') }}" class="hover:underline text-left">Contact us</a>
                        @endforelse
                    </div>

                    @if (isset($footerQuickLinks['extraLinks']))
                        <div class="text-[#ffffffcc] flex flex-col space-y-2 text-center lg:text-left">
                            @foreach ($footerQuickLinks['extraLinks'] as $link)
                                @if ($link->external_link)
                                    <a href="{{ $link->external_link }}" target="_blank"
                                        class="hover:underline text-left">{{ $link->name_en }}</a>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if (isset($footerQuickLinks['moreLinks']))
                        <div class="text-[#ffffffcc] flex flex-col space-y-2 text-center lg:text-left">
                            @foreach ($footerQuickLinks['moreLinks'] as $link)
                                @if ($link->external_link)
                                    <a href="{{ $link->external_link }}" target="_blank"
                                        class="hover:underline text-left">{{ $link->name_en }}</a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <!-- bottom footer -->
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-sm text-white text-center md:text-left">
                    <a href="#" class="hover:underline">Site Map</a> |
                    <a href="#" class="hover:underline">Privacy Statement</a>
                </div>

                <div class="text-sm text-white text-center md:text-right mt-4 md:mt-0">
                    <p>&copy; <span id="year"></span> Goodwill Finance Limited. All Rights Reserved.</p>
                    {{-- <p>Crafted with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#"
                            class="text-blue-600 hover:underline">AWT</a>
                    </p> --}}
                </div>
            </div>
        </div>
</footer>
