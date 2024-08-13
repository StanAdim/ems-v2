@extends('layouts.event')


@section('content')
    <div class="space-y-32">
        <div class="container mx-auto flex flex-row g-2">
            <div class="basis-2/4">
                <div class="flex flex-col space-y-8">
                    <p class="text-3xl font-bold">{{ $event->bannerText }}</p>
                    <div class="flex flex-row space-x-2">
                        <button class="bg-secondary px-8 py-2 h-auto text-lg rounded-lg">Register Now</button>
                        <button
                            class="bg-transparent border-2 border-primary text-primary px-8 py-2 h-auto text-lg rounded-lg">More
                            Details </button>
                    </div>
                </div>

            </div>
        </div>
        <div class="bg-brand-950 text-white">
            <div class="container mx-auto py-24">
                <div class=" flex flex-row space-x-4">
                    <div class="basis-1/2 flex flex-col space-y-8 w-full">
                        <p class="text-5xl text-primary">
                            About {!! $event->title !!}
                        </p>
                    </div>
                    <div class="basis-1/2 flex flex-col space-y-4 w-full">
                        <p class="text-l">
                            {!! $event->aboutDescription !!}
                        </p>
                        <p class="text-3xl font-semibold text-primary">
                            About {!! $event->aboutTitle !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container mx-auto bg-primary-300 h-96 rounded-xl">

            </div>
        </div>

    </div>
@stop
