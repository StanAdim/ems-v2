<?php
/**
 * @var \App\Models\EventModel $event
 */
?>

@extends('layouts.event')

@section('content')
    <div class="container mx-auto lg:py-10">
        <div class="grid grid-cols-1 md:flex gap-4 ml-3 flex-row border-b py-10">
            <div class="grid gap-6 xl:gap-12 md:w-[30%]">
                <h4 class="text-3xl xl:text-5xl font-semibold text-primary">
                    Sponsorship<br>
                    Opportunies
                </h4>
                <a href="#sponsorship-packages">
                    <button class="px-3 w-full md:w-1/2  py-2 font-semibold rounded-lg bg-secondary">
                        Become a Sponsor
                    </button>
                </a>
            </div>
            <div class="md:w-[70%] text-lg">
                <p class="xl:px-10">
                    For companies wishing to target a specific day, materials, or social events during the conference,
                    individual sponsorship provides an attractive option. This allows your organisation to choose your
                    desired level of involvement and exposure to attendees at the conference. Please contact the ICT
                    Commission through taic@ictc.go.tz for more information on sponsorship opportunities.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:flex gap-4 ml-3 flex-row border-b py-10">
            <div class="grid gap-6 md:w-[30%]">
                <h4 class="text-3xl xl:text-5xl font-semibold text-primary">
                    Sponsorship<br>
                    in Kind
                </h4>
            </div>
            <div class="md:w-[70%]">
                <img class="w-full" src="{{ Vite::asset('resources/images/taic-sponsorship-packages.svg') }}"
                    alt="TAIC Packages">
            </div>
        </div>

        <div class="grid grid-cols-1 place-items-center gap-4 ml-3 py-10">
            <div class="" id="sponsorship-packages">
                <h4 class="text-2xl text-center xl:text-4xl font-semibold text-primary">
                    Sponsorship<br>
                    Packages
                </h4>
            </div>
            <div>
                <div class="grid grid-cols-1 ml-8 md:grid-cols-2 xl:grid-cols-4 gap-20">
                    <div>
                        <div class="border-b py-5 mb-5">
                            <ul class="text-2xl text-[#6B6969] font-semibold">
                                <li class="font-light "><span class="font-semibold">Tanzanite</span> Sponsor</li>
                                <li class="text-primary">200 Million</li>
                                <li class="text-sm">Main Sponsor</li>
                                <li class="text-sm font-light">Slot: 1</li>
                            </ul>
                        </div>
                        <div>
                            <ul class="list-disc text-sm">
                                <li>Introduce your organization, welcome delegates and present a topic in line with the
                                    conference theme</li>
                                <li>Promotion sign to be placed near the podium.</li>
                                <li>Sponsor logo with link to the sponsor website on the conference website/conference
                                    organizer’s website.</li>
                                <li>Company Logo and Overview in Event booklet.</li>
                                <li>Double size Exhibition Space (6m x 3M).</li>
                                <li>Creative design for all promotion materials for the conference.</li>
                                <li>Logo and link on the conference website.</li>
                                <li>Logo at the conference poster and other conference promotional materials</li>
                                <li>Presence at the social events: Your company can put up a roll-up display at the venue.</li>
                                <li>Distribution of your company promotion materials / giveaways in the conference bag.</li>
                                <li>Full-page advertisement in the Conference programme (inside cover).</li>
                                <li>Final Conference REPORT and attendance registry.</li>
                                <li>Mention in all press releases.</li>
                                <li>Mention at the beginning and closing of the Conference.</li>
                                <li>15 free delegate passes.</li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <div class="border-b py-5 mb-5">
                            <ul class="text-2xl text-[#6B6969] font-semibold">
                                <li class="font-light "><span class="font-semibold">Platinum</span> Sponsor</li>
                                <li class="text-alt-green">100 Million</li>
                                {{-- <li class="text-sm">Main Sponsor</li> --}}
                                <li class="text-sm font-light">Slot: 3</li>
                                <li class="text-white text-sm">-</li>
                            </ul>
                        </div>
                        <div>
                            <ul class="list-disc text-sm">
                                <li>Unique opportunity to set the debate agenda and showcase your thought-on selected Sub theme.</li>
                                <li>Logo and link on the conference website</li>
                                <li>Logo at the conference poster and other conference promotional materials</li>
                                <li>Presence at the social events: Your company can put up a roll-up display at the venue</li>
                                <li>Distribution of your company promotion materials / give-aways</li>
                                <li>Half page in the printed conference program</li>
                                <li>Final Conference REPORT.</li>
                                <li>Mention in all press releases.</li>
                                <li>Single size Exhibition Space (3m x 3M)</li>
                                <li>10 Complimentary passes</li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <div class="border-b py-5 mb-5">
                            <ul class="text-2xl text-[#6B6969] font-semibold">
                                <li class="font-light "><span class="font-semibold">Gold</span> Sponsor</li>
                                <li class="text-secondary">50 Million</li>
                                {{-- <li class="text-sm">Main Sponsor</li> --}}
                                <li class="text-sm font-light">Slot: 3</li>
                                <li class="text-white text-sm">-</li>
                            </ul>
                        </div>
                        <div>
                            <ul class="list-disc text-sm">
                                <li>Option for commercial presentation in front of the participants of one of the conferences</li>
                                <li>Sponsor logo with link to the sponsor website on the conference website/conference organizer’s website.</li>
                                <li>Presence at the social events: Your company can put up a roll-up display at the venue</li>
                                <li>Distribution of your company promotion materials / give-aways in the conference bag</li>
                                <li>Quately page in the printed conference program</li>
                                <li>Single size Exhibition Space (3m x 3M)</li>
                                <li>8 free registrations.</li>

                            </ul>
                        </div>
                    </div>

                    <div>
                        <div class="border-b py-5 mb-5">
                            <ul class="text-2xl text-[#6B6969] font-semibold">
                                <li class="font-light "><span class="font-semibold">Silver</span> Sponsor</li>
                                <li class="text-gray-400">25 Million</li>
                                {{-- <li class="text-sm">Main Sponsor</li> --}}
                                <li class="text-sm font-light">Slot: 5</li>
                                <li class="text-white text-sm">-</li>
                            </ul>
                        </div>
                        <div>
                            <ul class="list-disc text-sm">
                                <li>Option for commercial presentation in front of the participants of one of the conferences</li>
                                <li>Logo and link on the conference website</li>
                                <li>Logo at the conference poster and other conference promotional materials</li>
                                <li>Company logo and name at the sponsors page in the printed conference program</li>
                                <li>Distribution of your company promotion materials.</li>
                                <li>Single size Exhibition Space (3m x 3M)</li>
                                <li>5 free registrations.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <button class="px-5 py-2 my-10 font-semibold rounded-lg bg-secondary">
                Become a Sponsor
            </button>
        </div>
    </div>
@endsection
