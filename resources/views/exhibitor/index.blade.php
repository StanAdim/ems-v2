@extends('layouts.event')

@section('content')
@use('App\Enums\ProfileType')
    <div x-data="{ activePage: 'exhibition' }" class="md:mx-auto">
        <div x-show="activePage == 'login'">
            <livewire:user-login registration_action="activePage = 'register'"/>
        </div>
        <div x-show="activePage == 'register'">
            <livewire:user-registration login_action="activePage = 'login'" :type='ProfileType::Exhibitor'/>
        </div>
        <div x-show="activePage == 'exhibition'">
            <div class="grid grid-cols-1 gap-1 bg-primary-50"
                style="background-image: url({{ Vite::asset('resources/images/exhibitor.svg') }});background-size:cover; background-repeat:no-repeat; background-position-x: center; background-position-y: center;">
                <div class="grid grid-cols-12 py-10 text-center">
                    <div class="col-span-1 place-self-center">
                        <button class="">
                            {{-- <img class="w-8 object-cover" src="{{ Vite::asset('resources/images/icons/arrow_left.svg') }}"
                            alt="" srcset=""> --}}
                        </button>
                    </div>

                    <div class="col-span-10 mx-1 place-content-center text-left">
                        {{-- <img class="w-full" src="{{ Vite::asset('resources/images/events_1.png') }}" alt="" srcset=""> --}}

                        <div class="lg:my-40 lg:ml-16">
                            <h1 class="mt-20 text-3xl font-black text-white md:text-5xl">Showcase your<br>
                                innovations and<br>
                                connect with<br>
                                industry leaders </h1>
                            <div class="mx-1 mb-20 mt-5">
                                <div class="ml-auto inline-flex place-content-center justify-end gap-8">
                                    <button class="ml-auto rounded-lg bg-secondary px-5 py-3 font-medium text-black"
                                        @click="activePage = 'login'">
                                        Exhibit Now
                                    </button>
                                    {{-- <button class="ml-auto px-5 py-3 font-medium ring-1 ring-white rounded-lg text-white">More
                                    Details</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1 mx-1 place-self-center">
                        <button class="">
                            {{-- <img class="w-10 object-cover" src="{{ Vite::asset('resources/images/icons/arrow_right.svg') }}"
                            alt="" srcset=""> --}}
                        </button>
                    </div>
                </div>
            </div>

            <div class="container mx-auto">
                <p class="my-8 text-center text-xl lg:py-4">
                    TAIC 2024 will be featured by ICT products exhibition from multinationals,<br>
                    institutions, innovators and local ICT based service companies.
                </p>
            </div>

            <div class="container mx-auto">
                <div class="my-20 text-center text-5xl font-light text-black">
                    Why exhibit at TAIC?
                </div>
                <div class="mx-auto grid grid-cols-1 gap-10 py-10 md:grid-cols-3">
                    <?php
                    $whyParticipates = [
                        [
                            'icon' => 'resources/images/e-why-1.svg',
                            'title' => 'Increased Visibility',
                            'description' => 'Exhibiting at TAIC-2024 puts your brand in front of a targeted audience of ICT professionals, industry leaders, and potential clients, enhancing your visibility and reputation in the rapidly growing African digital market.',
                        ],
                        [
                            'icon' => 'resources/images/e-why-2.svg',
                            'title' => 'Direct Engagement',
                            'description' => 'Exhibitors have the opportunity to engage directly with key decision-makers, demonstrate their products or services in real-time, and receive immediate feedback, which can be invaluable for refining offerings and closing deals.',
                        ],
                        [
                            'icon' => 'resources/images/e-why-3.svg',
                            'title' => 'Networking Opportunities',
                            'description' => 'The event provides a platform to build relationships with potential partners, collaborators, and clients, leading to new business opportunities and partnerships in the AI and robotics sectors.',
                        ],
                    ];
                    ?>


                    @foreach ($whyParticipates as $why)
                        <div class="m-2 max-w-sm p-2 text-center">
                            <img class="mx-auto w-10 object-cover" src="{{ Vite::asset($why['icon']) }}" alt=""
                                srcset="">
                            <a href="#">
                                <h5 class="mb-2 mt-2 text-2xl font-semibold tracking-tight text-gray-900">
                                    {{ $why['title'] }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-500">{{ $why['description'] }}</p>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>

    </div>
@endsection
